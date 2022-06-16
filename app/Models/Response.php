<?php

namespace App\Models;


class Response
{
    static public function json(array $data){
        $json = json_encode($data);
        header('Content-Type: application/json;');
        echo $json;
    }
}
