<div id="site__sidebar" class="site-sidebar fixed top-0 left-0 z-[99] pt-[--m-top] overflow-hidden transition-transform xl:duration-500 max-xl:w-full max-xl:-translate-x-full">

    <!-- Sidebar Inner -->
    <div class="sidebar-inner p-2 max-xl:bg-white shadow-sm 2xl:w-72 sm:w-64 w-[80%] h-[calc(100vh-64px)] relative z-30 max-lg:border-r dark:max-xl:!bg-slate-700 dark:border-slate-700">

        <div class="sidebar-scroll pr-4" data-simplebar>

            <!-- Main Navigation -->
            <nav id="side" class="sidebar-nav">
                <ul class="sidebar-nav-list">
                    <li class="sidebar-nav-item active">
                        <a href="{{ route('feed') }}">
                            <ion-icon name="home" class="text-xl text-blue-500"></ion-icon>
                            <span>Feed</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="#">
                            <ion-icon name="chatbubbles" class="text-xl text-green-500"></ion-icon>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="#">
                            <ion-icon name="play-circle" class="text-xl text-red-500"></ion-icon>
                            <span>Video</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="#">
                            <ion-icon name="calendar" class="text-xl text-orange-500"></ion-icon>
                            <span>Event</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="#">
                            <ion-icon name="flag" class="text-xl text-purple-500"></ion-icon>
                            <span>Pages</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="#">
                            <ion-icon name="people" class="text-xl text-sky-500"></ion-icon>
                            <span>Groups</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="#">
                            <ion-icon name="storefront" class="text-xl text-teal-500"></ion-icon>
                            <span>Market</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="#">
                            <ion-icon name="newspaper" class="text-xl text-indigo-500"></ion-icon>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item !hidden" id="show__more">
                        <a href="#">
                            <ion-icon name="game-controller" class="text-xl text-pink-500"></ion-icon>
                            <span>Games</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item !hidden" id="show__more">
                        <a href="#">
                            <ion-icon name="heart-circle" class="text-xl text-rose-500"></ion-icon>
                            <span>Fundraiser</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item !hidden" id="show__more">
                        <a href="#">
                            <ion-icon name="document-text" class="text-xl text-amber-500"></ion-icon>
                            <span>Blog II</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item !hidden" id="show__more">
                        <a href="#">
                            <ion-icon name="ticket" class="text-xl text-cyan-500"></ion-icon>
                            <span>Event II</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item !hidden" id="show__more">
                        <a href="#">
                            <ion-icon name="person-add" class="text-xl text-violet-500"></ion-icon>
                            <span>Groups II</span>
                        </a>
                    </li>
                </ul>

                <button type="button" class="sidebar-seemore flex items-center gap-4 py-2 px-4 w-full font-medium text-sm text-black dark:text-white"
                        uk-toggle="target: #show__more; cls: !hidden uk-animation-fade">
                    <span class="sidebar-seemore-icon bg-gray-200 rounded-full w-6 h-6 dark:bg-slate-700 flex items-center justify-center">
                        <ion-icon name="chevron-down" class="text-sm"></ion-icon>
                    </span>
                    <span id="show__more">See More</span>
                    <span class="!hidden" id="show__more">See Less</span>
                </button>

            </nav>

            <!-- Shortcuts Section -->
            <div class="sidebar-shortcuts font-medium text-sm text-black border-t pt-3 mt-2 dark:text-white dark:border-slate-800">
                <div class="px-3 pb-2 text-sm font-medium">
                    <div class="text-black dark:text-white">Shortcut</div>
                </div>
                <a href="#">
                    <div class="sidebar-shortcut-item flex items-center gap-2 p-3 px-4 rounded-xl hover:bg-secondery">
                        <img src="https://i.pravatar.cc/24?img=2" alt="Marin Gray" class="w-6 h-6 rounded-full object-cover">
                        <div>Marin Gray</div>
                    </div>
                </a>
                <a href="#">
                    <div class="sidebar-shortcut-item flex items-center gap-2 p-3 px-4 rounded-xl hover:bg-secondery">
                        <img src="https://i.pravatar.cc/24?img=7" alt="Alexa Stella" class="w-6 h-6 rounded-full object-cover">
                        <div>Alexa Stella</div>
                    </div>
                </a>
                <a href="#">
                    <div class="sidebar-shortcut-item flex items-center gap-2 p-3 px-4 rounded-xl hover:bg-secondery">
                        <img src="https://i.pravatar.cc/24?img=3" alt="Sarah Ali" class="w-6 h-6 rounded-full object-cover">
                        <div>Sarah Ali</div>
                    </div>
                </a>
            </div>

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
                        <a href="#">
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
