<?php

namespace redaxo_custom_components;

use rex_article_slice, rex_var;

abstract class AbstractEingabekomponente
{
    /** @var int */
    protected $sliceId;
    /** string[] */
    protected $itemId;
    /** @var string Label */
    protected $label;
    /** @var int */
    protected $redaxoValueId;
    /** @var string */
    protected $defaultValue = null;

    /**
     * @param string $label  Text for this input component
     * @param string[] $itemId property path for this value
     * @param int $sliceId Id of the slice in which this input component is integrated
     * @param int $redaxoValueId Id of the input component group
     */
    function __construct($label, $itemId, $sliceId, $redaxoValueId)
    {
        $this->label = $label;
        $this->itemId = $itemId;
        $this->sliceId = $sliceId;
        $this->redaxoValueId = $redaxoValueId;
    }

    /**
     * @return string markup for this input component
     */
    abstract public function getHTML();

    /**
     * Sets the default value for this input component
     * @param string default value
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;
        return $this;
    }

    /**
     * @return string current Value set by the user
     */
    protected function getValue()
    {
        if (null == rex_article_slice::getArticleSliceById($this->sliceId)) {
            return $this->defaultValue;
        }
        $storedValues = rex_var::toArray(rex_article_slice::getArticleSliceById($this->sliceId)->getValue($this->redaxoValueId));
        $rex_value_1 = '';
        if (isset($storedValues) && $storedValues != null) {
            foreach ($this->itemId as $value) {
                if (isset($storedValues[$value]) || isset($rex_value_1[$value])) {
                    if ($rex_value_1 == '') {
                        $rex_value_1 = $storedValues[$value];
                    } else {
                        $rex_value_1 = $rex_value_1[$value];
                    }
                }
            }
        }
        return $rex_value_1;
    }
}
