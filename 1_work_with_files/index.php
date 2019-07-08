<?php

spl_autoload_register(function ($class) {
    include $class . '.php';
});

$title = '1. Работа с файлами';

$parser = "";

$errors = array();

if ($_POST) {
    if ($_FILES['csv']['size'] !== 0) {
        // delimeter cols.
        $delimiters = array(
            ';' => 0,
            ',' => 0,
            "\t" => 0,
            "|" => 0
        );

        $handle = fopen($_FILES['csv']['tmp_name'], "r");
        $firstLine = fgets($handle);
        fclose($handle);
        foreach ($delimiters as $delimiter => &$count) {
            $count = count(str_getcsv($firstLine, $delimiter));
        }

        $col_delimiter = array_search(max($delimiters), $delimiters);

        $parser = new parsercsv($_FILES['csv']['tmp_name'], $col_delimiter);
    }
}


require "template.tpl";

