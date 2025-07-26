<?php
if (rex::isBackend()) {
    rex_view::addCssFile($this->getAssetsUrl('jodit/es2015/jodit.min.css'));
    rex_view::addJsFile($this->getAssetsUrl('jodit/es2015/jodit.min.js'));
}
/* else {
    rex_view::addJsFile($this->getAssetsUrl('jquery-3.7.1.min.js'));
}*/
