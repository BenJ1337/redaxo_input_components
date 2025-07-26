<?php

namespace redaxo_custom_components;

class Checkbox extends AbstractEingabekomponente
{
    private $checkbox_value;

    /** 
     * {@inheritDoc} 
     * @param string $checkbox_value value, if the checkbox is checked
     */
    function __construct($label,  $itemId, $sliceId, $redaxoValueId, $checkbox_value)
    {
        parent::__construct($label, $itemId, $sliceId, $redaxoValueId);
        $this->checkbox_value = $checkbox_value;
    }

    /** @inheritDoc */
    public function getHTML()
    {
        $htmlOutput = '';

        $rex_value_1 = $this->getValue();

        $checked = "";
        if ($rex_value_1 == $this->checkbox_value) {
            $checked = "checked";
        }

        $htmlOutput .=    '<div class="checkbox">' .
            '<label for="c-' . join("-", $this->itemId) . '">' .
            '<input name="REX_INPUT_VALUE[' . $this->redaxoValueId . '][' . join("][", $this->itemId) . ']"  data-rex-item-id="' . join(",", $this->itemId) . '" type="checkbox" ' .
            'id="c-' . join("-", $this->itemId) . '" value="' . $this->checkbox_value . '"' . $checked . '>' .
            $this->label . '</label>' .
            '</div>';
        return $htmlOutput;
    }
}
