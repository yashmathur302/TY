@extends('layouts.app')

@section('title', 'Pages – EduConnect')
@section('description', 'Discover and follow pages on EduConnect.')

@section('content')

<div class="flex max-lg:flex-col 2xl:gap-12 gap-10 2xl:max-w-[1220px] max-w-[1065px] mx-auto" id="js-oversized">

    <!-- Left Column -->
    <div class="flex-1">
        <div class="max-w-[680px] w-full mx-auto">

            <!-- Page Heading -->
            <div class="page-heading">
                <h1 class="page-title">Pages</h1>
                <nav class="nav__underline">
                    <ul class="group" uk-switcher="connect: #page-tabs; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                        <li><a href="#">Suggestions</a></li>
                        <li><a href="#">Popular</a></li>
                        <li><a href="#">My Pages</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Featured Pages Slider -->
            <div tabindex="-1" uk-slider="finite: true">
                <div class="uk-slider-container pb-1">
                    <ul class="uk-slider-items grid-small">

                        @foreach([
                            ['img' => 1,  'country' => 'Japan',    'name' => 'Jesse Steeve'],
                            ['img' => 2,  'country' => 'Turkey',   'name' => 'John Michael'],
                            ['img' => 3,  'country' => 'Dubai',    'name' => 'Monroe Parker'],
                            ['img' => 14, 'country' => 'London',   'name' => 'Martin Gray'],
                            ['img' => 6,  'country' => 'Sydney',   'name' => 'Alexa Stella'],
                        ] as $featured)
                        <li class="lg:w-1/4 sm:w-1/3 w-1/2">
                            <div class="card uk-transition-toggle">
                                <a href="#">
                                    <div class="card-media sm:aspect-[2/1.9] h-40">
                                        <img src="https://i.pravatar.cc/400?img={{ $featured['img'] }}" alt="{{ $featured['name'] }}">
                                        <div class="card-overly"></div>
                                    </div>
                                </a>
                                <div class="card-body p-3 w-full z-10 absolute bg-gradient-to-t bottom-0 from-black/60">
                                    <p class="card-text text-xs text-white/80">{{ $featured['country'] }}</p>
                                    <a href="#"><h4 class="card-title text-sm mt-0.5 !text-white">{{ $featured['name'] }}</h4></a>
                                </div>
                                <button type="button" class="uk-transition-fade absolute top-0 right-0 m-2 z-10 bg-black/20 rounded-full flex p-1">
                                    <ion-icon name="close" class="text-white"></ion-icon>
                                </button>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
                <a class="nav-prev" href="#" uk-slider-item="previous"><ion-icon name="chevron-back" class="text-2xl"></ion-icon></a>
                <a class="nav-next" href="#" uk-slider-item="next"><ion-icon name="chevron-forward" class="text-2xl"></ion-icon></a>
            </div>

            <!-- Tab Panels -->
            <div id="page-tabs" class="uk-switcher mt-10">

                <!-- ===== TAB 1: Suggestions – Portrait Cards ===== -->
                <div class="grid sm:grid-cols-3 grid-cols-2 gap-3"
                     uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100; repeat: true">

                    @foreach([
                        ['img' => 3,  'name' => 'Monroe Parker', 'following' => '125k'],
                        ['img' => 14, 'name' => 'Martin Gray',   'following' => '320k'],
                        ['img' => 5,  'name' => 'James Lewis',   'following' => '192k'],
                        ['img' => 6,  'name' => 'Alexa Stella',  'following' => '89k'],
                        ['img' => 2,  'name' => 'John Michael',  'following' => '260k'],
                        ['img' => 7,  'name' => 'Sarah Connor',  'following' => '145k'],
                        ['img' => 8,  'name' => 'Emma Wilson',   'following' => '320k'],
                        ['img' => 9,  'name' => 'Maria Gray',    'following' => '320k'],
                        ['img' => 10, 'name' => 'David Park',    'following' => '192k'],
                    ] as $page)
                    <div class="card">
                        <a href="#">
                            <div class="card-media sm:aspect-[2/1.7] h-40">
                                <img src="https://i.pravatar.cc/400?img={{ $page['img'] }}" alt="{{ $page['name'] }}">
                                <div class="card-overly"></div>
                            </div>
                        </a>
                        <div class="card-body">
                            <a href="#"><h4 class="card-title">{{ $page['name'] }}</h4></a>
                            <p class="card-text">{{ $page['following'] }} Following</p>
                            <button type="button" class="button bg-primary text-white">Follow</button>
                        </div>
                    </div>
                    @endforeach

                    <div class="flex justify-center my-6 lg:col-span-3 col-span-2">
                        <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2 dark:text-white">Load more...</button>
                    </div>

                </div>

                <!-- ===== TAB 2: Popular – Horizontal Cards ===== -->
                <div class="grid sm:grid-cols-2 gap-3"
                     uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100; repeat: true">

                    @foreach([
                        ['img' => 1,  'name' => 'Jesse Steeve',  'following' => '162k'],
                        ['img' => 2,  'name' => 'John Michael',  'following' => '260k'],
                        ['img' => 3,  'name' => 'Monroe Parker', 'following' => '125k'],
                        ['img' => 14, 'name' => 'Martin Gray',   'following' => '320k'],
                        ['img' => 5,  'name' => 'James Lewis',   'following' => '192k'],
                        ['img' => 6,  'name' => 'Alexa Stella',  'following' => '89k'],
                        ['img' => 7,  'name' => 'Sarah Connor',  'following' => '145k'],
                        ['img' => 8,  'name' => 'Emma Wilson',   'following' => '210k'],
                    ] as $popular)
                    <div class="card flex space-x-5 p-5">
                        <a href="#">
                            <div class="card-media w-16 h-16 shrink-0 rounded-full">
                                <img src="https://i.pravatar.cc/80?img={{ $popular['img'] }}" alt="{{ $popular['name'] }}">
                                <div class="card-overly"></div>
                            </div>
                        </a>
                        <div class="card-body flex-1 p-0">
                            <a href="#"><h4 class="card-title">{{ $popular['name'] }}</h4></a>
                            <p class="card-text">{{ $popular['following'] }} Following</p>
                            <div class="flex gap-1 mt-1">
                                <button type="button" class="button bg-primary-soft text-primary dark:text-white flex items-center gap-1">
                                    <ion-icon name="thumbs-up" class="text-base"></ion-icon>
                                    Liked
                                </button>
                                <button type="button" class="button bg-primary-soft text-primary dark:text-white flex items-center gap-1">
                                    <ion-icon name="chatbubble-ellipses" class="text-base"></ion-icon>
                                    Message
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="flex justify-center my-6 sm:col-span-2">
                        <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2 dark:text-white">Load more...</button>
                    </div>

                </div>

                <!-- ===== TAB 3: My Pages – Cover + Avatar Cards ===== -->
                <div class="grid sm:grid-cols-3 grid-cols-2 gap-3"
                     uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100; repeat: true">

                    @foreach([
                        ['seed' => 'pg1', 'img' => 1,  'name' => 'Jesse Steeve',  'following' => '125k'],
                        ['seed' => 'pg2', 'img' => 2,  'name' => 'John Michael',  'following' => '260k'],
                        ['seed' => 'pg3', 'img' => 3,  'name' => 'Monroe Parker', 'following' => '125k'],
                        ['seed' => 'pg4', 'img' => 14, 'name' => 'Martin Gray',   'following' => '320k'],
                        ['seed' => 'pg5', 'img' => 5,  'name' => 'James Lewis',   'following' => '192k'],
                        ['seed' => 'pg6', 'img' => 6,  'name' => 'Alexa Stella',  'following' => '89k'],
                        ['seed' => 'pg7', 'img' => 3,  'name' => 'Monroe Parker', 'following' => '125k'],
                        ['seed' => 'pg8', 'img' => 2,  'name' => 'John Michael',  'following' => '260k'],
                        ['seed' => 'pg9', 'img' => 7,  'name' => 'Sarah Connor',  'following' => '145k'],
                    ] as $mine)
                    <div class="card">
                        <div class="card-media sm:h-24 h-16">
                            <img src="https://picsum.photos/seed/{{ $mine['seed'] }}/400/200" alt="{{ $mine['name'] }}">
                            <div class="card-overly"></div>
                        </div>
                        <div class="card-body relative z-10">
                            <img src="https://i.pravatar.cc/48?img={{ $mine['img'] }}" alt="{{ $mine['name'] }}"
                                 class="w-10 rounded-full sm:mb-2 mb-1 shadow -mt-8 relative border-2 border-white">
                            <h4 class="card-title">{{ $mine['name'] }}</h4>
                            <p class="card-text">{{ $mine['following'] }} Following</p>
                            <div class="flex gap-2">
                                <button type="button" class="button bg-primary text-white flex-1">Join</button>
                                <button type="button" class="button bg-secondery !w-auto dark:text-white">View</button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="flex justify-center my-6 lg:col-span-3 col-span-2">
                        <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2 dark:text-white">Load more...</button>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="2xl:w-[380px] lg:w-[330px] w-full">
        <div class="lg:space-y-6 space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6"
             uk-sticky="media: 1024; end: #js-oversized; offset: 80">

            <!-- Pages You Manage -->
            <div class="box p-5 px-6">
                <div class="flex items-baseline justify-between">
                    <h3 class="font-bold text-base text-black dark:text-white">Pages You Manage</h3>
                    <a href="#" class="text-sm text-blue-500">See all</a>
                </div>
                <div class="side-list">
                    @foreach([
                        ['img' => 2,  'name' => 'John Michael',  'updated' => '2 days ago'],
                        ['img' => 14, 'name' => 'Martin Gray',   'updated' => '4 days ago'],
                        ['img' => 3,  'name' => 'Monroe Parker', 'updated' => '1 week ago'],
                        ['img' => 1,  'name' => 'Jesse Steeve',  'updated' => '2 months ago'],
                    ] as $managed)
                    <div class="side-list-item">
                        <img src="https://i.pravatar.cc/40?img={{ $managed['img'] }}" alt="{{ $managed['name'] }}" class="side-list-image rounded-full">
                        <div class="flex-1">
                            <h4 class="side-list-title">{{ $managed['name'] }}</h4>
                            <div class="side-list-info">Updated {{ $managed['updated'] }}</div>
                        </div>
                        <button type="button" class="button bg-secondery dark:text-white">Edit</button>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Liked Pages -->
            <div class="box p-5 px-6">
                <div class="flex items-baseline justify-between">
                    <h3 class="font-bold text-base text-black dark:text-white">Liked Pages</h3>
                    <a href="#" class="text-sm text-blue-500">See all</a>
                </div>
                <div class="side-list">
                    @foreach([
                        ['img' => 2,  'name' => 'John Michael',  'updated' => '6 days ago'],
                        ['img' => 14, 'name' => 'Martin Gray',   'updated' => '2 months ago'],
                        ['img' => 3,  'name' => 'Monroe Parker', 'updated' => '1 week ago'],
                        ['img' => 1,  'name' => 'Jesse Steeve',  'updated' => '2 days ago'],
                    ] as $liked)
                    <div class="side-list-item">
                        <img src="https://i.pravatar.cc/40?img={{ $liked['img'] }}" alt="{{ $liked['name'] }}" class="side-list-image rounded-full">
                        <div class="flex-1">
                            <h4 class="side-list-title">{{ $liked['name'] }}</h4>
                            <div class="side-list-info">Updated {{ $liked['updated'] }}</div>
                        </div>
                        <button type="button" class="button bg-primary-soft text-primary dark:text-white">Like</button>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="bg-secondery w-full text-black py-1.5 font-medium px-3.5 rounded-md text-sm mt-3 dark:text-white">See all</button>
            </div>

            <!-- Suggested Pages -->
            <div class="box p-5 px-6">
                <div class="flex items-baseline justify-between">
                    <h3 class="font-bold text-base text-black dark:text-white">Suggested Pages</h3>
                    <a href="#" class="text-sm text-blue-500">See all</a>
                </div>
                <div class="side-list">
                    @foreach([
                        ['img' => 2,  'name' => 'John Michael',  'updated' => '1 week ago'],
                        ['img' => 14, 'name' => 'Martin Gray',   'updated' => '4 weeks ago'],
                        ['img' => 3,  'name' => 'Monroe Parker', 'updated' => '2 months ago'],
                    ] as $suggested)
                    <div class="side-list-item">
                        <img src="https://i.pravatar.cc/40?img={{ $suggested['img'] }}" alt="{{ $suggested['name'] }}" class="side-list-image rounded-full">
                        <div class="flex-1">
                            <h4 class="side-list-title">{{ $suggested['name'] }}</h4>
                            <div class="side-list-info">Updated {{ $suggested['updated'] }}</div>
                        </div>
                        <button type="button" class="button bg-primary text-white">Like</button>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
