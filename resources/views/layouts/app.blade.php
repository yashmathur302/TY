<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='8' fill='%230ea5e9'/><text x='16' y='22' font-size='16' text-anchor='middle' fill='white' font-family='Arial' font-weight='bold'>E</text></svg>">

    <!-- SEO -->
    <title>@yield('title', 'EduConnect – Social Platform for Teachers & Students')</title>
    <meta name="description" content="@yield('description', 'EduConnect is a social media platform built for teachers and students to connect, share knowledge, and collaborate.')">
    <meta name="keywords" content="@yield('keywords', 'education, teachers, students, social media, learning, classroom')">
    <meta name="robots" content="index, follow">
    <meta name="author" content="EduConnect">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'EduConnect')">
    <meta property="og:description" content="@yield('description', 'Social platform for teachers and students')">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'EduConnect')">
    <meta name="twitter:description" content="@yield('description', 'Social platform for teachers and students')">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- UIKit CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.6/dist/css/uikit.min.css">

    <!-- SimpleBar CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@6.2.7/dist/simplebar.min.css">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary:   '#0ea5e9',
                        secondery: 'rgba(255,255,255,0.08)',
                        dark2:     '#1b2033',
                        dark3:     '#1e2846',
                        dark4:     '#222a45',
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @stack('styles')
</head>
<body>

    <div id="wrapper">

        <!-- Header -->
        @include('partials.header')

        <!-- Left Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <main id="site__main" class="site-main">
            @yield('content')
        </main>

    </div>

    <!-- Floating Chat Box -->
    @include('partials.chat-box')

    {{-- Users list modal (for likes/shares) --}}
    <div class="hidden" id="users-list-modal" uk-modal="">
        <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[400px] w-full dark:bg-dark2">
            <div class="text-center py-4 border-b dark:border-slate-700">
                <h2 class="text-sm font-medium text-black dark:text-white" id="users-list-title">People</h2>
                <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="max-h-80 overflow-y-auto py-2" id="users-list-body">
            </div>
        </div>
    </div>

    <!-- Page Modals -->
    @yield('modals')

    <!-- UIKit JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.6/dist/js/uikit-icons.min.js"></script>

    <!-- SimpleBar JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/simplebar@6.2.7/dist/simplebar.min.js"></script>

    <!-- Ionicons (CDN) -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Custom Script -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @stack('scripts')
</body>
</html>
