<?php
$lineBreak = "\n";
$orderedListOpenTag = '';
$orderedListCloseTag = '';
$liOpenTag = "";
$liCloseTag = "";

if (php_sapi_name() != 'cli') {
    $lineBreak = "";
    $orderedListOpenTag = '<ol>';
    $orderedListCloseTag = '</ol>';
    $liOpenTag = "<li>";
    $liCloseTag = "</li>";
}

function showTree($folder, $space)
{
    global $lineBreak, $orderedListOpenTag, $orderedListCloseTag, $liOpenTag, $liCloseTag;

    $files = scandir($folder);

    foreach($files as $file) {

        if (($file == '.') || ($file == '..')) {
            continue;
        }

        $path = $folder.'/'.$file;
        
        if (is_link($path) || !is_dir($path) || (is_dir($path) && !is_readable($path))) {
            echo $liOpenTag.$space.$file.$liCloseTag.$lineBreak;
        }
        else {
            echo $liOpenTag.$space.$file.$liCloseTag.$lineBreak;
            echo $orderedListOpenTag;
            showTree($path, $space.'   ');
            echo $orderedListCloseTag;
        }
    }
}

echo $orderedListOpenTag;
showTree("./", "");
echo $orderedListCloseTag;