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

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 2rem;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .shadow-sm {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .sm\:rounded-lg {
            border-radius: 0.5rem;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .flex {
            display: flex;
            align-items: center;
        }

        .items-center {
            align-items: center;
        }

        .w-32 {
            width: 8rem;
        }

        .h-32 {
            height: 8rem;
        }

        .mr-6 {
            margin-right: 1.5rem;
        }

        .object-cover {
            object-fit: cover;
        }

        .rounded-full {
            border-radius: 9999px;
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .font-bold {
            font-weight: 700;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-6 {
            margin-top: 1.5rem;
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .list-disc {
            list-style-type: disc;
        }

        .pl-5 {
            padding-left: 1.25rem;
        }

        .ayudas-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
    background-color: #ffffff;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.ayudas-table th, .ayudas-table td {
    padding: 0.75rem;
    text-align: left;
    border-bottom: 1px solid #e9ecef;
}

.ayudas-table th {
    background-color: #f1f3f5;
    font-weight: 600;
    color: #495057;
}

.ayudas-table tr:last-child td {
    border-bottom: none;
}

.ayudas-table tbody tr:nth-child(odd) {
    background-color: #f8f9fa;
}

    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <!-- Display Member Image -->
                        <div class="w-32 h-32 mr-6">
                            <img src="{{ $member->image_url ? asset('storage/member/' . $member->image_url) : 'https://via.placeholder.com/128?text=No+Image' }}"
                                alt="{{ $member->firstname }} {{ $member->lastname }}"
                                class="w-full h-full object-cover rounded-full">
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">{{ $member->firstname }} {{ $member->lastname }}</h1>
                            <p class="mt-2">Barangay: {{ $member->barangay->name }},
                                {{ $member->barangay->municity->name }}</p>
                            <p>Birthdate: {{ $member->birthdate }}</p>
                            <p>Contact: {{ $member->mobile_no }}</p>
                        </div>
                    </div>

                    <!-- Ayudas Section -->
<div class="mt-6">
    <h2 class="text-lg font-semibold">Ayudas Availed</h2>
    <table class="ayudas-table mt-2">
        <thead>
            <tr>
                <th>Description</th>
                <th>Date Availed</th>
            </tr>
        </thead>
        <tbody>
            @forelse($member->ayudas as $ayuda)
            <tr>
                <td>{{ $ayuda->description }}</td>
                <td>{{ $ayuda->pivot->date_availed }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2">No ayudas availed.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
