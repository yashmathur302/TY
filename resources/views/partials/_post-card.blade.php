{{-- Reusable post card. Expects: $post (Post with user, comments.user, comments.replies.user loaded) --}}
@php
    $isLiked  = $post->is_liked  ?? false;
    $isShared = $post->is_shared ?? false;
    $csrf     = csrf_token();
@endphp

<article class="post-card bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2" id="post-{{ $post->id }}">

    {{-- Header --}}
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
                    <hr>
                    <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                        <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Unfollow
                    </a>
                </nav>
            </div>
        </div>
    </header>

    {{-- Content --}}
    @if($post->content)
    <div class="post-text sm:px-4 p-2.5 pt-0">
        <p class="font-normal leading-relaxed">{{ $post->content }}</p>
    </div>
    @endif

    {{-- Image --}}
    @if($post->image)
    <div class="post-image w-full sm:px-4 mb-2">
        <img src="{{ asset($post->image) }}" alt="" class="sm:rounded-lg w-full object-cover max-h-[520px]">
    </div>
    @endif

    {{-- Video --}}
    @if($post->video)
    <div class="post-video w-full sm:px-4 mb-2">
        <video src="{{ asset($post->video) }}" controls class="sm:rounded-lg w-full max-h-[520px] bg-black rounded-lg"></video>
    </div>
    @endif

    {{-- Actions: Like | Comment | Share — ALL LEFT --}}
    <div class="post-actions sm:px-4 px-2.5 py-3 flex items-center gap-5 text-sm font-semibold border-t border-gray-100 dark:border-slate-700/40">

        {{-- Like --}}
        <button type="button"
                class="post-like-btn flex items-center gap-1.5 {{ $isLiked ? 'text-red-500' : 'text-gray-500 dark:text-white/60' }} hover:text-red-500 transition-colors"
                data-post-id="{{ $post->id }}"
                data-liked="{{ $isLiked ? 'true' : 'false' }}"
                onclick="handleLike(this)">
            <ion-icon class="text-xl" name="{{ $isLiked ? 'heart' : 'heart-outline' }}"></ion-icon>
            @if($post->likes_count > 0)
            <span class="like-count" id="like-count-{{ $post->id }}">{{ number_format($post->likes_count) }}</span>
            @else
            <span class="like-count hidden" id="like-count-{{ $post->id }}">0</span>
            @endif
        </button>

        {{-- Likers list trigger (only if count > 0) --}}
        @if($post->likes_count > 0)
        <button type="button"
                class="text-xs text-blue-500 hover:underline -ml-3"
                onclick="showUsersList('{{ $post->id }}', 'likers', 'People who liked')">
            <ion-icon name="people-outline" class="text-sm"></ion-icon>
        </button>
        @endif

        {{-- Comment toggle --}}
        <button type="button"
                class="flex items-center gap-1.5 text-gray-500 dark:text-white/60 hover:text-blue-500 transition-colors"
                onclick="toggleCommentBox({{ $post->id }})">
            <ion-icon class="text-xl" name="chatbubble-outline"></ion-icon>
            @if($post->comments_count > 0)
            <span>{{ number_format($post->comments_count) }}</span>
            @endif
        </button>

        {{-- Share --}}
        <button type="button"
                class="post-share-btn flex items-center gap-1.5 {{ $isShared ? 'text-blue-500' : 'text-gray-500 dark:text-white/60' }} hover:text-blue-500 transition-colors"
                data-post-id="{{ $post->id }}"
                data-shared="{{ $isShared ? 'true' : 'false' }}"
                onclick="handleShare(this)">
            <ion-icon class="text-xl" name="{{ $isShared ? 'share-social' : 'share-social-outline' }}"></ion-icon>
            @if($post->shares_count > 0)
            <span class="share-count" id="share-count-{{ $post->id }}">{{ number_format($post->shares_count) }}</span>
            @else
            <span class="share-count hidden" id="share-count-{{ $post->id }}">0</span>
            @endif
        </button>

        {{-- Sharers list trigger (only if count > 0) --}}
        @if($post->shares_count > 0)
        <button type="button"
                class="text-xs text-blue-500 hover:underline -ml-3"
                onclick="showUsersList('{{ $post->id }}', 'sharers', 'People who shared')">
            <ion-icon name="people-outline" class="text-sm"></ion-icon>
        </button>
        @endif

    </div>

    {{-- Comments section --}}
    <div class="post-comments-section border-t border-gray-100 dark:border-slate-700/40" id="comments-{{ $post->id }}">

        {{-- Existing comments --}}
        @if($post->comments->count())
        <div class="space-y-0" id="comments-list-{{ $post->id }}">
            @foreach($post->comments as $comment)
            <div class="comment-thread sm:px-4 px-3 py-3 border-b border-gray-50 dark:border-slate-700/20" id="comment-{{ $comment->id }}">

                {{-- Comment --}}
                <div class="flex items-start gap-2.5">
                    <img src="{{ $comment->user->avatarUrl() }}" alt="{{ $comment->user->name }}" class="w-7 h-7 rounded-full object-cover shrink-0 mt-0.5">
                    <div class="flex-1 min-w-0">
                        <div class="bg-slate-50 dark:bg-slate-700/50 rounded-2xl px-3 py-2">
                            <span class="font-semibold text-black dark:text-white text-xs">{{ $comment->user->name }}</span>
                            <p class="font-normal text-sm mt-0.5">{{ $comment->content }}</p>
                        </div>
                        <div class="flex items-center gap-3 mt-1 ml-2 text-xs text-gray-400 dark:text-white/40">
                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                            <button type="button" class="hover:text-blue-500 font-medium"
                                    onclick="toggleReplyBox({{ $comment->id }})">Reply</button>
                        </div>
                    </div>
                </div>

                {{-- Existing replies --}}
                @if($comment->replies->count())
                <div class="replies-list ml-10 mt-2 space-y-2">
                    @foreach($comment->replies as $reply)
                    <div class="flex items-start gap-2.5">
                        <img src="{{ $reply->user->avatarUrl() }}" alt="{{ $reply->user->name }}" class="w-6 h-6 rounded-full object-cover shrink-0 mt-0.5">
                        <div class="flex-1 min-w-0">
                            <div class="bg-slate-50 dark:bg-slate-700/50 rounded-2xl px-3 py-2">
                                <span class="font-semibold text-black dark:text-white text-xs">{{ $reply->user->name }}</span>
                                <p class="font-normal text-sm mt-0.5">{{ $reply->content }}</p>
                            </div>
                            <div class="ml-2 mt-1 text-xs text-gray-400 dark:text-white/40">{{ $reply->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                {{-- Reply form (hidden) --}}
                <div class="reply-form-box hidden ml-10 mt-2" id="reply-form-{{ $comment->id }}">
                    <form method="POST" action="{{ route('posts.reply', [$post, $comment]) }}" class="flex items-center gap-2">
                        @csrf
                        <img src="{{ auth()->user()->avatarUrl() }}" class="w-6 h-6 rounded-full object-cover shrink-0" alt="">
                        <input type="text" name="content" placeholder="Write a reply..." required
                               class="flex-1 bg-slate-100 dark:bg-slate-700 rounded-full px-3 py-1.5 text-sm border-transparent focus:border-transparent focus:ring-0 dark:text-white dark:placeholder:text-white/40">
                        <button type="submit" class="text-xs font-semibold text-blue-500 hover:text-blue-600 shrink-0">Post</button>
                    </form>
                </div>

            </div>
            @endforeach
        </div>
        @endif

        {{-- Add Comment Form --}}
        <div class="sm:px-4 px-3 py-3">
            <form method="POST" action="{{ route('posts.comment', $post) }}" class="flex items-center gap-2.5">
                @csrf
                <img src="{{ auth()->user()->avatarUrl() }}" class="w-8 h-8 rounded-full object-cover shrink-0" alt="">
                <div class="flex-1 flex items-center gap-2 bg-slate-100 dark:bg-slate-700 rounded-full px-4 py-2">
                    <input type="text" name="content" placeholder="Write a comment..." required
                           class="flex-1 bg-transparent border-transparent focus:border-transparent focus:ring-0 text-sm dark:text-white dark:placeholder:text-white/40 p-0">
                    <button type="submit" class="shrink-0 text-blue-500 hover:text-blue-600">
                        <ion-icon name="send" class="text-lg"></ion-icon>
                    </button>
                </div>
            </form>
        </div>

    </div>

</article>

{{-- All interaction JS (handleLike, handleShare, etc.) is defined once in layouts/app.blade.php --}}
