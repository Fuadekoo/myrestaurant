<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Main Function') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-6 m-4">
        <div class="flex justify-center">
            @include('mycomponent.sidebar')
            <div class="w-full">
                <!-- Main content goes here -->
                content
            </div>
        </div>
    </div>
</x-app-layout>
