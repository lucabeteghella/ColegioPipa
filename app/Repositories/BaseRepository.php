<?php

namespace App\Repositories;

class BaseRepository 
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
}
