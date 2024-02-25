<?php

namespace redaxo_eingabekomponenten;

class Textarea extends  AbstractEingabekomponente
{

    function __construct($label,  $itemId, $sliceId, $redaxoValue)
    {
        parent::__construct($label, $itemId, $sliceId, $redaxoValue);
    }

    public function getHTML()
    {
        $rex_value_1 = $this->getValue();
        return
            '<label style="width: 100%;" for="c-' . join("-", $this->itemId) . '">' . $this->label . ':</label>' .
            '<textarea rows="10" type="text" data-rex-item-id="' . join(",", $this->itemId)
            . '" name="REX_INPUT_VALUE[' . $this->redaxoValueId . '][' . join("][", $this->itemId)
            . ']" id="c-' . join("-", $this->itemId) . '" />' . $rex_value_1 . '</textarea>';
    }
}
