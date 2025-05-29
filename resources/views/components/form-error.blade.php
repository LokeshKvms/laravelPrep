@if($errors->any())
    <div class="mt-4 bg-red-50 border-l-4 border-red-400 p-4 text-red-700">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif