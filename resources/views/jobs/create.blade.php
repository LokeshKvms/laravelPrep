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

            <div class="grid sm:grid-cols-2 gap-8">
                <div>
                    <x-form-label for="title">Title</x-form-label>
                    <x-form-input required type="text" name="title" id="title" placeholder="Kaizoku"/>
                </div>

                <div>
                    <x-form-label for="salary">Salary</x-form-label>
                    <x-form-input required type="text" name="salary" id="salary" placeholder="₹1,000,000 Per Month"/>
                </div>
            </div>
        </div>

        <x-form-error/>

        <div class="mt-8 flex justify-end space-x-4">
            <button type="button" class="text-gray-600 hover:text-gray-900 font-semibold transition cursor-pointer">Cancel</button>
            <x-form-submit>Save</x-form-submit>
        </div>
    </form>
</x-layout>
