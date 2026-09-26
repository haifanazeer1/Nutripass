@php
    use App\Services\NutritionCalculator;
    use Illuminate\Support\Facades\Auth;

    $profile = Auth::user()->profile;
$meals = Auth::user()->meals()
    ->with('items.food')
    ->whereDate('meal_date', today())
    ->get()
    ->groupBy('meal_type');

$consumedCalories = 0;
$consumedProtein = 0;
$consumedCarbs = 0;
$consumedFat = 0;

foreach ($meals as $mealGroup) {
    foreach ($mealGroup as $meal) {
        foreach ($meal->items as $item) {

            $consumedCalories += $item->food->calories * $item->quantity;
            $consumedProtein += $item->food->protein * $item->quantity;
            $consumedCarbs += $item->food->carbs * $item->quantity;
            $consumedFat += $item->food->fat * $item->quantity;

        }
    }
}

$nutrition = null;
    if ($profile) {
        $calculator = app(NutritionCalculator::class);
        $nutrition = $calculator->calculate($profile);
    }
    
@endphp

<style>
    /* ================================
       MEAL CARDS
    ================================= */

    .meal-section {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-top: 12px;
    }

    .meal-card {
        display: flex;
        align-items: center;
        width: 100%;
        min-height: 58px;
        padding: 10px 14px;
        box-sizing: border-box;

        background: #1f2937;
        border: 1px solid #374151;
        border-radius: 12px;

        transition: all 0.2s ease;
    }

    .meal-card:hover {
        background: #263244;
        border-color: #4b5563;
    }

    .meal-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;
        margin-right: 12px;

        font-size: 17px;
        flex-shrink: 0;
    }

    .breakfast-icon {
        background: #312e81;
    }

    .lunch-icon {
        background: #14532d;
    }

    .dinner-icon {
        background: #1e3a8a;
    }

    .snack-icon {
        background: #581c87;
    }

    .meal-info {
        flex: 1;
    }

    .meal-info h4 {
        margin: 0;
        color: #f9fafb;
        font-size: 14px;
        font-weight: 600;
    }

    .meal-info p {
        margin: 2px 0 0;
        color: #9ca3af;
        font-size: 12px;
    }

    .meal-calories {
        color: #d1d5db;
        font-size: 12px;
        white-space: nowrap;
    }

    /* ================================
       DASHBOARD CARDS
    ================================= */

    .dashboard-card {
        background: #1f2937;
        border: 1px solid #374151;
        border-radius: 16px;
    }

    .dashboard-card:hover {
        border-color: #4b5563;
    }

    /* ================================
       QUICK ACTIONS
    ================================= */

    .quick-action {
        display: flex;
        width: 100%;
        align-items: center;
        gap: 14px;
        padding: 13px;
        text-align: left;

        border: 1px solid #374151;
        border-radius: 12px;
        background: #1f2937;

        transition: all 0.2s ease;
        cursor: pointer;
    }

    .quick-action:hover {
        background: #263244;
        border-color: #4b5563;
    }

    .quick-action-title {
        color: #f9fafb;
        font-size: 14px;
        font-weight: 600;
    }

    .quick-action-description {
        color: #9ca3af;
        font-size: 12px;
        margin-top: 2px;
    }

    /* ================================
       PROFILE BANNER
    ================================= */

    .profile-banner {
        background: #064e3b;
        border: 1px solid #065f46;
        border-radius: 16px;
    }

    /* ================================
       RESPONSIVE
    ================================= */

    @media (max-width: 768px) {
        .meal-card {
            min-height: 54px;
            padding: 9px 12px;
        }

        .meal-icon {
            width: 32px;
            height: 32px;
            margin-right: 10px;
        }
    }
</style>

