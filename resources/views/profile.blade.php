@extends('layouts.app')

@section('title', $user->name . ' – Profile')

@section('content')

@php
    $avatarUrl = $user->avatarUrl();
    $coverUrl  = $user->coverUrl();
    $relationLabels = [
        'single'          => 'Single',
        'in_relationship' => 'In a Relationship',
        'married'         => 'Married',
        'engaged'         => 'Engaged',
    ];
@endphp

@if(session('success'))
<div class="max-w-[1065px] mx-auto mb-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-lg px-4 py-3 text-sm text-green-700 dark:text-green-400">
    {{ session('success') }}
</div>
@endif

<div class="max-w-[1065px] mx-auto max-lg:-m-2.5">

    {{-- Cover Card --}}
    <div class="bg-white shadow lg:rounded-b-2xl lg:-mt-10 dark:bg-dark2">

        {{-- Cover Image --}}
        <form method="POST" action="{{ route('settings.cover') }}" enctype="multipart/form-data" id="cover-upload-form">
            @csrf
            <div class="relative overflow-hidden w-full lg:h-72 h-48 @if(!$coverUrl) bg-gradient-to-br from-primary to-blue-700 @endif">
                @if($coverUrl)
                <img src="{{ $coverUrl }}" alt="Cover" class="h-full w-full object-cover inset-0">
                @endif
                <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20 z-10"></div>
                <div class="absolute bottom-0 right-0 m-4 z-20">
                    <label for="cover-file-profile" class="button bg-black/10 text-white flex items-center gap-2 backdrop-blur-small cursor-pointer">
                        <ion-icon name="camera-outline"></ion-icon> Edit Cover
                    </label>
                    <input id="cover-file-profile" name="cover" type="file" accept="image/*" class="hidden"
                           onchange="document.getElementById('cover-upload-form').submit()">
                </div>
            </div>
        </form>

        {{-- User Info --}}
        <div class="p-3">
            <div class="flex flex-col justify-center md:items-center lg:-mt-48 -mt-28">

                <div class="relative lg:h-48 lg:w-48 w-28 h-28 mb-4 z-10">
                    <div class="relative overflow-hidden rounded-full md:border-[6px] border-gray-100 shrink-0 dark:border-slate-900 shadow">
                        <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="h-full w-full object-cover inset-0">
                    </div>
                    <a href="{{ route('settings') }}" class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-white shadow p-1.5 rounded-full sm:flex hidden dark:bg-slate-700">
                        <ion-icon name="camera" class="text-2xl dark:text-white"></ion-icon>
                    </a>
                </div>

                <h3 class="md:text-3xl text-base font-bold text-black dark:text-white">{{ $user->name }}</h3>
                <p class="mt-2 text-gray-500 dark:text-white/80 text-center max-w-md px-4">
                    @if($user->bio) {{ $user->bio }} @else <span class="italic text-gray-400">No bio yet.</span> @endif
                    <a href="{{ route('settings') }}" class="text-blue-500 ml-2">Edit</a>
                </p>

            </div>
        </div>

        {{-- Tab Navigation --}}
        <div class="flex items-center justify-between mt-3 border-t border-gray-100 px-2 max-lg:flex-col dark:border-slate-700"
             uk-sticky="offset:50; cls-active: bg-white/80 shadow rounded-b-2xl z-50 backdrop-blur-xl dark:!bg-slate-700/80; animation:uk-animation-slide-top; media: 992">

            <div class="flex items-center gap-2 text-sm py-2 pr-1 max-md:w-full lg:order-2">
                <button class="button bg-primary flex items-center gap-2 text-white py-2 px-3.5 max-md:flex-1"
                        uk-toggle="target: #create-status">
                    <ion-icon name="add-circle" class="text-xl"></ion-icon>
                    <span class="text-sm">Add Your Story</span>
                </button>
                <button type="button" class="rounded-lg bg-secondery flex px-2.5 py-2 dark:bg-dark2">
                    <ion-icon name="search" class="text-xl"></ion-icon>
                </button>
            </div>

            <ul class="profile-tab-nav flex list-none gap-0 -mb-px max-md:w-full max-md:overflow-x-auto"
                uk-switcher="connect: #profile-tabs; animation: uk-animation-fade">
                <li class="uk-active"><a href="#">Timeline</a></li>
                <li><a href="#">Friends <span class="text-xs font-normal opacity-70">{{ number_format($user->followers_count) }}</span></a></li>
                <li><a href="#">Photos</a></li>
                <li><a href="#">Videos</a></li>
                <li><a href="#">Groups</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Blog</a></li>
            </ul>

        </div>

    </div>

    {{-- Tab Content --}}
    <ul id="profile-tabs" class="uk-switcher mt-8">

        {{-- ── Tab 1: Timeline ── --}}
        <li>
            <div class="flex 2xl:gap-12 gap-10 max-lg:flex-col" id="js-oversized">

                {{-- Posts --}}
                <div class="flex-1 xl:space-y-6 space-y-3">

                    {{-- Create Status Box --}}
                    <div class="bg-white rounded-xl shadow-sm p-4 space-y-4 text-sm font-medium border1 dark:bg-dark2">
                        <div class="flex items-center gap-3">
                            <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="w-9 h-9 rounded-full object-cover shrink-0">
                            <div class="flex-1 bg-slate-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer dark:bg-dark3" uk-toggle="target: #create-status">
                                <div class="py-2.5 text-center dark:text-white">What do you have in mind?</div>
                            </div>
                        </div>
                    </div>

                    @forelse($posts as $post)
                    <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">
                        <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                            <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="w-9 h-9 rounded-full object-cover">
                            <div class="flex-1">
                                <h4 class="text-black dark:text-white">{{ $user->name }}</h4>
                                <div class="text-xs text-gray-500 dark:text-white/80">{{ $post->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        @if($post->content)
                        <div class="sm:px-4 p-2.5 pt-0"><p class="font-normal">{{ $post->content }}</p></div>
                        @endif
                        @if($post->image)
                        <div class="relative w-full lg:h-96 h-full sm:px-4">
                            <img src="{{ asset($post->image) }}" alt="" class="sm:rounded-lg w-full h-full object-cover">
                        </div>
                        @endif
                        <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                            <div class="flex items-center gap-2.5">
                                <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700"><ion-icon class="text-lg" name="heart-outline"></ion-icon></button>
                                <span>{{ number_format($post->likes_count) }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700"><ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon></button>
                                <span>{{ number_format($post->comments_count) }}</span>
                            </div>
                            <button type="button" class="button-icon ml-auto"><ion-icon class="text-xl" name="share-outline"></ion-icon></button>
                        </div>
                        @if($post->comments->count())
                        <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 dark:border-slate-700/40">
                            @foreach($post->comments as $comment)
                            <div class="flex items-start gap-3">
                                <img src="{{ $comment->user->avatarUrl() }}" class="w-6 h-6 mt-1 rounded-full object-cover" alt="">
                                <div class="flex-1">
                                    <span class="text-black font-medium dark:text-white">{{ $comment->user->name }}</span>
                                    <p class="mt-0.5">{{ $comment->content }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                            <img src="{{ $avatarUrl }}" class="w-6 h-6 rounded-full object-cover" alt="">
                            <div class="flex-1 relative overflow-hidden h-10">
                                <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>
                            </div>
                            <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery">Reply</button>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-xl shadow-sm p-10 text-center border1 dark:bg-dark2">
                        <ion-icon name="camera-outline" class="text-5xl text-gray-300 dark:text-gray-600"></ion-icon>
                        <p class="mt-3 text-gray-500 dark:text-white/60 font-normal">No posts yet. Share what's on your mind!</p>
                    </div>
                    @endforelse
                </div>

                {{-- Sidebar --}}
                <div class="lg:w-[380px]">
                    <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6"
                         uk-sticky="media: 1024; end: #js-oversized; offset: 80">

                        {{-- Intro Box --}}
                        <div class="box p-5 px-6">
                            <div class="flex items-center justify-between text-black dark:text-white">
                                <h3 class="font-bold text-lg">Intro</h3>
                                <a href="{{ route('settings') }}" class="text-sm text-blue-500">Edit</a>
                            </div>
                            <ul class="text-gray-700 space-y-4 mt-4 text-sm dark:text-white/80">
                                @if($user->location)
                                <li class="flex items-center gap-3">
                                    <ion-icon name="location-outline" class="text-xl shrink-0"></ion-icon>
                                    <span>Lives in <strong class="text-black dark:text-white">{{ $user->location }}</strong></span>
                                </li>
                                @endif
                                @if($user->education)
                                <li class="flex items-center gap-3">
                                    <ion-icon name="school-outline" class="text-xl shrink-0"></ion-icon>
                                    <span>Studied at <strong class="text-black dark:text-white">{{ $user->education }}</strong></span>
                                </li>
                                @endif
                                @if($user->work)
                                <li class="flex items-center gap-3">
                                    <ion-icon name="briefcase-outline" class="text-xl shrink-0"></ion-icon>
                                    <span>Works at <strong class="text-black dark:text-white">{{ $user->work }}</strong></span>
                                </li>
                                @endif
                                @if($user->relationship_status && $user->relationship_status !== 'none' && isset($relationLabels[$user->relationship_status]))
                                <li class="flex items-center gap-3">
                                    <ion-icon name="heart-outline" class="text-xl shrink-0"></ion-icon>
                                    <strong class="text-black dark:text-white">{{ $relationLabels[$user->relationship_status] }}</strong>
                                </li>
                                @endif
                                <li class="flex items-center gap-3">
                                    <ion-icon name="people-outline" class="text-xl shrink-0"></ion-icon>
                                    <span>Followed by <strong class="text-black dark:text-white">{{ number_format($user->followers_count) }}</strong> people</span>
                                </li>
                                @if($user->website)
                                <li class="flex items-center gap-3">
                                    <ion-icon name="link-outline" class="text-xl shrink-0"></ion-icon>
                                    <a href="{{ $user->website }}" target="_blank" class="text-blue-500 font-semibold truncate">{{ $user->website }}</a>
                                </li>
                                @endif
                            </ul>
                            @if(!$user->location && !$user->education && !$user->work)
                            <p class="text-sm text-gray-400 mt-4 font-normal italic">
                                <a href="{{ route('settings') }}" class="text-blue-500 not-italic">Complete your profile</a> to show your info here.
                            </p>
                            @endif
                            @php $socials = array_filter(['logo-facebook'=>$user->facebook_url,'logo-instagram'=>$user->instagram_url,'logo-twitter'=>$user->twitter_url,'logo-youtube'=>$user->youtube_url,'logo-github'=>$user->github_url]); @endphp
                            @if(count($socials))
                            <div class="flex flex-wrap gap-2 mt-4">
                                @foreach($socials as $icon => $url)
                                <a href="{{ $url }}" target="_blank" class="flex items-center justify-center w-9 h-9 rounded-full bg-slate-100 dark:bg-slate-700 hover:opacity-80">
                                    <ion-icon name="{{ $icon }}" class="text-lg"></ion-icon>
                                </a>
                                @endforeach
                            </div>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </li>

        {{-- ── Tab 2: Friends ── --}}
        <li>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($followers as $person)
                <div class="box p-4 flex items-center gap-3">
                    <img src="{{ $person->avatarUrl() }}" class="w-12 h-12 rounded-full object-cover shrink-0" alt="{{ $person->name }}">
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-black dark:text-white truncate">{{ $person->name }}</h4>
                        <p class="text-xs text-gray-500 dark:text-white/60 truncate">&#64;{{ $person->username }}</p>
                    </div>
                    <button class="button bg-primary-soft text-primary text-xs px-3 py-1.5 dark:text-white shrink-0">Follow</button>
                </div>
                @empty
                <div class="col-span-3 py-16 text-center text-gray-400 dark:text-white/40">
                    <ion-icon name="people-outline" class="text-5xl"></ion-icon>
                    <p class="mt-3 font-normal">No followers yet.</p>
                </div>
                @endforelse
            </div>
        </li>

        {{-- ── Tab 3: Photos ── --}}
        <li>
            <div class="xl:space-y-6 space-y-4">

                {{-- Action bar --}}
                <div class="flex items-center gap-3 flex-wrap">
                    <button uk-toggle="target: #create-album-modal"
                            class="button bg-primary text-white flex items-center gap-2">
                        <ion-icon name="folder-open-outline" class="text-lg"></ion-icon> Create Album
                    </button>
                </div>

                {{-- Albums --}}
                @if($albums->count())
                <div class="box p-5">
                    <h3 class="font-bold text-lg text-black dark:text-white mb-4">Albums
                        <span class="text-sm font-normal text-gray-500 dark:text-white/60 ml-2">{{ $albums->count() }}</span>
                    </h3>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($albums as $album)
                        <div class="rounded-xl overflow-hidden border border-gray-100 dark:border-slate-700">

                            {{-- Album cover (first 4 photos grid) --}}
                            <div class="relative h-40 bg-slate-100 dark:bg-slate-700 overflow-hidden">
                                @if($album->photos->count())
                                <div class="grid grid-cols-2 w-full h-full">
                                    @foreach($album->photos->take(4) as $p)
                                    <div class="overflow-hidden {{ $album->photos->count() === 1 ? 'col-span-2 row-span-2' : '' }}">
                                        <img src="{{ $p->url() }}" class="w-full h-full object-cover" alt="">
                                    </div>
                                    @endforeach
                                </div>
                                @elseif($album->coverUrl())
                                <img src="{{ $album->coverUrl() }}" class="w-full h-full object-cover" alt="">
                                @else
                                <div class="flex items-center justify-center h-full">
                                    <ion-icon name="images-outline" class="text-4xl text-gray-300 dark:text-gray-600"></ion-icon>
                                </div>
                                @endif
                            </div>

                            {{-- Album info + actions --}}
                            <div class="p-3">
                                <div class="flex items-center justify-between gap-2">
                                    <div class="min-w-0">
                                        <h4 class="font-semibold text-black dark:text-white text-sm truncate">{{ $album->name }}</h4>
                                        <p class="text-xs text-gray-500 dark:text-white/60 mt-0.5">{{ $album->photos_count }} photos</p>
                                    </div>
                                    <div class="flex gap-1 shrink-0">
                                        {{-- Upload photo --}}
                                        <form method="POST" action="{{ route('albums.upload', $album) }}"
                                              enctype="multipart/form-data" id="upload-album-{{ $album->id }}">
                                            @csrf
                                            <label for="photos-{{ $album->id }}"
                                                   class="button-icon text-primary bg-primary/10 cursor-pointer"
                                                   title="Upload photos">
                                                <ion-icon name="cloud-upload-outline" class="text-base"></ion-icon>
                                            </label>
                                            <input id="photos-{{ $album->id }}" name="photos[]" type="file"
                                                   accept="image/*" multiple class="hidden"
                                                   onchange="document.getElementById('upload-album-{{ $album->id }}').submit()">
                                        </form>
                                        {{-- Rename --}}
                                        <button class="button-icon text-slate-500 dark:text-white/60 rename-album-btn"
                                                data-album-id="{{ $album->id }}"
                                                data-album-name="{{ $album->name }}"
                                                title="Rename">
                                            <ion-icon name="pencil-outline" class="text-base"></ion-icon>
                                        </button>
                                        {{-- Delete --}}
                                        <form method="POST" action="{{ route('albums.destroy', $album) }}"
                                              onsubmit="return confirm('Delete this album and all its photos?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="button-icon text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20" title="Delete">
                                                <ion-icon name="trash-outline" class="text-base"></ion-icon>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Expanded photos (show all in album) --}}
                            @if($album->photos->count() > 4)
                            <div class="px-3 pb-3">
                                <button uk-toggle="target: #album-photos-{{ $album->id }}"
                                        class="text-xs text-blue-500 hover:underline">
                                    View all {{ $album->photos_count }} photos
                                </button>
                                <div id="album-photos-{{ $album->id }}" hidden class="grid grid-cols-3 gap-1 mt-2">
                                    @foreach($album->photos as $p)
                                    <div class="aspect-square overflow-hidden rounded">
                                        <img src="{{ $p->url() }}" class="w-full h-full object-cover" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Standalone post photos --}}
                @if($photos->count())
                <div class="box p-5">
                    <h3 class="font-bold text-lg text-black dark:text-white mb-4">Photos from Posts</h3>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        @foreach($photos as $post)
                        <div class="relative aspect-square rounded-xl overflow-hidden bg-slate-100 dark:bg-dark2">
                            <img src="{{ asset($post->image) }}" alt="" class="w-full h-full object-cover">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(!$albums->count() && !$photos->count())
                <div class="py-16 text-center text-gray-400 dark:text-white/40">
                    <ion-icon name="images-outline" class="text-5xl"></ion-icon>
                    <p class="mt-3 font-normal">No photos yet. Create an album to get started.</p>
                </div>
                @endif

            </div>
        </li>

        {{-- ── Tab 4: Videos ── --}}
        <li>
            @if($videos->count())
            <div class="grid sm:grid-cols-2 gap-4">
                @foreach($videos as $post)
                <div class="box rounded-xl overflow-hidden">
                    <video src="{{ asset($post->video) }}" controls class="w-full"></video>
                    @if($post->content)<p class="p-3 text-sm font-normal dark:text-white">{{ $post->content }}</p>@endif
                </div>
                @endforeach
            </div>
            @else
            <div class="py-16 text-center text-gray-400 dark:text-white/40">
                <ion-icon name="videocam-outline" class="text-5xl"></ion-icon>
                <p class="mt-3 font-normal">No videos posted yet.</p>
            </div>
            @endif
        </li>

        {{-- ── Tab 5: Groups ── --}}
        <li>
            <div class="xl:space-y-6 space-y-4">

                <div class="flex items-center gap-3">
                    <button uk-toggle="target: #create-group-modal"
                            class="button bg-primary text-white flex items-center gap-2">
                        <ion-icon name="people-outline" class="text-lg"></ion-icon> Create Group
                    </button>
                </div>

                {{-- Your Groups --}}
                <div class="box p-5">
                    <h3 class="font-bold text-lg text-black dark:text-white mb-4">Your Groups
                        <span class="text-sm font-normal text-gray-500 dark:text-white/60 ml-2">{{ $myGroups->count() }}</span>
                    </h3>
                    @if($myGroups->count())
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($myGroups as $group)
                        <a href="{{ route('group.detail') }}" class="block rounded-xl overflow-hidden border border-gray-100 dark:border-slate-700 hover:shadow-md transition-shadow">
                            <div class="h-28 bg-gradient-to-br from-primary to-blue-700 overflow-hidden">
                                @if($group->coverUrl())
                                <img src="{{ $group->coverUrl() }}" class="w-full h-full object-cover" alt="{{ $group->name }}">
                                @endif
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-black dark:text-white text-sm truncate">{{ $group->name }}</h4>
                                <p class="text-xs text-gray-500 dark:text-white/60 mt-0.5">{{ number_format($group->members_count) }} members · <span class="capitalize">{{ $group->privacy }}</span></p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-400 dark:text-white/40 font-normal text-sm py-6 text-center">You haven't created any groups yet.</p>
                    @endif
                </div>

                {{-- Groups Joined --}}
                <div class="box p-5">
                    <h3 class="font-bold text-lg text-black dark:text-white mb-4">Groups Joined
                        <span class="text-sm font-normal text-gray-500 dark:text-white/60 ml-2">{{ $joinedGroups->count() }}</span>
                    </h3>
                    @if($joinedGroups->count())
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($joinedGroups as $group)
                        <a href="{{ route('group.detail') }}" class="block rounded-xl overflow-hidden border border-gray-100 dark:border-slate-700 hover:shadow-md transition-shadow">
                            <div class="h-28 bg-gradient-to-br from-violet-500 to-purple-700 overflow-hidden">
                                @if($group->coverUrl())
                                <img src="{{ $group->coverUrl() }}" class="w-full h-full object-cover" alt="{{ $group->name }}">
                                @endif
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-black dark:text-white text-sm truncate">{{ $group->name }}</h4>
                                <p class="text-xs text-gray-500 dark:text-white/60 mt-0.5">{{ number_format($group->members_count) }} members</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-400 dark:text-white/40 font-normal text-sm py-6 text-center">You haven't joined any groups yet.</p>
                    @endif
                </div>

            </div>
        </li>

        {{-- ── Tab 6: Events ── --}}
        <li>
            <div class="xl:space-y-6 space-y-4">

                <div class="flex items-center gap-3">
                    <button uk-toggle="target: #create-event-modal"
                            class="button bg-primary text-white flex items-center gap-2">
                        <ion-icon name="calendar-outline" class="text-lg"></ion-icon> Create Event
                    </button>
                </div>

                {{-- Your Events --}}
                <div class="box p-5">
                    <h3 class="font-bold text-lg text-black dark:text-white mb-4">Your Events
                        <span class="text-sm font-normal text-gray-500 dark:text-white/60 ml-2">{{ $myEvents->count() }}</span>
                    </h3>
                    @if($myEvents->count())
                    <div class="grid sm:grid-cols-2 gap-4">
                        @foreach($myEvents as $event)
                        <a href="{{ route('event.detail') }}" class="flex gap-3 p-3 rounded-xl border border-gray-100 dark:border-slate-700 hover:shadow-md transition-shadow">
                            <div class="w-16 h-16 rounded-lg overflow-hidden bg-gradient-to-br from-primary to-blue-700 shrink-0">
                                @if($event->coverUrl())
                                <img src="{{ $event->coverUrl() }}" class="w-full h-full object-cover" alt="">
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-black dark:text-white text-sm truncate">{{ $event->title }}</h4>
                                <p class="text-xs text-primary mt-0.5">{{ $event->start_date->format('M d, Y') }}</p>
                                @if($event->location)<p class="text-xs text-gray-500 dark:text-white/60 mt-0.5 truncate">{{ $event->location }}</p>@endif
                                <p class="text-xs text-gray-500 dark:text-white/60 mt-0.5">{{ number_format($event->going_count) }} going · {{ number_format($event->interested_count) }} interested</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-400 dark:text-white/40 font-normal text-sm py-6 text-center">You haven't created any events yet.</p>
                    @endif
                </div>

                {{-- Other Events (Attending / Interested) --}}
                <div class="box p-5">
                    <h3 class="font-bold text-lg text-black dark:text-white mb-4">Events You're Attending
                        <span class="text-sm font-normal text-gray-500 dark:text-white/60 ml-2">{{ $otherEvents->count() }}</span>
                    </h3>
                    @if($otherEvents->count())
                    <div class="grid sm:grid-cols-2 gap-4">
                        @foreach($otherEvents as $event)
                        <a href="{{ route('event.detail') }}" class="flex gap-3 p-3 rounded-xl border border-gray-100 dark:border-slate-700 hover:shadow-md transition-shadow">
                            <div class="w-16 h-16 rounded-lg overflow-hidden bg-gradient-to-br from-orange-400 to-red-500 shrink-0">
                                @if($event->coverUrl())
                                <img src="{{ $event->coverUrl() }}" class="w-full h-full object-cover" alt="">
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-black dark:text-white text-sm truncate">{{ $event->title }}</h4>
                                <p class="text-xs text-primary mt-0.5">{{ $event->start_date->format('M d, Y') }}</p>
                                @if($event->location)<p class="text-xs text-gray-500 dark:text-white/60 truncate">{{ $event->location }}</p>@endif
                                <span class="inline-block mt-1 text-xs px-2 py-0.5 rounded-full {{ $event->pivot->status === 'going' ? 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400' : 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-400' }}">
                                    {{ ucfirst($event->pivot->status) }}
                                </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-400 dark:text-white/40 font-normal text-sm py-6 text-center">You're not attending any events yet.</p>
                    @endif
                </div>

            </div>
        </li>

        {{-- ── Tab 7: Blog ── --}}
        <li>
            <div class="xl:space-y-6 space-y-4">

                <div class="flex items-center gap-3">
                    <button uk-toggle="target: #create-blog-modal"
                            class="button bg-primary text-white flex items-center gap-2">
                        <ion-icon name="create-outline" class="text-lg"></ion-icon> Write Blog Post
                    </button>
                </div>

                {{-- Your Blog Posts --}}
                <div class="box p-5">
                    <h3 class="font-bold text-lg text-black dark:text-white mb-4">Your Blog Posts
                        <span class="text-sm font-normal text-gray-500 dark:text-white/60 ml-2">{{ $myBlogs->count() }}</span>
                    </h3>
                    @if($myBlogs->count())
                    <div class="grid sm:grid-cols-2 gap-4">
                        @foreach($myBlogs as $blog)
                        <a href="{{ route('blog.read') }}" class="block rounded-xl overflow-hidden border border-gray-100 dark:border-slate-700 hover:shadow-md transition-shadow">
                            <div class="h-36 bg-gradient-to-br from-teal-400 to-cyan-600 overflow-hidden">
                                @if($blog->coverUrl())
                                <img src="{{ $blog->coverUrl() }}" class="w-full h-full object-cover" alt="{{ $blog->title }}">
                                @endif
                            </div>
                            <div class="p-3">
                                @if($blog->category)
                                <span class="text-xs text-primary font-semibold uppercase tracking-wide">{{ $blog->category }}</span>
                                @endif
                                <h4 class="font-semibold text-black dark:text-white text-sm mt-1 line-clamp-2">{{ $blog->title }}</h4>
                                <p class="text-xs text-gray-500 dark:text-white/60 mt-1">{{ $blog->views_count }} views · {{ $blog->likes_count }} likes · {{ $blog->created_at->format('M d, Y') }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-400 dark:text-white/40 font-normal text-sm py-6 text-center">You haven't written any blog posts yet.</p>
                    @endif
                </div>

            </div>
        </li>

    </ul>

</div>

@endsection

@section('modals')

{{-- Restore active tab after redirect --}}
@if(session('profile_tab'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    var nav = document.querySelector('.profile-tab-nav');
    if (nav) UIkit.switcher(nav).show({{ session('profile_tab') }});
});
</script>
@endif

{{-- Album rename script --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.rename-album-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var id   = this.dataset.albumId;
            var name = this.dataset.albumName;
            document.getElementById('rename-album-form').action = '/albums/' + id;
            document.getElementById('rename-album-name').value  = name;
            UIkit.modal('#rename-album-modal').show();
        });
    });
});
</script>

