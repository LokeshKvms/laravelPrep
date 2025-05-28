<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(10);
    return view('jobs.index',['jobs'=>$jobs]);
});

Route::get('/jobs/create',function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {
    $title = request('title');
    $salary = trim(request('salary'));

    if ($salary && !str_starts_with($salary, '₹')) {
        $salary = '₹' . $salary;
    }

    request()->merge(['salary' => $salary]);

    request()->validate([
        'title' => 'required|min:3|max:25',
        'salary' => [
            'required',
            'regex:/^₹\d{1,3}(,\d{2,3})*$|^₹\d+$/',
        ],
    ]);

    Job::create([
        'title' => $title,
        'salary' => $salary,
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});


Route::get('/jobs/{id}',function ($id) {
    
    $job = Job::find( $id );
    if(empty($job)) abort(404);
    return view('jobs.show',['job' => $job]);
});

Route::get('/contact',function () {
    return view('contact');
});
