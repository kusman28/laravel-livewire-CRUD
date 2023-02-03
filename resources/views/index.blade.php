<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-partials.head/>
    </head>
    <body class="antialiased">
        <x-partials.navigation/>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <h1 class="h-16 w-auto text-gray-300">Laravel Livewire | CRUD App</h1>
        </div>
            {{-- <div class="container">
                
            </div> --}}
        <x-partials.footer/>
    </body>
</html>
