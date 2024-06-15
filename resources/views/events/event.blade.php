<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tous les évènements aux alentours de JO d'été Paris 2024
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @csrf
                @foreach($events as $event)
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>{{ $event->title }}</h2>
                    <p>{{ $event->description }}</p>
                    <img src="{{ asset('storage/' . $event->cover) }}" alt="Image de l'événement">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>