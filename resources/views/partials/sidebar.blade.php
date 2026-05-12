<div id="site__sidebar" class="site-sidebar fixed top-0 left-0 z-[99] pt-[--m-top] overflow-hidden transition-transform xl:duration-500 max-xl:w-full max-xl:-translate-x-full">

    <!-- Sidebar Inner -->
    <div class="sidebar-inner p-2 max-xl:bg-white shadow-sm 2xl:w-72 sm:w-64 w-[80%] h-[calc(100vh-64px)] relative z-30 max-lg:border-r dark:max-xl:!bg-slate-700 dark:border-slate-700">

        <div class="sidebar-scroll pr-4" data-simplebar>

            <!-- Main Navigation -->
            <nav id="side" class="sidebar-nav">
                <ul class="sidebar-nav-list">
                    <li class="sidebar-nav-item {{ request()->routeIs('feed', 'feed.index') ? 'active' : '' }}">
                        <a href="{{ route('feed') }}">
                            <ion-icon name="home" class="text-xl text-blue-500"></ion-icon>
                            <span>Feed</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item {{ request()->routeIs('messages') ? 'active' : '' }}">
                        <a href="{{ route('messages') }}">
                            <ion-icon name="chatbubbles" class="text-xl text-green-500"></ion-icon>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item {{ request()->routeIs('events') ? 'active' : '' }}">
                        <a href="{{ route('events') }}">
                            <ion-icon name="calendar" class="text-xl text-orange-500"></ion-icon>
                            <span>Event</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item {{ request()->routeIs('pages') ? 'active' : '' }}">
                        <a href="{{ route('pages') }}">
                            <ion-icon name="flag" class="text-xl text-purple-500"></ion-icon>
                            <span>Pages</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item {{ request()->routeIs('groups') ? 'active' : '' }}">
                        <a href="{{ route('groups') }}">
                            <ion-icon name="people" class="text-xl text-sky-500"></ion-icon>
                            <span>Groups</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item {{ request()->routeIs('blog') ? 'active' : '' }}">
                        <a href="{{ route('blog') }}">
                            <ion-icon name="newspaper" class="text-xl text-indigo-500"></ion-icon>
                            <span>Blog</span>
                        </a>
                    </li>
                </ul>

            </nav>

            <!-- Pages Section -->
            <nav class="sidebar-pages font-medium text-sm text-black border-t pt-3 mt-2 dark:text-white dark:border-slate-800">
                <div class="px-3 pb-2 text-sm font-medium">
                    <div class="text-black dark:text-white">Pages</div>
                </div>
                <ul class="sidebar-pages-list mt-2 -space-y-2">
                    <li class="sidebar-pages-item">
                        <a href="#">
                            <ion-icon name="settings-outline" class="w-4 h-4"></ion-icon>
                            <span>Setting</span>
                        </a>
                    </li>
                    <li class="sidebar-pages-item">
                        <a href="#">
                            <ion-icon name="card-outline" class="w-4 h-4"></ion-icon>
                            <span>Upgrade</span>
                        </a>
                    </li>
                    <li class="sidebar-pages-item">
                        <a href="{{ route('login') }}">
                            <ion-icon name="log-in-outline" class="w-4 h-4"></ion-icon>
                            <span>Authentication</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Footer Links -->
            <div class="sidebar-footer text-xs font-medium flex flex-wrap gap-2 gap-y-0.5 p-2 mt-2">
                <a href="#" class="hover:underline">About</a>
                <a href="#" class="hover:underline">Blog</a>
                <a href="#" class="hover:underline">Careers</a>
                <a href="#" class="hover:underline">Support</a>
                <a href="#" class="hover:underline">Contact Us</a>
                <a href="#" class="hover:underline">Developer</a>
            </div>

        </div>

    </div>

    <!-- Sidebar Overlay (mobile) -->
    <div id="site__sidebar__overly"
         class="sidebar-overlay absolute top-0 left-0 z-20 w-screen h-screen xl:hidden backdrop-blur-sm"
         uk-toggle="target: #site__sidebar ; cls :!-translate-x-0">
    </div>

</div>
