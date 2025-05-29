<x-layout>
    <x-slot:heading>
        JOB
    </x-slot:heading>

    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto space-y-5">
        <h2 class="text-2xl font-semibold text-gray-800">{{ $job->title }}</h2>
        
        <p class="text-gray-600">
            This job gets you <span class="font-medium">{{ $job->salary }}</span> per month.
        </p>


        @can('edit',$job)
            <p>
                <x-button href="/jobs/{{ $job->id }}/edit">
                    Edit Job
                </x-button>
            </p>
        @endcan
    </div>

</x-layout>