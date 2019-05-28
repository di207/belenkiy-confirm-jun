<?php

    $title = '1. Работа с файлами';

    $errors = array();

    if (isset($_FILES["csv"])) {
        $myfile_name = $_FILES["csv"]["name"];
        $myfile_type = $_FILES["csv"]["type"];
        $fileExp = explode('.', $myfile_name);
        $fileActualExt = strtolower(array_pop($fileExp)); //extantion

        $uploaddir = 'temp/csv/';
        if (! is_dir($uploaddir)) {
            mkdir($uploaddir, 0700, true);
        }
        if ($fileActualExt != 'csv') {
            $errors[] = '<strong>Ошибка!</strong> Неверный тип файла!';
        }
        if (! is_dir($uploaddir)) {
            $errors[] = '<strong>Ошибка!</strong> Директория для загрузки файла не существует!';
        }

        if (empty($errors)) {
            $uploadfile = $uploaddir . basename($_SERVER['REQUEST_TIME'].'_'.$_FILES['csv']['name']);
            if (copy($_FILES['csv']['tmp_name'], $uploadfile)) {
                if (($handle = fopen($uploadfile, "r")) !== false) {

                    $body = "";
                    $data = fgetcsv($handle, 1000, "|");

                    if ($data == ['название', 'артикул', 'номер категории', 'стоимость оптовая']) {
                        foreach($data as $key => $value){
                            $header[] = $value;
                        }
                        while (($data = fgetcsv($handle, 1000, "|")) !== false) {
                            $head = "<table  class='table'>
                    <thead>
                        <tr>
                            <th class='cell-1'>".$header[0]."</th>
                            <th class='cell-2'>".$header[1]."</th>
                            <th class='cell-3'>Стоимость</th>
                            <th>Цена</th>
                        </tr>
                    </thead>
                    <tbody>";
                            $data[2] = (int)$data[2];
                            $data[3] = (int)$data[3];
                            $markup = ($data[2]>=1 && $data[2]<=10)? 5 : 7;
                            $data[4] = ($data[3]*$markup/100) + $data[3];
                            $data[5] = "";
                            $data[5] = ($data[2]%2 == 0) ? "alert alert-success" : "alert alert-primary";
                            $body .= "<tr class='" . $data[5] . "'>";
                            $body .=    "<td><span class='text-overflow'>" . $data[0] . "</span></td>
                             <td><span class='text-overflow'>" . $data[1] . "</span></td>
                             <td><span class='text-overflow'>" . $data[3] . "</span></td>
                             <td><span class='text-overflow'>" . $data[4] . "</span></td>";
                            $body .= "</tr>";
                        }

                        $footer = "</tbody></table>";
                        $table = $head . $body . $footer;
                        fclose($handle);
                    } else {
                        $errors[] = '<strong>Ошибка!</strong> Неверная структура файла для импорта!';
                    }
                }
            } else {
                $errors[] = "<strong>Ошибка!</strong> Не удалось загрузить файл на сервер!";
            }
        }
    }

    require "template.tpl";

