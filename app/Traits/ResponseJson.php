<?php
namespace App\Traits;

trait ResponseJson{
    public function responseJson($lable = null, $data = null, $status = 200){
        return response([
            "lable"=> $lable,
            "data"=> $data,
            "status"=> $status
        ], $status);
    }
}