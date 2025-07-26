<?php

namespace redaxo_custom_components;

class IconPicker extends AbstractEingabekomponente
{
    /** 
     * @inheritDoc 
     */
    function __construct($label,  $itemId, $sliceId, $redaxoValueId)
    {
        parent::__construct($label, $itemId, $sliceId, $redaxoValueId);
    }

    /** @inheritDoc */
    public function getHTML()
    {
        $rex_value_1 = $this->getValue();
        return '<label style="width: 100%;" for="c-' . join("-", $this->itemId) . '">' . $this->label . ':</label>' .
            '<div class="btn-group">
                    <button type="button" class="btn btn-primary iconpicker-component">
                        <i class="' . (!empty($rex_value_1) ? $rex_value_1 : 'fas fa-haykal') . ' iconpicker-component"></i>
                    </button>
                    <button id="c-' . join("-", $this->itemId) . '" type="button" class="icp icp-dd-' . join("-", $this->itemId) . ' btn btn-primary dropdown-toggle " data-selected="fa-car" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div id="rex-icon-picker" class="dropdown-menu iconpicker-container"></div>
                </div>
                <input style="display:none;" type="text" value="' .
            (!empty($rex_value_1) ? $rex_value_1 : 'fas fa-haykal') .
            '" name="REX_INPUT_VALUE[' . $this->redaxoValueId . '][' . join("][", $this->itemId) . ']"" id="REX_INPUT_VALUE-' . join("-", $this->itemId) . '">
                <script>
                    $(".icp-dd-' . join("-", $this->itemId) . '").iconpicker({});
                    $(".icp-dd-' . join("-", $this->itemId) . '").on("iconpickerSelected", function(event) {
                        console.log(event.iconpickerValue);
                        document.getElementById("REX_INPUT_VALUE-' . join("-", $this->itemId) . '").value = event.iconpickerValue;
                    });
                </script>';
    }
}