{{-- Create Status --}}
<div class="hidden lg:p-20 uk-open" id="create-status" uk-modal="">
    <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">
        <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Create Status</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="space-y-5 mt-3 p-2">
            <textarea class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800" rows="6" placeholder="What do you have in mind?"></textarea>
        </div>
        <div class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
            <button type="button" class="flex items-center gap-1.5 bg-sky-50 text-sky-600 rounded-full py-1 px-2 border-2 border-sky-100 dark:bg-sky-950 dark:border-sky-900">
                <ion-icon name="image" class="text-base"></ion-icon> Image
            </button>
            <button type="button" class="flex items-center gap-1.5 bg-teal-50 text-teal-600 rounded-full py-1 px-2 border-2 border-teal-100 dark:bg-teal-950 dark:border-teal-900">
                <ion-icon name="videocam" class="text-base"></ion-icon> Video
            </button>
            <button type="button" class="flex items-center gap-1.5 bg-orange-50 text-orange-600 rounded-full py-1 px-2 border-2 border-orange-100 dark:bg-yellow-950 dark:border-yellow-900">
                <ion-icon name="happy" class="text-base"></ion-icon> Feeling
            </button>
            <button type="button" class="flex items-center gap-1.5 bg-red-50 text-red-600 rounded-full py-1 px-2 border-2 border-rose-100 dark:bg-rose-950 dark:border-rose-900">
                <ion-icon name="location" class="text-base"></ion-icon> Check in
            </button>
        </div>
        <div class="p-5 flex justify-between items-center">
            <button class="inline-flex items-center py-1 px-2.5 gap-1 font-medium text-sm rounded-full bg-slate-50 border-2 border-slate-100 dark:text-white dark:bg-slate-700 dark:border-slate-600" type="button">
                Everyone <ion-icon name="chevron-down-outline" class="text-base duration-500"></ion-icon>
            </button>
            <button type="button" class="button bg-blue-500 text-white py-2 px-12 text-[14px]">Create</button>
        </div>
    </div>
