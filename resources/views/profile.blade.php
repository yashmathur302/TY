@extends('layouts.app')

@section('title', $user->name . ' – Profile')

@section('content')

@php
    $avatarUrl = $user->avatarUrl();
    $coverUrl  = $user->cover_photo ? asset('storage/' . $user->cover_photo) : null;
    $relationLabels = [
        'single'          => 'Single',
        'in_relationship' => 'In a Relationship',
        'married'         => 'Married',
        'engaged'         => 'Engaged',
    ];
@endphp

<div class="max-w-[1065px] mx-auto max-lg:-m-2.5">

    {{-- Cover Card --}}
    <div class="bg-white shadow lg:rounded-b-2xl lg:-mt-10 dark:bg-dark2">

        {{-- Cover Image --}}
        <div class="relative overflow-hidden w-full lg:h-72 h-48 @if(!$coverUrl) bg-gradient-to-br from-primary to-blue-700 @endif">
            @if($coverUrl)
            <img src="{{ $coverUrl }}" alt="Cover" class="h-full w-full object-cover inset-0">
            @endif
            <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20 z-10"></div>
            <div class="absolute bottom-0 right-0 m-4 z-20">
                <div class="flex items-center gap-3">
                    <button class="button bg-white/20 text-white flex items-center gap-2 backdrop-blur-small">Crop</button>
                    <button class="button bg-black/10 text-white flex items-center gap-2 backdrop-blur-small">Edit</button>
                </div>
            </div>
        </div>

        {{-- User Info --}}
        <div class="p-3">
            <div class="flex flex-col justify-center md:items-center lg:-mt-48 -mt-28">

                <div class="relative lg:h-48 lg:w-48 w-28 h-28 mb-4 z-10">
                    <div class="relative overflow-hidden rounded-full md:border-[6px] border-gray-100 shrink-0 dark:border-slate-900 shadow">
                        <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="h-full w-full object-cover inset-0">
                    </div>
                    <a href="{{ route('settings') }}" class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-white shadow p-1.5 rounded-full sm:flex hidden">
                        <ion-icon name="camera" class="text-2xl"></ion-icon>
                    </a>
                </div>

                <h3 class="md:text-3xl text-base font-bold text-black dark:text-white">{{ $user->name }}</h3>
                <p class="mt-2 text-gray-500 dark:text-white/80">
                    @if($user->bio)
                        {{ $user->bio }}
                    @else
                        <span class="italic text-gray-400">No bio yet.</span>
                    @endif
                    <a href="{{ route('settings') }}" class="text-blue-500 ml-4 inline-block">Edit</a>
                </p>

            </div>
        </div>

        {{-- Navigation --}}
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
                <div>
                    <button type="button" class="rounded-lg bg-secondery flex px-2.5 py-2 dark:bg-dark3">
                        <ion-icon name="ellipsis-horizontal" class="text-xl"></ion-icon>
                    </button>
                    <div class="w-[240px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click; offset:10">
                        <nav>
                            <a href="#"><ion-icon class="text-xl" name="flag-outline"></ion-icon> Report</a>
                            <a href="#"><ion-icon class="text-xl" name="share-outline"></ion-icon> Share profile</a>
                        </nav>
                    </div>
                </div>
            </div>

            <nav class="flex gap-0.5 rounded-xl -mb-px text-gray-600 font-medium text-[15px] dark:text-white max-md:w-full max-md:overflow-x-auto">
                <a href="#" class="inline-block py-3 leading-8 px-3.5 border-b-2 border-blue-600 text-blue-600">Timeline</a>
                <a href="#" class="inline-block py-3 leading-8 px-3.5">Friend <span class="text-xs pl-2 font-normal lg:inline-block hidden">{{ number_format($user->following_count) }}</span></a>
                <a href="#" class="inline-block py-3 leading-8 px-3.5">Photo</a>
                <a href="#" class="inline-block py-3 leading-8 px-3.5">Video</a>
                <a href="#" class="inline-block py-3 leading-8 px-3.5">Group</a>
            </nav>

        </div>

    </div>

    {{-- Two-Column Layout --}}
    <div class="flex 2xl:gap-12 gap-10 mt-8 max-lg:flex-col" id="js-oversized">

        {{-- Feed Column --}}
        <div class="flex-1 xl:space-y-6 space-y-3">

            {{-- Create Status Box --}}
            <div class="bg-white rounded-xl shadow-sm p-4 space-y-4 text-sm font-medium border1 dark:bg-dark2">
                <div class="flex items-center gap-3">
                    <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="w-9 h-9 rounded-full object-cover shrink-0">
                    <div class="flex-1 bg-slate-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer dark:bg-dark3" uk-toggle="target: #create-status">
                        <div class="py-2.5 text-center dark:text-white">What do you have in mind?</div>
                    </div>
                    <div class="cursor-pointer hover:bg-opacity-80 p-1 px-1.5 rounded-lg transition-all bg-pink-100/60 hover:bg-pink-100" uk-toggle="target: #create-status">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 stroke-pink-600 fill-pink-200/70" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M15 8h.01" /><path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                            <path d="M3.5 15.5l4.5 -4.5c.928 -.893 2.072 -.893 3 0l5 5" />
                            <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l2.5 2.5" />
                        </svg>
                    </div>
                    <div class="cursor-pointer hover:bg-opacity-80 p-1 px-1.5 rounded-lg transition-all bg-sky-100/60 hover:bg-sky-100" uk-toggle="target: #create-status">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 stroke-sky-600 fill-sky-200/70" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" />
                            <path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Posts --}}
            @forelse($posts as $post)
            <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                {{-- Post Header --}}
                <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                    <a href="{{ route('profile') }}">
                        <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="w-9 h-9 rounded-full object-cover">
                    </a>
                    <div class="flex-1">
                        <a href="{{ route('profile') }}"><h4 class="text-black dark:text-white">{{ $user->name }}</h4></a>
                        <div class="text-xs text-gray-500 dark:text-white/80">{{ $post->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="-mr-1">
                        <button type="button" class="button-icon w-8 h-8"><ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon></button>
                        <div class="w-[245px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                            <nav>
                                <a href="#"><ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add to favorites</a>
                                <a href="#"><ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon> Report this post</a>
                                <hr>
                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"><ion-icon class="text-xl shrink-0" name="trash-outline"></ion-icon> Delete</a>
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- Post Content --}}
                @if($post->content)
                <div class="sm:px-4 p-2.5 pt-0">
                    <p class="font-normal">{{ $post->content }}</p>
                </div>
                @endif

                {{-- Post Image --}}
                @if($post->image)
                <div class="relative w-full lg:h-96 h-full sm:px-4">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="sm:rounded-lg w-full h-full object-cover">
                </div>
                @endif

                {{-- Post Actions --}}
                <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                    <div>
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700"><ion-icon class="text-lg" name="heart-outline"></ion-icon></button>
                            <span>{{ number_format($post->likes_count) }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700"><ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon></button>
                        <span>{{ number_format($post->comments_count) }}</span>
                    </div>
                    <button type="button" class="button-icon ml-auto"><ion-icon class="text-xl" name="paper-plane-outline"></ion-icon></button>
                    <button type="button" class="button-icon"><ion-icon class="text-xl" name="share-outline"></ion-icon></button>
                </div>

                {{-- Comments --}}
                @if($post->comments->count())
                <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
                    @foreach($post->comments as $comment)
                    <div class="flex items-start gap-3 relative">
                        <a href="#">
                            <img src="{{ $comment->user->avatarUrl() }}" alt="{{ $comment->user->name }}" class="w-6 h-6 mt-1 rounded-full object-cover">
                        </a>
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white">{{ $comment->user->name }}</a>
                            <p class="mt-0.5">{{ $comment->content }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                {{-- Comment Input --}}
                <div class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                    <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="w-6 h-6 rounded-full object-cover">
                    <div class="flex-1 relative overflow-hidden h-10">
                        <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>
                    </div>
                    <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery">Reply</button>
                </div>

            </div>
            @empty
            <div class="bg-white rounded-xl shadow-sm p-8 text-center border1 dark:bg-dark2">
                <ion-icon name="camera-outline" class="text-5xl text-gray-300 dark:text-gray-600"></ion-icon>
                <p class="mt-3 text-gray-500 dark:text-white/60 font-normal">No posts yet. Share what's on your mind!</p>
            </div>
            @endforelse

        </div>

        {{-- Right Sidebar --}}
        <div class="lg:w-[400px]">
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <div>Live In <span class="font-semibold text-black dark:text-white">{{ $user->location }}</span></div>
                        </li>
                        @endif

                        @if($user->education)
                        <li class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                            </svg>
                            <div>Studied at <span class="font-semibold text-black dark:text-white">{{ $user->education }}</span></div>
                        </li>
                        @endif

                        @if($user->work)
                        <li class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                            </svg>
                            <div>Works at <span class="font-semibold text-black dark:text-white">{{ $user->work }}</span></div>
                        </li>
                        @endif

                        @if($user->relationship_status && $user->relationship_status !== 'none' && isset($relationLabels[$user->relationship_status]))
                        <li class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            <div><span class="font-semibold text-black dark:text-white">{{ $relationLabels[$user->relationship_status] }}</span></div>
                        </li>
                        @endif

                        <li class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 19.5v-.75a7.5 7.5 0 00-7.5-7.5H4.5m0-6.75h.75c7.87 0 14.25 6.38 14.25 14.25v.75M6 18.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            <div>Followed By <span class="font-semibold text-black dark:text-white">{{ number_format($user->followers_count) }} People</span></div>
                        </li>

                        @if($user->website)
                        <li class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                            </svg>
                            <div><a href="{{ $user->website }}" target="_blank" class="font-semibold text-blue-500">{{ $user->website }}</a></div>
                        </li>
                        @endif

                    </ul>

                    {{-- Social Links --}}
                    @php
                        $socials = array_filter([
                            'logo-facebook'  => $user->facebook_url,
                            'logo-instagram' => $user->instagram_url,
                            'logo-twitter'   => $user->twitter_url,
                            'logo-youtube'   => $user->youtube_url,
                            'logo-github'    => $user->github_url,
                        ]);
                    @endphp
                    @if(count($socials))
                    <div class="flex flex-wrap gap-2 mt-4">
                        @foreach($socials as $icon => $url)
                        <a href="{{ $url }}" target="_blank" class="flex items-center justify-center w-9 h-9 rounded-full bg-slate-100 dark:bg-slate-700 hover:opacity-80">
                            <ion-icon name="{{ $icon }}" class="text-lg"></ion-icon>
                        </a>
                        @endforeach
                    </div>
                    @endif

                    @if(!$user->location && !$user->education && !$user->work && !$user->bio)
                    <p class="text-sm text-gray-400 dark:text-white/40 mt-4 font-normal italic">
                        Fill in your info in <a href="{{ route('settings') }}" class="text-blue-500 not-italic">Account Settings</a>.
                    </p>
                    @endif
                </div>

                {{-- Friends Box --}}
                <div class="box p-5 px-6">
                    <div class="flex items-center justify-between text-black dark:text-white">
                        <h3 class="font-bold text-lg">Friends
                            <span class="block text-sm text-gray-500 font-normal dark:text-white">{{ number_format($user->following_count) }} Friends</span>
                        </h3>
                        <a href="#" class="text-sm text-blue-500">Find Friend</a>
                    </div>
                    <p class="text-sm text-gray-400 dark:text-white/40 mt-4 font-normal">Friends will appear here.</p>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection

@section('modals')
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
            <div>
                <button class="inline-flex items-center py-1 px-2.5 gap-1 font-medium text-sm rounded-full bg-slate-50 border-2 border-slate-100 dark:text-white dark:bg-slate-700 dark:border-slate-600" type="button">
                    Everyone
                    <ion-icon name="chevron-down-outline" class="text-base duration-500"></ion-icon>
                </button>
            </div>
            <div class="flex items-center gap-2">
                <button type="button" class="button bg-blue-500 text-white py-2 px-12 text-[14px]">Create</button>
            </div>
        </div>
    </div>
</div>
@endsection
