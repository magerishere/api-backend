<?php

namespace App\Traits\CRUD;

use Illuminate\Validation\ValidationException;

trait PhantomCreate
{
    public function phantom__create(array $data)
    {
//        $data['is_active'] = true;
        try {
            $result = $this->model::create($data);

        } catch (ValidationException $exception) {
            throw new \ErrorException('something went wrong 2');
        }

    }
}
