<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pneumonia Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg mb-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-lg font-semibold">
                <h1>Your Analysis History</h1>

                @foreach($predictions as $p)

                <div>

                <img src="/storage/{{ $p->image_path }}" width="200">

                <p>Result: {{ $p->result }}</p>

                <p>Confidence: {{ $p->confidence }}</p>

                </div>

                @endforeach
            </div>
        </div>
        
    </div>
</div>


</x-app-layout>