<x-app-layout>

    <!-- Header -->
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


    <!-- Main Content -->
    <div class="py-8">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <!-- ================================
                 WELCOME
            ================================= -->

            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Welcome back, {{ Auth::user()->name }}! 👋
                </h1>

                <p class="mt-2 text-gray-600 dark:text-gray-400">
                    Here's your nutrition overview for today.
                </p>

            </div>


            <!-- ================================
                 NUTRITION SUMMARY
            ================================= -->

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">


                <!-- CALORIES -->

                <div class="dashboard-card p-6 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-400">
                                Calories
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                <p class="mt-2 text-3xl font-bold text-white">
                                {{ round($consumedCalories) }}
                            </p>
                            </p>

                            <p class="mt-1 text-sm text-gray-400">
                                / {{ $nutrition['calories'] ?? 2000 }} kcal
                            </p>

                        </div>

                        <div class="rounded-xl bg-green-900/30 p-3">
                            <span class="text-2xl">🔥</span>
                        </div>

                    </div>

                    <div class="mt-5 h-2 rounded-full bg-gray-700">
                        <div class="h-2 w-0 rounded-full bg-green-500"></div>
                    </div>

                </div>


                <!-- PROTEIN -->

                <div class="dashboard-card p-6 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-400">
                                Protein
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                <p class="mt-2 text-3xl font-bold text-white">
                                    {{ round($consumedProtein,1) }}g
                                </p>
                            </p>

                            <p class="mt-1 text-sm text-gray-400">
                                / {{ $nutrition['protein'] ?? 0 }}g
                            </p>

                        </div>

                        <div class="rounded-xl bg-blue-900/30 p-3">
                            <span class="text-2xl">💪</span>
                        </div>

                    </div>

                    <div class="mt-5 h-2 rounded-full bg-gray-700">
                        <div class="h-2 w-0 rounded-full bg-blue-500"></div>
                    </div>

                </div>


                <!-- CARBOHYDRATES -->

                <div class="dashboard-card p-6 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-400">
                                Carbohydrates
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                <p class="mt-2 text-3xl font-bold text-white">
                                {{ round($consumedCarbs, 1) }}g
                            </p>
                            </p>

                            <p class="mt-1 text-sm text-gray-400">
                                / {{ $nutrition['carbs'] ?? 0 }}g
                            </p>

                        </div>

                        <div class="rounded-xl bg-yellow-900/30 p-3">
                            <span class="text-2xl">🌾</span>
                        </div>

                    </div>

                    <div class="mt-5 h-2 rounded-full bg-gray-700">
                        <div class="h-2 w-0 rounded-full bg-yellow-500"></div>
                    </div>

                </div>


                <!-- HEALTHY FATS -->

                <div class="dashboard-card p-6 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-400">
                                Healthy Fats
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                <p class="mt-2 text-3xl font-bold text-white">
                                {{ round($consumedFat, 1) }}g
                            </p>
                            </p>

                            <p class="mt-1 text-sm text-gray-400">
                                / {{ $nutrition['fat'] ?? 0 }}g
                            </p>

                        </div>

                        <div class="rounded-xl bg-purple-900/30 p-3">
                            <span class="text-2xl">🥑</span>
                        </div>

                    </div>

                    <div class="mt-5 h-2 rounded-full bg-gray-700">
                        <div class="h-2 w-0 rounded-full bg-purple-500"></div>
                    </div>

                </div>

            </div>


            <!-- ================================
                 MAIN DASHBOARD
            ================================= -->

            <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">


                <!-- ================================
                     TODAY'S MEALS
                ================================= -->

                <div class="lg:col-span-2 dashboard-card p-6 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <h2 class="text-xl font-bold text-white">
                                Today's Meals
                            </h2>

                            <p class="mt-1 text-sm text-gray-400">
                                Keep track of everything you eat today.
                            </p>

                        </div>

                        <a
    href="{{ route('meals.add') }}"
    class="rounded-xl bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-green-700"
>
    + Add Meal
</a>

                    </div>


                    <!-- MEAL LIST -->

                    <div class="meal-section">


                        <!-- BREAKFAST -->

                        <div class="meal-card">
                            <div class="meal-icon breakfast-icon">🍳</div>

                            <div class="meal-info">
                                <h4>Breakfast</h4>

                                @if ($meals->has('Breakfast'))
                                    @foreach ($meals['Breakfast'] as $meal)

                                        @foreach ($meal->items as $item)
                                            <p>
                                                {{ $item->quantity }} × {{ $item->food->name }}
                                            </p>
                                        @endforeach

                                    @endforeach
                                @else
                                    <p>No meals added</p>
                                @endif
                        </div>

    <div class="meal-calories">
        @if ($meals->has('Breakfast'))
            @php
                $calories = 0;

                foreach ($meals['Breakfast'] as $meal) {
                    foreach ($meal->items as $item) {
                        $calories += $item->food->calories * $item->quantity;
                    }
                }
            @endphp

            {{ round($calories) }} kcal
        @else
            0 kcal
        @endif
    </div>
</div>


                        <!-- LUNCH -->

                       <div class="meal-card">
    <div class="meal-icon lunch-icon">🥗</div>

    <div class="meal-info">
        <h4>Lunch</h4>

        @if ($meals->has('Lunch'))
            @foreach ($meals['Lunch'] as $meal)

                @foreach ($meal->items as $item)
                    <p>
                        {{ $item->quantity }} × {{ $item->food->name }}
                    </p>
                @endforeach

            @endforeach
        @else
            <p>No meals added</p>
        @endif
    </div>

    <div class="meal-calories">
        @if ($meals->has('Lunch'))
            @php
                $calories = 0;

                foreach ($meals['Lunch'] as $meal) {
                    foreach ($meal->items as $item) {
                        $calories += $item->food->calories * $item->quantity;
                    }
                }
            @endphp

            {{ round($calories) }} kcal
        @else
            0 kcal
        @endif
    </div>
