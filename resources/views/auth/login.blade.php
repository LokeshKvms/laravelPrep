<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>

    <form class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg" method="POST" action="/login">
        @csrf
        <div class="space-y-5">
            <div>
                <h1 class="text-xl font-semibold text-gray-800 pb-4 border-b border-gray-400">Fill in the details to log in</h1>
            </div>
            <div class="grid sm:grid-cols-2 gap-8">
                <div>
                    <x-form-label for="email">Email</x-form-label>
                    <x-form-input required type="email" name="email" id="email" placeholder="Enter your email"/>
                </div>

                <div>
                    <x-form-label for="password">Password</x-form-label>
                    <x-form-input required type="password" name="password" id="password" placeholder="Enter the passoword"/>
                </div>
            </div>
        </div>

        <x-form-error/>

        <div class="mt-8 flex justify-end space-x-4">
            <a href="/" class="text-gray-600 pt-2 hover:text-gray-900 font-semibold transition cursor-pointer">Cancel</a>
            <x-form-submit>Login</x-form-submit>
        </div>
    </form>
</x-layout>
