<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
        
        <a href="/jobs/{{$job['id']}}">
            <li> <strong>{{ $job['title']}}</strong> earns {{$job['salary']}} per month. </li>
        </a>
    
        @endforeach
    </ul>
    
</x-layout>