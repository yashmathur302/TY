{{-- Reusable post card. Expects: $post (Post model with user and comments loaded) --}}
<article class="post-card bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

    <header class="post-header flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
        <a href="{{ route('profile') }}">
            <img src="{{ $post->user->avatarUrl() }}" alt="{{ $post->user->name }}" class="w-9 h-9 rounded-full object-cover">
        </a>
        <div class="flex-1">
            <a href="{{ route('profile') }}">
                <h4 class="post-author text-black dark:text-white">{{ $post->user->name }}</h4>
            </a>
            <div class="post-time text-xs text-gray-500 dark:text-white/80">
                {{ $post->created_at->diffForHumans() }}
                @if($post->feeling) &nbsp;· {{ $post->feeling }} @endif
                @if($post->location) &nbsp;· 📍 {{ $post->location }} @endif
            </div>
        </div>
        <div class="post-menu -mr-1">
            <button type="button" class="button-icon w-8 h-8">
                <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon>
            </button>
            <div class="w-[245px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                <nav>
                    <a href="#"><ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add to favorites</a>
                    <a href="#"><ion-icon class="text-xl shrink-0" name="notifications-off-outline"></ion-icon> Mute Notification</a>
                    <a href="#"><ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon> Report this post</a>
                    <a href="#"><ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon> Share your profile</a>
                    <hr>
                    <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"><ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Unfollow</a>
                </nav>
            </div>
        </div>
    </header>

    @if($post->content)
    <div class="post-text sm:px-4 p-2.5 pt-0">
        <p class="font-normal">{{ $post->content }}</p>
    </div>
    @endif

    @if($post->image)
    <div class="post-image relative w-full sm:px-4 mb-3">
        <img src="{{ asset($post->image) }}" alt="" class="sm:rounded-lg w-full object-cover max-h-[520px]">
    </div>
    @endif

    @if($post->video)
    <div class="post-video relative w-full sm:px-4 mb-3">
        <video src="{{ asset($post->video) }}" controls class="sm:rounded-lg w-full max-h-[520px] bg-black"></video>
    </div>
    @endif

    <div class="post-actions sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
        <div class="post-like">
            <div class="flex items-center gap-2.5">
                <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700">
                    <ion-icon class="text-lg" name="heart-outline"></ion-icon>
                </button>
                <span>{{ number_format($post->likes_count) }}</span>
            </div>
            <div class="post-reactions p-1 px-2 bg-white rounded-full drop-shadow-md w-[212px] dark:bg-slate-700 text-2xl"
                 uk-drop="offset:10;pos: top-left; animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left">
                <div class="flex gap-2">
                    <button type="button" class="hover:scale-125 duration-300"><span>👍</span></button>
                    <button type="button" class="hover:scale-125 duration-300"><span>❤️</span></button>
                    <button type="button" class="hover:scale-125 duration-300"><span>😂</span></button>
                    <button type="button" class="hover:scale-125 duration-300"><span>😯</span></button>
                    <button type="button" class="hover:scale-125 duration-300"><span>😢</span></button>
                </div>
            </div>
        </div>
        <div class="post-comment flex items-center gap-3">
            <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700">
                <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon>
            </button>
            <span>{{ number_format($post->comments_count) }}</span>
        </div>
        <button type="button" class="button-icon ml-auto"><ion-icon class="text-xl" name="paper-plane-outline"></ion-icon></button>
        <button type="button" class="button-icon"><ion-icon class="text-xl" name="share-outline"></ion-icon></button>
    </div>

    @if(isset($post->comments) && $post->comments->count())
    <div class="post-comments sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
        @foreach($post->comments as $comment)
        <div class="comment-item flex items-start gap-3 relative">
            <img src="{{ $comment->user->avatarUrl() }}" alt="{{ $comment->user->name }}" class="w-6 h-6 mt-1 rounded-full object-cover">
            <div class="flex-1">
                <span class="text-black font-medium dark:text-white">{{ $comment->user->name }}</span>
                <p class="mt-0.5">{{ $comment->content }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <div class="post-add-comment sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
        <img src="{{ auth()->user()->avatarUrl() }}" alt="Your avatar" class="w-6 h-6 rounded-full object-cover">
        <div class="flex-1 relative overflow-hidden h-10">
            <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>
        </div>
        <button type="button" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery">Reply</button>
    </div>

</article>
