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

        <!-- ===== TAB 3: My Groups ===== -->
        <div class="groups-card-grid">
            @forelse($myGroups as $group)
            <div class="card">
                <a href="{{ route('groups.show', $group) }}">
                    <div class="card-media h-24">
                        @if($group->coverUrl())
                        <img src="{{ $group->coverUrl() }}" alt="{{ $group->name }}">
                        @else
                        <div class="w-full h-full bg-gradient-to-br from-primary to-blue-700"></div>
                        @endif
                        <div class="card-overly"></div>
                    </div>
                </a>
                <div class="card-body">
                    <a href="{{ route('groups.show', $group) }}"><h4 class="card-title">{{ $group->name }}</h4></a>
                    <div class="card-list-info font-normal mt-1">
                        <span class="capitalize">{{ $group->privacy }}</span>
                        <div class="md:block hidden">·</div>
                        <div>{{ number_format($group->members_count) }} members</div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('groups.show', $group) }}" class="button bg-primary text-white flex-1">View</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-gray-400 dark:text-white/40">
                <ion-icon name="people-outline" class="text-4xl mb-2"></ion-icon>
                <p>You haven't created any groups yet.</p>
            </div>
            @endforelse
        </div>

    </div>

</div>

@endsection
