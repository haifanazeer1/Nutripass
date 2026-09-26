@php
    use Illuminate\Support\Facades\Auth;
     use App\Services\NutritionCalculator;
    $profile = Auth::user()->profile;

$nutrition = null;

if ($profile) {
    $calculator = app(NutritionCalculator::class);
    $nutrition = $calculator->calculate($profile);
}
    $meals = Auth::user()->meals()
        ->with('items.food')
        ->whereDate('meal_date', today())
        ->get();

    $consumedCalories = 0;
    $consumedProtein = 0;
    $consumedCarbs = 0;
    $consumedFat = 0;

    foreach ($meals as $meal) {
        foreach ($meal->items as $item) {
            $consumedCalories += $item->food->calories * $item->quantity;
            $consumedProtein += $item->food->protein * $item->quantity;
            $consumedCarbs += $item->food->carbs * $item->quantity;
            $consumedFat += $item->food->fat * $item->quantity;
        }
    }
    $calorieTarget = $nutrition['calories'] ?? 2000;
    $proteinTarget = $nutrition['protein'] ?? 0;
    $carbsTarget = $nutrition['carbs'] ?? 0;
    $fatTarget = $nutrition['fat'] ?? 0;
    // Calculate progress percentages
    $calorieProgress = $calorieTarget > 0
    ? min(($consumedCalories / $calorieTarget) * 100, 100)
    : 0;

$proteinProgress = $proteinTarget > 0
    ? min(($consumedProtein / $proteinTarget) * 100, 100)
    : 0;

$carbsProgress = $carbsTarget > 0
    ? min(($consumedCarbs / $carbsTarget) * 100, 100)
    : 0;

$fatProgress = $fatTarget > 0
    ? min(($consumedFat / $fatTarget) * 100, 100)
    : 0;
@endphp


<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                Your Progress
            </h2>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Track your nutrition and see how you're doing over time.
            </p>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gray-950 py-8">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <!-- Back to Dashboard -->

            <a
                href="{{ route('dashboard') }}"
                class="inline-flex items-center text-sm font-medium text-green-400 transition hover:text-green-300"
            >
                ← Back to Dashboard
            </a>


            <!-- Page Header -->

            <div class="mt-6 mb-8">

                <h1 class="text-3xl font-bold text-white">
                    Your Progress
                </h1>

                <p class="mt-2 text-gray-400">
                    Track your nutrition and see how you're doing over time.
                </p>

            </div>


            <!-- Today's Overview -->

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">


                <!-- Calories -->

                <div class="rounded-2xl border border-gray-700 bg-gray-900 p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-400">
                                Calories
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                {{ round($consumedCalories) }}
                            </p>

                            <p class="mt-1 text-sm text-gray-500">
                                / {{ round($calorieTarget) }} kcal
                            </p>

                        </div>

                        <div class="rounded-xl bg-green-900/30 p-3">
                            <span class="text-2xl">🔥</span>
                        </div>

                    </div>


                    <!-- Calories Progress Bar -->

                    <div
                        style="
                            width: 100%;
                            height: 10px;
                            background: #374151;
                            border-radius: 999px;
                            overflow: hidden;
                            margin-top: 20px;
                        "
                    >
                        <div
                            style="
                                width: {{ $calorieProgress }}%;
                                height: 100%;
                                background: #22c55e;
                                border-radius: 999px;
                            "
                        ></div>
                    </div>

                </div>


                <!-- Protein -->

                <div class="rounded-2xl border border-gray-700 bg-gray-900 p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-400">
                                Protein
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                {{ round($consumedProtein, 1) }}g
                            </p>

                            <p class="mt-1 text-sm text-gray-500">
                                / {{ round($proteinTarget, 1) }}g
                            </p>

                        </div>

                        <div class="rounded-xl bg-blue-900/30 p-3">
                            <span class="text-2xl">💪</span>
                        </div>

                    </div>


                    <!-- Protein Progress Bar -->

                                    <div
                    style="
                        width: 100%;
                        height: 10px;
                        background: #374151;
                        border-radius: 999px;
                        overflow: hidden;
                        margin-top: 20px;
                    "
                >
                    <div
                        style="
                            width: {{ $proteinProgress }}%;
                            height: 100%;
                            background: #3b82f6;
                            border-radius: 999px;
                        "
                    ></div>
                </div>

                </div>


                <!-- Carbohydrates -->

                <div class="rounded-2xl border border-gray-700 bg-gray-900 p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-400">
                                Carbohydrates
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                {{ round($consumedCarbs, 1) }}g
                            </p>

                            <p class="mt-1 text-sm text-gray-500">
                                / {{ round($carbsTarget, 1) }}g
                            </p>

                        </div>

                        <div class="rounded-xl bg-yellow-900/30 p-3">
                            <span class="text-2xl">🌾</span>
                        </div>

                    </div>


                    <!-- Carbs Progress Bar -->

                            <div
            style="
                width: 100%;
                height: 10px;
                background: #374151;
                border-radius: 999px;
                overflow: hidden;
                margin-top: 20px;
            "
        >
            <div
                style="
                    width: {{ $carbsProgress }}%;
                    height: 100%;
                    background: #eab308;
                    border-radius: 999px;
                "
            ></div>
        </div>

                 </div>


                <!-- Healthy Fats -->

                <div class="rounded-2xl border border-gray-700 bg-gray-900 p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-400">
                                Healthy Fats
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                {{ round($consumedFat, 1) }}g
                            </p>

                            <p class="mt-1 text-sm text-gray-500">
                                / {{ round($fatTarget, 1) }}g
                            </p>

                        </div>

                        <div class="rounded-xl bg-purple-900/30 p-3">
                            <span class="text-2xl">🥑</span>
                        </div>

                    </div>


                    <!-- Fat Progress Bar -->

                    <div
    style="
        width: 100%;
        height: 10px;
        background: #374151;
        border-radius: 999px;
        overflow: hidden;
        margin-top: 20px;
    "
>
    <div
        style="
            width: {{ $fatProgress }}%;
            height: 100%;
            background: #a855f7;
            border-radius: 999px;
        "
    ></div>
</div>

                </div>


            </div>
            <!-- END Today's Overview -->


            <!-- Weekly Progress -->

            <div class="mt-8 rounded-2xl border border-gray-700 bg-gray-900 p-6">

                <h2 class="text-xl font-bold text-white">
                    Weekly Progress
                </h2>

                <p class="mt-2 text-sm text-gray-400">
                    Your weekly calorie and nutrition trends will appear here.
                </p>


                <div class="mt-6 flex h-64 items-center justify-center rounded-xl border border-dashed border-gray-700 bg-gray-950">

                    <div class="text-center">

                        <div class="text-4xl">
                            📊
                        </div>

                        <p class="mt-3 font-semibold text-gray-300">
                            Progress chart coming next
                        </p>

                        <p class="mt-1 text-sm text-gray-500">
                            We'll connect this to your meal history.
                        </p>

                    </div>

                </div>

            </div>


        </div>

    </div>

</x-app-layout>