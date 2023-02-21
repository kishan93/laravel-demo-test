<?php

namespace App\Repositories;

trait InteractsWithJsonFile
{
    public function save($content)
    {
        $fileName = static::class;
        file_put_contents(storage_path('app/'. $fileName, '.json'), json_encode($content));
    }

    public function read()
    {
        $fileName = static::class;
        try {
            $content = file_get_contents(storage_path('app/'. $fileName, '.json'));
            return json_decode($content, true);
        } catch (\Exception $exception){
            return [];
        }
    }

}
