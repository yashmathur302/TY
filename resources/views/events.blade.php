@extends('layouts.app')

@section('title', 'Events – EduConnect')
@section('description', 'Discover and join events on EduConnect.')

@section('content')

<div class="2xl:max-w-[1220px] max-w-[1065px] mx-auto">

    <!-- Page Heading -->
    <div class="page-heading">
        <h1 class="page-title">Events</h1>
        <nav class="nav__underline">
            <ul uk-tab class="group" uk-switcher="connect: #event-tabs; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                <li><a href="#">Suggestions</a></li>
                <li><a href="#">Popular</a></li>
                <li><a href="#">My Events</a></li>
            </ul>
        </nav>
    </div>

    <!-- Tab Content -->
    <ul id="event-tabs" class="uk-switcher">

        <!-- ===== TAB 1: Suggestions ===== -->
        <li class="events-tab-content">

            <!-- Featured Events Slider -->
            <div class="events-section-gap">
            <div class="relative" tabindex="-1" uk-slider="finite: true">
                <div class="uk-slider-container pb-1">
                    <ul class="uk-slider-items grid-small"
                        uk-scrollspy="target: > li; cls: uk-animation-scale-up; delay: 30; repeat: true">

                        @foreach([
                            ['seed'=>'ev1',  'label'=>'Next week',  'label_color'=>'text-blue-500',   'title'=>'About Safety and Flight', 'location'=>'Dubai',  'interested'=>26, 'going'=>8],
                            ['seed'=>'ev2',  'label'=>'Opening',    'label_color'=>'text-teal-500',   'title'=>'Wedding Trend Ideas',     'location'=>'Turkey', 'interested'=>20, 'going'=>16],
                            ['seed'=>'ev3',  'label'=>'WED JUL 10, 2024 AT 10PM', 'label_color'=>'text-red-500', 'title'=>'The Global Creative', 'location'=>'Japan', 'interested'=>15, 'going'=>2],
                            ['seed'=>'ev4',  'label'=>'Opening',    'label_color'=>'text-teal-500',   'title'=>'Perspective is Everything','location'=>'London','interested'=>20, 'going'=>16],
                            ['seed'=>'ev5',  'label'=>'Next week',  'label_color'=>'text-blue-500',   'title'=>'About Safety and Flight', 'location'=>'Dubai',  'interested'=>26, 'going'=>8],
                        ] as $event)
                        <li class="lg:w-1/4 sm:w-1/3 w-1/2 events-slider-item-lg">
                            <div class="card">
                                <a href="{{ route('event.detail') }}">
                                    <div class="card-media h-32">
                                        <img src="{{ 'https://picsum.photos/seed/' . $event['seed'] . '/400/200' }}" alt="{{ $event['title'] }}">
                                        <div class="card-overly"></div>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <p class="text-xs font-semibold {{ $event['label_color'] }} mb-1">{{ $event['label'] }}</p>
                                    <a href="{{ route('event.detail') }}"><h4 class="card-title text-sm">{{ $event['title'] }}</h4></a>
                                    <p class="card-text mt-1">{{ $event['location'] }}</p>
                                    <div class="card-list-info mt-1">
                                        <div>{{ $event['interested'] }} Interested</div>
                                        <div class="hidden md:block">·</div>
                                        <div>{{ $event['going'] }} Going</div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button type="button" class="button bg-primary text-white flex-1">Interested</button>
                                        <button type="button" class="button bg-secondery !w-auto">
                                            <ion-icon name="arrow-redo" class="text-lg"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
                <a class="nav-prev !top-20" href="#" uk-slider-item="previous"><ion-icon name="chevron-back" class="text-2xl"></ion-icon></a>
                <a class="nav-next !top-20" href="#" uk-slider-item="next"><ion-icon name="chevron-forward" class="text-2xl"></ion-icon></a>
            </div>
            </div>{{-- end featured slider wrapper --}}

            <!-- Lists You May Like -->
            <div class="flex items-center justify-between events-section-header">
                <div>
                    <h2 class="text-xl font-semibold events-section-heading">Lists You May Like</h2>
                    <p class="font-normal text-sm leading-6 mt-1 events-section-sub">Find a group by browsing top categories.</p>
                </div>
                <a href="#" class="text-blue-500 text-sm">See all</a>
            </div>

            <div class="events-section-gap">
            <div class="relative" tabindex="-1" uk-slider="finite: true">
                <div class="uk-slider-container pb-1">
                    <ul class="uk-slider-items grid-small">

                        @foreach([
                            ['seed'=>'list1', 'city'=>'Miami',   'type'=>'Hotels'],
                            ['seed'=>'list2', 'city'=>'Florida', 'type'=>'Hotels'],
                            ['seed'=>'list3', 'city'=>'London',  'type'=>'Hotels'],
                            ['seed'=>'list4', 'city'=>'Dubai',   'type'=>'Hotels'],
                            ['seed'=>'list5', 'city'=>'Turkey',  'type'=>'Restaurant'],
                            ['seed'=>'list6', 'city'=>'Tokyo',   'type'=>'Hotels'],
                        ] as $listing)
                        <li class="md:w-1/5 sm:w-1/3 w-1/2 events-slider-item-lg">
                            <a href="#">
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="{{ 'https://picsum.photos/seed/' . $listing['seed'] . '/300/150' }}" alt="{{ $listing['city'] }}" class="h-36 w-full object-cover">
                                    <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-10">
                                        <div class="text-white p-5">
                                            <div class="text-sm font-light">{{ $listing['city'] }}</div>
                                            <div class="text-lg leading-3 mt-1.5">{{ $listing['type'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div>
                <a class="nav-prev" href="#" uk-slider-item="previous"><ion-icon name="chevron-back" class="text-2xl"></ion-icon></a>
                <a class="nav-next" href="#" uk-slider-item="next"><ion-icon name="chevron-forward" class="text-2xl"></ion-icon></a>
            </div>
            </div>{{-- end listing slider wrapper --}}

            <!-- Upcoming Events -->
            <div class="flex items-center justify-between py-3 events-section-heading">
                <h3 class="text-xl font-semibold">Upcoming Events</h3>
                <a href="#" class="text-sm text-blue-500">See all</a>
            </div>

            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 mt-4 pb-8 events-grid">

                @foreach([
                    ['seed'=>'up1', 'label'=>'WED JUL 10, 2024 AT 10PM', 'label_color'=>'text-red-500',  'title'=>'The Global Creative',      'location'=>'Japan',  'interested'=>15, 'going'=>2],
                    ['seed'=>'up2', 'label'=>'Opening',                   'label_color'=>'text-teal-500', 'title'=>'Wedding Trend Ideas',       'location'=>'Turkey', 'interested'=>20, 'going'=>16],
                    ['seed'=>'up3', 'label'=>'WED JUL 10, 2024 AT 10PM', 'label_color'=>'text-red-500',  'title'=>'About Safety and Flight',   'location'=>'Dubai',  'interested'=>26, 'going'=>8],
                    ['seed'=>'up4', 'label'=>'Opening',                   'label_color'=>'text-teal-500', 'title'=>'Perspective is Everything', 'location'=>'London', 'interested'=>20, 'going'=>16],
                    ['seed'=>'up5', 'label'=>'Next week',                 'label_color'=>'text-blue-500', 'title'=>'Global Tech Summit 2024',   'location'=>'Berlin', 'interested'=>34, 'going'=>12],
                    ['seed'=>'up6', 'label'=>'Opening',                   'label_color'=>'text-teal-500', 'title'=>'Art & Design Expo',         'location'=>'Paris',  'interested'=>18, 'going'=>7],
                    ['seed'=>'up7', 'label'=>'Next week',                 'label_color'=>'text-blue-500', 'title'=>'Music Festival Live',       'location'=>'NYC',    'interested'=>55, 'going'=>30],
                    ['seed'=>'up8', 'label'=>'WED AUG 5, 2024 AT 8PM',   'label_color'=>'text-red-500',  'title'=>'Business Leadership Forum',  'location'=>'Singapore','interested'=>40, 'going'=>22],
                ] as $upcoming)
                <div class="card">
                    <a href="{{ route('event.detail') }}">
                        <div class="card-media h-32">
                            <img src="{{ 'https://picsum.photos/seed/' . $upcoming['seed'] . '/400/200' }}" alt="{{ $upcoming['title'] }}">
                            <div class="card-overly"></div>
                        </div>
                    </a>
                    <div class="card-body">
                        <p class="text-xs font-semibold {{ $upcoming['label_color'] }} mb-1">{{ $upcoming['label'] }}</p>
                        <a href="{{ route('event.detail') }}"><h4 class="card-title text-sm">{{ $upcoming['title'] }}</h4></a>
                        <p class="card-text mt-1">{{ $upcoming['location'] }}</p>
                        <div class="card-list-info mt-1">
                            <div>{{ $upcoming['interested'] }} Interested</div>
                            <div class="hidden md:block">·</div>
                            <div>{{ $upcoming['going'] }} Going</div>
                        </div>
                        <div class="flex gap-2">
                            <button type="button" class="button bg-primary text-white flex-1">Interested</button>
                            <button type="button" class="button bg-secondery !w-auto">
                                <ion-icon name="arrow-redo" class="text-lg"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </li>

        <!-- ===== TAB 2: Popular ===== -->
        <li>
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 py-4 pb-8 events-grid">
                @foreach([
                    ['seed'=>'pop1', 'label'=>'Trending',  'label_color'=>'text-pink-500',  'title'=>'Street Food Festival',   'location'=>'Bangkok',    'interested'=>120, 'going'=>65],
                    ['seed'=>'pop2', 'label'=>'Hot',       'label_color'=>'text-red-500',   'title'=>'Startup Pitch Night',    'location'=>'San Francisco','interested'=>88,  'going'=>40],
                    ['seed'=>'pop3', 'label'=>'Trending',  'label_color'=>'text-pink-500',  'title'=>'Photography Workshop',   'location'=>'Amsterdam',  'interested'=>75,  'going'=>28],
                    ['seed'=>'pop4', 'label'=>'Hot',       'label_color'=>'text-red-500',   'title'=>'Jazz Night Downtown',    'location'=>'New Orleans','interested'=>95,  'going'=>50],
                    ['seed'=>'pop5', 'label'=>'Trending',  'label_color'=>'text-pink-500',  'title'=>'Film Industry Meetup',   'location'=>'Los Angeles','interested'=>62,  'going'=>33],
                    ['seed'=>'pop6', 'label'=>'Hot',       'label_color'=>'text-red-500',   'title'=>'Yoga & Wellness Retreat','location'=>'Bali',       'interested'=>110, 'going'=>72],
                    ['seed'=>'pop7', 'label'=>'Trending',  'label_color'=>'text-pink-500',  'title'=>'E-Sports Championship',  'location'=>'Seoul',      'interested'=>200, 'going'=>150],
                    ['seed'=>'pop8', 'label'=>'Hot',       'label_color'=>'text-red-500',   'title'=>'International Book Fair','location'=>'Frankfurt',  'interested'=>45,  'going'=>20],
                ] as $popular)
                <div class="card">
                    <a href="{{ route('event.detail') }}">
                        <div class="card-media h-32">
                            <img src="{{ 'https://picsum.photos/seed/' . $popular['seed'] . '/400/200' }}" alt="{{ $popular['title'] }}">
                            <div class="card-overly"></div>
                        </div>
                    </a>
                    <div class="card-body">
                        <p class="text-xs font-semibold {{ $popular['label_color'] }} mb-1">{{ $popular['label'] }}</p>
                        <a href="{{ route('event.detail') }}"><h4 class="card-title text-sm">{{ $popular['title'] }}</h4></a>
                        <p class="card-text mt-1">{{ $popular['location'] }}</p>
                        <div class="card-list-info mt-1">
                            <div>{{ $popular['interested'] }} Interested</div>
                            <div class="hidden md:block">·</div>
                            <div>{{ $popular['going'] }} Going</div>
                        </div>
                        <div class="flex gap-2">
                            <button type="button" class="button bg-primary text-white flex-1">Interested</button>
                            <button type="button" class="button bg-secondery !w-auto">
                                <ion-icon name="arrow-redo" class="text-lg"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </li>

        <!-- ===== TAB 3: My Events ===== -->
        <li>
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 py-4 pb-8 events-grid">
                @foreach([
                    ['seed'=>'my1', 'label'=>'You\'re Going',  'label_color'=>'text-green-500', 'title'=>'Web Dev Bootcamp',          'location'=>'Online',   'interested'=>30, 'going'=>18],
                    ['seed'=>'my2', 'label'=>'You\'re Hosting','label_color'=>'text-purple-500','title'=>'EduConnect Meetup 2024',    'location'=>'Mumbai',   'interested'=>55, 'going'=>40],
                    ['seed'=>'my3', 'label'=>'Interested',     'label_color'=>'text-blue-500',  'title'=>'Laravel Conference India',  'location'=>'Delhi',    'interested'=>80, 'going'=>35],
                    ['seed'=>'my4', 'label'=>'You\'re Going',  'label_color'=>'text-green-500', 'title'=>'Teachers Leadership Summit','location'=>'Chennai',  'interested'=>42, 'going'=>28],
                ] as $mine)
                <div class="card">
                    <a href="{{ route('event.detail') }}">
                        <div class="card-media h-32">
                            <img src="{{ 'https://picsum.photos/seed/' . $mine['seed'] . '/400/200' }}" alt="{{ $mine['title'] }}">
                            <div class="card-overly"></div>
                        </div>
                    </a>
                    <div class="card-body">
                        <p class="text-xs font-semibold {{ $mine['label_color'] }} mb-1">{{ $mine['label'] }}</p>
                        <a href="{{ route('event.detail') }}"><h4 class="card-title text-sm">{{ $mine['title'] }}</h4></a>
                        <p class="card-text mt-1">{{ $mine['location'] }}</p>
                        <div class="card-list-info mt-1">
                            <div>{{ $mine['interested'] }} Interested</div>
                            <div class="hidden md:block">·</div>
                            <div>{{ $mine['going'] }} Going</div>
                        </div>
                        <div class="flex gap-2">
                            <button type="button" class="button bg-primary text-white flex-1">Interested</button>
                            <button type="button" class="button bg-secondery !w-auto">
                                <ion-icon name="arrow-redo" class="text-lg"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </li>

    </ul>

</div>

@endsection
