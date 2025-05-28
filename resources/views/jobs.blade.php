<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    {{-- <div class="max-w-3xl mx-auto mt-6 px-4">
        <div class="overflow-x-auto rounded-lg shadow-md border border-gray-300">
            <table class="table-fixed min-w-full divide-y divide-gray-200 text-sm bg-white">
                <thead class="bg-gray-900">
                    <tr>
                        <th class="w-1/2 px-4 py-3 text-center font-semibold text-gray-100">Title</th>
                        <th class="w-1/2 px-4 py-3 text-center font-semibold text-gray-100">Salary</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-center">
                    @foreach ($jobs as $job)
                    <tr 
                        onclick="window.location.href='/jobs/{{ $job['id'] }}'"
                        class="hover:bg-gray-100 cursor-pointer transition border-b border-gray-300"
                    >
                        <td class="px-4 py-3 text-gray-800">{{ $job['title'] }}</td>
                        <td class="px-4 py-3 text-gray-800">{{ $job['salary'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block bg-white px-4 py-6 border border-gray-200 rounded-lg shadow">
                <div class=" text-xl text-gray-900 font-bold">{{ $job->employer->name }}</div>
                <strong class="text-gray-600">
                    {{ $job['title'] }}:
                </strong>
                Pays {{ $job['salary'] }} per month.
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
