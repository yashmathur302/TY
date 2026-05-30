@extends('layouts.app')

@section('title', 'Friends – EduConnect')

@section('content')
<div class="max-w-[900px] mx-auto px-4 py-6 space-y-8">

    {{-- ── Friend Requests ──────────────────────────────────────────── --}}
    <section>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-black dark:text-white">
                Friend Requests
                @if($requests->count())
                <span class="ml-2 text-sm font-normal bg-blue-100 text-blue-600 dark:bg-blue-900/40 dark:text-blue-400 rounded-full px-2 py-0.5">{{ $requests->count() }}</span>
                @endif
            </h2>
        </div>

        @if($requests->isEmpty())
        <div class="bg-white dark:bg-dark2 rounded-xl p-8 text-center shadow-sm border border-gray-100 dark:border-slate-700/40">
            <ion-icon name="person-outline" class="text-5xl text-gray-300 dark:text-white/20 mb-3 block"></ion-icon>
            <p class="text-sm text-gray-500 dark:text-white/50 font-normal">No pending friend requests right now.</p>
        </div>
        @else
        <div class="grid sm:grid-cols-2 gap-3">
            @foreach($requests as $req)
            <div class="bg-white dark:bg-dark2 rounded-xl p-4 shadow-sm border border-gray-100 dark:border-slate-700/40 flex items-center gap-3">
                <img src="{{ $req->sender->avatarUrl() }}"
                     alt="{{ $req->sender->name }}"
                     class="w-14 h-14 rounded-full object-cover shrink-0">
                <div class="flex-1 min-w-0">
                    <h4 class="font-semibold text-sm text-black dark:text-white truncate">{{ $req->sender->name }}</h4>
                    <p class="text-xs text-gray-400 dark:text-white/40">&#64;{{ $req->sender->username ?? 'user' }}</p>
                    <div class="flex items-center gap-2 mt-2.5">
                        <form method="POST" action="{{ route('friends.accept', $req) }}">
                            @csrf
                            <button type="submit" class="text-xs font-semibold bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-lg transition-colors">
                                Confirm
                            </button>
                        </form>
                        <form method="POST" action="{{ route('friends.decline', $req) }}">
                            @csrf
                            <button type="submit" class="text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-gray-700 dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-white px-3 py-1.5 rounded-lg transition-colors">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </section>

    {{-- ── People You May Know ──────────────────────────────────────── --}}
    <section>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-black dark:text-white">People You May Know</h2>
        </div>

        @if($suggestions->isEmpty())
        <div class="bg-white dark:bg-dark2 rounded-xl p-8 text-center shadow-sm border border-gray-100 dark:border-slate-700/40">
            <ion-icon name="people-outline" class="text-5xl text-gray-300 dark:text-white/20 mb-3 block"></ion-icon>
            <p class="text-sm text-gray-500 dark:text-white/50 font-normal">You've connected with everyone on EduConnect!</p>
        </div>
        @else
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($suggestions as $person)
            <div class="bg-white dark:bg-dark2 rounded-xl shadow-sm border border-gray-100 dark:border-slate-700/40 overflow-hidden">
                {{-- Cover strip --}}
                <div class="h-16 bg-gradient-to-r from-blue-400 to-purple-500"></div>
                <div class="px-4 pb-4 -mt-7 text-center">
                    <img src="{{ $person->avatarUrl() }}"
                         alt="{{ $person->name }}"
                         class="w-14 h-14 rounded-full object-cover mx-auto border-2 border-white dark:border-dark2 shadow">
                    <h4 class="font-semibold text-sm text-black dark:text-white mt-2 truncate">{{ $person->name }}</h4>
                    <p class="text-xs text-gray-400 dark:text-white/40">&#64;{{ $person->username ?? 'user' }}</p>
                    @if($person->bio)
                    <p class="text-xs text-gray-500 dark:text-white/50 font-normal mt-1 line-clamp-1">{{ $person->bio }}</p>
                    @endif
                    <form method="POST" action="{{ route('friends.request', $person) }}" class="mt-3">
                        @csrf
                        <button type="submit"
                                class="w-full text-sm font-semibold bg-blue-50 hover:bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:hover:bg-blue-800/40 dark:text-blue-400 py-1.5 rounded-lg transition-colors">
                            <ion-icon name="person-add-outline" class="text-base align-middle mr-1"></ion-icon>
                            Add Friend
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </section>

</div>
@endsection
