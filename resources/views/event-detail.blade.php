@extends('layouts.app')

@section('title', $event->title . ' – EduConnect')
@section('description', 'View event details, discussions and invite friends on EduConnect.')

@section('content')

<div class="2xl:max-w-[1220px] max-w-[1065px] mx-auto">

    <!-- Event Cover Card -->
    <div class="bg-white shadow lg:rounded-b-2xl lg:-mt-10 dark:bg-dark2">

        <!-- Cover Image -->
        <div class="relative overflow-hidden lg:h-72 h-36 w-full">
            <img src="{{ $event->coverUrl() ?? 'https://picsum.photos/seed/evcover1/1200/400' }}" alt="Event Cover" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 pt-10 z-10"></div>
            <div class="absolute bottom-0 right-0 m-4 z-20">
                <div class="flex items-center gap-3">
                    <button type="button" class="button bg-white/20 text-white">Crop</button>
                    <button type="button" class="button bg-black/10 text-white">Edit</button>
                </div>
            </div>
        </div>

        <!-- Event Meta -->
        <div class="lg:px-10 md:p-5 p-3">
            <div class="flex flex-col justify-center md:-mt-20 -mt-12">

                <!-- Date Badge -->
                <div class="event-date-badge z-10 mb-5">
                    <div class="event-date-badge-top"></div>
                    <div class="event-date-badge-day">{{ $event->start_date->format('d') }}</div>
                </div>

                <!-- Title + Countdown Row -->
                <div class="flex lg:items-center justify-between max-lg:flex-col max-lg:gap-2">

                    <div class="flex-1">
                        <p class="text-sm font-semibold text-rose-600 mb-1.5">{{ strtoupper($event->start_date->format('j M \A\T H:i')) }}@if($event->end_date) – {{ strtoupper($event->end_date->format('j M \A\T H:i')) }}@endif</p>
                        <h3 class="md:text-2xl text-base font-bold text-black dark:text-white">{{ $event->title }}</h3>
                        <p class="font-normal text-gray-500 mt-2 flex gap-2 dark:text-white/80">
                            <span>Free</span>
                            <span>•</span>
                            <span>{{ $event->location ?? 'Online event' }}</span>
                        </p>
                    </div>

                    <!-- Countdown Timer -->
                    <div uk-countdown="date: {{ $event->start_date->toIso8601String() }}"
                         class="flex gap-3 text-2xl font-semibold text-primary dark:text-white max-lg:justify-center">
                        <div class="event-countdown-box">
                            <span class="uk-countdown-days"></span>
                            <span class="event-countdown-label">Days</span>
                        </div>
                        <div class="event-countdown-box">
                            <span class="uk-countdown-hours"></span>
                            <span class="event-countdown-label">Hours</span>
                        </div>
                        <div class="event-countdown-box">
                            <span class="uk-countdown-minutes"></span>
                            <span class="event-countdown-label">Min</span>
                        </div>
                        <div class="event-countdown-box">
                            <span class="uk-countdown-seconds"></span>
                            <span class="event-countdown-label">Sec</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="flex items-center justify-between px-2 max-md:flex-col">

            <div class="flex items-center gap-2 text-sm py-2 pr-1 lg:order-1">
                <button type="button" class="button bg-secondery flex items-center gap-2 py-2 px-3.5 dark:bg-dark3">
                    <ion-icon name="star-outline" class="text-xl"></ion-icon>
                    <span class="text-sm">Go Now</span>
                </button>
                <button type="button" class="button bg-secondery flex items-center gap-2 py-2 px-3.5 dark:bg-dark3">
                    <ion-icon name="checkmark-circle-outline" class="text-xl"></ion-icon>
                    <span class="text-sm">Going</span>
                </button>
                <button type="button" class="rounded-lg bg-secondery flex px-2.5 py-2 dark:bg-dark3 dark:text-white">
                    <ion-icon name="arrow-redo-outline" class="text-xl"></ion-icon>
                </button>
                <div>
                    <button type="button" class="rounded-lg bg-secondery flex px-2.5 py-2 dark:bg-dark3 dark:text-white">
                        <ion-icon name="ellipsis-horizontal" class="text-xl"></ion-icon>
                    </button>
                    <div class="w-[240px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click; offset:10">
                        <nav>
                            <a href="#"><ion-icon class="text-xl" name="bookmark-outline"></ion-icon> Save</a>
                            <a href="#"><ion-icon class="text-xl" name="flag-outline"></ion-icon> Add to page</a>
                            <a href="#"><ion-icon class="text-xl" name="calendar-number-outline"></ion-icon> Add to calendar</a>
                            <a href="#"><ion-icon class="text-xl" name="share-outline"></ion-icon> Share profile</a>
                            <a href="#"><ion-icon class="text-xl" name="information-circle-outline"></ion-icon> Report Event</a>
                        </nav>
                    </div>
                </div>
            </div>

            <nav class="flex gap-0.5 rounded-xl -mb-px text-gray-500 font-medium text-sm overflow-x-auto dark:text-white/80">
                <a href="#" class="inline-block py-3 leading-8 px-3.5 border-b-2 border-blue-600 text-blue-600">About</a>
                <a href="#" class="inline-block py-3 leading-8 px-3.5">Discussion</a>
            </nav>

        </div>

    </div>

    <!-- Two Column Layout -->
    <div class="flex 2xl:gap-12 gap-10 mt-8 max-lg:flex-col" id="js-oversized">

        <!-- Left Column -->
        <div class="flex-1 space-y-4">

            <!-- About -->
            <div class="box p-5 px-6">
                <h3 class="font-semibold text-lg text-black dark:text-white">About</h3>
                <div class="space-y-4 leading-7 tracking-wide mt-4 text-sm text-black dark:text-white">
                    <p>{{ $event->description ?? 'No description provided.' }}</p>
                </div>
            </div>

            <!-- Discussions -->
            <div class="box p-5 px-6">
                <h3 class="font-semibold text-lg text-black dark:text-white">Discussions</h3>

                <div class="text-sm font-normal space-y-4 mt-4">

                    @foreach([
                        ['img' => '3',  'name' => 'Monroe Parker', 'comment' => 'What a beautiful photo! I love it. 😍'],
                        ['img' => '2',  'name' => 'John Michael',  'comment' => 'You captured the moment. 😎'],
                        ['img' => '5',  'name' => 'James Lewis',   'comment' => 'What a beautiful photo! I love it. 😍'],
                        ['img' => '14', 'name' => 'Martin Gray',   'comment' => 'You captured the moment. 😎'],
                    ] as $item)
                    <div class="flex items-start gap-3">
                        <img src="https://i.pravatar.cc/32?img={{ $item['img'] }}" alt="{{ $item['name'] }}" class="w-6 h-6 mt-1 rounded-full shrink-0">
                        <div class="flex-1">
                            <span class="text-black font-medium dark:text-white">{{ $item['name'] }}</span>
                            <p class="mt-0.5 dark:text-white/80">{{ $item['comment'] }}</p>
                        </div>
                    </div>
                    @endforeach

                    <button type="button" class="flex items-center gap-1.5 text-blue-500 my-5">
                        <ion-icon name="chevron-down-outline"></ion-icon>
                        More Comments
                    </button>

                </div>

                <!-- Add Comment -->
                <div class="event-comment-bar">
                    <img src="https://i.pravatar.cc/32?img=7" alt="" class="w-6 h-6 rounded-full shrink-0">
                    <div class="flex-1 relative overflow-hidden h-10">
                        <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent dark:text-white dark:placeholder-white/50"></textarea>
                    </div>
                    <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery dark:text-white shrink-0">Reply</button>
                </div>

            </div>

        </div>

        <!-- Right Sidebar -->
        <div class="lg:w-[400px]">
            <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6"
                 uk-sticky="media: 1024; end: #js-oversized; offset: 80">

                <!-- Status -->
                <div class="box p-5 px-6">
                    <h3 class="font-semibold text-lg text-black dark:text-white">Status</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm mt-4">
                        <div class="flex gap-3">
                            <div class="p-2 inline-flex rounded-full bg-rose-50 self-center">
                                <ion-icon name="heart" class="text-2xl text-rose-600"></ion-icon>
                            </div>
                            <div>
                                <h4 class="sm:text-xl sm:font-semibold mt-1 text-black dark:text-white text-base font-normal">162</h4>
                                <p class="dark:text-white/70">Interested</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="p-2 inline-flex rounded-full bg-rose-50 self-center">
                                <ion-icon name="leaf-outline" class="text-2xl text-rose-600"></ion-icon>
                            </div>
                            <div>
                                <h4 class="sm:text-xl sm:font-semibold mt-1 text-black dark:text-white text-base font-normal">58</h4>
                                <p class="dark:text-white/70">Going</p>
                            </div>
                        </div>
                    </div>
                    <ul class="mt-6 space-y-4 text-gray-600 text-sm dark:text-white/80">
                        <li class="flex items-center gap-3">
                            <ion-icon name="people-outline" class="text-xl shrink-0"></ion-icon>
                            <div><span class="font-semibold text-black dark:text-white">3,240</span> friends</div>
                        </li>
                        <li class="flex items-center gap-3">
                            <ion-icon name="briefcase-outline" class="text-xl shrink-0"></ion-icon>
                            <div>on EduConnect since <span class="font-semibold text-black dark:text-white">2014</span></div>
                        </li>
                    </ul>
                </div>

                <!-- Invite Friends -->
                <div class="box p-5 px-6">
                    <div class="flex items-baseline justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base">Invite friends</h3>
                        <a href="#" class="text-sm text-blue-500">See all</a>
                    </div>
                    <div class="side-list">
                        @foreach([
                            ['img' => '3',  'name' => 'Monroe Parker', 'location' => 'Turkey'],
                            ['img' => '14', 'name' => 'Martin Gray',   'location' => 'Dubai'],
                            ['img' => '5',  'name' => 'James Lewis',   'location' => 'London'],
                        ] as $friend)
                        <div class="side-list-item">
                            <img src="https://i.pravatar.cc/40?img={{ $friend['img'] }}" alt="{{ $friend['name'] }}" class="side-list-image rounded-full">
                            <div class="flex-1">
                                <h4 class="side-list-title">{{ $friend['name'] }}</h4>
                                <div class="side-list-info">{{ $friend['location'] }}</div>
                            </div>
                            <button type="button" class="button bg-secondery dark:text-white">Invite</button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Created By -->
                <div class="box p-5 px-6 space-y-4">
                    <h3 class="font-bold text-base text-black dark:text-white">Created by</h3>
                    <div class="side-list-item">
                        <img src="https://i.pravatar.cc/40?img=9" alt="Maria Gray" class="side-list-image rounded-full">
                        <div class="flex-1">
                            <h4 class="side-list-title">Maria Gray</h4>
                            <div class="side-list-info">Turkey</div>
                        </div>
                        <a href="#" class="button bg-secondery rounded-full dark:text-white">Profile</a>
                    </div>
                    <ul class="space-y-4 text-gray-600 text-sm dark:text-white/80">
                        <li class="flex items-center gap-3">
                            <ion-icon name="people-outline" class="text-xl shrink-0"></ion-icon>
                            <div><span class="font-semibold text-black dark:text-white">3,240</span> friends</div>
                        </li>
                        <li class="flex items-center gap-3">
                            <ion-icon name="briefcase-outline" class="text-xl shrink-0"></ion-icon>
                            <div>on EduConnect since <span class="font-semibold text-black dark:text-white">2014</span></div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
