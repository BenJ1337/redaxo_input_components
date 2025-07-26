<?php

namespace redaxo_custom_components;

use rex_var_link;

class Linkauswahl extends AbstractEingabekomponente
{

    /** @inheritDoc */
    function __construct($label,  $itemId, $sliceId, $redaxoValue)
    {
        parent::__construct($label, $itemId, $sliceId, $redaxoValue);
    }

    /** @inheritDoc */
    public function getHTML()
    {
        return '<label>' . $this->label . '<br>' . rex_var_link::getWidget(
            "REX_MEDIA_ID_" . $this->redaxoValueId,
            'REX_INPUT_VALUE[' . $this->redaxoValueId . '][' . join("][", $this->itemId) . ']',
            $this->getValue(),
            []
        ) . '</label>';
    }
}
