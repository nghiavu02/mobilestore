<?php
if (isset($result)) {
    if (is_array($result)) {
        pretty($result);
    } else {
        echo $result;
    }
}