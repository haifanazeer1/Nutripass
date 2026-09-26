<div class="min-h-screen bg-gray-950 py-10">

    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

        {{-- Back --}}
        <a
            href="{{ route('dashboard') }}"
            class="inline-flex items-center text-sm font-medium text-green-400 transition hover:text-green-300"
        >
            ← Back to Dashboard
        </a>

        {{-- Header --}}
        <div class="mt-6 mb-8">
            <h1 class="text-3xl font-bold text-white">
                Add a Meal
            </h1>

            <p class="mt-2 text-base text-gray-400">
                Log the food you've eaten today.
            </p>
        </div>

        {{-- Success Message --}}
        @if (session()->has('success'))
            <div class="mb-6 rounded-xl border border-green-700 bg-green-950/50 p-4">
                <p class="font-medium text-green-300">
                    ✓ {{ session('success') }}
                </p>
            </div>
        @endif

        {{-- Add Meal Card --}}
        <div class="rounded-2xl border border-gray-700 bg-gray-900 p-6 shadow-xl">

            <form wire:submit="addMeal">

                {{-- Meal Type --}}
                <div>
                    <label
                        for="mealType"
                        class="block text-sm font-semibold text-gray-200"
                    >
                        Meal Type
                    </label>

                    <select
                        id="mealType"
                        wire:model="mealType"
                        class="mt-2 block w-full rounded-xl border border-gray-600 bg-gray-800 px-4 py-3 text-white focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500"
                    >
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Snack">Snack</option>
                    </select>

                    @error('mealType')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Food --}}
                <div class="mt-6">
                    <label
                        for="foodId"
                        class="block text-sm font-semibold text-gray-200"
                    >
                        Food
                    </label>

                    <select
                        id="foodId"
                        wire:model="foodId"
                        class="mt-2 block w-full rounded-xl border border-gray-600 bg-gray-800 px-4 py-3 text-white focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500"
                    >
                        <option value="">Select a food</option>

                        @foreach ($foods as $food)
                            <option value="{{ $food->id }}">
                                {{ $food->name }} — {{ $food->calories }} kcal / {{ $food->serving_size }}
                            </option>
                        @endforeach
                    </select>

                    @error('foodId')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Quantity --}}
                <div class="mt-6">
                    <label
                        for="quantity"
                        class="block text-sm font-semibold text-gray-200"
                    >
                        Quantity / Servings
                    </label>

                    <input
                        id="quantity"
                        type="number"
                        step="0.1"
                        min="0.1"
                        wire:model="quantity"
                        class="mt-2 block w-full rounded-xl border border-gray-600 bg-gray-800 px-4 py-3 text-white placeholder-gray-500 focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500"
                    >

                    @error('quantity')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Add Button --}}
                <div class="mt-8">
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        class="w-full rounded-xl bg-green-600 px-5 py-3.5 text-sm font-bold text-white transition hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2 focus:ring-offset-gray-900 disabled:cursor-not-allowed disabled:opacity-50"
                    >
                        <span wire:loading.remove>
                            + Add Meal
                        </span>

                        <span wire:loading>
                            Adding...
                        </span>
                    </button>
                </div>

            </form>

        </div>

        {{-- Available Foods --}}
        <div class="mt-8 rounded-2xl border border-gray-700 bg-gray-900 p-6 shadow-xl">

            <div>
                <h2 class="text-xl font-bold text-white">
                    Available Foods
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    Foods currently available in your NutriPass library.
                </p>
            </div>

            <div class="mt-5 space-y-3">

                @foreach ($foods as $food)

                    <div class="flex items-center justify-between rounded-xl border border-gray-700 bg-gray-800 px-4 py-4">

                        <div>
                            <p class="font-semibold text-white">
                                {{ $food->name }}
                            </p>

                            <p class="mt-1 text-sm text-gray-400">
                                {{ $food->serving_size }}
                            </p>
                        </div>

                        <div class="text-right">
                            <p class="font-semibold text-green-400">
                                {{ $food->calories }} kcal
                            </p>

                            <p class="mt-1 text-xs text-gray-400">
                                P {{ $food->protein }}g ·
                                C {{ $food->carbs }}g ·
                                F {{ $food->fat }}g
                            </p>
                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>