</div>

{{-- Create Album Modal --}}
<div class="hidden lg:p-20" id="create-album-modal" uk-modal="">
    <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[420px] w-full dark:bg-dark2">
        <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Create Album</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ route('albums.store') }}" class="p-5 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Album Name</label>
                <input type="text" name="name" required placeholder="My Album" class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white">
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" class="button bg-slate-100 dark:bg-slate-700 dark:text-white uk-modal-close">Cancel</button>
                <button type="submit" class="button bg-blue-500 text-white">Create</button>
            </div>
        </form>
    </div>
</div>

{{-- Rename Album Modal --}}
<div class="hidden lg:p-20" id="rename-album-modal" uk-modal="">
    <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[420px] w-full dark:bg-dark2">
        <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Rename Album</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form method="POST" action="" id="rename-album-form" class="p-5 space-y-4">
            @csrf
            @method('PATCH')
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">New Name</label>
                <input type="text" name="name" id="rename-album-name" required class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white">
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" class="button bg-slate-100 dark:bg-slate-700 dark:text-white uk-modal-close">Cancel</button>
                <button type="submit" class="button bg-blue-500 text-white">Rename</button>
            </div>
        </form>
    </div>
</div>

{{-- Create Group Modal --}}
<div class="hidden lg:p-20" id="create-group-modal" uk-modal="">
    <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">
        <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Create Group</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ route('groups.store') }}" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Group Name</label>
                <input type="text" name="name" required placeholder="Group name" class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                <textarea name="description" rows="3" placeholder="What is this group about?" class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Privacy</label>
                <select name="privacy" class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white">
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cover Photo</label>
                <input type="file" name="cover" accept="image/*" class="w-full text-sm text-gray-500">
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" class="button bg-slate-100 dark:bg-slate-700 dark:text-white uk-modal-close">Cancel</button>
                <button type="submit" class="button bg-blue-500 text-white">Create Group</button>
            </div>
        </form>
    </div>
