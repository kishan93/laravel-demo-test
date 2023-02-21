<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function get(int $id);

    public function getAll();

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}
