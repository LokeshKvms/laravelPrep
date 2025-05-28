<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg" method="POST" action="/jobs">
        @csrf
        <div class="space-y-5">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Create a New Job</h2>
                <p class="mt-2 text-gray-500">Fill in the details</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input
                        required
                        type="text"
                        name="title"
                        id="title"
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

        <div class="mt-8 flex justify-end space-x-4">
            <button type="button" class="text-gray-600 hover:text-gray-900 font-semibold transition cursor-pointer">Cancel</button>
            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-5 py-2 text-white font-semibold shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition cursor-pointer">Save</button>
        </div>
    </form>
</x-layout>
