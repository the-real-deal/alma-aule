<?php
    $uri = 'http://';
    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    }
    $uri .= $_SERVER['HTTP_HOST'];
    header('Location: ' . $uri . '/pages/landing/index.php');
    exit;