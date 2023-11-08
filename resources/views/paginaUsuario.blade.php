<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenido a tu área de trabajo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Estos son tus datos:") }}
                    <div></br></div>
                    <div>Nombre:  {{ Auth::user()->name }}</div>
                    
                    <div>Correo:  {{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>