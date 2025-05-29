<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    
    <div class="space-y-4">
        {{-- Search --}}
        <form method="GET" action="{{ url('/jobs') }}" class="flex space-x-2 mb-6">
            <input 
                type="text" 
                name="search" 
                placeholder="Search jobs or employers ..." 
                value="{{ old('search', $search ?? '') }}" 
                class="flex-grow px-4 py-2 border border-gray-300 rounded-lg bg-white"
            >
            <button 
                type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-4xl hover:bg-blue-700 transition"
            >
                Search
            </button>
        </form>


        {{-- Job Listings --}}
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block bg-white px-4 py-6 border border-gray-200 rounded-lg shadow">
                <div class=" text-xl text-gray-900 font-bold">{{ $job->employer->name }}</div>
                <strong class="text-gray-600">
                    {{ $job['title'] }}:
                </strong>
                Pays {{ $job['salary'] }} per month.
            </a>
        @endforeach

        {{-- Pagination --}}
        <div>
            {{ $jobs->links() }}
        </div>

        @if($jobs->isEmpty())
            <p class="text-gray-500">No jobs found.</p>
        @endif
    </div>
</x-layout>
