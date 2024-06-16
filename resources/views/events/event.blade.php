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
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $event->title }}</h2>
                    <p>{{ $event->description }}</p>
                    <img src="{{ asset('storage/' . $event->cover) }}" alt="Image de l'événement">

                    <div class="flex space-x-4 mt-4">
                        <a href="{{ route('events.show', $event->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block" style="background-color: #b37b33; margin: 1rem;">
                            Afficher
                        </a>

                        @if(Auth::check() && (Auth::id() == $event->user_id || Auth::user()->is_admin))
                        <a href="{{ route('events.edit', $event->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block" style="background-color: #b37b33; margin: 1rem;">
                            Éditer
                        </a>
                        @endif
                    </div>

                    @if(Auth::check() && (Auth::id() == $event->user_id || Auth::user()->is_admin))
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">
                            Supprimer le Post
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>
