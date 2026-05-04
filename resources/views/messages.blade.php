@extends('layouts.app')

@section('title', 'Messages – EduConnect')
@section('description', 'Your messages and conversations on EduConnect.')

@push('styles')
<style>
    /* Messages page: remove site-main padding and fix full height */
    #site__main { padding: 0 !important; overflow: hidden; }
</style>
@endpush

@section('content')

<div class="messages-page-wrap relative overflow-hidden border dark:border-slate-700" style="height:calc(100vh - var(--m-top)); margin:0;">

    <div class="messages-inner flex h-full" style="background:var(--color-bg-card)">

        <!-- ===== LEFT: Conversation List ===== -->
        <div class="chat-sidebar-panel md:w-[360px] relative border-r dark:border-slate-700 flex-shrink-0">

            <div id="side-chat" class="chat-sidebar-inner top-0 left-0 max-md:fixed max-md:w-5/6 max-md:h-screen z-50 max-md:shadow max-md:-translate-x-full" style="background:var(--color-bg-card)">

                <!-- Panel Header -->
                <div class="chat-panel-header p-4 border-b dark:border-slate-700">
                    <div class="flex mt-2 items-center justify-between">
                        <h2 class="text-2xl font-bold ml-1" style="color:#fff">Chats</h2>

                        <div class="flex items-center gap-2.5" style="color:var(--color-text)">
                            <button class="group button__ico">
                                <ion-icon name="settings-outline" class="text-2xl flex group-aria-expanded:rotate-180"></ion-icon>
                            </button>
                            <div class="md:w-[270px] w-full" uk-dropdown="pos: bottom-left; offset:10; animation: uk-animation-slide-bottom-small">
                                <nav>
                                    <a href="#"><ion-icon class="text-xl shrink-0" name="checkmark-outline"></ion-icon> Mark all as read</a>
                                    <a href="#"><ion-icon class="text-xl shrink-0" name="notifications-outline"></ion-icon> Notifications setting</a>
                                    <a href="#"><ion-icon class="text-xl shrink-0" name="volume-mute-outline"></ion-icon> Mute notifications</a>
                                </nav>
                            </div>
                            <button class="button__ico">
                                <ion-icon name="checkmark-circle-outline" class="text-2xl flex"></ion-icon>
                            </button>
                            <!-- mobile close -->
                            <button type="button" class="md:hidden button__ico" uk-toggle="target: #side-chat ; cls: max-md:-translate-x-full">
                                <ion-icon name="chevron-down-outline" class="text-xl"></ion-icon>
                            </button>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="relative mt-4">
                        <div class="absolute left-3 bottom-1/2 translate-y-1/2 flex" style="color:var(--color-text-muted)">
                            <ion-icon name="search" class="text-xl"></ion-icon>
                        </div>
                        <input type="text" placeholder="Search" class="w-full !pl-10 !py-2 !rounded-lg">
                    </div>
                </div>

                <!-- Conversation List -->
                <div class="chat-list overflow-y-auto space-y-1 p-2 md:h-[calc(100vh-204px)] h-[calc(100vh-130px)]">

                    @foreach([
                        ['img'=>5,  'name'=>'Jesse Steeve',  'msg'=>'Love your photos 😍',                    'time'=>'09:40AM', 'online'=>true,  'unread'=>false],
                        ['img'=>2,  'name'=>'Martin Gray',   'msg'=>'Photo editor needed. Fix photos? 🛠️',   'time'=>'09:40AM', 'online'=>false, 'unread'=>true],
                        ['img'=>3,  'name'=>'Monroe Parker', 'msg'=>'Can i call you today?',                   'time'=>'09:40AM', 'online'=>true,  'unread'=>false],
                        ['img'=>4,  'name'=>'James Lewis',   'msg'=>'Want to buy landscape photo? 🌄',         'time'=>'09:40AM', 'online'=>false, 'unread'=>false],
                        ['img'=>6,  'name'=>'Alexa Stella',  'msg'=>'Headshot needed. Resume. Do it? 👩‍💼', 'time'=>'09:40AM', 'online'=>true,  'unread'=>false],
                        ['img'=>7,  'name'=>'Sarah Johnson', 'msg'=>'Online course interesting? 🎓',           'time'=>'04:20PM', 'online'=>false, 'unread'=>true],
                        ['img'=>8,  'name'=>'Alex Dolve',    'msg'=>"I'm glad you like it.😊",                 'time'=>'09:40AM', 'online'=>false, 'unread'=>false],
                        ['img'=>9,  'name'=>'David Kim',     'msg'=>'Product photographer wanted? 📷',         'time'=>'01:10PM', 'online'=>false, 'unread'=>false],
                        ['img'=>10, 'name'=>'Emily Chen',    'msg'=>'Love your photos 😍',                     'time'=>'09:40AM', 'online'=>true,  'unread'=>false],
                        ['img'=>1,  'name'=>'Robert Brown',  'msg'=>'Photo editor needed. Fix photos? 🛠️',   'time'=>'02:52PM', 'online'=>false, 'unread'=>false],
                    ] as $chat)
                    <a href="#" class="chat-list-item relative flex items-center gap-4 p-2 duration-200 rounded-xl hover:bg-[var(--color-secondery)]">
                        <div class="relative w-14 h-14 shrink-0">
                            <img src="{{ 'https://i.pravatar.cc/56?img=' . $chat['img'] }}" alt="{{ $chat['name'] }}" class="object-cover w-full h-full rounded-full">
                            @if($chat['online'])
                            <div class="w-4 h-4 absolute bottom-0 right-0 bg-green-500 rounded-full border-2" style="border-color:var(--color-bg-card)"></div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1.5">
                                <div class="mr-auto text-sm font-medium" style="color:#fff">{{ $chat['name'] }}</div>
                                <div class="text-xs font-light" style="color:var(--color-text-muted)">{{ $chat['time'] }}</div>
                                @if($chat['unread'])
                                <div class="w-2.5 h-2.5 bg-blue-600 rounded-full flex-shrink-0"></div>
                                @endif
                            </div>
                            <div class="font-medium overflow-hidden text-ellipsis text-sm whitespace-nowrap" style="color:var(--color-text-muted)">{{ $chat['msg'] }}</div>
                        </div>
                    </a>
                    @endforeach

                </div>

            </div>

            <!-- Mobile overlay -->
            <div id="side-chat-overlay" class="bg-slate-100/40 backdrop-blur w-full h-full dark:bg-slate-800/40 z-40 fixed inset-0 max-md:-translate-x-full md:hidden"
                 uk-toggle="target: #side-chat ; cls: max-md:-translate-x-full"></div>

        </div>

        <!-- ===== CENTER: Active Chat ===== -->
        <div class="chat-center flex-1 flex flex-col">

            <!-- Chat Header -->
            <div class="chat-header flex items-center justify-between gap-2 px-6 py-3.5 border-b dark:border-slate-700 uk-animation-slide-top-medium flex-shrink-0">

                <div class="flex items-center sm:gap-4 gap-2">
                    <!-- mobile back -->
                    <button type="button" class="md:hidden button__ico" uk-toggle="target: #side-chat ; cls: max-md:-translate-x-full">
                        <ion-icon name="chevron-back-outline" class="text-2xl -ml-4"></ion-icon>
                    </button>

                    <div class="relative cursor-pointer max-md:hidden" uk-toggle="target: .chat-right-panel ; cls: hidden">
                        <img src="{{ 'https://i.pravatar.cc/40?img=6' }}" alt="Monroe Parker" class="w-8 h-8 rounded-full shadow">
                        <div class="w-2 h-2 bg-teal-500 rounded-full absolute right-0 bottom-0 m-px"></div>
                    </div>
                    <div class="cursor-pointer" uk-toggle="target: .chat-right-panel ; cls: hidden">
                        <div class="text-base font-bold" style="color:#fff">Monroe Parker</div>
                        <div class="text-xs text-green-500 font-semibold">Online</div>
                    </div>
                </div>

                <div class="flex items-center gap-2" style="color:var(--color-text)">
                    <button type="button" class="button__ico">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button type="button" class="button__ico">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </button>
                    <button type="button" class="button__ico" uk-toggle="target: .chat-right-panel ; cls: hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </button>
                </div>

            </div>

            <!-- Chat Bubbles -->
            <div class="chat-bubbles flex-1 overflow-y-auto p-5 py-10 md:h-[calc(100vh-204px)] h-[calc(100vh-195px)]">

                <!-- Contact intro card -->
                <div class="py-10 text-center text-sm lg:pt-8">
                    <img src="{{ 'https://i.pravatar.cc/96?img=6' }}" class="w-24 h-24 rounded-full mx-auto mb-3 shadow" alt="Monroe Parker">
                    <div class="mt-8">
                        <div class="md:text-xl text-base font-medium" style="color:#fff">Monroe Parker</div>
                        <div class="text-sm" style="color:var(--color-text-muted)">@Monroepark</div>
                    </div>
                    <div class="mt-3.5">
                        <a href="#" class="inline-block rounded-lg px-4 py-1.5 text-sm font-semibold" style="background:var(--color-secondery);color:var(--color-text)">View profile</a>
                    </div>
                </div>

                <div class="text-sm font-medium space-y-6">

                    <!-- Received -->
                    <div class="flex gap-3">
                        <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Jesse" class="w-9 h-9 rounded-full shadow flex-shrink-0">
                        <div class="bubble-received px-4 py-2 rounded-[20px] max-w-sm" style="background:var(--color-secondery);color:var(--color-text)">Hi, I'm John</div>
                    </div>

                    <!-- Sent -->
                    <div class="flex gap-2 flex-row-reverse items-end">
                        <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Me" class="w-5 h-5 rounded-full shadow flex-shrink-0">
                        <div class="bubble-sent px-4 py-2 rounded-[20px] max-w-sm bg-gradient-to-tr from-sky-500 to-blue-500 text-white shadow">I'm Lisa. welcome John</div>
                    </div>

                    <!-- Timestamp -->
                    <div class="flex justify-center">
                        <div class="font-medium text-sm" style="color:var(--color-text-muted)">April 8, 2023, 6:30 AM</div>
                    </div>

                    <!-- Received -->
                    <div class="flex gap-3">
                        <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Jesse" class="w-9 h-9 rounded-full shadow flex-shrink-0">
                        <div class="bubble-received px-4 py-2 rounded-[20px] max-w-sm" style="background:var(--color-secondery);color:var(--color-text)">I'm selling a photo of a sunset. It's a print on canvas, signed by the photographer. Do you like it? 😊</div>
                    </div>

                    <!-- Sent -->
                    <div class="flex gap-2 flex-row-reverse items-end">
                        <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Me" class="w-4 h-4 rounded-full shadow flex-shrink-0">
                        <div class="bubble-sent px-4 py-2 rounded-[20px] max-w-sm bg-gradient-to-tr from-sky-500 to-blue-500 text-white shadow">Wow, it's beautiful. How much? 😍</div>
                    </div>

                    <!-- Sent: image message -->
                    <div class="flex gap-2 flex-row-reverse items-end">
                        <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Me" class="w-4 h-4 rounded-full shadow flex-shrink-0">
                        <a class="block rounded-[18px] border overflow-hidden" href="#" style="border-color:var(--color-border)">
                            <div class="max-w-full relative w-72">
                                <img src="{{ 'https://picsum.photos/seed/chatimg1/288/165' }}" alt="Shared image" class="block w-full h-full object-cover max-h-52">
                            </div>
                        </a>
                    </div>

                    <!-- Timestamp -->
                    <div class="flex justify-center">
                        <div class="font-medium text-sm" style="color:var(--color-text-muted)">April 8, 2023, 6:30 AM</div>
                    </div>

                    <!-- Received -->
                    <div class="flex gap-3">
                        <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Jesse" class="w-9 h-9 rounded-full shadow flex-shrink-0">
                        <div class="bubble-received px-4 py-2 rounded-[20px] max-w-sm" style="background:var(--color-secondery);color:var(--color-text)">I'm glad you like it. I'm asking for $200 🤑</div>
                    </div>

                    <!-- Sent -->
                    <div class="flex gap-2 flex-row-reverse items-end">
                        <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Me" class="w-5 h-5 rounded-full shadow flex-shrink-0">
                        <div class="bubble-sent px-4 py-2 rounded-[20px] max-w-sm bg-gradient-to-tr from-sky-500 to-blue-500 text-white shadow">$200? Too steep. Can you lower the price a bit? 😕</div>
                    </div>

                    <!-- Received -->
                    <div class="flex gap-3">
                        <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Jesse" class="w-9 h-9 rounded-full shadow flex-shrink-0">
                        <div class="bubble-received px-4 py-2 rounded-[20px] max-w-sm" style="background:var(--color-secondery);color:var(--color-text)">Well, I can't go too low because I paid a lot. But I'm willing to negotiate. What's your offer? 🤔</div>
                    </div>

                    <!-- Sent -->
                    <div class="flex gap-2 flex-row-reverse items-end">
                        <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Me" class="w-5 h-5 rounded-full shadow flex-shrink-0">
                        <div class="bubble-sent px-4 py-2 rounded-[20px] max-w-sm bg-gradient-to-tr from-sky-500 to-blue-500 text-white shadow">Sorry, can't pay more than $150. 😅</div>
                    </div>

                    <!-- Timestamp -->
                    <div class="flex justify-center">
                        <div class="font-medium text-sm" style="color:var(--color-text-muted)">April 8, 2023, 6:30 AM</div>
                    </div>

                    <!-- Received -->
                    <div class="flex gap-3">
                        <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Jesse" class="w-9 h-9 rounded-full shadow flex-shrink-0">
                        <div class="bubble-received px-4 py-2 rounded-[20px] max-w-sm" style="background:var(--color-secondery);color:var(--color-text)">$150? Too low. Photo worth more. 😬</div>
                    </div>

                    <!-- Sent -->
                    <div class="flex gap-2 flex-row-reverse items-end">
                        <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Me" class="w-5 h-5 rounded-full shadow flex-shrink-0">
                        <div class="bubble-sent px-4 py-2 rounded-[20px] max-w-sm bg-gradient-to-tr from-sky-500 to-blue-500 text-white shadow">Too high. I can't. How about $160? Final offer. 😬</div>
                    </div>

                    <!-- Received -->
                    <div class="flex gap-3">
                        <img src="{{ 'https://i.pravatar.cc/40?img=2' }}" alt="Jesse" class="w-9 h-9 rounded-full shadow flex-shrink-0">
                        <div class="bubble-received px-4 py-2 rounded-[20px] max-w-sm" style="background:var(--color-secondery);color:var(--color-text)">Fine, fine. You're hard to please. I'll take $160, but only because I like you. 😍</div>
                    </div>

                    <!-- Sent -->
                    <div class="flex gap-2 flex-row-reverse items-end">
                        <img src="{{ 'https://i.pravatar.cc/40?img=3' }}" alt="Me" class="w-5 h-5 rounded-full shadow flex-shrink-0">
                        <div class="bubble-sent px-4 py-2 rounded-[20px] max-w-sm bg-gradient-to-tr from-sky-500 to-blue-500 text-white shadow">Great, thank you. I appreciate it. I love this photo and can't wait to hang it. 😩</div>
                    </div>

                </div>

            </div>

            <!-- Message Input Area -->
            <div class="chat-input-area flex items-center md:gap-4 gap-2 md:p-3 p-2 border-t dark:border-slate-700 flex-shrink-0">

                <div id="message__wrap" class="flex items-center gap-2 h-full -mt-1.5" style="color:var(--color-text)">

                    <!-- Attachments dropdown trigger -->
                    <button type="button" class="shrink-0">
                        <ion-icon class="text-3xl flex" name="add-circle-outline"></ion-icon>
                    </button>
                    <div class="dropbar pt-36 h-60 bg-gradient-to-t from-[var(--color-bg-card)] via-[var(--color-bg-card)] via-30% from-30%"
                         uk-drop="stretch: x; target: #message__wrap; animation: slide-bottom; animate-out: true; pos: top-left; offset:10; mode: click; duration: 200">
                        <div class="sm:w-full p-3 flex justify-center gap-5"
                             uk-scrollspy="target: > button; cls: uk-animation-slide-bottom-small; delay: 100; repeat:true">
                            <button type="button" class="bg-sky-500/20 text-sky-400 border border-sky-500/30 p-2.5 rounded-full shrink-0 duration-100 hover:scale-[1.15]">
                                <ion-icon class="text-3xl flex" name="image"></ion-icon>
                            </button>
                            <button type="button" class="bg-green-500/20 text-green-400 border border-green-500/30 p-2.5 rounded-full shrink-0 duration-100 hover:scale-[1.15]">
                                <ion-icon class="text-3xl flex" name="images"></ion-icon>
                            </button>
                            <button type="button" class="bg-pink-500/20 text-pink-400 border border-pink-500/30 p-2.5 rounded-full shrink-0 duration-100 hover:scale-[1.15]">
                                <ion-icon class="text-3xl flex" name="document-text"></ion-icon>
                            </button>
                            <button type="button" class="bg-orange-500/20 text-orange-400 border border-orange-500/30 p-2.5 rounded-full shrink-0 duration-100 hover:scale-[1.15]">
                                <ion-icon class="text-3xl flex" name="gift"></ion-icon>
                            </button>
                        </div>
                    </div>

                    <!-- Emoji trigger -->
                    <button type="button" class="shrink-0">
                        <ion-icon class="text-3xl flex" name="happy-outline"></ion-icon>
                    </button>
                    <div class="dropbar p-2"
                         uk-drop="stretch: x; target: #message__wrap; animation: uk-animation-scale-up uk-transform-origin-bottom-left; animate-out: true; pos: top-left; offset:2; mode: click; duration: 200">
                        <div class="sm:w-60 rounded-xl pr-0 border" style="background:var(--color-bg-card);border-color:var(--color-border)">
                            <h4 class="text-sm font-semibold p-3 pb-0" style="color:#fff">Send Emoji</h4>
                            <div class="grid grid-cols-5 overflow-y-auto max-h-44 p-3 text-center text-xl">
                                @foreach(['😊','🤩','😎','🥳','😂','🥰','😡','🤔','😍','🥺','😘','🤣','😜','🥵','😭','😤','🤯','🫡','🥹','😴'] as $emoji)
                                <div class="hover:bg-[var(--color-secondery)] p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200">{{ $emoji }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Text Input -->
                <div class="relative flex-1">
                    <textarea placeholder="Write your message" rows="1"
                        class="w-full resize-none rounded-full px-4 py-2 !border-transparent focus:!border-transparent focus:!ring-transparent"
                        style="background:var(--color-secondery);color:var(--color-text)"></textarea>
                    <button type="button" class="text-white shrink-0 p-2 absolute right-0.5 top-0">
                        <ion-icon class="text-xl flex" name="send-outline"></ion-icon>
                    </button>
                </div>

                <!-- Like button -->
                <button type="button" style="color:var(--color-text)">
                    <ion-icon class="text-3xl flex -mt-3" name="heart-outline"></ion-icon>
                </button>

            </div>

        </div>

        <!-- ===== RIGHT: User Info Panel (togglable) ===== -->
        <div class="chat-right-panel rightt w-full h-full absolute top-0 right-0 z-10 hidden transition-transform">

            <div class="w-[360px] border-l shadow-lg h-screen absolute right-0 top-0 uk-animation-slide-right-medium z-50 dark:border-slate-700 overflow-y-auto"
                 style="background:var(--color-bg-card);border-color:var(--color-border)">

                <!-- Gradient top bar -->
                <div class="w-full h-1.5 bg-gradient-to-r to-purple-500 via-red-500 from-pink-500 -mt-px"></div>

                <!-- Profile info -->
                <div class="py-10 text-center text-sm pt-20">
                    <img src="{{ 'https://i.pravatar.cc/96?img=3' }}" class="w-24 h-24 rounded-full mx-auto mb-3 shadow" alt="Monroe Parker">
                    <div class="mt-8">
                        <div class="md:text-xl text-base font-medium" style="color:#fff">Monroe Parker</div>
                        <div class="text-sm mt-1" style="color:var(--color-text-muted)">@Monroepark</div>
                    </div>
                    <div class="mt-5">
                        <a href="#" class="inline-block rounded-full px-4 py-1.5 text-sm font-semibold" style="background:var(--color-secondery);color:var(--color-text)">View profile</a>
                    </div>
                </div>

                <hr style="border-color:var(--color-border)">

                <ul class="text-base font-medium p-3" style="color:var(--color-text)">
                    <li>
                        <div class="flex items-center gap-5 rounded-md p-3 w-full hover:bg-[var(--color-secondery)] cursor-pointer">
                            <ion-icon name="notifications-off-outline" class="text-2xl"></ion-icon>
                            Mute Notification
                            <label class="ml-auto cursor-pointer">
                                <input type="checkbox" checked class="w-4 h-4 rounded">
                            </label>
                        </div>
                    </li>
                    <li>
                        <button type="button" class="flex items-center gap-5 rounded-md p-3 w-full hover:bg-[var(--color-secondery)]">
                            <ion-icon name="flag-outline" class="text-2xl"></ion-icon> Report
                        </button>
                    </li>
                    <li>
                        <button type="button" class="flex items-center gap-5 rounded-md p-3 w-full hover:bg-[var(--color-secondery)]">
                            <ion-icon name="settings-outline" class="text-2xl"></ion-icon> Ignore messages
                        </button>
                    </li>
                    <li>
                        <button type="button" class="flex items-center gap-5 rounded-md p-3 w-full hover:bg-[var(--color-secondery)]">
                            <ion-icon name="stop-circle-outline" class="text-2xl"></ion-icon> Block
                        </button>
                    </li>
                    <li>
                        <button type="button" class="flex items-center gap-5 rounded-md p-3 w-full hover:bg-red-500/10 text-red-400">
                            <ion-icon name="trash-outline" class="text-2xl"></ion-icon> Delete Chat
                        </button>
                    </li>
                </ul>

                <!-- Close button -->
                <button type="button" class="absolute top-0 right-0 m-4 p-2 rounded-full button__ico"
                        style="background:var(--color-secondery)"
                        uk-toggle="target: .chat-right-panel ; cls: hidden">
                    <ion-icon name="close" class="text-2xl flex"></ion-icon>
                </button>

            </div>

            <!-- Overlay -->
            <div class="absolute w-full h-full" style="background:rgba(0,0,0,0.4);backdrop-filter:blur(2px)"
                 uk-toggle="target: .chat-right-panel ; cls: hidden"></div>

        </div>

    </div>

</div>

@endsection
