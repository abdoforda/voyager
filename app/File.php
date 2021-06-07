<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class File extends Model
{
    
    
    public function storage($fileUpload, $pathUpload){

        $this->slug = $pathUpload;

        $files = Arr::wrap($fileUpload);

        $filesPath = [];
        $path = $this->generatePath();

        foreach ($files as $file) {
            $filename = $this->generateFileName($file, $path);
            $file->storeAs(
                $path,
                $filename.'.'.$file->getClientOriginalExtension(),
                config('voyager.storage.disk', 'public')
            );

            array_push($filesPath, [
                'download_link' => $path.$filename.'.'.$file->getClientOriginalExtension(),
                'original_name' => $file->getClientOriginalName(),
            ]);
        }

        return json_encode($filesPath);
        
    }


    public function generateFileName($file, $path){
     
        $filename = Str::random(20);
            // Make sure the filename does not exist, if it does, just regenerate
            while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
                $filename = Str::random(20);
            }
        return $filename;
        
    }

    protected function generatePath()
    {
        return $this->slug.DIRECTORY_SEPARATOR.date('FY').DIRECTORY_SEPARATOR;
    }

}
