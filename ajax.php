<?php
    header('Content-Type: text/plain');
    if (file_exists(__DIR__ . '/app/ajax/' . $_GET['type'])) {
        require_once __DIR__ . '/app/ajax/' . $_GET['type'];
    } else {
        echo '<b>File ' . $_GET['type'] . ' not exists!</b>';
        exit;
    }
?>