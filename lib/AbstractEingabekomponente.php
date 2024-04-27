<?php

namespace redaxo_eingabekomponenten;

use rex_article_slice, rex_var;

class AbstractEingabekomponente
{

    protected $sliceId;
    protected $itemId;
    protected $label;
    protected $redaxoValueId;
    protected $defaultValue = null;

    function __construct($label,  $itemId, $sliceId, $redaxoValueId)
    {
        $this->label = $label;
        $this->itemId = $itemId;
        $this->sliceId = $sliceId;
        $this->redaxoValueId = $redaxoValueId;
    }

    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;
    }

    protected function getValue()
    {
        if (null == rex_article_slice::getArticleSliceById($this->sliceId)) {
            return $this->defaultValue;
        }
        $storedValues = rex_var::toArray(rex_article_slice::getArticleSliceById($this->sliceId)->getValue($this->redaxoValueId));
        $rex_value_1 = $this->defaultValue;
        if (isset($storedValues) && $storedValues != null) {
            foreach ($this->itemId as $value) {
                if (isset($storedValues[$value]) || isset($rex_value_1[$value])) {
                    if ($rex_value_1 == $this->defaultValue) {
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
