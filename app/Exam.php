<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function checkExam(){

        $certificate = Certificate::where([
            ['user_id', auth()->user()->id],
            ['exam_id', $this->id]
        ])->get()->first();
        if($certificate){
            return $certificate;
        }

    return false;
    }
}
