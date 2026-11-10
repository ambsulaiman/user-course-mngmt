<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'School Portal') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-950 text-slate-100 antialiased">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(59,130,246,0.18),transparent_28%),linear-gradient(180deg,#020617_0%,#0f172a_30%,#020617_100%)]">
            <header class="mx-auto max-w-7xl px-4 pt-6 sm:px-6 lg:px-8">
                <nav class="rounded-full border border-white/10 bg-white/5 px-4 py-3 backdrop-blur-md shadow-lg shadow-sky-950/20">
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-sky-400 to-indigo-600 text-lg font-black text-white shadow-lg shadow-sky-500/30">
                                S
                            </div>
                            <div>
                                <p class="text-lg font-bold tracking-tight text-white">SchoolHub</p>
                                <p class="text-[10px] uppercase tracking-[0.22em] text-slate-400">Learning Academy</p>
                            </div>
                        </div>

                        <div class="hidden items-center gap-8 text-sm text-slate-300 md:flex">
                            <a href="#programs" class="transition hover:text-white">Programs</a>
                            <a href="#why-us" class="transition hover:text-white">Why Us</a>
                            <a href="#results" class="transition hover:text-white">Results</a>
                            <a href="#contact" class="transition hover:text-white">Contact</a>
                        </div>

                        <div class="flex items-center gap-3">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('dashboard') }}" class="inline-flex items-center rounded-full border border-sky-400/50 bg-sky-500/10 px-4 py-2 text-sm font-medium text-sky-100 transition hover:bg-sky-500/20">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="inline-flex items-center rounded-full border border-white/10 px-4 py-2 text-sm font-medium text-slate-200 transition hover:border-sky-400/50 hover:text-white">
                                        Login
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="inline-flex items-center rounded-full bg-sky-500 px-4 py-2 text-sm font-semibold text-slate-950 shadow-lg shadow-sky-500/30 transition hover:bg-sky-400">
                                            Enroll now
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </nav>
            </header>

            <main class="mx-auto max-w-7xl px-4 pb-20 pt-10 sm:px-6 lg:px-8">
                <section class="grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">
                    <div>
                        <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-emerald-400/30 bg-emerald-500/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-200">
                            <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                            Admissions open for 2027
                        </div>

                        <h1 class="max-w-xl text-4xl font-black tracking-tight text-white sm:text-5xl lg:text-6xl">
                            Build a brighter future with our school community.
                        </h1>

                        <p class="mt-6 max-w-xl text-lg leading-8 text-slate-300">
                            Empower students with practical learning, expert teachers, and a modern curriculum designed to create confident leaders and lifelong learners.
                        </p>

                        <div class="mt-8 flex flex-wrap items-center gap-4">
                            <a href="{{ route('courses.index') }}" class="inline-flex items-center rounded-full bg-sky-500 px-6 py-3 text-base font-semibold text-slate-950 shadow-lg shadow-sky-500/30 transition hover:bg-sky-400">
                                Explore courses
                            </a>
                            <a href="#programs" class="inline-flex items-center rounded-full border border-white/15 bg-white/5 px-6 py-3 text-base font-semibold text-white transition hover:border-sky-400 hover:bg-sky-500/10">
                                View programs
                            </a>
                        </div>

                        <div class="mt-10 grid max-w-xl grid-cols-3 gap-4 text-left">
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur-sm">
                                <p class="text-3xl font-black text-white">18K+</p>
                                <p class="mt-1 text-sm text-slate-400">Students</p>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur-sm">
                                <p class="text-3xl font-black text-white">96%</p>
                                <p class="mt-1 text-sm text-slate-400">Success rate</p>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur-sm">
                                <p class="text-3xl font-black text-white">42</p>
                                <p class="mt-1 text-sm text-slate-400">Programs</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute inset-0 -z-10 rounded-[2rem] bg-gradient-to-br from-sky-500/20 via-indigo-500/10 to-emerald-500/15 blur-3xl"></div>
                        <div class="overflow-hidden rounded-[2rem] border border-white/10 bg-slate-900/80 p-5 shadow-2xl shadow-sky-950/30 backdrop-blur-md">
                            <div class="rounded-[1.5rem] border border-white/10 bg-slate-950 p-5">
                                <div class="flex items-center justify-between border-b border-white/10 pb-4">
                                    <div>
                                        <p class="text-xs uppercase tracking-[0.2em] text-slate-400">School dashboard</p>
                                        <h2 class="mt-2 text-2xl font-bold text-white">Spring semester</h2>
                                    </div>
                                    <span class="rounded-full border border-emerald-400/30 bg-emerald-500/10 px-2.5 py-1 text-xs font-semibold text-emerald-200">
                                        Active
                                    </span>
                                </div>

                                <div class="mt-5 space-y-4">
                                    <div class="rounded-2xl border border-sky-500/20 bg-sky-500/10 p-4">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm text-sky-100">Upcoming course</p>
                                                <p class="mt-1 text-xl font-bold text-white">Design Thinking</p>
                                            </div>
                                            <span class="rounded-full bg-white/10 px-2 py-1 text-xs text-sky-100">Mon 9:00</span>
                                        </div>
                                    </div>

                                    <div class="space-y-3">
                                        <div class="flex items-center justify-between rounded-2xl bg-white/5 p-3">
                                            <div>
                                                <p class="text-sm text-slate-300">Data Science</p>
                                                <p class="text-xs text-slate-400">Module 04 · 82% complete</p>
                                            </div>
                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-500/20 text-sm font-bold text-indigo-200">82</div>
                                        </div>
                                        <div class="flex items-center justify-between rounded-2xl bg-white/5 p-3">
                                            <div>
                                                <p class="text-sm text-slate-300">Business Leadership</p>
                                                <p class="text-xs text-slate-400">Module 02 · 64% complete</p>
                                            </div>
                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-500/20 text-sm font-bold text-emerald-200">64</div>
                                        </div>
                                        <div class="flex items-center justify-between rounded-2xl bg-white/5 p-3">
                                            <div>
                                                <p class="text-sm text-slate-300">Digital Media</p>
                                                <p class="text-xs text-slate-400">Module 01 · 90% complete</p>
                                            </div>
                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-amber-500/20 text-sm font-bold text-amber-200">90</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="programs" class="mt-24">
                    <div class="mb-10 flex items-end justify-between gap-4">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-300">Programs</p>
                            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">Choose your pathway.</h2>
                        </div>
                        <a href="{{ route('courses.index') }}" class="hidden text-sm font-medium text-sky-300 hover:text-sky-200 sm:inline-flex">
                            Browse all courses →
                        </a>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                        <article class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-lg shadow-slate-950/20 transition hover:-translate-y-1 hover:border-sky-400/40">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-500/15 text-2xl">💻</div>
                            <h3 class="mt-5 text-xl font-bold text-white">Web Development</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Learn modern frontend and backend development with practical project-based learning.</p>
                            <div class="mt-5 flex items-center justify-between text-sm text-slate-300">
                                <span>12 weeks</span>
                                <span class="font-semibold text-sky-300">Beginner</span>
                            </div>
                        </article>

                        <article class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-lg shadow-slate-950/20 transition hover:-translate-y-1 hover:border-sky-400/40">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-500/15 text-2xl">📊</div>
                            <h3 class="mt-5 text-xl font-bold text-white">Business</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Develop strategic thinking, communication, and leadership for real-world success.</p>
                            <div class="mt-5 flex items-center justify-between text-sm text-slate-300">
                                <span>10 weeks</span>
                                <span class="font-semibold text-indigo-300">Intermediate</span>
                            </div>
                        </article>

                        <article class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-lg shadow-slate-950/20 transition hover:-translate-y-1 hover:border-sky-400/40">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-500/15 text-2xl">🎨</div>
                            <h3 class="mt-5 text-xl font-bold text-white">Design</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Create intuitive digital experiences with modern design principles and creative tools.</p>
                            <div class="mt-5 flex items-center justify-between text-sm text-slate-300">
                                <span>8 weeks</span>
                                <span class="font-semibold text-amber-300">All levels</span>
                            </div>
                        </article>

                        <article class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-lg shadow-slate-950/20 transition hover:-translate-y-1 hover:border-sky-400/40">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/15 text-2xl">📈</div>
                            <h3 class="mt-5 text-xl font-bold text-white">Data Science</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Transform data into insight with analytics, AI concepts, and practical models.</p>
                            <div class="mt-5 flex items-center justify-between text-sm text-slate-300">
                                <span>14 weeks</span>
                                <span class="font-semibold text-emerald-300">Advanced</span>
                            </div>
                        </article>
                    </div>
                </section>

                <section id="why-us" class="mt-24 grid gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                    <div class="rounded-[2rem] border border-sky-400/20 bg-sky-500/10 p-8">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-200">Why students choose us</p>
                        <h2 class="mt-4 text-3xl font-bold text-white">A learning experience designed for real progress.</h2>
                        <ul class="mt-8 space-y-5 text-slate-200">
                            <li class="flex items-start gap-3">
                                <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-sky-500 text-xs font-bold text-slate-950">✓</span>
                                <span>Small live cohorts with expert instructors and personalized guidance.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-sky-500 text-xs font-bold text-slate-950">✓</span>
                                <span>Project-based curriculum connected to industry-ready skills and internships.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-sky-500 text-xs font-bold text-slate-950">✓</span>
                                <span>Career support, mentorship, and strong student community from day one.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="grid gap-5 md:grid-cols-3">
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                            <p class="text-4xl font-black text-white">1:1</p>
                            <p class="mt-3 text-sm text-slate-300">Mentorship sessions every month</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                            <p class="text-4xl font-black text-white">24/7</p>
                            <p class="mt-3 text-sm text-slate-300">Access to course resources and study labs</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                            <p class="text-4xl font-black text-white">4.9</p>
                            <p class="mt-3 text-sm text-slate-300">Average learner satisfaction rating</p>
                        </div>
                    </div>
                </section>

                <section id="results" class="mt-24">
                    <div class="mb-10 text-center">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-300">Student outcomes</p>
                        <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">Real results from real learners.</h2>
                    </div>

                    <div class="grid gap-6 lg:grid-cols-3">
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-400">Student success</p>
                            <p class="mt-4 text-5xl font-black text-white">92%</p>
                            <p class="mt-4 text-slate-300">of graduates reported improved confidence in their subject area.</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-400">Career growth</p>
                            <p class="mt-4 text-5xl font-black text-white">3.1x</p>
                            <p class="mt-4 text-slate-300">average increase in student job readiness after one academic term.</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-400">Community</p>
                            <p class="mt-4 text-5xl font-black text-white">8.4K</p>
                            <p class="mt-4 text-slate-300">students connected through workshops, clubs, and collaborative learning spaces.</p>
                        </div>
                    </div>
                </section>

                <section id="contact" class="mt-24 rounded-[2rem] border border-white/10 bg-gradient-to-r from-sky-500/20 via-indigo-500/10 to-emerald-500/20 p-8 sm:p-10">
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-200">Start your journey</p>
                            <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">Find the right program for your future.</h2>
                        </div>

                        <div class="flex flex-wrap items-center gap-4">
                            <a href="{{ route('courses.index') }}" class="inline-flex items-center rounded-full bg-white px-6 py-3 text-base font-semibold text-slate-950 transition hover:bg-slate-100">
                                Explore courses
                            </a>
                            <a href="{{ route('login') }}" class="inline-flex items-center rounded-full border border-white/20 bg-slate-950/30 px-6 py-3 text-base font-semibold text-white transition hover:border-sky-300 hover:text-sky-100">
                                Student login
                            </a>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