</div>

{{-- Create Event Modal --}}
<div class="hidden lg:p-20" id="create-event-modal" uk-modal="">
    <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">
        <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Create Event</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Event Title</label>
                <input type="text" name="title" required placeholder="Event title" class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                <textarea name="description" rows="3" placeholder="Event details..." class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Location</label>
                <input type="text" name="location" placeholder="City, Venue..." class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white">
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Start Date &amp; Time</label>
                    <input type="datetime-local" name="start_date" required class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">End Date &amp; Time</label>
                    <input type="datetime-local" name="end_date" class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cover Photo</label>
                <input type="file" name="cover" accept="image/*" class="w-full text-sm text-gray-500">
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" class="button bg-slate-100 dark:bg-slate-700 dark:text-white uk-modal-close">Cancel</button>
                <button type="submit" class="button bg-blue-500 text-white">Create Event</button>
            </div>
        </form>
    </div>
</div>

{{-- Create Blog Post Modal --}}
<div class="hidden lg:p-20" id="create-blog-modal" uk-modal="">
    <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[620px] w-full dark:bg-dark2">
        <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Write Blog Post</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
                <input type="text" name="title" required placeholder="Post title" class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
                <input type="text" name="category" placeholder="Technology, Travel, Food..." class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cover Image</label>
                <input type="file" name="cover" accept="image/*" class="w-full text-sm text-gray-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Content</label>
                <textarea name="content" rows="6" required placeholder="Write your blog post..." class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" class="button bg-slate-100 dark:bg-slate-700 dark:text-white uk-modal-close">Cancel</button>
                <button type="submit" class="button bg-blue-500 text-white">Publish</button>
            </div>
        </form>
    </div>
</div>

@endsection
