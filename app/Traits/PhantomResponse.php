<?php

namespace App\Traits;

trait PhantomResponse
{
    public function phantom__setResponse(array $data, $message = null, int $status = 200)
    {
        if (is_null($message)) {
            $message = match ($status) {
                200 => __('response.success'),
                500 => __('response.error'),
                default => "Unknown status $status",
            };
        }
        return response()->json([
            'result' => $data,
            'message' => $message,
        ], $status);
    }
}
