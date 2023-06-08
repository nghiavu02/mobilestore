<?php
if (!empty($result)) {
    if (is_array($result)) {
        pretty($result);
    } else {
        echo $result;
    }
}
?>