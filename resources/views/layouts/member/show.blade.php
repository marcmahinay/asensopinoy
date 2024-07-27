<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member') }}
        </h2>
    </x-slot>

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
</x-app-layout>
