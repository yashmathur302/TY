@extends('layouts.app')

@section('title', 'Blog')

@section('content')

<div class="page-heading">
    <h1 class="page-title">Blog</h1>
    <nav class="nav__underline flex items-center justify-between">
        <ul uk-tab class="group" uk-switcher="connect: #blog-tabs; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
            <li><a href="#">Suggestions</a></li>
            <li><a href="#">Popular</a></li>
            <li><a href="#">My article</a></li>
        </ul>
        <div class="flex items-center gap-4">
            <button type="button" class="flex items-center gap-0.5 py-1.5 px-2 bg-primary text-white shadow rounded-md">
                <ion-icon class="text-lg" name="add"></ion-icon>
                <span class="text-xs font-medium pr-1">Create</span>
            </button>
            <select class="bg-white shadow focus:!border-transparent focus:!ring-transparent max-sm:hidden md:w-40 dark:bg-dark2">
                <option value="1">Latest</option>
                <option value="3">Popular</option>
                <option value="4">Newest</option>
            </select>
        </div>
    </nav>
</div>

<!-- Category tag slider -->
<div class="relative -mt-3" tabindex="-1" uk-slider="finite: true"
     uk-sticky="cls-active: bg-slate-100/60 z-30 backdrop-blur-lg px-6 py-1 dark:bg-slate-800/60; offset: 76; start: 10; animation: uk-animation-slide-top">
    <div class="py-1 overflow-hidden uk-slider-container">
        <ul class="py-2 uk-slider-items w-[calc(100%+0.10px)] capitalize text-sm font-semibold">
            @foreach(['Gaming', 'Headphones', 'Parfums', 'Laptops', 'Fruits', 'Mobiles', 'Science', 'Travel', 'Health', 'Business', 'Food', 'Technology', 'Sports', 'Education'] as $cat)
            <li class="w-auto pr-2.5">
                <a href="#" class="px-4 py-2 rounded-lg bg-white shadow inline-block dark:bg-dark2">{{ $cat }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <a class="absolute left-0 -translate-y-1/2 top-1/2 flex items-center w-16 h-12 p-2.5 justify-start bg-gradient-to-r from-[#f9fafb] via-[#f9fafb] dark:from-slate-900 dark:via-slate-900"
       href="#" uk-slider-item="previous">
        <ion-icon name="chevron-back" class="text-2xl"></ion-icon>
    </a>
    <a class="absolute right-0 -translate-y-1/2 top-1/2 flex items-center w-16 h-12 p-2.5 justify-end bg-gradient-to-l from-[#f9fafb] via-[#f9fafb] dark:from-slate-900 dark:via-slate-900"
       href="#" uk-slider-item="next">
        <ion-icon name="chevron-forward" class="text-2xl"></ion-icon>
    </a>
</div>

@php
$articles = [
    ['seed' => 'blog-a1',  'category' => 'Life Style',  'author' => 'Jesse Steeve',  'av' => 2, 'title' => 'Top amazing web demos and experiments in 2024 should know about',  'likes' => 45, 'comments' => '156.9K'],
    ['seed' => 'blog-a2',  'category' => 'Technology',  'author' => 'Monroe Parker', 'av' => 3, 'title' => 'Top amazing web demos and experiments in 2024 should know about',  'likes' => 38, 'comments' => '98.2K'],
    ['seed' => 'blog-a3',  'category' => 'Life Style',  'author' => 'Martin Gray',   'av' => 4, 'title' => 'Top amazing web demos and experiments in 2024 should know about',  'likes' => 72, 'comments' => '204.1K'],
    ['seed' => 'blog-a4',  'category' => 'Education',   'author' => 'Jesse Steeve',  'av' => 2, 'title' => 'Interesting JavaScript and CSS libraries you should learn',          'likes' => 45, 'comments' => '156.9K'],
    ['seed' => 'blog-a5',  'category' => 'Life Style',  'author' => 'Monroe Parker', 'av' => 3, 'title' => 'Top UI trends every designer should know in 2024',                  'likes' => 29, 'comments' => '87.4K'],
    ['seed' => 'blog-a6',  'category' => 'Technology',  'author' => 'Martin Gray',   'av' => 4, 'title' => 'Interesting JavaScript and CSS libraries should Know About',         'likes' => 51, 'comments' => '143.7K'],
    ['seed' => 'blog-a7',  'category' => 'Science',     'author' => 'Martin Gray',   'av' => 4, 'title' => 'Interesting JavaScript and CSS libraries should Know About',         'likes' => 61, 'comments' => '178.3K'],
    ['seed' => 'blog-a8',  'category' => 'Life Style',  'author' => 'Martin Gray',   'av' => 4, 'title' => 'Top amazing web demos and experiments in 2024 should know about',  'likes' => 44, 'comments' => '112.5K'],
    ['seed' => 'blog-a9',  'category' => 'Education',   'author' => 'Jesse Steeve',  'av' => 2, 'title' => 'Interesting JavaScript and CSS libraries you should learn',          'likes' => 45, 'comments' => '156.9K'],
    ['seed' => 'blog-a10', 'category' => 'Life Style',  'author' => 'Monroe Parker', 'av' => 3, 'title' => 'Top UI trends every designer should know in 2024',                  'likes' => 33, 'comments' => '91.2K'],
    ['seed' => 'blog-a11', 'category' => 'Technology',  'author' => 'Martin Gray',   'av' => 4, 'title' => 'Top amazing web demos and experiments in 2024 should know about',  'likes' => 58, 'comments' => '167.8K'],
];
@endphp

<div class="uk-switcher" id="blog-tabs">

    {{-- Tab 1: Suggestions --}}
    <div>
        <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-2.5 mt-6"
             uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 100; repeat: true">

            {{-- Featured card (spans 2 columns) --}}
            <div class="card sm:col-span-2">
                <a href="{{ route('blog.read') }}">
                    <div class="card-media h-full">
                        <img src="https://picsum.photos/seed/blog-hero/800/500" alt="Featured Post">
                        <div class="card-overly"></div>
                    </div>
                </a>
                <div class="card-body blog-featured-body">
                    <a href="{{ route('blog.read') }}"><p class="card-text text-white/80">Jesse Steeve</p></a>
                    <a href="{{ route('blog.read') }}">
                        <h4 class="card-title text-xl mt-1.5 !text-white">Top amazing web demos and experiments in 2024 should know about</h4>
                    </a>
                    <div class="card-list-info items-center gap-4 text-white/80">
                        <div class="flex items-center gap-1.5">
                            <ion-icon name="heart-outline" class="text-lg"></ion-icon> 45
                        </div>
                        <div class="flex items-center gap-1.5">
                            <ion-icon name="chatbubble-ellipses-outline" class="text-lg"></ion-icon> 156.9K
                        </div>
                        <button type="button" class="flex ml-auto">
                            <ion-icon name="arrow-redo-outline" class="text-lg"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Regular article cards --}}
            @foreach($articles as $article)
            <div class="card">
                <a href="{{ route('blog.read') }}">
                    <div class="card-media h-36">
                        <img src="https://picsum.photos/seed/{{ $article['seed'] }}/400/250" alt="{{ $article['title'] }}">
                        <div class="card-overly"></div>
                        <span class="blog-category-badge">{{ $article['category'] }}</span>
                    </div>
                </a>
                <div class="card-body">
                    <a href="{{ route('blog.read') }}"><p class="card-text">{{ $article['author'] }}</p></a>
                    <a href="{{ route('blog.read') }}">
                        <h4 class="card-title text-sm line-clamp-2 mt-1.5">{{ $article['title'] }}</h4>
                    </a>
                    <div class="card-list-info items-center gap-4">
                        <div class="flex items-center gap-1.5">
                            <ion-icon name="heart-outline" class="text-lg"></ion-icon>
                            {{ $article['likes'] }}
                        </div>
                        <div class="flex items-center gap-1.5">
                            <ion-icon name="chatbubble-ellipses-outline" class="text-lg"></ion-icon>
                            {{ $article['comments'] }}
                        </div>
                        <button type="button" class="flex ml-auto">
                            <ion-icon name="arrow-redo-outline" class="text-lg"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="flex justify-center my-6">
            <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2">Load more...</button>
        </div>
    </div>

    {{-- Tab 2: Popular --}}
    <div>
        <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-2.5 mt-6"
             uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 100; repeat: true">

            <div class="card sm:col-span-2">
                <a href="{{ route('blog.read') }}">
                    <div class="card-media h-full">
                        <img src="https://picsum.photos/seed/blog-pop-hero/800/500" alt="Featured Post">
                        <div class="card-overly"></div>
                    </div>
                </a>
                <div class="card-body blog-featured-body">
                    <a href="{{ route('blog.read') }}"><p class="card-text text-white/80">Monroe Parker</p></a>
                    <a href="{{ route('blog.read') }}">
                        <h4 class="card-title text-xl mt-1.5 !text-white">The most popular design trends and tools developers use today</h4>
                    </a>
                    <div class="card-list-info items-center gap-4 text-white/80">
                        <div class="flex items-center gap-1.5">
                            <ion-icon name="heart-outline" class="text-lg"></ion-icon> 128
                        </div>
                        <div class="flex items-center gap-1.5">
                            <ion-icon name="chatbubble-ellipses-outline" class="text-lg"></ion-icon> 342.1K
                        </div>
                        <button type="button" class="flex ml-auto">
                            <ion-icon name="arrow-redo-outline" class="text-lg"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>

            @foreach(array_slice($articles, 0, 11) as $i => $article)
            <div class="card">
                <a href="{{ route('blog.read') }}">
                    <div class="card-media h-36">
                        <img src="https://picsum.photos/seed/blog-p{{ $i }}/400/250" alt="{{ $article['title'] }}">
                        <div class="card-overly"></div>
                        <span class="blog-category-badge">{{ $article['category'] }}</span>
                    </div>
                </a>
                <div class="card-body">
                    <a href="{{ route('blog.read') }}"><p class="card-text">{{ $article['author'] }}</p></a>
                    <a href="{{ route('blog.read') }}">
                        <h4 class="card-title text-sm line-clamp-2 mt-1.5">{{ $article['title'] }}</h4>
                    </a>
                    <div class="card-list-info items-center gap-4">
                        <div class="flex items-center gap-1.5">
                            <ion-icon name="heart-outline" class="text-lg"></ion-icon>
                            {{ $article['likes'] + 10 }}
                        </div>
                        <div class="flex items-center gap-1.5">
                            <ion-icon name="chatbubble-ellipses-outline" class="text-lg"></ion-icon>
                            {{ $article['comments'] }}
                        </div>
                        <button type="button" class="flex ml-auto">
                            <ion-icon name="arrow-redo-outline" class="text-lg"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="flex justify-center my-6">
            <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2">Load more...</button>
        </div>
    </div>

    {{-- Tab 3: My article --}}
    <div>
        <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-2.5 mt-6"
             uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 100; repeat: true">

            @foreach($articles as $article)
            <div class="card">
                <a href="{{ route('blog.read') }}">
                    <div class="card-media h-36">
                        <img src="https://picsum.photos/seed/my-{{ $article['seed'] }}/400/250" alt="{{ $article['title'] }}">
                        <div class="card-overly"></div>
                        <span class="blog-category-badge">{{ $article['category'] }}</span>
                    </div>
                </a>
                <div class="card-body">
                    <a href="{{ route('blog.read') }}"><p class="card-text">{{ $article['author'] }}</p></a>
                    <a href="{{ route('blog.read') }}">
                        <h4 class="card-title text-sm line-clamp-2 mt-1.5">{{ $article['title'] }}</h4>
                    </a>
                    <div class="card-list-info items-center gap-4">
                        <div class="flex items-center gap-1.5">
                            <ion-icon name="heart-outline" class="text-lg"></ion-icon>
                            {{ $article['likes'] }}
                        </div>
                        <div class="flex items-center gap-1.5">
                            <ion-icon name="chatbubble-ellipses-outline" class="text-lg"></ion-icon>
                            {{ $article['comments'] }}
                        </div>
                        <button type="button" class="flex ml-auto">
                            <ion-icon name="arrow-redo-outline" class="text-lg"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="flex justify-center my-6">
            <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2">Load more...</button>
        </div>
    </div>

</div>

@endsection
