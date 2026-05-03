@extends('layouts.app')

@section('title', 'Feed – EduConnect')
@section('description', 'Your personalized feed on EduConnect. Connect with teachers and students, share knowledge and ideas.')

@section('content')

    <!-- Feed Timeline Layout -->
    <div class="feed-timeline lg:flex 2xl:gap-16 gap-12 max-w-[1065px] mx-auto" id="js-oversized">

        <!-- Left: Feed Column -->
        <div class="feed-column max-w-[680px] mx-auto">

            <!-- Stories Section -->
            <section class="feed-stories mb-8">

                <div class="feed-stories-slider relative" tabindex="-1" uk-slider="auto play: true;finite: true" uk-lightbox="">

                    <div class="py-5 uk-slider-container">
                        <ul class="feed-stories-list uk-slider-items w-[calc(100%+14px)]" uk-scrollspy="target: > li; cls: uk-animation-scale-up; delay: 20;repeat:true">

                            <!-- Add Story Button -->
                            <li class="md:pr-3" uk-scrollspy-class="uk-animation-fade">
                                <div class="story-add md:w-16 md:h-16 w-12 h-12 rounded-full relative border-2 border-dashed grid place-items-center bg-slate-200 border-slate-300 dark:border-slate-700 dark:bg-dark2 shrink-0"
                                     uk-toggle="target: #create-story">
                                    <ion-icon name="camera" class="text-2xl"></ion-icon>
                                </div>
                            </li>

                            <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                <a href="{{ 'https://picsum.photos/seed/story1/600/800' }}" data-caption="Caption 1">
                                    <div class="story-thumb md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                        <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Story" class="absolute w-full h-full object-cover">
                                    </div>
                                </a>
                            </li>
                            <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                <a href="{{ 'https://picsum.photos/seed/story2/600/800' }}" data-caption="Caption 2">
                                    <div class="story-thumb md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                        <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Story" class="absolute w-full h-full object-cover">
                                    </div>
                                </a>
                            </li>
                            <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                <a href="{{ 'https://picsum.photos/seed/story4/600/800' }}" data-caption="Caption 3">
                                    <div class="story-thumb md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                        <img src="{{ 'https://i.pravatar.cc/40?img=5' }}" alt="Story" class="absolute w-full h-full object-cover">
                                    </div>
                                </a>
                            </li>
                            <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                <a href="{{ 'https://picsum.photos/seed/story5/600/800' }}" data-caption="Caption 4">
                                    <div class="story-thumb md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                        <img src="{{ 'https://i.pravatar.cc/40?img=6' }}" alt="Story" class="absolute w-full h-full object-cover">
                                    </div>
                                </a>
                            </li>
                            <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                <a href="{{ 'https://picsum.photos/seed/story1/600/800' }}" data-caption="Caption 5">
                                    <div class="story-thumb md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                        <img src="{{ 'https://i.pravatar.cc/40?img=7' }}" alt="Story" class="absolute w-full h-full object-cover">
                                    </div>
                                </a>
                            </li>
                            <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                <a href="{{ 'https://picsum.photos/seed/story1/600/800' }}" data-caption="Caption 6">
                                    <div class="story-thumb md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                        <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Story" class="absolute w-full h-full object-cover">
                                    </div>
                                </a>
                            </li>
                            <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                <a href="{{ 'https://picsum.photos/seed/story2/600/800' }}" data-caption="Caption 7">
                                    <div class="story-thumb md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                        <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Story" class="absolute w-full h-full object-cover">
                                    </div>
                                </a>
                            </li>
                            <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                <a href="{{ 'https://picsum.photos/seed/story4/600/800' }}" data-caption="Caption 8">
                                    <div class="story-thumb md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                        <img src="{{ 'https://i.pravatar.cc/40?img=5' }}" alt="Story" class="absolute w-full h-full object-cover">
                                    </div>
                                </a>
                            </li>
                            <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                <a href="{{ 'https://picsum.photos/seed/story5/600/800' }}" data-caption="Caption 9">
                                    <div class="story-thumb md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                        <img src="{{ 'https://i.pravatar.cc/40?img=6' }}" alt="Story" class="absolute w-full h-full object-cover">
                                    </div>
                                </a>
                            </li>
                            <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                <a href="{{ 'https://picsum.photos/seed/story1/600/800' }}" data-caption="Caption 10">
                                    <div class="story-thumb md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                        <img src="{{ 'https://i.pravatar.cc/40?img=7' }}" alt="Story" class="absolute w-full h-full object-cover">
                                    </div>
                                </a>
                            </li>

                            <!-- Skeleton Loader -->
                            <li class="md:pr-3 pr-2">
                                <div class="story-skeleton md:w-16 md:h-16 w-12 h-12 bg-slate-200/60 rounded-full dark:bg-dark2 animate-pulse"></div>
                            </li>

                        </ul>
                    </div>

                    <div class="max-md:hidden">
                        <button type="button" class="absolute -translate-y-1/2 bg-white shadow rounded-full top-1/2 -left-3.5 grid w-8 h-8 place-items-center dark:bg-dark3" uk-slider-item="previous">
                            <ion-icon name="chevron-back" class="text-2xl"></ion-icon>
                        </button>
                        <button type="button" class="absolute -right-2 -translate-y-1/2 bg-white shadow rounded-full top-1/2 grid w-8 h-8 place-items-center dark:bg-dark3" uk-slider-item="next">
                            <ion-icon name="chevron-forward" class="text-2xl"></ion-icon>
                        </button>
                    </div>

                </div>

            </section>

            <!-- Feed Posts -->
            <div class="feed-posts md:max-w-[580px] mx-auto flex-1 xl:space-y-6 space-y-3">

                <!-- Create Post Box -->
                <div class="post-create-box bg-white rounded-xl shadow-sm md:p-4 p-2 space-y-4 text-sm font-medium border1 dark:bg-dark2">
                    <div class="flex items-center md:gap-3 gap-1">
                        <div class="flex-1 bg-slate-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer dark:bg-dark3" uk-toggle="target: #create-status">
                            <div class="py-2.5 text-center dark:text-white">What do you have in mind?</div>
                        </div>
                        <div class="post-create-photo cursor-pointer hover:bg-opacity-80 p-1 px-1.5 rounded-xl transition-all bg-pink-100/60 hover:bg-pink-100 dark:bg-white/10 dark:hover:bg-white/20" uk-toggle="target: #create-status">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 stroke-pink-600 fill-pink-200/70" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M15 8h.01" />
                                <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                <path d="M3.5 15.5l4.5 -4.5c.928 -.893 2.072 -.893 3 0l5 5" />
                                <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l2.5 2.5" />
                            </svg>
                        </div>
                        <div class="post-create-video cursor-pointer hover:bg-opacity-80 p-1 px-1.5 rounded-xl transition-all bg-sky-100/60 hover:bg-sky-100 dark:bg-white/10 dark:hover:bg-white/20" uk-toggle="target: #create-status">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 stroke-sky-600 fill-sky-200/70" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" />
                                <path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Post: Image -->
                <article class="post-card bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                    <header class="post-header flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                        <a href="#">
                            <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Monroe Parker" class="w-9 h-9 rounded-full">
                        </a>
                        <div class="flex-1">
                            <a href="#"><h4 class="post-author text-black dark:text-white">Monroe Parker</h4></a>
                            <div class="post-time text-xs text-gray-500 dark:text-white/80">2 hours ago</div>
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

                    <a href="#preview_modal" uk-toggle>
                        <div class="post-image relative w-full lg:h-96 h-full sm:px-4">
                            <img src="{{ 'https://picsum.photos/seed/post2/680/400' }}" alt="Post image" class="sm:rounded-lg w-full h-full object-cover">
                        </div>
                    </a>

                    <div class="post-actions sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                        <div class="post-like">
                            <div class="flex items-center gap-2.5">
                                <button type="button" class="button-icon text-red-500 bg-red-100 dark:bg-slate-700">
                                    <ion-icon class="text-lg" name="heart"></ion-icon>
                                </button>
                                <a href="#">1,300</a>
                            </div>
                            <div class="post-reactions p-1 px-2 bg-white rounded-full drop-shadow-md w-[212px] dark:bg-slate-700 text-2xl"
                                 uk-drop="offset:10;pos: top-left; animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left">
                                <div class="flex gap-2" uk-scrollspy="target: > button; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
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
                            <span>260</span>
                        </div>
                        <button type="button" class="button-icon ml-auto"><ion-icon class="text-xl" name="paper-plane-outline"></ion-icon></button>
                        <button type="button" class="button-icon"><ion-icon class="text-xl" name="share-outline"></ion-icon></button>
                    </div>

                    <div class="post-comments sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
                        <div class="comment-item flex items-start gap-3 relative">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Steeve" class="w-6 h-6 mt-1 rounded-full"></a>
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Steeve</a>
                                <p class="mt-0.5">What a beautiful photo! I love it. 😍</p>
                            </div>
                        </div>
                        <div class="comment-item flex items-start gap-3 relative">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Monroe" class="w-6 h-6 mt-1 rounded-full"></a>
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Monroe</a>
                                <p class="mt-0.5">You captured the moment.😎</p>
                            </div>
                        </div>
                        <button type="button" class="post-more-comments flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2">
                            <ion-icon name="chevron-down-outline" class="ml-auto duration-200 group-aria-expanded:rotate-180"></ion-icon>
                            More Comment
                        </button>
                    </div>

                    <div class="post-add-comment sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                        <img src="{{ 'https://i.pravatar.cc/40?img=7' }}" alt="Your avatar" class="w-6 h-6 rounded-full">
                        <div class="flex-1 relative overflow-hidden h-10">
                            <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>
                            <div class="comment-media-icons absolute top-2 right-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600">
                                    <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                                </svg>
                            </div>
                        </div>
                        <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery">Reply</button>
                    </div>

                </article>

                <!-- Post: Image Slider -->
                <article class="post-card bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                    <header class="post-header flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                        <a href="#">
                            <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Monroe Parker" class="w-9 h-9 rounded-full">
                        </a>
                        <div class="flex-1">
                            <a href="#"><h4 class="post-author text-black dark:text-white">Monroe Parker</h4></a>
                            <div class="post-time text-xs text-gray-500 dark:text-white/80">2 hours ago</div>
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

                    <div class="post-slideshow relative uk-visible-toggle sm:px-4" tabindex="-1" uk-slideshow="animation: push;ratio: 4:3">
                        <ul class="uk-slideshow-items overflow-hidden rounded-xl" uk-lightbox="animation: fade">
                            <li class="w-full">
                                <a class="inline" href="https://getuikit.com/docs/images/photo3.jpg" data-caption="Caption 1">
                                    <img src="{{ 'https://picsum.photos/seed/post2/680/400' }}" alt="Post slideshow 1" class="w-full h-full absolute object-cover inset-0">
                                </a>
                            </li>
                            <li class="w-full">
                                <a class="inline" href="https://getuikit.com/docs/images/photo2.jpg" data-caption="Caption 2">
                                    <img src="{{ 'https://picsum.photos/seed/post3/680/400' }}" alt="Post slideshow 2" class="w-full h-full absolute object-cover inset-0">
                                </a>
                            </li>
                            <li class="w-full">
                                <a class="inline" href="https://getuikit.com/docs/images/photo.jpg" data-caption="Caption 3">
                                    <img src="{{ 'https://picsum.photos/seed/post4/680/400' }}" alt="Post slideshow 3" class="w-full h-full absolute object-cover inset-0">
                                </a>
                            </li>
                        </ul>
                        <a class="nav-prev left-6" href="#" uk-slideshow-item="previous"><ion-icon name="chevron-back" class="text-2xl"></ion-icon></a>
                        <a class="nav-next right-6" href="#" uk-slideshow-item="next"><ion-icon name="chevron-forward" class="text-2xl"></ion-icon></a>
                    </div>

                    <div class="post-actions sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                        <div class="post-like">
                            <div class="flex items-center gap-2.5">
                                <button type="button" class="button-icon text-red-500 bg-red-100 dark:bg-slate-700">
                                    <ion-icon class="text-lg" name="heart"></ion-icon>
                                </button>
                                <a href="#">1,300</a>
                            </div>
                            <div class="post-reactions p-1 px-2 bg-white rounded-full drop-shadow-md w-[212px] dark:bg-slate-700 text-2xl"
                                 uk-drop="offset:10;pos: top-left; animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left">
                                <div class="flex gap-2" uk-scrollspy="target: > button; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
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
                            <span>260</span>
                        </div>
                        <button type="button" class="button-icon ml-auto"><ion-icon class="text-xl" name="paper-plane-outline"></ion-icon></button>
                        <button type="button" class="button-icon"><ion-icon class="text-xl" name="share-outline"></ion-icon></button>
                    </div>

                    <div class="post-comments sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
                        <div class="comment-item flex items-start gap-3 relative">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Steeve" class="w-6 h-6 mt-1 rounded-full"></a>
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Steeve</a>
                                <p class="mt-0.5">What a beautiful photo! I love it. 😍</p>
                            </div>
                        </div>
                        <div class="comment-item flex items-start gap-3 relative">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Monroe" class="w-6 h-6 mt-1 rounded-full"></a>
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Monroe</a>
                                <p class="mt-0.5">You captured the moment.😎</p>
                            </div>
                        </div>
                        <button type="button" class="post-more-comments flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2">
                            <ion-icon name="chevron-down-outline" class="ml-auto duration-200 group-aria-expanded:rotate-180"></ion-icon>
                            More Comment
                        </button>
                    </div>

                    <div class="post-add-comment sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                        <img src="{{ 'https://i.pravatar.cc/40?img=7' }}" alt="Your avatar" class="w-6 h-6 rounded-full">
                        <div class="flex-1 relative overflow-hidden h-10">
                            <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>
                            <div class="comment-media-icons absolute top-2 right-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600">
                                    <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                                </svg>
                            </div>
                        </div>
                        <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery">Reply</button>
                    </div>

                </article>

                <!-- Post: Text Only -->
                <article class="post-card bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                    <header class="post-header flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                        <a href="#">
                            <img src="{{ 'https://i.pravatar.cc/40?img=5' }}" alt="John Michael" class="w-9 h-9 rounded-full">
                        </a>
                        <div class="flex-1">
                            <a href="#"><h4 class="post-author text-black dark:text-white">John Michael</h4></a>
                            <div class="post-time text-xs text-gray-500 dark:text-white/80">2 hours ago</div>
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

                    <div class="post-text sm:px-4 p-2.5 pt-0">
                        <p class="font-normal">Photography is the art of capturing light with a camera. It can be used to create images that tell stories, express emotions, or document reality. it can be fun, challenging, or rewarding. It can also be a hobby, a profession, or a passion. 📷</p>
                    </div>

                    <div class="post-actions sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                        <div class="post-like">
                            <div class="flex items-center gap-2.5">
                                <button type="button" class="button-icon text-red-500 bg-red-100 dark:bg-slate-700">
                                    <ion-icon class="text-lg" name="heart"></ion-icon>
                                </button>
                                <a href="#">1,300</a>
                            </div>
                            <div class="post-reactions p-1 px-2 bg-white rounded-full drop-shadow-md w-[212px] dark:bg-slate-700 text-2xl"
                                 uk-drop="offset:10;pos: top-left; animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left">
                                <div class="flex gap-2" uk-scrollspy="target: > button; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
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
                            <span>260</span>
                        </div>
                        <button type="button" class="button-icon ml-auto"><ion-icon class="text-xl" name="paper-plane-outline"></ion-icon></button>
                        <button type="button" class="button-icon"><ion-icon class="text-xl" name="share-outline"></ion-icon></button>
                    </div>

                    <div class="post-comments sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
                        <div class="comment-item flex items-start gap-3 relative">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Steeve" class="w-6 h-6 mt-1 rounded-full"></a>
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Steeve</a>
                                <p class="mt-0.5">I love taking photos of nature and animals. 🌳🐶</p>
                            </div>
                        </div>
                        <div class="comment-item flex items-start gap-3 relative">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Monroe" class="w-6 h-6 mt-1 rounded-full"></a>
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Monroe</a>
                                <p class="mt-0.5">I enjoy people and emotions. 😊😢</p>
                            </div>
                        </div>
                        <div class="comment-item flex items-start gap-3 relative">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=5' }}" alt="Jesse" class="w-6 h-6 mt-1 rounded-full"></a>
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Jesse</a>
                                <p class="mt-0.5">Photography is my passion. 🎨📸</p>
                            </div>
                        </div>
                    </div>

                    <div class="post-add-comment sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                        <img src="{{ 'https://i.pravatar.cc/40?img=7' }}" alt="Your avatar" class="w-6 h-6 rounded-full">
                        <div class="flex-1 relative overflow-hidden h-10">
                            <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>
                            <div class="comment-media-icons absolute top-2 right-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600">
                                    <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                                </svg>
                            </div>
                        </div>
                        <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery">Reply</button>
                    </div>

                </article>

                <!-- Post Skeleton Loader -->
                <div class="post-skeleton rounded-xl shadow-sm p-4 space-y-4 bg-slate-200/40 animate-pulse border1 dark:bg-dark2">
                    <div class="flex gap-3">
                        <div class="w-9 h-9 rounded-full bg-slate-300/20"></div>
                        <div class="flex-1 space-y-3">
                            <div class="w-40 h-5 rounded-md bg-slate-300/20"></div>
                            <div class="w-24 h-4 rounded-md bg-slate-300/20"></div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-slate-300/20"></div>
                    </div>
                    <div class="w-full h-52 rounded-lg bg-slate-300/10 my-3"></div>
                    <div class="flex gap-3">
                        <div class="w-16 h-5 rounded-md bg-slate-300/20"></div>
                        <div class="w-14 h-5 rounded-md bg-slate-300/20"></div>
                        <div class="w-6 h-6 rounded-full bg-slate-300/20 ml-auto"></div>
                        <div class="w-6 h-6 rounded-full bg-slate-300/20"></div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Right: Sidebar Widgets -->
        <aside class="feed-sidebar flex-1">

            <div class="feed-widgets lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6"
                 uk-sticky="media: 1024; end: #js-oversized; offset: 80">

                <!-- People You May Know -->
                <div class="widget-people-know box p-5 px-6">
                    <div class="widget-head flex items-baseline justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base">People you may know</h3>
                        <a href="#" class="text-sm text-blue-500">See all</a>
                    </div>
                    <div class="side-list">
                        <div class="side-list-item">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="John Michael" class="side-list-image rounded-full"></a>
                            <div class="flex-1">
                                <a href="#"><h4 class="side-list-title">John Michael</h4></a>
                                <div class="side-list-info">125k Following</div>
                            </div>
                            <button class="button bg-primary-soft text-primary dark:text-white">follow</button>
                        </div>
                        <div class="side-list-item">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Monroe Parker" class="side-list-image rounded-full"></a>
                            <div class="flex-1">
                                <a href="#"><h4 class="side-list-title">Monroe Parker</h4></a>
                                <div class="side-list-info">320k Following</div>
                            </div>
                            <button class="button bg-primary-soft text-primary dark:text-white">follow</button>
                        </div>
                        <div class="side-list-item">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=5' }}" alt="James Lewis" class="side-list-image rounded-full"></a>
                            <div class="flex-1">
                                <a href="#"><h4 class="side-list-title">James Lewis</h4></a>
                                <div class="side-list-info">125k Following</div>
                            </div>
                            <button class="button bg-primary-soft text-primary dark:text-white">follow</button>
                        </div>
                        <div class="side-list-item">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=6' }}" alt="Alexa Stella" class="side-list-image rounded-full"></a>
                            <div class="flex-1">
                                <a href="#"><h4 class="side-list-title">Alexa stella</h4></a>
                                <div class="side-list-info">192k Following</div>
                            </div>
                            <button class="button bg-primary-soft text-primary dark:text-white">follow</button>
                        </div>
                        <div class="side-list-item">
                            <a href="#"><img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="John Michael" class="side-list-image rounded-full"></a>
                            <div class="flex-1">
                                <a href="#"><h4 class="side-list-title">John Michael</h4></a>
                                <div class="side-list-info">320k Following</div>
                            </div>
                            <button class="button bg-primary-soft text-primary dark:text-white">follow</button>
                        </div>
                    </div>
                </div>

                <!-- Premium Photos -->
                <div class="widget-premium-photos box p-5 px-6 border1 dark:bg-dark2">
                    <div class="widget-head flex justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base">Premium Photos</h3>
                        <button type="button"><ion-icon name="sync-outline" class="text-xl"></ion-icon></button>
                    </div>
                    <div class="relative capitalize font-medium text-sm text-center mt-4 mb-2" tabindex="-1" uk-slider="autoplay: true;finite: true">
                        <div class="overflow-hidden uk-slider-container">
                            <ul class="-ml-2 uk-slider-items w-[calc(100%+0.5rem)]">
                                <li class="w-1/2 pr-2">
                                    <a href="#">
                                        <div class="product-thumb relative overflow-hidden rounded-lg">
                                            <div class="relative w-full h-40">
                                                <img src="{{ 'https://picsum.photos/seed/prod1/300/160' }}" alt="Chill Lotion" class="object-cover w-full h-full inset-0">
                                            </div>
                                            <div class="product-price absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60">$12</div>
                                        </div>
                                        <div class="mt-3 w-full">Chill Lotion</div>
                                    </a>
                                </li>
                                <li class="w-1/2 pr-2">
                                    <a href="#">
                                        <div class="product-thumb relative overflow-hidden rounded-lg">
                                            <div class="relative w-full h-40">
                                                <img src="{{ 'https://picsum.photos/seed/prod3/300/160' }}" alt="Gaming mouse" class="object-cover w-full h-full inset-0">
                                            </div>
                                            <div class="product-price absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60">$18</div>
                                        </div>
                                        <div class="mt-3 w-full">Gaming mouse</div>
                                    </a>
                                </li>
                                <li class="w-1/2 pr-2">
                                    <a href="#">
                                        <div class="product-thumb relative overflow-hidden rounded-lg">
                                            <div class="relative w-full h-40">
                                                <img src="{{ 'https://picsum.photos/seed/prod5/300/160' }}" alt="Herbal Shampoo" class="object-cover w-full h-full inset-0">
                                            </div>
                                            <div class="product-price absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60">$12</div>
                                        </div>
                                        <div class="mt-3 w-full">Herbal Shampoo</div>
                                    </a>
                                </li>
                            </ul>
                            <button type="button" class="absolute bg-white rounded-full top-16 -left-4 grid w-9 h-9 place-items-center shadow dark:bg-dark3" uk-slider-item="previous">
                                <ion-icon name="chevron-back" class="text-2xl"></ion-icon>
                            </button>
                            <button type="button" class="absolute -right-4 bg-white rounded-full top-16 grid w-9 h-9 place-items-center shadow dark:bg-dark3" uk-slider-item="next">
                                <ion-icon name="chevron-forward" class="text-2xl"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Online Friends -->
                <div class="widget-online-friends box p-5 px-6 border1 dark:bg-dark2">
                    <div class="widget-head flex justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base">Online Friends</h3>
                        <button type="button"><ion-icon name="sync-outline" class="text-xl"></ion-icon></button>
                    </div>
                    <div class="online-friends-grid grid grid-cols-6 gap-3 mt-4">
                        <a href="#">
                            <div class="online-friend-item w-10 h-10 relative">
                                <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Online friend" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="online-dot absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="online-friend-item w-10 h-10 relative">
                                <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Online friend" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="online-dot absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="online-friend-item w-10 h-10 relative">
                                <img src="{{ 'https://i.pravatar.cc/40?img=4' }}" alt="Online friend" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="online-dot absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="online-friend-item w-10 h-10 relative">
                                <img src="{{ 'https://i.pravatar.cc/40?img=5' }}" alt="Online friend" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="online-dot absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="online-friend-item w-10 h-10 relative">
                                <img src="{{ 'https://i.pravatar.cc/40?img=6' }}" alt="Online friend" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="online-dot absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="online-friend-item w-10 h-10 relative">
                                <img src="{{ 'https://i.pravatar.cc/40?img=7' }}" alt="Online friend" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="online-dot absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Pro Members -->
                <div class="widget-pro-members box p-5 px-6 border1 dark:bg-dark2">
                    <div class="widget-head flex justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base">Pro Members</h3>
                    </div>
                    <div class="relative capitalize font-normal text-sm mt-4 mb-2" tabindex="-1" uk-slider="autoplay: true;finite: true">
                        <div class="overflow-hidden uk-slider-container">
                            <ul class="-ml-2 uk-slider-items w-[calc(100%+0.5rem)]">
                                <li class="w-1/2 pr-2">
                                    <div class="pro-member-card flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                                        <a href="#">
                                            <div class="relative w-16 h-16 mx-auto mt-2">
                                                <img src="{{ 'https://i.pravatar.cc/40?img=5' }}" alt="Martin Gray" class="h-full object-cover rounded-full shadow w-full">
                                            </div>
                                        </a>
                                        <div class="mt-5 text-center w-full">
                                            <a href="#"><h5 class="font-semibold">Martin Gray</h5></a>
                                            <div class="text-xs text-gray-400 mt-0.5 font-medium">12K Followers</div>
                                            <button type="button" class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1">Follow</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="w-1/2 pr-2">
                                    <div class="pro-member-card flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                                        <a href="#">
                                            <div class="relative w-16 h-16 mx-auto mt-2">
                                                <img src="{{ 'https://i.pravatar.cc/40?img=4' }}" alt="Alexa Park" class="h-full object-cover rounded-full shadow w-full">
                                            </div>
                                        </a>
                                        <div class="mt-5 text-center w-full">
                                            <a href="#"><h5 class="font-semibold">Alexa Park</h5></a>
                                            <div class="text-xs text-gray-400 mt-0.5 font-medium">12K Followers</div>
                                            <button type="button" class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1">Follow</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="w-1/2 pr-2">
                                    <div class="pro-member-card flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                                        <a href="#">
                                            <div class="relative w-16 h-16 mx-auto mt-2">
                                                <img src="{{ 'https://i.pravatar.cc/40?img=4' }}" alt="James Lewis" class="h-full object-cover rounded-full shadow w-full">
                                            </div>
                                        </a>
                                        <div class="mt-5 text-center w-full">
                                            <a href="#"><h5 class="font-semibold">James Lewis</h5></a>
                                            <div class="text-xs text-gray-400 mt-0.5 font-medium">15K Followers</div>
                                            <button type="button" class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1">Follow</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button type="button" class="absolute -translate-y-1/2 bg-slate-100 rounded-full top-1/2 -left-4 grid w-9 h-9 place-items-center dark:bg-dark3" uk-slider-item="previous">
                                <ion-icon name="chevron-back" class="text-2xl"></ion-icon>
                            </button>
                            <button type="button" class="absolute -right-4 -translate-y-1/2 bg-slate-100 rounded-full top-1/2 grid w-9 h-9 place-items-center dark:bg-dark3" uk-slider-item="next">
                                <ion-icon name="chevron-forward" class="text-2xl"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Trends -->
                <div class="widget-trends box p-5 px-6 border1 dark:bg-dark2">
                    <div class="widget-head flex justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base">Trends for you</h3>
                        <button type="button"><ion-icon name="sync-outline" class="text-xl"></ion-icon></button>
                    </div>
                    <div class="trends-list space-y-3.5 capitalize text-xs font-normal mt-5 mb-2 text-gray-600 dark:text-white/80">
                        <a href="#">
                            <div class="trend-item flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm">artificial intelligence</h4>
                                    <div class="mt-0.5">1,245,62 post</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="trend-item flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm">Web developers</h4>
                                    <div class="mt-0.5">1,624 post</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="trend-item flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm">Ui Designers</h4>
                                    <div class="mt-0.5">820 post</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="trend-item flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm">affiliate marketing</h4>
                                    <div class="mt-0.5">480 post</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </aside>

    </div>

