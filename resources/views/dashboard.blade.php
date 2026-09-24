<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                NutriPass Dashboard
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Track your nutrition and stay on top of your health goals.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <!-- Welcome -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Welcome back, {{ Auth::user()->name }}! 👋
                </h1>

                <p class="mt-2 text-gray-600 dark:text-gray-400">
                    Here's your nutrition overview for today.
                </p>
            </div>

            <!-- Nutrition Summary -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

                <!-- Calories -->
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Calories
                            </p>

                            <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                                0
                            </p>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                / 2,000 kcal
                            </p>
                        </div>

                        <div class="rounded-xl bg-green-100 p-3 dark:bg-green-900/30">
                            <span class="text-2xl">🔥</span>
                        </div>
                    </div>

                    <div class="mt-5 h-2 rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-2 w-0 rounded-full bg-green-500"></div>
                    </div>
                </div>

                <!-- Protein -->
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Protein
                            </p>

                            <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                                0g
                            </p>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                / 120g
                            </p>
                        </div>

                        <div class="rounded-xl bg-blue-100 p-3 dark:bg-blue-900/30">
                            <span class="text-2xl">💪</span>
                        </div>
                    </div>

                    <div class="mt-5 h-2 rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-2 w-0 rounded-full bg-blue-500"></div>
                    </div>
                </div>

                <!-- Carbs -->
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Carbohydrates
                            </p>

                            <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                                0g
                            </p>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                / 250g
                            </p>
                        </div>

                        <div class="rounded-xl bg-yellow-100 p-3 dark:bg-yellow-900/30">
                            <span class="text-2xl">🌾</span>
                        </div>
                    </div>

                    <div class="mt-5 h-2 rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-2 w-0 rounded-full bg-yellow-500"></div>
                    </div>
                </div>

                <!-- Fat -->
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Healthy Fats
                            </p>

                            <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                                0g
                            </p>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                / 65g
                            </p>
                        </div>

                        <div class="rounded-xl bg-purple-100 p-3 dark:bg-purple-900/30">
                            <span class="text-2xl">🥑</span>
                        </div>
                    </div>

                    <div class="mt-5 h-2 rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-2 w-0 rounded-full bg-purple-500"></div>
                    </div>
                </div>

            </div>

            <!-- Main Dashboard -->
            <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">

                <!-- Today's Meals -->
                <div class="lg:col-span-2 rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">

                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                                Today's Meals
                            </h2>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Keep track of everything you eat today.
                            </p>
                        </div>

                        <button
                            class="rounded-xl bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-green-700">
                            + Add Meal
                        </button>
                    </div>

                    <div class="mt-6 space-y-4">

                        <!-- Breakfast -->
                        <div class="flex items-center justify-between rounded-xl bg-gray-50 p-4 dark:bg-gray-700/40">
                            <div class="flex items-center gap-4">
                                <div class="rounded-xl bg-orange-100 p-3 dark:bg-orange-900/30">
                                    🍳
                                </div>

                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">
                                        Breakfast
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        No meals added
                                    </p>
                                </div>
                            </div>

                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                0 kcal
                            </span>
                        </div>

                        <!-- Lunch -->
                        <div class="flex items-center justify-between rounded-xl bg-gray-50 p-4 dark:bg-gray-700/40">
                            <div class="flex items-center gap-4">
                                <div class="rounded-xl bg-green-100 p-3 dark:bg-green-900/30">
                                    🥗
                                </div>

                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">
                                        Lunch
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        No meals added
                                    </p>
                                </div>
                            </div>

                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                0 kcal
                            </span>
                        </div>

                        <!-- Dinner -->
                        <div class="flex items-center justify-between rounded-xl bg-gray-50 p-4 dark:bg-gray-700/40">
                            <div class="flex items-center gap-4">
                                <div class="rounded-xl bg-blue-100 p-3 dark:bg-blue-900/30">
                                    🍽️
                                </div>

                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">
                                        Dinner
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        No meals added
                                    </p>
                                </div>
                            </div>

                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                0 kcal
                            </span>
                        </div>

                        <!-- Snacks -->
                        <div class="flex items-center justify-between rounded-xl bg-gray-50 p-4 dark:bg-gray-700/40">
                            <div class="flex items-center gap-4">
                                <div class="rounded-xl bg-purple-100 p-3 dark:bg-purple-900/30">
                                    🍎
                                </div>

                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">
                                        Snacks
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        No snacks added
                                    </p>
                                </div>
                            </div>

                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                0 kcal
                            </span>
                        </div>

                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">

                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                        Quick Actions
                    </h2>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Manage your nutrition.
                    </p>

                    <div class="mt-6 space-y-3">

                        <button class="flex w-full items-center gap-4 rounded-xl border border-gray-200 p-4 text-left transition hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700">
                            <span class="text-2xl">🍎</span>

                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">
                                    Log a Meal
                                </p>

                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Add food you've eaten
                                </p>
                            </div>
                        </button>

                        <button class="flex w-full items-center gap-4 rounded-xl border border-gray-200 p-4 text-left transition hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700">
                            <span class="text-2xl">👤</span>

                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">
                                    Update Profile
                                </p>

                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Set your nutrition goals
                                </p>
                            </div>
                        </button>

                        <button class="flex w-full items-center gap-4 rounded-xl border border-gray-200 p-4 text-left transition hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700">
                            <span class="text-2xl">📊</span>

                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">
                                    View Progress
                                </p>

                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Track your progress
                                </p>
                            </div>
                        </button>

                        <button class="flex w-full items-center gap-4 rounded-xl border border-gray-200 p-4 text-left transition hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700">
                            <span class="text-2xl">💡</span>

                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">
                                    Get Recommendations
                                </p>

                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Discover personalized meals
                                </p>
                            </div>
                        </button>

                    </div>
                </div>

            </div>

            <!-- Getting Started -->
            <div class="mt-8 rounded-2xl bg-green-50 p-6 ring-1 ring-green-100 dark:bg-green-900/20 dark:ring-green-900/30">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                            Complete your nutrition profile
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                            Add your basic information so NutriPass can personalize your nutrition goals.
                        </p>
                    </div>

                    <button class="whitespace-nowrap rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-green-700">
                        Complete Profile →
                    </button>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>