<?php

chdir(__DIR__);

define('style_path', __DIR__ . DIRECTORY_SEPARATOR . 'assert' . DIRECTORY_SEPARATOR . 'css');
define('log_file', __DIR__ . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'style_php.log');

// Sécurisation du nom de fichier
$cssFile = $_GET['f'];
str_replace(['/', '\\',], '', $cssFile);
$cssFile = style_path . DIRECTORY_SEPARATOR . $cssFile;

$phpFile = $cssFile . '.php';

function redirect404() {
    header("HTTP/1.0 404 Not Found");
    exit();
}

function render($in, $out) {
    ob_start();
    include($in);
    $content = ob_get_contents();
    ob_end_clean();
    file_put_contents($out, $content);
}

if (!is_file($cssFile)) {
    if (is_file($phpFile)) {
        render($phpFile, $cssFile);
    } else {
        redirect404();
    }
} else {
    if (filemtime($phpFile) > filemtime($phpFile)) {
        render($phpFile, $cssFile);
    }
}

$cssHandle = fopen($name, 'rb');
header("Content-Type: text/css");
header("Content-Length: " . filesize($cssFile));
fpassthru($cssHandle);
fclose($cssHandle);
exit();