@endsection

@section('modals')

    <!-- Post Preview Modal -->
    <div class="hidden lg:p-20 max-lg:!items-start" id="preview_modal" uk-modal="">
        <div class="modal-post-preview uk-modal-dialog tt relative mx-auto overflow-hidden shadow-xl rounded-lg lg:flex items-center max-w-[86rem] w-full lg:h-[80vh]">

            <div class="modal-post-image lg:h-full lg:w-[calc(100vw-400px)] w-full h-96 flex justify-center items-center relative">
                <div class="relative z-10 w-full h-full">
                    <img src="{{ 'https://picsum.photos/seed/post1/860/600' }}" alt="Post preview" class="w-full h-full object-cover absolute">
                </div>
                <button type="button" class="modal-close bg-white rounded-full p-2 absolute right-0 top-0 m-3 uk-animation-slide-right-medium z-10 dark:bg-slate-600 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="modal-post-sidebar lg:w-[400px] w-full bg-white h-full relative overflow-y-auto shadow-xl dark:bg-dark2 flex flex-col justify-between">

                <div class="p-5 pb-0">
                    <div class="flex gap-3 text-sm font-medium">
                        <img src="{{ 'https://i.pravatar.cc/40?img=5' }}" alt="Steeve" class="w-9 h-9 rounded-full">
                        <div class="flex-1">
                            <h4 class="text-black font-medium dark:text-white">Steeve</h4>
                            <div class="text-gray-500 text-xs dark:text-white/80">2 hours ago</div>
                        </div>
                        <div class="-m-1">
                            <button type="button" class="button-icon w-8 h-8"><ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon></button>
                            <div class="w-[253px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true">
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
                    </div>

                    <p class="font-normal text-sm leading-6 mt-4">Photography is the art of capturing light with a camera. it can be fun, challenging. It can also be a hobby, a passion. 📷</p>

                    <div class="shadow relative -mx-5 px-5 py-3 mt-3">
                        <div class="flex items-center gap-4 text-xs font-semibold">
                            <div class="flex items-center gap-2.5">
                                <button type="button" class="button-icon text-red-500 bg-red-100 dark:bg-slate-700"><ion-icon class="text-lg" name="heart"></ion-icon></button>
                                <a href="#">1,300</a>
                            </div>
                            <div class="flex items-center gap-3">
                                <button type="button" class="button-icon bg-slate-100 dark:bg-slate-700"><ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon></button>
                                <span>260</span>
                            </div>
                            <button type="button" class="button-icon ml-auto"><ion-icon class="text-xl" name="share-outline"></ion-icon></button>
                            <button type="button" class="button-icon"><ion-icon class="text-xl" name="bookmark-outline"></ion-icon></button>
                        </div>
                    </div>
                </div>

                <div class="p-5 h-full overflow-y-auto flex-1">
                    <div class="relative text-sm font-medium space-y-5">
                        <div class="comment-item flex items-start gap-3 relative">
                            <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Steeve" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Steeve</a>
                                <p class="mt-0.5">What a beautiful, I love it. 😍</p>
                            </div>
                        </div>
                        <div class="comment-item flex items-start gap-3 relative">
                            <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Monroe" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Monroe</a>
                                <p class="mt-0.5">You captured the moment.😎</p>
                            </div>
                        </div>
                        <div class="comment-item flex items-start gap-3 relative">
                            <img src="{{ 'https://i.pravatar.cc/40?img=7' }}" alt="Alexa" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Alexa</a>
                                <p class="mt-0.5">This photo is amazing!</p>
                            </div>
                        </div>
                        <div class="comment-item flex items-start gap-3 relative">
                            <img src="{{ 'https://i.pravatar.cc/40?img=4' }}" alt="John" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">John</a>
                                <p class="mt-0.5">Wow, You are so talented 😍</p>
                            </div>
                        </div>
                        <div class="comment-item flex items-start gap-3 relative">
                            <img src="{{ 'https://i.pravatar.cc/40?img=5' }}" alt="Michael" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Michael</a>
                                <p class="mt-0.5">I love taking photos 🌳🐶</p>
                            </div>
                        </div>
                        <div class="comment-item flex items-start gap-3 relative">
                            <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Monroe" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Monroe</a>
                                <p class="mt-0.5">Awesome. 😊😢</p>
                            </div>
                        </div>
                        <div class="comment-item flex items-start gap-3 relative">
                            <img src="{{ 'https://i.pravatar.cc/40?img=5' }}" alt="Jesse" class="w-6 h-6 mt-1 rounded-full">
                            <div class="flex-1">
                                <a href="#" class="text-black font-medium inline-block dark:text-white">Jesse</a>
                                <p class="mt-0.5">Well done 🎨📸</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-comment-form bg-white p-3 text-sm font-medium flex items-center gap-2">
                    <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Your avatar" class="w-6 h-6 rounded-full">
                    <div class="flex-1 relative overflow-hidden">
                        <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none px-4 py-2 focus:!border-transparent focus:!ring-transparent resize-y"></textarea>
                        <div class="comment-icons flex items-center gap-2 absolute bottom-0.5 right-0 m-3">
                            <ion-icon class="text-xl flex text-blue-700" name="image"></ion-icon>
                            <ion-icon class="text-xl flex text-yellow-500" name="happy"></ion-icon>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Create Status Modal -->
    <div class="hidden lg:p-20" id="create-status" uk-modal="">
        <div class="modal-create-status uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

            <div class="modal-header text-center py-4 border-b mb-0 dark:border-slate-700">
                <h2 class="text-sm font-medium text-black">Create Status</h2>
                <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="modal-body space-y-5 mt-3 p-2">
                <textarea class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800" rows="6" placeholder="What do you have in mind?"></textarea>
            </div>

            <div class="modal-media-options flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
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
                <button type="button" class="grid place-items-center w-8 h-8 text-xl rounded-full bg-secondery">
                    <ion-icon name="ellipsis-horizontal"></ion-icon>
                </button>
            </div>

            <div class="modal-footer p-5 flex justify-between items-center">
                <div>
                    <button class="inline-flex items-center py-1 px-2.5 gap-1 font-medium text-sm rounded-full bg-slate-50 border-2 border-slate-100 group aria-expanded:bg-slate-100 dark:text-white dark:bg-slate-700 dark:border-slate-600" type="button">
                        Everyone
                        <ion-icon name="chevron-down-outline" class="text-base duration-500 group-aria-expanded:rotate-180"></ion-icon>
                    </button>
                    <div class="p-2 bg-white rounded-lg shadow-lg text-black font-medium border border-slate-100 w-60 dark:bg-slate-700"
                         uk-drop="offset:10;pos: bottom-left; reveal-left;animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left ; mode:click">
                        <form>
                            <label>
                                <input type="radio" name="radio-status" class="peer appearance-none hidden" checked>
                                <div class="relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery peer-checked:[&_.active]:block dark:bg-dark3">
                                    <div class="text-sm">Everyone</div>
                                    <ion-icon name="checkmark-circle" class="hidden active absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up"></ion-icon>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="radio-status" class="peer appearance-none hidden">
                                <div class="relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery peer-checked:[&_.active]:block dark:bg-dark3">
                                    <div class="text-sm">Friends</div>
                                    <ion-icon name="checkmark-circle" class="hidden active absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up"></ion-icon>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="radio-status" class="peer appearance-none hidden">
                                <div class="relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery peer-checked:[&_.active]:block dark:bg-dark3">
                                    <div class="text-sm">Only me</div>
                                    <ion-icon name="checkmark-circle" class="hidden active absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up"></ion-icon>
                                </div>
                            </label>
                        </form>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" class="button bg-blue-500 text-white py-2 px-12 text-[14px]">Create</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Create Story Modal -->
    <div class="hidden lg:p-20" id="create-story" uk-modal="">
        <div class="modal-create-story uk-modal-dialog tt relative overflow-hidden mx-auto bg-white p-7 shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

            <div class="modal-header text-center py-3 border-b -m-7 mb-0 dark:border-slate-700">
                <h2 class="text-sm font-medium">Create Story</h2>
                <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="modal-body space-y-5 mt-7">

                <div>
                    <label class="text-base">What do you have in mind?</label>
                    <input type="text" class="w-full mt-3">
                </div>

                <div>
                    <div class="story-upload-area w-full h-72 relative border1 rounded-lg overflow-hidden bg-[url('../images/ad_pattern.png')] bg-repeat">
                        <label for="createStatusUrl" class="story-upload-label flex flex-col justify-center items-center absolute -translate-x-1/2 left-1/2 bottom-0 z-10 w-full pb-6 pt-10 cursor-pointer bg-gradient-to-t from-gray-700/60">
                            <input id="createStatusUrl" type="file" class="story-file-input">
                            <ion-icon name="image" class="text-3xl text-teal-600"></ion-icon>
                            <span class="text-white mt-2">Browse to Upload image</span>
                        </label>
                        <img id="createStatusImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" class="story-preview-image w-full h-full absolute object-cover">
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-start gap-2">
                        <ion-icon name="time-outline" class="text-3xl text-sky-600 rounded-full bg-blue-50 dark:bg-transparent"></ion-icon>
                        <p class="text-sm text-gray-500 font-medium">Your Status will be available <br> for <span class="text-gray-800">24 Hours</span></p>
                    </div>
                    <button type="button" class="button bg-blue-500 text-white px-8">Create</button>
                </div>

            </div>

        </div>
    </div>

@endsection
