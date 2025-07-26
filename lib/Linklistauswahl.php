<?php

namespace redaxo_custom_components;

class Linklistauswahl extends AbstractEingabekomponente
{

    /** @inheritDoc */
    function __construct($label,  $itemId, $sliceId, $redaxoValue)
    {
        parent::__construct($label, $itemId, $sliceId, $redaxoValue);
    }

    /** @inheritDoc */
    public function getHTML()
    {
        return '<label>' . $this->label . '<br>' . rex_var_linklist::getWidget(
            "REX_MEDIA_ID_" . $this->redaxoValueId,
            'REX_INPUT_VALUE[' . $this->redaxoValueId . '][' . join("][", $this->itemId) . ']',
            $this->getValue(),
            []
        ) . '</label>';
    }
}
