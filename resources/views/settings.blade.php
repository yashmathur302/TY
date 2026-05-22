@extends('layouts.app')

@section('title', 'Account Settings')

@section('content')

@php
    $user      = auth()->user();
    $activeTab = (int)(old('active_tab') ?? session('active_tab') ?? 0);
    $avatarUrl = $user->avatarUrl();
@endphp

<div class="max-w-3xl mx-auto">

    <div class="box relative rounded-lg shadow-md">

        {{-- Profile header --}}
        <div class="flex md:gap-8 gap-4 items-center md:p-8 p-6 md:pb-4">

            {{-- Avatar upload form --}}
            <form method="POST" action="{{ route('settings.avatar') }}" enctype="multipart/form-data" id="avatar-form">
                @csrf
                <div class="relative md:w-20 md:h-20 w-12 h-12 shrink-0">
                    <label for="avatar-file" class="cursor-pointer">
                        <img src="{{ $avatarUrl }}" class="object-cover w-full h-full rounded-full" alt="{{ $user->name }}">
                    </label>
                    <label for="avatar-file" class="md:p-1 p-0.5 rounded-full bg-slate-600 md:border-4 border-white absolute -bottom-2 -right-2 cursor-pointer dark:border-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="md:w-4 md:h-4 w-3 h-3 fill-white">
                            <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                            <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                        <input id="avatar-file" name="avatar" type="file" class="hidden"
                               onchange="document.getElementById('avatar-form').submit()">
                    </label>
                </div>
            </form>

            <div class="flex-1">
                <h3 class="md:text-xl text-base font-semibold text-black dark:text-white">{{ $user->name }}</h3>
                <p class="text-sm text-blue-600 mt-1 font-normal">&#64;{{ $user->username ?? 'username' }}</p>
            </div>

            <button class="inline-flex items-center gap-1 py-1 pl-2.5 pr-3 rounded-full bg-slate-50 border-2 border-slate-100 dark:text-white dark:bg-slate-700" type="button">
                <ion-icon name="flash-outline" class="text-base"></ion-icon>
                <span class="font-medium text-sm">Upgrade</span>
            </button>
        </div>

        {{-- Flash message --}}
        @if(session('success'))
        <div class="mx-6 mb-2 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-lg px-4 py-3 text-sm text-green-700 dark:text-green-400">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="mx-6 mb-2 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 rounded-lg px-4 py-3 text-sm text-red-600 dark:text-red-400">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        {{-- Scrollable nav tabs --}}
        <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
            <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
                <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden"
                    id="settings-switcher"
                    uk-switcher="connect: #setting_tab; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                    <li class="w-auto pr-2.5"><a href="#">Description</a></li>
                    <li class="w-auto pr-2.5"><a href="#">Social Links</a></li>
                    <li class="w-auto pr-2.5"><a href="#">Notifications</a></li>
                    <li class="w-auto pr-2.5"><a href="#">Privacy</a></li>
                    <li class="w-auto pr-2.5"><a href="#">Invites</a></li>
                    <li class="w-auto pr-2.5"><a href="#">Alerts</a></li>
                    <li class="w-auto pr-2.5"><a href="#">Password</a></li>
                </ul>
            </nav>
            <a class="absolute -translate-y-1/2 top-1/2 left-0 flex items-center w-20 h-full p-2 py-1 justify-start bg-gradient-to-r from-white via-white dark:from-slate-800 dark:via-slate-800"
               href="#" uk-slider-item="previous">
                <ion-icon name="chevron-back" class="text-2xl ml-1"></ion-icon>
            </a>
            <a class="absolute right-0 -translate-y-1/2 top-1/2 flex items-center w-20 h-full p-2 py-1 justify-end bg-gradient-to-l from-white via-white dark:from-slate-800 dark:via-slate-800"
               href="#" uk-slider-item="next">
                <ion-icon name="chevron-forward" class="text-2xl mr-1"></ion-icon>
            </a>
        </div>

        <div id="setting_tab" class="uk-switcher md:py-12 md:px-20 p-6 overflow-hidden text-black text-sm dark:text-white">

            {{-- Tab 1: Description (Basic Info) --}}
            <div>
                <form method="POST" action="{{ route('settings.profile') }}">
                    @csrf
                    <input type="hidden" name="active_tab" value="0">

                    <div class="space-y-6">

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right dark:text-white/80">Name</label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="text" name="name"
                                       value="{{ old('name', $user->name) }}"
                                       placeholder="Full name"
                                       class="w-full @error('name') !border-red-400 @enderror">
                            </div>
                        </div>

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right dark:text-white/80">Username</label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="text" name="username"
                                       value="{{ old('username', $user->username) }}"
                                       placeholder="username"
                                       class="lg:w-1/2 w-full @error('username') !border-red-400 @enderror">
                            </div>
                        </div>

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right dark:text-white/80">Email</label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="email" name="email"
                                       value="{{ old('email', $user->email) }}"
                                       placeholder="you@example.com"
                                       class="w-full @error('email') !border-red-400 @enderror">
                            </div>
                        </div>

                        <div class="md:flex items-start gap-10">
                            <label class="md:w-32 text-right dark:text-white/80">Bio</label>
                            <div class="flex-1 max-md:mt-4">
                                <textarea name="bio" class="w-full" rows="5"
                                          placeholder="Tell people a bit about yourself">{{ old('bio', $user->bio) }}</textarea>
                            </div>
                        </div>

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right dark:text-white/80">Location</label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="text" name="location"
                                       value="{{ old('location', $user->location) }}"
                                       placeholder="City, Country"
                                       class="w-full @error('location') !border-red-400 @enderror">
                            </div>
                        </div>

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right dark:text-white/80">Work</label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="text" name="work"
                                       value="{{ old('work', $user->work) }}"
                                       placeholder="Where do you work?"
                                       class="w-full @error('work') !border-red-400 @enderror">
                            </div>
                        </div>

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right dark:text-white/80">Education</label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="text" name="education"
                                       value="{{ old('education', $user->education) }}"
                                       placeholder="School or university"
                                       class="w-full @error('education') !border-red-400 @enderror">
                            </div>
                        </div>

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right dark:text-white/80">Website</label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="url" name="website"
                                       value="{{ old('website', $user->website) }}"
                                       placeholder="https://yoursite.com"
                                       class="w-full @error('website') !border-red-400 @enderror">
                            </div>
                        </div>

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right dark:text-white/80">Gender</label>
                            <div class="flex-1 max-md:mt-4">
                                <select name="gender" class="!border-0 !rounded-md lg:w-1/2 w-full">
                                    <option value="">Prefer not to say</option>
                                    <option value="male"   @selected(old('gender', $user->gender) === 'male')>Male</option>
                                    <option value="female" @selected(old('gender', $user->gender) === 'female')>Female</option>
                                    <option value="other"  @selected(old('gender', $user->gender) === 'other')>Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right dark:text-white/80">Relationship</label>
                            <div class="flex-1 max-md:mt-4">
                                <select name="relationship_status" class="!border-0 !rounded-md lg:w-1/2 w-full">
                                    <option value="none"            @selected(old('relationship_status', $user->relationship_status) === 'none')>None</option>
                                    <option value="single"          @selected(old('relationship_status', $user->relationship_status) === 'single')>Single</option>
                                    <option value="in_relationship" @selected(old('relationship_status', $user->relationship_status) === 'in_relationship')>In a relationship</option>
                                    <option value="married"         @selected(old('relationship_status', $user->relationship_status) === 'married')>Married</option>
                                    <option value="engaged"         @selected(old('relationship_status', $user->relationship_status) === 'engaged')>Engaged</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center gap-4 mt-16 lg:pl-[10.5rem]">
                        <a href="{{ route('settings') }}" class="button lg:px-6 bg-secondery max-md:flex-1">Cancel</a>
                        <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1">Save</button>
                    </div>
                </form>
            </div>

            {{-- Tab 2: Social Links --}}
            <div>
                <form method="POST" action="{{ route('settings.social') }}">
                    @csrf
                    <input type="hidden" name="active_tab" value="1">

                    <div class="max-w-md mx-auto">
                        <div>
                            <h4 class="text-xl font-medium text-black dark:text-white">Social Links</h4>
                            <p class="mt-3 font-normal text-gray-600 dark:text-white/70">Add links to your social profiles so others can find you.</p>
                        </div>

                        <div class="space-y-6 mt-8">

                            <div class="flex items-center gap-3">
                                <div class="bg-blue-50 rounded-full p-2 flex">
                                    <ion-icon name="logo-facebook" class="text-2xl text-blue-600"></ion-icon>
                                </div>
                                <div class="flex-1">
                                    <input type="url" name="facebook_url" class="w-full"
                                           value="{{ old('facebook_url', $user->facebook_url) }}"
                                           placeholder="https://www.facebook.com/yourname">
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="bg-pink-50 rounded-full p-2 flex">
                                    <ion-icon name="logo-instagram" class="text-2xl text-pink-600"></ion-icon>
                                </div>
                                <div class="flex-1">
                                    <input type="url" name="instagram_url" class="w-full"
                                           value="{{ old('instagram_url', $user->instagram_url) }}"
                                           placeholder="https://www.instagram.com/yourname">
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="bg-sky-50 rounded-full p-2 flex">
                                    <ion-icon name="logo-twitter" class="text-2xl text-sky-600"></ion-icon>
                                </div>
                                <div class="flex-1">
                                    <input type="url" name="twitter_url" class="w-full"
                                           value="{{ old('twitter_url', $user->twitter_url) }}"
                                           placeholder="https://www.twitter.com/yourname">
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="bg-red-50 rounded-full p-2 flex">
                                    <ion-icon name="logo-youtube" class="text-2xl text-red-600"></ion-icon>
                                </div>
                                <div class="flex-1">
                                    <input type="url" name="youtube_url" class="w-full"
                                           value="{{ old('youtube_url', $user->youtube_url) }}"
                                           placeholder="https://www.youtube.com/yourname">
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="bg-slate-50 rounded-full p-2 flex">
                                    <ion-icon name="logo-github" class="text-2xl text-black dark:text-white"></ion-icon>
                                </div>
                                <div class="flex-1">
                                    <input type="url" name="github_url" class="w-full"
                                           value="{{ old('github_url', $user->github_url) }}"
                                           placeholder="https://www.github.com/yourname">
                                </div>
                            </div>

                        </div>

                        <div class="flex items-center justify-center gap-4 mt-16">
                            <a href="{{ route('settings') }}" class="button lg:px-6 bg-secondery max-md:flex-1">Cancel</a>
                            <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1">Save</button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Tab 3: Notifications (checkboxes) --}}
            <div>
                <div class="md:flex items-start gap-16">
                    <label class="md:w-32 text-right font-semibold dark:text-white">Notify me when</label>
                    <div class="flex-1 space-y-4 max-md:mt-5">

                        @foreach([
                            'Someone sends me a message',
                            'Someone liked my photo',
                            'Someone shared on my photo',
                            'Someone followed me',
                            'Someone liked my posts',
                            'Someone mentioned me',
                            'Someone sent me a follow request',
                        ] as $item)
                        <div>
                            <label class="inline-flex items-center">
                                <input class="rounded" type="checkbox" checked>
                                <span class="ml-3">{{ $item }}</span>
                            </label>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="flex items-center justify-center gap-4 mt-16">
                    <button type="button" class="button lg:px-6 bg-secondery max-md:flex-1">Cancel</button>
                    <button type="button" class="button lg:px-10 bg-primary text-white max-md:flex-1">Save</button>
                </div>
            </div>

            {{-- Tab 4: Privacy (radio buttons) --}}
            <div>
                <div class="space-y-6">

                    <div class="md:flex items-start gap-10">
                        <label class="w-40 text-right font-semibold dark:text-white">Who can follow me?</label>
                        <div class="flex-1 space-y-2 max-md:mt-3">
                            <div><label class="inline-flex items-center"><input type="radio" name="radio-follow" checked><span class="ml-3">Everyone</span></label></div>
                            <div><label class="inline-flex items-center"><input type="radio" name="radio-follow"><span class="ml-3">The People I Follow</span></label></div>
                            <div><label class="inline-flex items-center"><input type="radio" name="radio-follow"><span class="ml-3">Nobody</span></label></div>
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-40 text-right font-semibold dark:text-white">Who can message me?</label>
                        <div class="flex-1 space-y-2 max-md:mt-3">
                            <div><label class="inline-flex items-center"><input type="radio" name="radio-message" checked><span class="ml-3">Everyone</span></label></div>
                            <div><label class="inline-flex items-center"><input type="radio" name="radio-message"><span class="ml-3">The People I Follow</span></label></div>
                            <div><label class="inline-flex items-center"><input type="radio" name="radio-message"><span class="ml-3">Nobody</span></label></div>
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-40 text-right font-semibold dark:text-white">Status</label>
                        <div class="flex-1 space-y-2 max-md:mt-3">
                            <div><label class="inline-flex items-center"><input type="radio" name="radio-status" checked><span class="ml-3">Yes</span></label></div>
                            <div><label class="inline-flex items-center"><input type="radio" name="radio-status"><span class="ml-3">No</span></label></div>
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-40 text-right font-semibold dark:text-white">Show my activities?</label>
                        <div class="flex-1 space-y-2 max-md:mt-3">
                            <div><label class="inline-flex items-center"><input type="radio" name="radio-activity" checked><span class="ml-3">Public</span></label></div>
                            <div><label class="inline-flex items-center"><input type="radio" name="radio-activity"><span class="ml-3">Hide</span></label></div>
                        </div>
                    </div>

                </div>

                <div class="flex items-center justify-center gap-4 mt-16">
                    <button type="button" class="button lg:px-6 bg-secondery max-md:flex-1">Cancel</button>
                    <button type="button" class="button lg:px-10 bg-primary text-white max-md:flex-1">Save</button>
                </div>
            </div>

            {{-- Tab 5: Invites (select dropdowns) --}}
            <div>
                <div class="space-y-6 max-w-lg mx-auto font-medium">

                    <div class="md:flex items-center gap-16 justify-between">
                        <label class="md:w-40 text-right dark:text-white/80">Who can follow me?</label>
                        <div class="flex-1 max-md:mt-4">
                            <select class="w-full !border-0 !rounded-md">
                                <option>Everyone</option>
                                <option>People I Follow</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-16 justify-between">
                        <label class="md:w-40 text-right dark:text-white/80">Who can message me?</label>
                        <div class="flex-1 max-md:mt-4">
                            <select class="w-full !border-0 !rounded-md">
                                <option>Everyone</option>
                                <option>People I Follow</option>
                                <option>Nobody</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-16 justify-between">
                        <label class="md:w-40 text-right dark:text-white/80">Show my activities?</label>
                        <div class="flex-1 max-md:mt-4">
                            <select class="w-full !border-0 !rounded-md">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-16 justify-between">
                        <label class="md:w-40 text-right dark:text-white/80">Status</label>
                        <div class="flex-1 max-md:mt-4">
                            <select class="w-full !border-0 !rounded-md">
                                <option>Online</option>
                                <option>Offline</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-16 justify-between">
                        <label class="md:w-40 text-right dark:text-white/80">Who can see my tags?</label>
                        <div class="flex-1 max-md:mt-4">
                            <select class="w-full !border-0 !rounded-md">
                                <option>Everyone</option>
                                <option>People I Follow</option>
                                <option>Nobody</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-16 justify-between">
                        <label class="md:w-40 text-right dark:text-white/80">Allow search engines</label>
                        <div class="flex-1 max-md:mt-4">
                            <select class="w-full !border-0 !rounded-md">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="flex items-center justify-center gap-4 mt-16">
                    <button type="button" class="button lg:px-6 bg-secondery max-md:flex-1">Cancel</button>
                    <button type="button" class="button lg:px-10 bg-primary text-white max-md:flex-1">Save</button>
                </div>
            </div>

            {{-- Tab 6: Alerts (toggle switches) --}}
            <div>
                <div class="max-w-lg mx-auto font-normal text-gray-400 text-sm">
                    <div>
                        <h4 class="text-lg font-semibold text-black dark:text-white">Alerts preferences</h4>
                        <p class="mt-3">We may still send you important notifications about your account and content outside of your preferred notification settings.</p>
                    </div>

                    <div class="mt-8 md:space-y-8 space-y-4"
                         uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 100; repeat: true">

                        <div class="w-full">
                            <label class="switch flex justify-between items-center cursor-pointer gap-4">
                                <div class="bg-sky-100 text-sky-500 rounded-full p-2 md:flex hidden shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </div>
                                <div class="flex-1 md:pr-8">
                                    <h4 class="text-base font-medium mb-1.5 text-black dark:text-white">Email notifications</h4>
                                    <p>You can receive notifications about important updates and content directly to your email inbox.</p>
                                </div>
                                <input type="checkbox" checked><span class="switch-button !relative"></span>
                            </label>
                        </div>

                        <div class="w-full">
                            <label class="switch flex justify-between items-center cursor-pointer gap-4">
                                <div class="bg-purple-100 text-purple-500 rounded-full p-2 md:flex hidden shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859M12 3v8.25m0 0l-3-3m3 3l3-3" />
                                    </svg>
                                </div>
                                <div class="flex-1 md:pr-8">
                                    <h4 class="text-base font-medium mb-1.5 text-black dark:text-white">Web notifications</h4>
                                    <p>You can receive notifications through your notifications center.</p>
                                </div>
                                <input type="checkbox"><span class="switch-button !relative"></span>
                            </label>
                        </div>

                        <div class="w-full">
                            <label class="switch flex justify-between items-center cursor-pointer gap-4">
                                <div class="bg-teal-100 text-teal-500 rounded-full p-2 md:flex hidden shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                    </svg>
                                </div>
                                <div class="flex-1 md:pr-8">
                                    <h4 class="text-base font-medium mb-1.5 text-black dark:text-white">Phone notifications</h4>
                                    <p>You can receive notifications on your phone, so you can stay up-to-date even when you're on the go.</p>
                                </div>
                                <input type="checkbox" checked><span class="switch-button !relative"></span>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="flex items-center justify-center gap-4 mt-16">
                    <button type="button" class="button lg:px-6 bg-secondery max-md:flex-1">Cancel</button>
                    <button type="button" class="button lg:px-10 bg-primary text-white max-md:flex-1">Save</button>
                </div>
            </div>

            {{-- Tab 7: Password --}}
            <div>
                <form method="POST" action="{{ route('settings.password') }}">
                    @csrf
                    <input type="hidden" name="active_tab" value="6">

                    <div class="space-y-6 max-w-lg mx-auto">

                        <div class="md:flex items-center gap-16 justify-between max-md:space-y-3">
                            <label class="md:w-40 text-right dark:text-white/80">Current Password</label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="password" name="current_password" placeholder="******"
                                       class="w-full @error('current_password') !border-red-400 @enderror">
                            </div>
                        </div>

                        <div class="md:flex items-center gap-16 justify-between max-md:space-y-3">
                            <label class="md:w-40 text-right dark:text-white/80">New Password</label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="password" name="password" placeholder="Min 8 chars"
                                       class="w-full @error('password') !border-red-400 @enderror">
                            </div>
                        </div>

                        <div class="md:flex items-center gap-16 justify-between max-md:space-y-3">
                            <label class="md:w-40 text-right dark:text-white/80">Repeat Password</label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="password" name="password_confirmation" placeholder="Repeat"
                                       class="w-full">
                            </div>
                        </div>

                        <hr class="border-gray-100 dark:border-gray-700">

                        <div class="md:flex items-center gap-16 justify-between">
                            <label class="md:w-40 text-right dark:text-white/80">Two-factor authentication</label>
                            <div class="flex-1 max-md:mt-4">
                                <select class="w-full !border-0 !rounded-md">
                                    <option value="1">Enable</option>
                                    <option value="2">Disable</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center justify-center gap-4 mt-16">
                        <a href="{{ route('settings') }}" class="button lg:px-6 bg-secondery max-md:flex-1">Cancel</a>
                        <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1">Save</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>

@if($activeTab > 0)
<script>
document.addEventListener('DOMContentLoaded', function () {
    var el = document.getElementById('settings-switcher');
    if (el) UIkit.switcher(el).show({{ $activeTab }});
});
</script>
@endif

@endsection
