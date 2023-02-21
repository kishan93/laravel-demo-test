<?php

namespace App\Repositories;

use Ramsey\Uuid\Uuid;

class ProductRepository implements RepositoryInterface
{
    use InteractsWithJsonFile;

    private array $content;

    public function __construct()
    {
        $this->content = $this->read();
    }

    public function get(int $id)
    {
        return $this->content[$id];
    }

    public function getAll()
    {
        return $this->content;
    }

    public function create($data)
    {
        $id = Uuid::uuid4()->toString();
        $this->content[$id] = $data;
    }

    public function update($id, $data)
    {
        $this->content[$id] = $data;
    }

    public function delete($id)
    {
        unset($this->content[$id]);
    }

    public function __destruct()
    {
        $this->save($this->content);
    }
}
