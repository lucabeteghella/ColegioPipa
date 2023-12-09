<?php

namespace App\Repositories;

abstract class BaseRepository 
{

    protected $model;

    public function __construct() {
        $this->model = $this->resolveModel();
    }

    protected function resolveModel() {
        return app($this->model);
    }

    public function getAll() {
        return $this->model->all();
    }

    public function getOne($id) {
        return $this->model->findOrFail($id);
    }

    public function deleteOne($id) {
        $data = $this->getOne($id);
        $data->delete();
        
        return $data;
    }
}
