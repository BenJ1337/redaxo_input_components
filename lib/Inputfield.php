<?php

class Inputfield extends AbstractEingabekomponente
{

    protected $type = "text";
    protected $settings = array();

    function __construct($label,  $itemId, $sliceId, $redaxoValue)
    {
        parent::__construct($label, $itemId, $sliceId, $redaxoValue);
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setSettings($settings)
    {
        $this->settings = $settings;
        return $this;
    }


    public function getHTML()
    {
        $rex_value_1 = $this->getValue();
        $id = join("-", $this->itemId);
        $output =
            '<label style="width: 100%;" for="c-' . join("-", $this->itemId) . '">' . $this->label . ':</label>' .
            '<input ' .
            implode(' ', array_map(function ($k, $v) {
                return "$k=\"" . urlencode($v) . "\"";
            }, array_keys($this->settings), $this->settings))
            . ' type="' . $this->type . '" data-rex-item-id="' . join(",", $this->itemId)
            . '" name="REX_INPUT_VALUE[' .  $this->redaxoValueId . '][' . join("][", $this->itemId)
            . ']" value="' . $rex_value_1
            . '" id="c-' . $id . '" />';

        if (in_array($this->type, array('range', 'color'))) {
            $output .= '<br><label>Value: <input style="border: none; border-radius: 3px;" id="rangeValueOutput' . $id . '" value="' . $rex_value_1 . '"/></label>
                        <script>
                            var rangeValueOutput = document.querySelector("#rangeValueOutput' . $id . '");
                            var rangeInput = document.querySelector("#c-' . $id . '");
                            rangeValueOutput.textContent = rangeInput.value;
                            rangeInput.addEventListener("input", (event) => {
                                rangeValueOutput.value = event.target.value;
                            });
                        </script>';
        }
        return $output;
    }
}
