<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

<div class="mt-20 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 justify-items-center">
    
    <!-- División 1 -->
   <a href='/registros/create'
   class="w-48 h-48 flex flex-col items-center justify-center bg-white shadow rounded hover:bg-gray-100 transition overflow-hidden">
    <img src="{{ asset('images/images (1).png') }}" alt="Imagen División 1" class="w-full h-28 object-cover">
    <span class="mt-2 text-lg font-bold text-gray-800">División 1</span>
</a>

    <!-- División 2 -->
    <a href='/registros/create'
       class="w-48 h-48 flex flex-col items-center justify-center bg-white shadow rounded hover:bg-gray-100 transition overflow-hidden">
        <img src="{{ asset('images/images (1).png') }}" alt="Imagen División 2" class="w-full h-28 object-cover">
        <span class="mt-2 text-lg font-bold text-gray-800">División 2</span>
    </a>

    <!-- División 3 -->
    <a href='/registros/create'
       class="w-48 h-48 flex flex-col items-center justify-center bg-white shadow rounded hover:bg-gray-100 transition overflow-hidden">
        <img src="{{ asset('images/images (1).png') }}" alt="Imagen División 3" class="w-full h-28 object-cover">
        <span class="mt-2 text-lg font-bold text-gray-800">División 3</span>
    </a>

    <!-- División 4 -->
    <a href='/registros/create'
       class="w-48 h-48 flex flex-col items-center justify-center bg-white shadow rounded hover:bg-gray-100 transition overflow-hidden">
        <img src="{{ asset('images/images (1).png') }}" alt="Imagen División 4" class="w-full h-28 object-cover">
        <span class="mt-2 text-lg font-bold text-gray-800">División 4</span>
    </a>

</div>



</x-app-layout>