</div>


                        <!-- DINNER -->

                       <div class="meal-card">
    <div class="meal-icon dinner-icon">🍽️</div>

    <div class="meal-info">
        <h4>Dinner</h4>

        @if ($meals->has('Dinner'))
            @foreach ($meals['Dinner'] as $meal)

                @foreach ($meal->items as $item)
                    <p>
                        {{ $item->quantity }} × {{ $item->food->name }}
                    </p>
                @endforeach

            @endforeach
        @else
            <p>No meals added</p>
        @endif
    </div>

    <div class="meal-calories">
        @if ($meals->has('Dinner'))
            @php
                $calories = 0;

                foreach ($meals['Dinner'] as $meal) {
                    foreach ($meal->items as $item) {
                        $calories += $item->food->calories * $item->quantity;
                    }
                }
            @endphp

            {{ round($calories) }} kcal
        @else
            0 kcal
        @endif
    </div>
</div>


                        <!-- SNACKS -->

                        <div class="meal-card">
    <div class="meal-icon snack-icon">🍎</div>

    <div class="meal-info">
        <h4>Snacks</h4>

        @if ($meals->has('Snack'))
            @foreach ($meals['Snack'] as $meal)

                @foreach ($meal->items as $item)
                    <p>
                        {{ $item->quantity }} × {{ $item->food->name }}
                    </p>
                @endforeach

            @endforeach
        @else
            <p>No snacks added</p>
        @endif
    </div>

    <div class="meal-calories">
        @if ($meals->has('Snack'))
            @php
                $calories = 0;

                foreach ($meals['Snack'] as $meal) {
                    foreach ($meal->items as $item) {
                        $calories += $item->food->calories * $item->quantity;
                    }
                }
            @endphp

            {{ round($calories) }} kcal
        @else
            0 kcal
        @endif
    </div>
</div>

                    </div>

                </div>

                <div class="dashboard-card p-6 shadow-sm">

                    <h2 class="text-xl font-bold text-white">
                        Quick Actions
                    </h2>

                    <p class="mt-1 text-sm text-gray-400">
                        Manage your nutrition.
                    </p>


                    <div class="mt-6 space-y-3">


                        <!-- LOG MEAL -->

                        <a
                        href="{{ route('meals.add') }}"
                        class="quick-action"
                    >
                        <span class="text-2xl">🍎</span>

                        <div>
                            <p class="quick-action-title">
                                Log a Meal
                            </p>

                            <p class="quick-action-description">
                                Add food you've eaten
                            </p>
                        </div>
                    </a>


                        <!-- UPDATE PROFILE -->

                        <a
                            href="{{ route('profile') }}"
                            class="quick-action"
                        >

                            <span class="text-2xl">
                                👤
                            </span>

                            <div>

                                <p class="quick-action-title">
                                    Update Profile
                                </p>

                                <p class="quick-action-description">
                                    Set your nutrition goals
                                </p>

                            </div>

                        </a>


                        <!-- VIEW PROGRESS -->

                        <button
                            type="button"
                            class="quick-action"
                        >

                            <span class="text-2xl">
                                📊
                            </span>

                            <div>

                                <p class="quick-action-title">
                                    View Progress
                                </p>

                                <p class="quick-action-description">
                                    Track your progress
                                </p>

                            </div>

                        </button>


                        <!-- RECOMMENDATIONS -->

                        <button
                            type="button"
                            class="quick-action"
                        >

                            <span class="text-2xl">
                                💡
                            </span>

                            <div>

                                <p class="quick-action-title">
                                    Get Recommendations
                                </p>

                                <p class="quick-action-description">
                                    Discover personalized meals
                                </p>

                            </div>

                        </button>


                    </div>

                </div>

            </div>


            <!-- ================================
                 GETTING STARTED
            ================================= -->

            <div class="profile-banner mt-8 p-6">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h2 class="text-xl font-bold text-white">
                            Complete your nutrition profile
                        </h2>

                        <p class="mt-1 text-sm text-gray-300">
                            Add your basic information so NutriPass can personalize your nutrition goals.
                        </p>

                    </div>


                    <a
                        href="{{ route('profile') }}"
                        class="whitespace-nowrap rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-green-700"
                    >
                        Complete Profile →
                    </a>

                </div>

            </div>


        </div>

    </div>

</x-app-layout>