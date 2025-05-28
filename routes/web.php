<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->cursorPaginate(1);
    return view('jobs',['jobs'=>$jobs]);
});

Route::get('/jobs/{id}',function ($id) {

    $job = Job::find( $id );
    if(empty($job)) abort(404);
    return view('job',['job' => $job]);
});

Route::get('/contact',function () {
    return view('contact');
});
