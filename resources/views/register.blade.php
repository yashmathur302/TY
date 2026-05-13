<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up – EduConnect</title>

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

<div class="sm:flex">

    {{-- Left panel: register form --}}
    <div class="relative lg:w-[580px] md:w-96 w-full p-10 min-h-screen bg-white shadow-xl flex items-center pt-10 dark:bg-slate-900 z-10">

        <div class="w-full lg:max-w-sm mx-auto space-y-10"
             uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100; repeat: true">

            {{-- Logo --}}
            <a href="{{ route('login') }}" class="absolute top-10 left-10 flex items-center gap-2">
                <svg viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-primary">
                    <path d="M12 2 L13.8 9.2 L21 12 L13.8 14.8 L12 22 L10.2 14.8 L3 12 L10.2 9.2 Z"/>
                </svg>
                <span class="text-xl font-bold dark:text-white">EduConnect</span>
            </a>

            {{-- Title --}}
            <div>
                <h2 class="text-2xl font-semibold mb-1.5">Sign up to get started</h2>
                <p class="text-sm text-gray-700 font-normal dark:text-white/70">
                    If you already have an account.
                    <a href="{{ route('login') }}" class="text-blue-700">Login here!</a>
                </p>
            </div>

            {{-- Validation errors --}}
            @if ($errors->any())
            <div class="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 rounded-lg p-3 text-sm text-red-600 dark:text-red-400">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('register.post') }}"
                  class="space-y-7 text-sm text-black font-medium dark:text-white"
                  uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100; repeat: true">

                @csrf

                <div class="grid grid-cols-2 gap-4 gap-y-7">

                    {{-- First name --}}
                    <div>
                        <label for="first_name">First name</label>
                        <div class="mt-2.5">
                            <input id="first_name" name="first_name" type="text" autofocus
                                   value="{{ old('first_name') }}"
                                   placeholder="First name" required
                                   class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5 @error('first_name') !border-red-400 @enderror">
                        </div>
                    </div>

                    {{-- Last name --}}
                    <div>
                        <label for="last_name">Last name</label>
                        <div class="mt-2.5">
                            <input id="last_name" name="last_name" type="text"
                                   value="{{ old('last_name') }}"
                                   placeholder="Last name" required
                                   class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5 @error('last_name') !border-red-400 @enderror">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-span-2">
                        <label for="email">Email address</label>
                        <div class="mt-2.5">
                            <input id="email" name="email" type="email"
                                   value="{{ old('email') }}"
                                   placeholder="Email" required
                                   class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5 @error('email') !border-red-400 @enderror">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password">Password</label>
                        <div class="mt-2.5">
                            <input id="password" name="password" type="password" placeholder="Min 8 chars"
                                   class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5 @error('password') !border-red-400 @enderror">
                        </div>
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="mt-2.5">
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repeat"
                                   class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5">
                        </div>
                    </div>

                    {{-- Terms --}}
                    <div class="col-span-2">
                        <label class="inline-flex items-center" for="accept_terms">
                            <input type="checkbox" id="accept_terms" name="accept_terms"
                                   class="!rounded-md @error('accept_terms') !border-red-400 @enderror">
                            <span class="ml-2">You agree to our <a href="#" class="text-blue-700 hover:underline">terms of use</a></span>
                        </label>
                    </div>

                    {{-- Submit --}}
                    <div class="col-span-2">
                        <button type="submit" class="button bg-primary text-white w-full">Get Started</button>
                    </div>

                </div>

                <div class="text-center flex items-center gap-6">
                    <hr class="flex-1 border-slate-200 dark:border-slate-800">
                    Or continue with
                    <hr class="flex-1 border-slate-200 dark:border-slate-800">
                </div>

                {{-- Social signup --}}
                <div class="flex gap-2"
                     uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 400; repeat: true">
                    <a href="#" class="button flex-1 flex items-center gap-2 bg-primary text-white text-sm">
                        <ion-icon name="logo-facebook" class="text-lg"></ion-icon> Facebook
                    </a>
                    <a href="#" class="button flex-1 flex items-center gap-2 bg-sky-600 text-white text-sm">
                        <ion-icon name="logo-twitter"></ion-icon> Twitter
                    </a>
                    <a href="#" class="button flex-1 flex items-center gap-2 bg-black text-white text-sm">
                        <ion-icon name="logo-github"></ion-icon> GitHub
                    </a>
                </div>

            </form>

        </div>
    </div>

    {{-- Right panel: image slideshow --}}
    <div class="flex-1 relative bg-primary max-md:hidden">

        <div class="relative w-full h-full" tabindex="-1"
             uk-slideshow="animation: slide; autoplay: true">

            <ul class="uk-slideshow-items w-full h-full">

                <li class="w-full">
                    <img src="https://picsum.photos/seed/register-slide1/1200/800"
                         alt="" class="w-full h-full object-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                    <div class="absolute bottom-0 w-full z-10">
                        <div class="max-w-xl w-full mx-auto pb-32 px-5 z-30 relative">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 text-white"
                                 uk-slideshow-parallax="y: 600,0,0">
                                <path d="M12 2 L13.8 9.2 L21 12 L13.8 14.8 L12 22 L10.2 14.8 L3 12 L10.2 9.2 Z"/>
                            </svg>
                            <h4 class="text-white text-2xl font-semibold mt-7"
                                uk-slideshow-parallax="y: 600,0,0">Connect With Friends</h4>
                            <p class="text-white text-lg mt-7 leading-8"
                               uk-slideshow-parallax="y: 800,0,0">Keep your friends updated on what's happening in your life.</p>
                        </div>
                    </div>
                    <div class="w-full h-96 bg-gradient-to-t from-black absolute bottom-0 left-0"></div>
                </li>

                <li class="w-full">
                    <img src="https://picsum.photos/seed/register-slide2/1200/800"
                         alt="" class="w-full h-full object-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                    <div class="absolute bottom-0 w-full z-10">
                        <div class="max-w-xl w-full mx-auto pb-32 px-5 z-30 relative">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 text-white"
                                 uk-slideshow-parallax="y: 600,0,0">
                                <path d="M12 2 L13.8 9.2 L21 12 L13.8 14.8 L12 22 L10.2 14.8 L3 12 L10.2 9.2 Z"/>
                            </svg>
                            <h4 class="text-white text-2xl font-semibold mt-7"
                                uk-slideshow-parallax="y: 800,0,0">Start Your Journey</h4>
                            <p class="text-white text-lg mt-7 leading-8"
                               uk-slideshow-parallax="y: 800,0,0">Join thousands of people sharing their stories and ideas.</p>
                        </div>
                    </div>
                    <div class="w-full h-96 bg-gradient-to-t from-black absolute bottom-0 left-0"></div>
                </li>

            </ul>

            <div class="flex justify-center">
                <ul class="inline-flex flex-wrap justify-center absolute bottom-8 gap-1.5 uk-dotnav uk-slideshow-nav"></ul>
            </div>

        </div>

    </div>

</div>

<script src="{{ asset('assets/js/uikit.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
