<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                Add a Meal
            </h2>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Log the food you've eaten today.
            </p>
        </div>
    </x-slot>

    <livewire:add-meal />

</x-app-layout>