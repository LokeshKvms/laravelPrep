<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job{
    public static function all():array{
        return [
            [   
                'id'=>'1',
                'title'=>'Director',
                'salary'=>'₹80,000'
            ],
            [
                'id'=>'2',
                'title'=>'Programmer',
                'salary'=>'₹50,000'
            ],
            [
                'id'=>'3',
                'title'=>'Sales',
                'salary'=>'₹40,000'
            ],  
        ];
    }

    public static function find(int $id):array{
        $job = Arr::first( Job::all(), fn($job)=>$job['id']==$id);

        if($job){
            return $job;
        }
        else{
            abort(404);
        }
    }
}