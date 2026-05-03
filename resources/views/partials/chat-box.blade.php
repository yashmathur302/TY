<!-- Floating Chat Button & Box -->
<div class="chat-float-wrap">

    <button type="button" class="chat-float-btn sm:m-10 m-5 px-4 py-2.5 rounded-2xl bg-gradient-to-tr from-blue-500 to-blue-700 text-white shadow fixed bottom-0 right-0 group flex items-center gap-2">
        <svg class="w-6 h-6 group-aria-expanded:hidden duration-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"></path>
        </svg>
        <div class="text-base font-semibold max-sm:hidden">Chat</div>
        <svg class="w-6 h-6 -mr-1 hidden group-aria-expanded:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
        </svg>
    </button>

    <div class="chat-box bg-white rounded-xl drop-shadow-xl sm:w-80 w-screen border-t dark:bg-dark3 dark:border-slate-600" id="chat__box"
         uk-drop="offset:10;pos: bottom-right; animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-right; mode: click">

        <div class="chat-box-inner relative">

            <div class="chat-box-header p-5">
                <h1 class="text-lg font-bold text-black">Chats</h1>
            </div>

            <div class="chat-box-search bg-white p-3 absolute w-full top-11 border-b flex gap-2 hidden dark:border-slate-600 dark:bg-slate-700 z-10" id="search__chat">
                <div class="relative w-full">
                    <input type="text" class="w-full rounded-3xl dark:!bg-white/10" placeholder="Search">
                    <button type="button" class="absolute right-0 rounded-full shrink-0 px-2 -translate-y-1/2 top-1/2"
                            uk-toggle="target: #search__chat ; cls: hidden">
                        <ion-icon name="close-outline" class="text-xl flex"></ion-icon>
                    </button>
                </div>
            </div>

            <div class="chat-box-actions absolute top-0 -right-1 m-5 flex gap-2 text-xl">
                <button uk-toggle="target: #search__chat ; cls: hidden">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
                <button uk-toggle="target: #chat__box ; cls: uk-open">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>

            <div class="chat-box-tabs page-heading">
                <nav class="nav__underline -mt-7 px-5">
                    <ul class="group" uk-switcher="connect: #chat__tabs ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                        <li><a href="#" class="inline-block py-[18px] border-b-2 border-transparent aria-expanded:text-black aria-expanded:border-black aria-expanded:dark:text-white aria-expanded:dark:border-white">Friends</a></li>
                        <li><a href="#">Groups</a></li>
                    </ul>
                </nav>
            </div>

            <div class="uk-switcher overflow-hidden rounded-xl -mt-8" id="chat__tabs">

                <!-- Friends Tab -->
                <div class="chat-tab-friends p-3 text-sm font-medium h-[280px] overflow-y-auto">
                    @foreach([
                        ['img' => 1, 'name' => 'Jesse Steeve'],
                        ['img' => 2, 'name' => 'John Michael'],
                        ['img' => 3, 'name' => 'Monroe Parker'],
                        ['img' => 5, 'name' => 'James Lewis'],
                        ['img' => 4, 'name' => 'Martin Gray'],
                        ['img' => 6, 'name' => 'Alexa Stella'],
                        ['img' => 7, 'name' => 'Sarah Johnson'],
                        ['img' => 8, 'name' => 'David Kim'],
                        ['img' => 9, 'name' => 'Emily Chen'],
                        ['img' => 10, 'name' => 'Robert Brown'],
                    ] as $contact)
                    <a href="#" class="chat-contact block">
                        <div class="flex items-center gap-3.5 rounded-lg p-2 hover:bg-secondery dark:hover:bg-white/10">
                            <img src="https://i.pravatar.cc/28?img={{ $contact['img'] }}" alt="{{ $contact['name'] }}" class="w-7 h-7 rounded-full">
                            <div>{{ $contact['name'] }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- Groups Tab -->
                <div class="chat-tab-groups p-3 text-sm font-medium h-[280px] overflow-y-auto">
                    @foreach([
                        ['img' => 11, 'name' => 'Math Teachers'],
                        ['img' => 12, 'name' => 'Science Club'],
                        ['img' => 13, 'name' => 'Grade 10 Students'],
                        ['img' => 14, 'name' => 'Art & Design'],
                        ['img' => 15, 'name' => 'Sports Team'],
                        ['img' => 16, 'name' => 'Book Club'],
                    ] as $group)
                    <a href="#" class="chat-contact block">
                        <div class="flex items-center gap-3.5 rounded-lg p-2 hover:bg-secondery dark:hover:bg-white/10">
                            <img src="https://picsum.photos/seed/group{{ $group['img'] }}/28/28" alt="{{ $group['name'] }}" class="w-7 h-7 rounded-full">
                            <div>{{ $group['name'] }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>

            </div>

        </div>

        <div class="chat-box-arrow w-3.5 h-3.5 absolute -bottom-2 right-5 bg-white rotate-45 dark:bg-dark3"></div>
    </div>

</div>
