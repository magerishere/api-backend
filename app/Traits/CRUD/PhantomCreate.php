<?php

namespace App\Traits\CRUD;

trait PhantomCreate {
    public function phantom__create(array $data)
    {
        return $this->model::create($data);
    }
}
