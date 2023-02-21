<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Log;

trait InteractsWithJsonFile
{
    protected function getFileName()
    {
        $classNameHash = md5(static::class);
        return storage_path('app/'. $classNameHash. '.json');
    }
    public function save($content)
    {
        file_put_contents($this->getFileName(), json_encode($content));
    }

    public function read()
    {
        try {
            $content = file_get_contents($this->getFileName(), '.json');
            return json_decode($content, true);
        } catch (\Exception $exception){
            return [];
        }
    }

}
