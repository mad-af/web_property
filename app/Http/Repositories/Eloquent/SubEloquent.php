<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\RepositoriesInterface;

use App\Models\Sub;

class SubEloquent implements RepositoriesInterface {
  private $model;
  public function __construct()
  {
    $this->model = new Sub();
  }

  private function filter(array $filter) {
    $type = gettype($filter[0] ?? '');
    if($type === 'array' || empty($filter[0])) {
      $filter = [$filter];
    } 
    return $filter;
  }

  public function find(array $filter, array $sort = [[]]) {
    
    return $this->model->where(...$this->filter($filter))->orderBy(...$sort)->get()->toArray();
  }

  public function findOne(array $filter) {
    return $this->model->where(...$this->filter($filter))->first();
  }

  public function aggregate() {
    return $this->model;
  }

  public function insert(array $payload) {
    return $this->model->create($payload);
  }

  public function update(array $filter, array $payload) {
    return $this->model->where(...$this->filter($filter))->update($payload);
  }

  public function delete(array $filter) {
    return $this->model->where(...$this->filter($filter))->delete();
  }

} 
