<link rel="stylesheet" href="{{url('/css/common/button.css')}}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->is_admin)
                @foreach($users as $user)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <ul>
                            <li>{{$user->name}}</li>
                        </ul>
                    </div>
                </div>
                @endforeach
            @else
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p> Vous êtes connecté </p>
                </div>
            </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 margin">
                    <h3 class="text-lg font-semibold">Présentation de la plateforme</h3>
                    <p>
                        Bienvenue sur notre plateforme dédiée aux événements de sport amateur en lien avec les Jeux Olympiques de Paris 2024. 
                        Cette plateforme permet aux utilisateurs de poster et de participer à divers événements sportifs tels que des rencontres, 
                        des courses partagées, et bien plus encore.
                    </p>
                    
                    <h4 class="text-md font-semibold mt-4">Objectif de la plateforme</h4>
                    <p>
                        Notre objectif est de promouvoir le sport amateur et de créer un espace convivial où les passionnés de sport peuvent se rencontrer,
                        partager leur passion et organiser des événements sportifs. Nous voulons encourager l'esprit sportif et le fair-play tout en 
                        soutenant l'engouement pour les Jeux Olympiques de Paris 2024.
                    </p>
                    
                    <h4 class="text-md font-semibold mt-4">Règles de Bienséance et de Bon-sens</h4>
                    <ul class="list-disc list-inside">
                        <li>Respectez tous les participants, quelles que soient leurs compétences sportives.</li>
                        <li>Évitez les comportements agressifs ou déplacés.</li>
                        <li>Encouragez et soutenez les autres participants.</li>
                        <li>Respectez les horaires et les lieux des événements.</li>
                        <li>Maintenez une attitude positive et sportive en toutes circonstances.</li>
                        <li>Signalez tout comportement inapproprié aux administrateurs de la plateforme.</li>
                    </ul>
                    
                    <h4 class="text-md font-semibold mt-4">Objectif Convivial</h4>
                    <p>Cette plateforme a pour but de favoriser les rencontres et les échanges entre amateurs de sport. Nous souhaitons créer une communauté dynamique et accueillante où chacun peut trouver sa place et s'épanouir dans la pratique sportive. Profitez des événements pour faire de nouvelles connaissances et partager des moments de convivialité autour du sport.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
