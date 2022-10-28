<?php

namespace App\Traits\CRUD;

trait PhantomAll {
    public function phantom__getAll()
    {
        return $this->model::all();
    }

}
