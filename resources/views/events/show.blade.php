<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Détails de l'événement : {{ $event->title }}
        </h2>
    </x-slot>
    @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $event->title }}</h2>
                    <p>{{ $event->description }}</p>
                    <img src="{{ asset('storage/' . $event->cover) }}" alt="Image de l'événement" class="mt-4">
                    
                    <div class="flex space-x-4 mt-4">
                        @if( Auth::id() == $event->user_id || Auth::user()->is_admin)
                        <a href="{{ route('events.edit', $event->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block" style="background-color: #b37b33;">
                            Éditer
                        </a>
                        @endif
                    </div>

                    @if(Auth::user()->is_admin)
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Supprimer le Post
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
