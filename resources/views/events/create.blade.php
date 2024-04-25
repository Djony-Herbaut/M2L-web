
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer un évènements
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        
                    <form action="{{action([\App\Http\Controllers\EventController::class, 'store'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" required placeholder="Votre titre d'événement" value="{{old('title')}}">
                            
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" required placeholder="La description de votre événement" value= "{{old('description')}}" >
                            
                        <label for="cover">L'image de votre post</label>
                        <input type="file" name="cover" id="cover" required>
                            
                        <button type="submit">Postez le !</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
