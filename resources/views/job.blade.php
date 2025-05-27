<x-layout>
    <x-slot:heading>
        JOB
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title']}}</h2>
    <p>
        This job gets you {{$job['salary']}} per month.
    </p>
</x-layout>