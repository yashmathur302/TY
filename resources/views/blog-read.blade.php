@extends('layouts.app')

@section('title', 'Blog Read')

@section('content')

<div class="flex 2xl:gap-12 max-lg:flex-col gap-10 2xl:max-w-[1220px] max-w-[1065px] mx-auto" id="js-oversized">

    {{-- Article Content --}}
    <div class="flex-1">

        <div class="box overflow-hidden">
            <div class="relative h-80">
                <img src="https://picsum.photos/seed/blog-read-cover/1200/400" class="w-full h-full object-cover" alt="Article Cover">
            </div>
            <div class="p-6">
                <h1 class="text-xl font-semibold mt-1">How designers estimate the impact of UX?</h1>

                <div class="flex gap-3 text-sm mt-6">
                    <img src="https://i.pravatar.cc/40?img=5" alt="Steeve" class="w-9 h-9 rounded-full">
                    <div class="flex-1">
                        <h4 class="text-black font-medium dark:text-white">Steeve</h4>
                        <div class="text-gray-500 font-medium text-xs dark:text-white/80">2 hours ago</div>
                    </div>
                    <div class="font-normal text-gray-500">
                        <span class="text-sm">Business</span>
                        <span class="text-sm text-gray-400"> &nbsp;Sep 15, 2023</span>
                    </div>
                </div>

                <div class="space-y-2 text-sm font-normal mt-6 leading-6 text-black dark:text-white">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
        </div>

        <br>

        {{-- Comments --}}
        <div class="box p-5 px-6 relative">
            <h3 class="font-semibold text-base text-black dark:text-white">Comments</h3>

            <div class="text-sm font-normal space-y-4 relative mt-4">

                @foreach([
                    ['av' => 3, 'name' => 'Monroe Parker', 'text' => 'What a beautiful photo! I love it. 😍'],
                    ['av' => 2, 'name' => 'John Michael',  'text' => 'You captured the moment. 😎'],
                    ['av' => 5, 'name' => 'James Lewis',   'text' => 'What a beautiful photo! I love it. 😍'],
                    ['av' => 4, 'name' => 'Martin Gray',   'text' => 'You captured the moment. 😎'],
                ] as $comment)
                <div class="flex items-start gap-3 relative">
                    <a href="#">
                        <img src="https://i.pravatar.cc/24?img={{ $comment['av'] }}" alt="{{ $comment['name'] }}" class="w-6 h-6 mt-1 rounded-full">
                    </a>
                    <div class="flex-1">
                        <a href="#" class="text-black font-medium inline-block dark:text-white">{{ $comment['name'] }}</a>
                        <p class="mt-0.5">{{ $comment['text'] }}</p>
                    </div>
                </div>
                @endforeach

                <div>
                    <button type="button" class="flex items-center gap-1.5 text-blue-500 hover:text-blue-500 my-5">
                        <ion-icon name="chevron-down-outline" class="ml-auto duration-200"></ion-icon>
                        More Comment
                    </button>
                </div>

            </div>

            {{-- Add comment --}}
            <div class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 -m-6 mt-0 bg-secondery/60 dark:border-slate-700/40">
                <img src="https://i.pravatar.cc/24?img=7" alt="" class="w-6 h-6 rounded-full">

                <div class="flex-1 relative overflow-hidden h-10">
                    <textarea placeholder="Add Comment...." rows="1"
                              class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>

                    <div class="!top-2 pr-2 uk-drop" uk-drop="pos: bottom-right; mode: click">
                        <div class="flex items-center gap-2"
                             uk-scrollspy="target: > svg; cls: uk-animation-slide-right-small; delay: 100; repeat: true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600">
                                <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery">Reply</button>
            </div>
        </div>

    </div>

    {{-- Right Sidebar --}}
    <div class="2xl:w-[380px] lg:w-[330px] w-full">
        <div class="lg:space-y-6 space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6"
             uk-sticky="media: 1024; end: #js-oversized; offset: 80">

            {{-- Trending Articles --}}
            <div class="box p-5 px-6">
                <div class="flex items-baseline justify-between text-black dark:text-white">
                    <h3 class="font-bold text-base">Trending Articles</h3>
                    <a href="{{ route('blog') }}" class="text-sm text-blue-500">See all</a>
                </div>
                <div class="mt-4 space-y-4">
                    @foreach([
                        ['title' => 'Interesting JavaScript and CSS libraries you should learn',     'date' => '10 Jun 2022', 'views' => '156.9K'],
                        ['title' => 'Top amazing web demos and experiments in 2024 you should know', 'date' => '14 Aug 2022', 'views' => '204.1K'],
                        ['title' => 'Interesting JavaScript and CSS libraries should Know About',    'date' => '02 Nov 2022', 'views' => '98.5K'],
                        ['title' => 'Top amazing web demos and experiments should know about',       'date' => '19 Jan 2023', 'views' => '312.7K'],
                    ] as $trending)
                    <div>
                        <a href="#">
                            <h4 class="text-sm font-normal text-black dark:text-white duration-200 hover:opacity-80">{{ $trending['title'] }}</h4>
                        </a>
                        <div class="text-xs text-gray-400 mt-2 flex items-center gap-2">
                            <div>{{ $trending['date'] }}</div>
                            <div class="md:block hidden">·</div>
                            <div>{{ $trending['views'] }} views</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- People You Might Know --}}
            <div class="box p-5 px-6 dark:bg-dark2">
                <div class="flex justify-between text-black dark:text-white">
                    <h3 class="font-bold text-base">People You might know</h3>
                    <button type="button"><ion-icon name="sync-outline" class="text-xl"></ion-icon></button>
                </div>
                <div class="space-y-4 capitalize text-xs font-normal mt-5 mb-2 text-gray-500 dark:text-white/80">
                    @foreach([
                        ['av' => 7, 'name' => 'Johnson Smith',  'sub' => 'Suggested For You'],
                        ['av' => 5, 'name' => 'James Lewis',    'sub' => 'Followed by Johnson'],
                        ['av' => 2, 'name' => 'John Michael',   'sub' => 'Followed by Monroe'],
                        ['av' => 3, 'name' => 'Monroe Parker',  'sub' => 'Suggested For You'],
                        ['av' => 4, 'name' => 'Martin Gray',    'sub' => 'Suggested For You'],
                    ] as $person)
                    <div class="flex items-center gap-3">
                        <a href="#">
                            <img src="https://i.pravatar.cc/40?img={{ $person['av'] }}" alt="{{ $person['name'] }}" class="bg-gray-200 rounded-full w-10 h-10">
                        </a>
                        <div class="flex-1">
                            <a href="#"><h4 class="font-semibold text-sm text-black dark:text-white">{{ $person['name'] }}</h4></a>
                            <div class="mt-0.5">{{ $person['sub'] }}</div>
                        </div>
                        <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery">Follow</button>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
