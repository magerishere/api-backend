<?php

namespace App\Traits;

trait PhantomResponse
{
    public function phantom__setResponse(array $data,int $status = 200)
    {
        return response()->json($data,$status);
    }
}
