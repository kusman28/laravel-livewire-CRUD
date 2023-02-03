<!DOCTYPE html>
<html lang="en">
<head>
    <x-partials.head/>
</head>
<body>
    <x-partials.navigation/>
    <div class="container">
        <div class="row justify-content-center mt-3">
            {{ $slot }}
            {{-- @livewire('product') --}}
        </div>
    </div>
    <x-partials.footer/>
</body>
</html>