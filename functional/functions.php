<?php

function readCvs($fileName, $mode = "a+") {

    $userData = [];
    if (file_exists($fileName)) {

        $stream = fopen($fileName, $mode);
        while (($row = fgetcsv($stream)) !== false) {
            $userData[] = $row;
        }
        fclose($stream);

    }

    return $userData;
}

function writeCvs($fileName, $data, $mode = "a")
{
    $result = false;
    if (file_exists($fileName)) {
        $cvsFile = fopen($fileName, $mode);
        fputcsv($cvsFile, $data);
        fclose($cvsFile);
        $result = true;
    }
    return $result;
}



?>