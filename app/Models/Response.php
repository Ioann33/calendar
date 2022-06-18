<?php

namespace App\Models;


class Response
{
    /**
     * transform input data to JSON and send this
     * @param array $data
     */
    static public function json(array $data){
        $json = json_encode($data);
        header('Content-Type: application/json;');
        echo $json;
    }
}
