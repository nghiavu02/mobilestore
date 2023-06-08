<?php
if (isset($post)) {
    if (is_array($post)) {
        pretty($post);
    } else {
        echo $post;
    }
}