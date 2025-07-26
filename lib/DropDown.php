<?php

namespace redaxo_custom_components;

class DropDown extends AbstractEingabekomponente
{
    private $options;

    /** 
     * @inheritDoc 
     * @param $options options of the drop down selection
     */
    function __construct($label,  $itemId, $sliceId, $redaxoValueId, $options)
    {
        parent::__construct($label, $itemId, $sliceId, $redaxoValueId);
        $this->options = $options;
    }

    /** @inheritDoc */
    public function getHTML()
    {
        $htmlOutput = '';

        $rex_value_1 = $this->getValue();

        $htmlOutput .= '<label for="c-' . join("-", $this->itemId) . '">'
            . $this->label . ':</label>
                <select class="rex-custom-input form-control" 
                data-rex-item-id="'           . join(",", $this->itemId)
            . '" name="REX_INPUT_VALUE[' . $this->redaxoValueId . '][' . join("][", $this->itemId)
            . ']" id="c-' . join("-", $this->itemId) . '">';
        foreach ($this->options as $key => $value) {
            $selected = '';
            if (isset($rex_value_1) && $value == $rex_value_1) {
                $selected = 'selected';
            }
            $htmlOutput .= '<option value="' . $value . '"' . $selected . '>' . $key . '</option>';
        }
        $htmlOutput .= '</select>';
        return $htmlOutput;
    }
}
