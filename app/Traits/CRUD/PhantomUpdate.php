<?php

namespace App\Traits\CRUD;

trait PhantomUpdate
{
    public function phantom__update(array $data, $id)
    {
        $model = $this->phantom__query()->findOrFail($id);
        try {
            $model->update($data);
        } catch (\Exception $e) {
            throw new Error($e->getMessage());
        }

        return $model;
    }
}
