<?php

namespace redaxo_custom_components;

class WYSIWYGEditor extends AbstractEingabekomponente
{

    function __construct($label,  $itemId, $sliceId, $redaxoValue)
    {
        parent::__construct($label, $itemId, $sliceId, $redaxoValue);
    }

    private function getMarkup()
    {
        $rex_value_1 = $this->getValue();
        if (null === $rex_value_1) {
            return '';
        }
        return str_replace(array("\r", "\n"), '', str_replace("\"", "'", $rex_value_1));
    }

    public function getHTML()
    {
        return '<div class="form-group">' .
            '<label for="text1">' . $this->label . '</label>' .
            '<textarea class="form-control jodit-editor" type="text" id="text1" name="REX_INPUT_VALUE[2][' . join("][", $this->itemId) . ']">' .
            $this->getMarkup() .
            '</textarea>' .
            '<script>var editor = Jodit.make("#text1",{
                height: 400,
                style: {
                    color: "#0c0c0c"
                }
              }); editor.value = "' . $this->getMarkup() . '";</script>' .
            '</div>';
    }
}
