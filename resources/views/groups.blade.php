@extends('layouts.app')

@section('title', 'Groups – EduConnect')
@section('description', 'Discover and join groups on EduConnect.')

@section('content')

<div class="2xl:max-w-[1220px] max-w-[1065px] mx-auto">

    <!-- Page Heading -->
    <div class="page-heading">
        <h1 class="page-title">Groups</h1>
        <nav class="nav__underline">
            <ul class="group" uk-tab uk-switcher="connect: #group-tabs; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                <li><a href="#">Suggestions</a></li>
                <li><a href="#">Popular</a></li>
                <li><a href="#">My Groups</a></li>
            </ul>
        </nav>
    </div>

    <!-- Group Tab Panels -->
    <div class="uk-switcher" id="group-tabs">

        <!-- ===== TAB 1: Suggestions – Cover + Avatar Cards ===== -->
        <div class="groups-card-grid">
            @foreach([
                ['seed' => 'gc4', 'avatar' => 4, 'name' => 'Delicious Foods',   'category' => 'Travel',     'members' => '232k'],
                ['seed' => 'gc3', 'avatar' => 3, 'name' => 'Abstract Minimal',  'category' => 'Technology', 'members' => '328k'],
                ['seed' => 'gc2', 'avatar' => 2, 'name' => 'Delicious Foods',   'category' => 'Business',   'members' => '436k'],
                ['seed' => 'gc1', 'avatar' => 2, 'name' => 'Graphic Design',    'category' => 'Design',     'members' => '420k'],
            ] as $group)
            <div class="card">
                <a href="{{ route('group.detail') }}">
                    <div class="card-media h-24">
                        <img src="https://picsum.photos/seed/{{ $group['seed'] }}/400/200" alt="{{ $group['name'] }}">
                        <div class="card-overly"></div>
                    </div>
                </a>
                <div class="card-body relative z-10">
                    <img src="https://i.pravatar.cc/40?img={{ $group['avatar'] }}" alt="{{ $group['name'] }}"
                         class="w-10 rounded-full mb-2 shadow -mt-8 relative border-2 border-white dark:border-slate-800">
                    <a href="{{ route('group.detail') }}"><h4 class="card-title">{{ $group['name'] }}</h4></a>
                    <div class="card-list-info font-normal mt-1">
                        <a href="#">{{ $group['category'] }}</a>
                        <div class="md:block hidden">·</div>
                        <div>{{ $group['members'] }} members</div>
                    </div>
                    <div class="flex gap-2">
                        <button type="button" class="button bg-primary text-white flex-1">Join</button>
                        <a href="{{ route('group.detail') }}" class="button bg-secondery dark:text-white">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- ===== TAB 2: Popular – Cover + Friend Avatars ===== -->
        <div class="groups-card-grid">
            @foreach([
                ['seed' => 'gp1', 'name' => 'Graphic Design',   'members' => '232k', 'category' => 'Education', 'friends' => 6,  'av' => [2, 3, 7]],
                ['seed' => 'gp2', 'name' => 'Delicious Foods',  'members' => '232k', 'category' => 'Education', 'friends' => 8,  'av' => [2, 3, 7]],
                ['seed' => 'gp3', 'name' => 'Delicious Foods',  'members' => '232k', 'category' => 'Education', 'friends' => 12, 'av' => [4, 3, 7]],
                ['seed' => 'gp4', 'name' => 'Abstract Minimal', 'members' => '360k', 'category' => 'Education', 'friends' => 3,  'av' => [2, 3, 7]],
            ] as $group)
            <div class="card">
                <a href="{{ route('group.detail') }}">
                    <div class="card-media h-24">
                        <img src="https://picsum.photos/seed/{{ $group['seed'] }}/400/200" alt="{{ $group['name'] }}">
                        <div class="card-overly"></div>
                    </div>
                </a>
                <div class="card-body">
                    <a href="{{ route('group.detail') }}"><h4 class="card-title">{{ $group['name'] }}</h4></a>
                    <div class="card-text">
                        <div class="card-list-info font-normal mt-1">
                            <div>{{ $group['members'] }} members</div>
                            <div class="md:block hidden">·</div>
                            <a href="#">{{ $group['category'] }}</a>
                        </div>
                        <div class="flex items-center gap-3 mt-3">
                            <div class="flex -space-x-2">
                                @foreach($group['av'] as $av)
                                <img src="https://i.pravatar.cc/24?img={{ $av }}" alt="" class="w-6 rounded-full border-2 border-white dark:border-slate-800">
                                @endforeach
                            </div>
                            <p class="card-text">{{ $group['friends'] }} friends are members</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button type="button" class="button bg-primary text-white flex-1">Join</button>
                        <a href="{{ route('group.detail') }}" class="button bg-secondery dark:text-white">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- ===== TAB 3: My Groups – Primary-soft buttons ===== -->
        <div class="groups-card-grid">
            @foreach([
                ['seed' => 'gc2', 'name' => 'Delicious Foods',   'category' => 'Health',          'members' => '42k'],
                ['seed' => 'gc1', 'name' => 'Graphic Design',    'category' => 'Health',          'members' => '42k'],
                ['seed' => 'gc3', 'name' => 'Abstract Minimal',  'category' => 'Delicious Foods', 'members' => '232k'],
                ['seed' => 'gc4', 'name' => 'Delicious Foods',   'category' => 'Travel',          'members' => '620k'],
            ] as $group)
            <div class="card">
                <a href="{{ route('group.detail') }}">
                    <div class="card-media h-24">
                        <img src="https://picsum.photos/seed/{{ $group['seed'] }}/400/200" alt="{{ $group['name'] }}">
                        <div class="card-overly"></div>
                    </div>
                </a>
                <div class="card-body">
                    <a href="{{ route('group.detail') }}"><h4 class="card-title">{{ $group['name'] }}</h4></a>
                    <div class="card-list-info font-normal mt-1">
                        <a href="#">{{ $group['category'] }}</a>
                        <div class="md:block hidden">·</div>
                        <div>{{ $group['members'] }} members</div>
                    </div>
                    <div class="flex gap-2">
                        <button type="button" class="button bg-primary-soft text-primary dark:text-white flex-1">Join</button>
                        <button type="button" class="button bg-secondery dark:text-white flex-1">Edit</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <!-- Categories Section -->
    <div class="groups-section-header">
        <div>
            <h2 class="groups-section-title">Categories</h2>
            <p class="groups-section-sub">Find a group by browsing top categories.</p>
        </div>
        <a href="#" class="text-blue-500 sm:block hidden text-sm">See all</a>
    </div>

    <div class="relative" tabindex="-1" uk-slider="finite: true">
        <div class="uk-slider-container pb-1">
            <ul class="uk-slider-items grid-small">
                @foreach([
                    ['seed' => 'cat-shop',    'label' => 'Shopping'],
                    ['seed' => 'cat-health',  'label' => 'Health'],
                    ['seed' => 'cat-science', 'label' => 'Science'],
                    ['seed' => 'cat-travel',  'label' => 'Travel'],
                    ['seed' => 'cat-biz',     'label' => 'Business'],
                    ['seed' => 'cat-food',    'label' => 'Food'],
                ] as $cat)
                <li class="md:w-1/5 sm:w-1/3 w-1/2 events-slider-item-lg">
                    <a href="#">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="https://picsum.photos/seed/{{ $cat['seed'] }}/400/250" alt="{{ $cat['label'] }}" class="h-36 w-full object-cover">
                            <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-10">
                                <div class="text-white p-5 text-lg leading-3">{{ $cat['label'] }}</div>
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

    <!-- Suggestions Section -->
    <div class="groups-section-header groups-section-header-lg">
        <div>
            <h2 class="groups-section-title">Suggestions</h2>
            <p class="groups-section-sub">Find groups you might be interested in.</p>
        </div>
        <a href="#" class="text-blue-500 sm:block hidden text-sm">See all</a>
    </div>

    <div class="grid md:grid-cols-2 gap-3">
        @foreach([
            ['seed' => 'sg4', 'name' => 'Delicious Foods',   'members' => '16K', 'posts' => 12, 'friends' => 14, 'av' => [2, 4]],
            ['seed' => 'sg3', 'name' => 'Abstract Minimal',  'members' => '18K', 'posts' => 16, 'friends' => 24, 'av' => [2, 4]],
            ['seed' => 'sg2', 'name' => 'Delicious Foods',   'members' => '19K', 'posts' => 21, 'friends' => 16, 'av' => [2, 4]],
            ['seed' => 'sg1', 'name' => 'Graphic Design',    'members' => '24K', 'posts' => 12, 'friends' => 14, 'av' => [2, 4]],
            ['seed' => 'sg5', 'name' => 'Abstract Minimal',  'members' => '18K', 'posts' => 16, 'friends' => 24, 'av' => [2, 4]],
            ['seed' => 'sg6', 'name' => 'Delicious Foods',   'members' => '16K', 'posts' => 12, 'friends' => 14, 'av' => [2, 4]],
        ] as $suggest)
        <div class="box flex md:items-center gap-4 p-4 rounded-md">
            <div class="groups-suggest-thumb flex-shrink-0 rounded-lg relative">
                <img src="https://picsum.photos/seed/{{ $suggest['seed'] }}/200/200" alt="{{ $suggest['name'] }}"
                     class="absolute w-full h-full inset-0 rounded-md object-cover shadow-sm">
            </div>
            <div class="flex-1">
                <a href="#" class="md:text-lg text-base font-semibold capitalize text-black dark:text-white">{{ $suggest['name'] }}</a>
                <div class="flex gap-2 items-center text-sm font-normal mt-0.5">
                    <div>{{ $suggest['members'] }} Members</div>
                    <div>·</div>
                    <div>{{ $suggest['posts'] }} posts a week</div>
                </div>
                <div class="flex items-center mt-2">
                    @foreach($suggest['av'] as $i => $av)
                    <img src="https://i.pravatar.cc/24?img={{ $av }}" alt="" class="w-6 rounded-full border-2 border-white dark:border-slate-800 {{ $i > 0 ? '' : '-mr-2' }}">
                    @endforeach
                    <div class="text-sm text-gray-500 dark:text-white/70 ml-2">{{ $suggest['friends'] }} friends are members</div>
                </div>
            </div>
            <button type="button" class="button bg-primary-soft text-primary dark:text-white gap-1 max-md:hidden">
                <ion-icon name="add-circle" class="text-xl -ml-1"></ion-icon> Join
            </button>
        </div>
        @endforeach
    </div>

    <div class="flex justify-center my-6">
        <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2 dark:text-white">Load more...</button>
    </div>

</div>

@endsection
