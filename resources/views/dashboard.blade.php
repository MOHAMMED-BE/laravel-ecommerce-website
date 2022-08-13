<x-app-layout>
    <x-slot name="header">
        Hi.. {{ Auth::user()->name }}
    </x-slot>

    <div class="py-12">
        Dash
    </div>
</x-app-layout>
