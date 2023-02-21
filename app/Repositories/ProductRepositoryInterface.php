<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function get(int $id);

    public function getAll();

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}
