<?php

namespace redaxo_eingabekomponenten;

class Inputfield extends AbstractEingabekomponente
{
    const TYPE_COLOR = 'color';
    const TYPE_DATE = 'date';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_MONTH = 'month';
    const TYPE_RANGE = 'range';

    protected $type = "text";
    protected $settings = array();
    protected $styles = array('width' => '100%');

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

    public function setStyles($styles)
    {
        $this->styles = $styles;
        return $this;
    }

    public function addStyles($styles2add)
    {
        $curr = $this->styles;
        foreach ($styles2add as $k => $v) {
            $curr[$k] = $v;
        }
        $this->styles = $curr;
        return $this;
    }

    public function getStyles()
    {
        return $this->styles;
    }


    public function getHTML()
    {
        $rex_value_1 = $this->getValue();
        $id = join("-", $this->itemId);
        $output = '<div style="' . implode(' ', array_map(function ($k, $v) {
            return "$k: " . $v . ";";
        }, array_keys($this->styles), $this->styles)) . '">';

        $output .= '<label stlye="width: 100%" for="c-' . join("-", $this->itemId) . '">' . $this->label . ':</label>' .
            '<input ' .
            implode(' ', array_map(function ($k, $v) {
                return "$k=\"" . urlencode($v) . "\"";
            }, array_keys($this->settings), $this->settings))
            . ' type="' . $this->type . '" data-rex-item-id="' . join(",", $this->itemId)
            . '" name="REX_INPUT_VALUE[' .  $this->redaxoValueId . '][' . join("][", $this->itemId)
            . ']" value="' . $rex_value_1
            . '" id="c-' . $id . '" />';

        if (in_array($this->type, array(self::TYPE_RANGE, self::TYPE_COLOR))) {
            $output .= '<label style="margin: 5px 0 15px 0;">Wert: 
                        <input style="border: none; border-radius: 3px; margin-bottom: 10px" id="rangeValueOutput' . $id . '" value="' . $rex_value_1 . '"/></label>
                        <script>
                            var rangeValueOutput' . $id . ' = document.querySelector("#rangeValueOutput' . $id . '");
                            var rangeInput = document.querySelector("#c-' . $id . '");
                            rangeValueOutput' . $id . '.textContent = rangeInput.value;
                            rangeInput.addEventListener("input", (event) => {
                                rangeValueOutput' . $id . '.value = event.target.value;
                            });
                            rangeValueOutput' . $id . '.addEventListener("input", (event) => {
                                rangeInput.value = event.target.value;
                            });
                        </script>';
        }
        $output .= '</div>';
        return $output;
    }
}
