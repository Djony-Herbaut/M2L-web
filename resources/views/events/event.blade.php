<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tous les évènements aux alentours de JO d'été Paris 2024
        </h2>
    </x-slot>
    @csrf
    @foreach($events as $event)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class= "font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $event->title }}</h2>
                    <p>{{ $event->description }}</p>
                    <img src="{{ asset('storage/' . $event->cover) }}" alt="Image de l'événement">
                    @if(Auth::user()->is_admin)
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <x-danger-button>
                            Supprimer le Post
                        </x-danger-button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>