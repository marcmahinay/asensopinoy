<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex items-center">
                            <!-- Display Member Image -->
                            <div class="w-32 h-32 mr-6">
                                <img src="{{ $member->image_url ? asset('storage/member/' . $member->image_url) : 'https://via.placeholder.com/128?text=No+Image' }}" alt="{{ $member->firstname }} {{ $member->lastname }}" class="w-full h-full object-cover rounded-full">
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold">{{ $member->firstname }} {{ $member->lastname }}</h1>
                                <p class="mt-2">Barangay: {{ $member->barangay->name }}, {{ $member->barangay->municity->name }}</p>
                                <p>Birthdate: {{ $member->birthdate }}</p>
                                <p>Contact: {{ $member->mobile_no }}</p>
                            </div>
                        </div>
        
                        <!-- Ayudas Section -->
                        <div class="mt-6">
                            <h2 class="text-lg font-semibold">Ayudas Availed</h2>
                            <ul class="list-disc pl-5 mt-2">
                                @forelse($member->ayudas as $ayuda)
                                    <li>{{ $ayuda->description }} (Date: {{ $ayuda->pivot->date_availed }})</li>
                                @empty
                                    <li>No ayudas availed.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
