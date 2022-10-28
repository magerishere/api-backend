<?php

namespace App\Traits\Query;

trait PhantomQuery {
    public function phantom__query()
    {
        $this->query = $this->model::query();
        return $this->query;
    }
}
