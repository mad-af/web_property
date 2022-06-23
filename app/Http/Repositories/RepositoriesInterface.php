<?php

namespace App\Http\Repositories;

interface RepositoriesInterface {
  public function find(array $filter, array $options);
  public function findOne(array $filter);
  public function insert(array $payload);
  public function update(array $filter, array $payload);
  public function delete(array $filter);
}