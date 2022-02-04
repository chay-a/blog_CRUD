<?php
function filter_validate_txt($txt) {
    if (strlen(preg_replace('/\s+/um', '', $txt)) < 45) {
        return $txt;
    } else {
        return false;
    }
}