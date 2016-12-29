<?php

$preOpenTag = '';
$preCloseTag = '';

if (php_sapi_name() != 'cli') {
    $preOpenTag = '<pre>';
    $preCloseTag = '</pre>';
}

function showTree($folder, $indent)
{
    $files = scandir($folder);
    foreach ($files as $file) {
        if (($file == '.') || ($file == '..')) {
            continue;
        }
        $path = $folder . '/' . $file;
        if (is_link($path) || !is_dir($path) || (is_dir($path) && !is_readable($path))) {
            echo $indent . $file . "\n";
        } else {
            echo $indent . $file . "\n";
            showTree($path, $indent . '   ');
        }
    }
}

echo $preOpenTag;
showTree("./", "");
echo $preCloseTag;
