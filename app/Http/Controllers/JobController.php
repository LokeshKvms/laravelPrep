<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index(){
    //  $jobs = Job::with('employer')->latest()->paginate(10);
    //  return view('jobs.index',['jobs'=>$jobs]);
        
        $search = request('search');

        $query = Job::with('employer')->latest();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('salary', 'like', '%' . $search . '%')
                ->orWhereHas('employer', function($q2) use ($search) {
                    $q2->where('name', 'like', '%' . $search . '%');
                });
            });
        }

        $jobs = $query->paginate(10)->appends(['search' => $search]);

        return view('jobs.index', ['jobs' => $jobs, 'search' => $search]);
    }

    public function create(){
        return view('jobs.create');
    }

    public function store(){
        $title = request('title');
        $salary = trim(request('salary'));

        if ($salary && !str_starts_with($salary, '₹')) {
            $salary = '₹' . $salary;
        }

        request()->merge(['salary' => $salary]);

        request()->validate([
            'title' => 'required|min:3|max:69',
            'salary' => [
                'required',
                'regex:/^₹\d{1,3}(,\d{2,3})*$|^₹\d+$/',
            ],
        ]);

        $job = Job::create([
            'title' => $title,
            'salary' => $salary,
            'employer_id' => 1,
        ]);

        Mail::to($job->employer->user)->queue(new JobPosted($job));

        return redirect('/jobs');
    }

    public function show(Job $job){
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job){
        return view('jobs.edit',['job' => $job]);
    }

    public function update(Job $job){
        Gate::authorize('edit-job', $job);
        
        $title = request('title');
        $salary = trim(request('salary'));
        
        if ($salary && !str_starts_with($salary, '₹')) {
            $salary = '₹' . $salary;
        }
        
        request()->merge(['salary' => $salary]);
        
        request()->validate([
            'title' => 'required|min:3|max:69',
            'salary' => [
                'required',
                'regex:/^₹\d{1,3}(,\d{2,3})*$|^₹\d+$/',
            ],
        ]);
        
        $job->update([
            'title' => $title,
            'salary' => $salary,
        ]);
        
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job){  
        Gate::authorize('edit-job', $job); 
        $job->delete();
        return redirect('/jobs');
    }

}
