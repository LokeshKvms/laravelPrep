<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>

    <form class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg" method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-5">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input
                        required
                        type="text"
                        name="title"
                        id="title"
                        value="{{$job->title}}"
                        placeholder="Kaizoku"
                        class="w-full rounded-md border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 shadow-sm
                               focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition"
                    />
                </div>

                <div>
                    <label for="salary" class="block text-sm font-medium text-gray-700 mb-2">Salary</label>
                    <input
                        required
                        type="text"
                        name="salary"
                        id="salary"
                        value="{{$job->salary}}"
                        placeholder="₹1,000,000 Per Month"
                        class="w-full rounded-md border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 shadow-sm
                               focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition"
                    />
                </div>
            </div>
        </div>

        @if($errors->any())
            <div class="mt-4 bg-red-50 border-l-4 border-red-400 p-4 text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-8 flex justify-between items-center">
            <button 
                form="delete-form"
                type="submit" 
                class="inline-flex items-center rounded-md bg-red-600 mx-2 px-5 py-2 text-white font-semibold shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition cursor-pointer">
                Delete
            </button>

            <div class="flex space-x-4">
                <a href="/jobs/{{$job->id}}" class="text-gray-600 hover:text-gray-900 font-semibold transition cursor-pointer pt-2">Cancel</a>
                <button type="submit" class="inline-flex items-center rounded-md mx-2 bg-indigo-600 px-5 py-2 text-white font-semibold shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition cursor-pointer">Update</button>
            </div>
        </div>
    </form>

    <form method="POST" action="/jobs/{{ $job->id }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
