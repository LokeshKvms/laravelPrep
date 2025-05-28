<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    
    <div class="space-y-4">
        <div>
            {{ $jobs->links() }}
        </div>
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block bg-white px-4 py-6 border border-gray-200 rounded-lg shadow">
                <div class=" text-xl text-gray-900 font-bold">{{ $job->employer->name }}</div>
                <strong class="text-gray-600">
                    {{ $job['title'] }}:
                </strong>
                Pays {{ $job['salary'] }} per month.
            </a>
        @endforeach

        
    </div>
</x-layout>
