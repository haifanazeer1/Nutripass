<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NutriPass — Your Personalized Nutrition Wallet</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-white">

    <!-- ================= NAVBAR ================= -->
    <header class="border-b border-white/10 bg-slate-950/90 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5 lg:px-8">

            <!-- Logo -->
            <a href="/" class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500 text-xl font-bold text-slate-950">
                    N
                </div>

                <span class="text-xl font-bold tracking-tight">
                    NutriPass
                </span>
            </a>

            <!-- Navigation -->
            <nav class="hidden items-center gap-8 md:flex">
                <a href="#features"
                   class="text-sm text-slate-300 transition hover:text-emerald-400">
                    Features
                </a>

                <a href="#how-it-works"
                   class="text-sm text-slate-300 transition hover:text-emerald-400">
                    How It Works
                </a>

                <a href="#about"
                   class="text-sm text-slate-300 transition hover:text-emerald-400">
                    About
                </a>
            </nav>

            <!-- Auth Buttons -->
            <div class="flex items-center gap-3">

                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="rounded-lg bg-emerald-500 px-5 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-emerald-400">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="hidden text-sm font-medium text-slate-300 transition hover:text-white sm:block">
                        Log in
                    </a>

                    <a href="{{ route('register') }}"
                       class="rounded-lg bg-emerald-500 px-5 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-emerald-400">
                        Get Started
                    </a>
                @endauth

            </div>
        </div>
    </header>


    <!-- ================= HERO ================= -->
    <main>

        <section class="relative overflow-hidden">

            <!-- Background glow -->
            <div class="absolute left-1/2 top-0 -z-10 h-[500px] w-[700px] -translate-x-1/2 rounded-full bg-emerald-500/10 blur-3xl"></div>

            <div class="mx-auto grid max-w-7xl items-center gap-16 px-6 py-24 lg:grid-cols-2 lg:px-8 lg:py-32">

                <!-- Hero Text -->
                <div>

                    <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-4 py-2 text-sm text-emerald-300">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        Personalized nutrition made simple
                    </div>

                    <h1 class="max-w-3xl text-5xl font-bold leading-tight tracking-tight sm:text-6xl">
                        Your nutrition.
                        <span class="text-emerald-400">
                            Your journey.
                        </span>
                    </h1>

                    <p class="mt-6 max-w-xl text-lg leading-8 text-slate-400">
                        NutriPass is your personalized nutrition wallet that helps
                        you understand what you eat, track your progress, and make
                        better food choices every day.
                    </p>

                    <!-- Buttons -->
                    <div class="mt-8 flex flex-wrap gap-4">

                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="rounded-xl bg-emerald-500 px-6 py-3.5 font-semibold text-slate-950 transition hover:bg-emerald-400">
                                Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                               class="rounded-xl bg-emerald-500 px-6 py-3.5 font-semibold text-slate-950 transition hover:bg-emerald-400">
                                Start Your Journey
                            </a>

                            <a href="#how-it-works"
                               class="rounded-xl border border-white/10 px-6 py-3.5 font-semibold text-slate-200 transition hover:bg-white/5">
                                Learn More
                            </a>
                        @endauth

                    </div>

                    <!-- Small stats -->
                    <div class="mt-10 flex flex-wrap gap-8 border-t border-white/10 pt-8">

                        <div>
                            <p class="text-2xl font-bold">24/7</p>
                            <p class="mt-1 text-sm text-slate-500">
                                Nutrition tracking
                            </p>
                        </div>

                        <div>
                            <p class="text-2xl font-bold">4+</p>
                            <p class="mt-1 text-sm text-slate-500">
                                Key nutrition metrics
                            </p>
                        </div>

                        <div>
                            <p class="text-2xl font-bold">1</p>
                            <p class="mt-1 text-sm text-slate-500">
                                Personalized wallet
                            </p>
                        </div>

                    </div>

                </div>


                <!-- Dashboard Preview -->
                <div class="relative">

                    <!-- Glow -->
                    <div class="absolute -inset-4 rounded-3xl bg-emerald-500/10 blur-2xl"></div>

                    <div class="relative rounded-3xl border border-white/10 bg-slate-900 p-5 shadow-2xl">

                        <!-- Dashboard header -->
                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-sm text-slate-400">
                                    Today's Nutrition
                                </p>

                                <h2 class="mt-1 text-2xl font-bold">
                                    Good afternoon 👋
                                </h2>
                            </div>

                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-500/10 text-emerald-400">
                                N
                            </div>

                        </div>


                        <!-- Calories card -->
                        <div class="mt-6 rounded-2xl bg-slate-800 p-5">

                            <div class="flex items-center justify-between">

                                <div>
                                    <p class="text-sm text-slate-400">
                                        Calories
                                    </p>

                                    <p class="mt-1 text-3xl font-bold">
                                        1,420
                                        <span class="text-sm font-normal text-slate-500">
                                            / 2,000 kcal
                                        </span>
                                    </p>
                                </div>

                                <div class="flex h-16 w-16 items-center justify-center rounded-full border-4 border-emerald-400">
                                    <span class="text-sm font-bold">
                                        71%
                                    </span>
                                </div>

                            </div>

                            <div class="mt-5 h-2 overflow-hidden rounded-full bg-slate-700">
                                <div class="h-full w-[71%] rounded-full bg-emerald-400"></div>
                            </div>

                        </div>


                        <!-- Macronutrients -->
                        <div class="mt-4 grid grid-cols-3 gap-3">

                            <div class="rounded-2xl bg-slate-800 p-4">
                                <p class="text-xs text-slate-500">
                                    Protein
                                </p>

                                <p class="mt-2 text-xl font-bold">
                                    72g
                                </p>

                                <div class="mt-3 h-1.5 rounded-full bg-slate-700">
                                    <div class="h-full w-[68%] rounded-full bg-emerald-400"></div>
                                </div>
                            </div>


                            <div class="rounded-2xl bg-slate-800 p-4">
                                <p class="text-xs text-slate-500">
                                    Carbs
                                </p>

                                <p class="mt-2 text-xl font-bold">
                                    156g
                                </p>

                                <div class="mt-3 h-1.5 rounded-full bg-slate-700">
                                    <div class="h-full w-[74%] rounded-full bg-blue-400"></div>
                                </div>
                            </div>


                            <div class="rounded-2xl bg-slate-800 p-4">
                                <p class="text-xs text-slate-500">
                                    Fats
                                </p>

                                <p class="mt-2 text-xl font-bold">
                                    48g
                                </p>

                                <div class="mt-3 h-1.5 rounded-full bg-slate-700">
                                    <div class="h-full w-[56%] rounded-full bg-purple-400"></div>
                                </div>
                            </div>

                        </div>


                        <!-- Recent meal -->
                        <div class="mt-4 rounded-2xl bg-slate-800 p-4">

                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-semibold">
                                        Recent Meal
                                    </p>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Grilled chicken bowl
                                    </p>
                                </div>

                                <span class="text-sm font-semibold text-emerald-400">
                                    520 kcal
                                </span>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>


        <!-- ================= FEATURES ================= -->
        <section id="features" class="border-t border-white/10 bg-slate-900/50">

            <div class="mx-auto max-w-7xl px-6 py-24 lg:px-8">

                <div class="mx-auto max-w-2xl text-center">

                    <p class="text-sm font-semibold uppercase tracking-widest text-emerald-400">
                        Everything you need
                    </p>

                    <h2 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">
                        Your nutrition, all in one place.
                    </h2>

                    <p class="mt-5 text-slate-400">
                        NutriPass brings your nutrition information together
                        so you can make informed decisions without the complexity.
                    </p>

                </div>


                <div class="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

                    <!-- Feature 1 -->
                    <div class="rounded-2xl border border-white/10 bg-slate-900 p-6 transition hover:-translate-y-1 hover:border-emerald-400/30">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-400/10 text-2xl">
                            🍽️
                        </div>

                        <h3 class="mt-5 text-lg font-semibold">
                            Meal Tracking
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-400">
                            Log your meals and keep track of your daily
                            nutritional intake.
                        </p>

                    </div>


                    <!-- Feature 2 -->
                    <div class="rounded-2xl border border-white/10 bg-slate-900 p-6 transition hover:-translate-y-1 hover:border-emerald-400/30">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-400/10 text-2xl">
                            🥗
                        </div>

                        <h3 class="mt-5 text-lg font-semibold">
                            Food Library
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-400">
                            Explore nutritional information for the foods
                            you eat every day.
                        </p>

                    </div>


                    <!-- Feature 3 -->
                    <div class="rounded-2xl border border-white/10 bg-slate-900 p-6 transition hover:-translate-y-1 hover:border-emerald-400/30">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-400/10 text-2xl">
                            🎯
                        </div>

                        <h3 class="mt-5 text-lg font-semibold">
                            Personalized Goals
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-400">
                            Set nutrition goals based on your preferences
                            and lifestyle.
                        </p>

                    </div>


                    <!-- Feature 4 -->
                    <div class="rounded-2xl border border-white/10 bg-slate-900 p-6 transition hover:-translate-y-1 hover:border-emerald-400/30">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-400/10 text-2xl">
                            📈
                        </div>

                        <h3 class="mt-5 text-lg font-semibold">
                            Track Progress
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-400">
                            Understand your nutrition habits and monitor
                            your progress over time.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- ================= HOW IT WORKS ================= -->
        <section id="how-it-works">

            <div class="mx-auto max-w-7xl px-6 py-24 lg:px-8">

                <div class="text-center">

                    <p class="text-sm font-semibold uppercase tracking-widest text-emerald-400">
                        Simple by design
                    </p>

                    <h2 class="mt-3 text-3xl font-bold sm:text-4xl">
                        How NutriPass works
                    </h2>

                </div>


                <div class="mt-16 grid gap-12 md:grid-cols-3">

                    <!-- Step 1 -->
                    <div class="text-center">

                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-500 text-xl font-bold text-slate-950">
                            01
                        </div>

                        <h3 class="mt-6 text-xl font-semibold">
                            Create your profile
                        </h3>

                        <p class="mt-3 text-slate-400">
                            Tell NutriPass about your dietary preferences,
                            goals and lifestyle.
                        </p>

                    </div>


                    <!-- Step 2 -->
                    <div class="text-center">

                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-500 text-xl font-bold text-slate-950">
                            02
                        </div>

                        <h3 class="mt-6 text-xl font-semibold">
                            Track your meals
                        </h3>

                        <p class="mt-3 text-slate-400">
                            Record what you eat and build a clear picture
                            of your daily nutrition.
                        </p>

                    </div>


                    <!-- Step 3 -->
                    <div class="text-center">

                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-500 text-xl font-bold text-slate-950">
                            03
                        </div>

                        <h3 class="mt-6 text-xl font-semibold">
                            Understand your progress
                        </h3>

                        <p class="mt-3 text-slate-400">
                            Use your nutrition data to make better and
                            more informed choices.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- ================= CTA ================= -->
        <section id="about" class="px-6 py-24 lg:px-8">

            <div class="mx-auto max-w-5xl overflow-hidden rounded-3xl bg-emerald-500 px-8 py-16 text-center sm:px-16">

                <h2 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                    Take control of your nutrition.
                </h2>

                <p class="mx-auto mt-5 max-w-2xl text-lg text-slate-900/70">
                    Start building healthier habits with a nutrition
                    wallet designed around you.
                </p>

                <div class="mt-8">

                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="inline-flex rounded-xl bg-slate-950 px-7 py-3.5 font-semibold text-white transition hover:bg-slate-800">
                            Open Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                           class="inline-flex rounded-xl bg-slate-950 px-7 py-3.5 font-semibold text-white transition hover:bg-slate-800">
                            Get Started
                        </a>
                    @endauth

                </div>

            </div>

        </section>

    </main>


    <!-- ================= FOOTER ================= -->
    <footer class="border-t border-white/10">

        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-6 py-8 sm:flex-row sm:items-center sm:justify-between lg:px-8">

            <div class="flex items-center gap-3">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-500 font-bold text-slate-950">
                    N
                </div>

                <span class="font-semibold">
                    NutriPass
                </span>

            </div>

            <p class="text-sm text-slate-500">
                © {{ date('Y') }} NutriPass. Built for better nutrition.
            </p>

        </div>

    </footer>

</body>
</html>