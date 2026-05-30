<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='8' fill='%230ea5e9'/><text x='16' y='22' font-size='16' text-anchor='middle' fill='white' font-family='Arial' font-weight='bold'>E</text></svg>">

    <!-- SEO -->
    <title>@yield('title', 'EduConnect – Social Platform for Teachers & Students')</title>
    <meta name="description" content="@yield('description', 'EduConnect is a social media platform built for teachers and students to connect, share knowledge, and collaborate.')">
    <meta name="keywords" content="@yield('keywords', 'education, teachers, students, social media, learning, classroom')">
    <meta name="robots" content="index, follow">
    <meta name="author" content="EduConnect">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'EduConnect')">
    <meta property="og:description" content="@yield('description', 'Social platform for teachers and students')">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'EduConnect')">
    <meta name="twitter:description" content="@yield('description', 'Social platform for teachers and students')">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- UIKit CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.6/dist/css/uikit.min.css">

    <!-- SimpleBar CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@6.2.7/dist/simplebar.min.css">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary:   '#0ea5e9',
                        secondery: 'rgba(255,255,255,0.08)',
                        dark2:     '#1b2033',
                        dark3:     '#1e2846',
                        dark4:     '#222a45',
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @stack('styles')
</head>
<body>

    <div id="wrapper">

        <!-- Header -->
        @include('partials.header')

        <!-- Left Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <main id="site__main" class="site-main">
            @yield('content')
        </main>

    </div>

    <!-- Floating Chat Box -->
    @include('partials.chat-box')

    {{-- Create Entity Modals (Group / Page / Event / Blog) --}}
    @include('partials._create-entity-modals')

    {{-- Share Modal --}}
    <div class="hidden lg:p-20" id="share-post-modal" uk-modal="">
        <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-xl md:w-[480px] w-full dark:bg-dark2">

            {{-- Header --}}
            <div class="text-center py-4 border-b dark:border-slate-700 relative">
                <button type="button" id="share-back-btn"
                        class="button-icon absolute left-0 top-0 m-2.5 hidden">
                    <ion-icon name="arrow-back-outline" class="text-xl"></ion-icon>
                </button>
                <h2 class="text-sm font-medium text-black dark:text-white" id="share-modal-title">Share Post</h2>
                <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Step 1: Choose destination --}}
            <div id="share-step-dest">
                <p class="text-xs text-gray-400 dark:text-white/40 text-center pt-4 pb-1">Where would you like to share this post?</p>
                <div class="grid grid-cols-2 gap-3 p-4">
                    <button type="button" class="share-dest-card flex flex-col items-center gap-2 p-4 rounded-xl border border-gray-100 dark:border-slate-700 hover:border-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors"
                            data-dest="profile" data-label="My Profile" data-icon="person-circle-outline">
                        <ion-icon name="person-circle-outline" class="text-3xl text-blue-500"></ion-icon>
                        <span class="text-sm font-medium text-black dark:text-white">My Profile</span>
                    </button>
                    <button type="button" class="share-dest-card flex flex-col items-center gap-2 p-4 rounded-xl border border-gray-100 dark:border-slate-700 hover:border-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors"
                            data-dest="group" data-label="A Group" data-icon="people-outline">
                        <ion-icon name="people-outline" class="text-3xl text-green-500"></ion-icon>
                        <span class="text-sm font-medium text-black dark:text-white">A Group</span>
                    </button>
                    <button type="button" class="share-dest-card flex flex-col items-center gap-2 p-4 rounded-xl border border-gray-100 dark:border-slate-700 hover:border-orange-400 hover:bg-orange-50 dark:hover:bg-orange-900/20 transition-colors"
                            data-dest="event" data-label="An Event" data-icon="calendar-outline">
                        <ion-icon name="calendar-outline" class="text-3xl text-orange-500"></ion-icon>
                        <span class="text-sm font-medium text-black dark:text-white">An Event</span>
                    </button>
                    <button type="button" class="share-dest-card flex flex-col items-center gap-2 p-4 rounded-xl border border-gray-100 dark:border-slate-700 hover:border-purple-400 hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-colors"
                            data-dest="page" data-label="A Page" data-icon="flag-outline">
                        <ion-icon name="flag-outline" class="text-3xl text-purple-500"></ion-icon>
                        <span class="text-sm font-medium text-black dark:text-white">A Page</span>
                    </button>
                </div>
            </div>

            {{-- Step 2: Choose item (group / event / page list) --}}
            <div id="share-step-items" class="hidden">
                <div id="share-items-list" class="max-h-64 overflow-y-auto divide-y divide-gray-50 dark:divide-slate-700/50">
                    {{-- populated by JS --}}
                </div>
            </div>

            {{-- Step 3: Caption + confirm --}}
            <div id="share-step-caption" class="hidden">
                <div class="p-4 space-y-3">
                    {{-- Destination badge --}}
                    <div id="share-dest-badge" class="flex items-center gap-2 bg-slate-50 dark:bg-slate-700/50 rounded-lg px-3 py-2.5 text-sm">
                        {{-- populated by JS --}}
                    </div>
                    {{-- Caption textarea --}}
                    <textarea id="share-caption-input"
                              placeholder="Say something about this post... (optional)"
                              rows="3"
                              class="w-full rounded-xl border border-gray-200 dark:border-slate-600 bg-white dark:bg-slate-700 dark:text-white px-3 py-2.5 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                </div>
                <div class="px-4 pb-4 flex justify-between items-center">
                    <span id="share-submitting-msg" class="text-xs text-gray-400 hidden">Sharing...</span>
                    <button type="button" id="share-submit-btn"
                            class="button bg-blue-500 text-white px-10 ml-auto">
                        Share Now
                    </button>
                </div>
            </div>

        </div>
    </div>

    {{-- Users list modal (for likes/shares) --}}
    <div class="hidden" id="users-list-modal" uk-modal="">
        <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[400px] w-full dark:bg-dark2">
            <div class="text-center py-4 border-b dark:border-slate-700">
                <h2 class="text-sm font-medium text-black dark:text-white" id="users-list-title">People</h2>
                <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="max-h-80 overflow-y-auto py-2" id="users-list-body">
            </div>
        </div>
    </div>

    <!-- Page Modals -->
    @yield('modals')

    <!-- UIKit JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.6/dist/js/uikit-icons.min.js"></script>

    <!-- SimpleBar JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/simplebar@6.2.7/dist/simplebar.min.js"></script>

    <!-- Ionicons (CDN) -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Custom Script -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @stack('scripts')

    {{-- Post interaction JS — defined once, after all external scripts --}}
    <script>
    (function () {
        var _csrf = document.querySelector('meta[name="csrf-token"]')
                  ? document.querySelector('meta[name="csrf-token"]').content
                  : '';

        function _notify(msg, status) {
            if (typeof UIkit !== 'undefined') {
                UIkit.notification({ message: msg, status: status || 'danger', pos: 'bottom-right', timeout: 3000 });
            }
        }

        function _postJSON(url) {
            return fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': _csrf,
                    'Accept':       'application/json',
                    'Content-Type': 'application/json',
                },
                credentials: 'same-origin',
            }).then(function (r) {
                if (!r.ok) {
                    // Try to parse the JSON error, fall back to status text
                    return r.text().then(function (body) {
                        var msg = 'Server error ' + r.status;
                        try { var parsed = JSON.parse(body); if (parsed.message) msg = parsed.message; } catch (e) {}
                        throw new Error(msg);
                    });
                }
                return r.json();
            });
        }

        window.handleLike = function (btn) {
            var postId = btn.dataset.postId;
            btn.disabled = true;
            _postJSON('/posts/' + postId + '/like')
                .then(function (data) {
                    var icon    = btn.querySelector('ion-icon');
                    var countEl = document.getElementById('like-count-' + postId);
                    if (data.liked) {
                        btn.classList.remove('text-gray-500', 'dark:text-white/60', 'text-gray-400');
                        btn.classList.add('text-red-500');
                        if (icon) icon.setAttribute('name', 'heart');
                    } else {
                        btn.classList.remove('text-red-500');
                        btn.classList.add('text-gray-500', 'dark:text-white/60');
                        if (icon) icon.setAttribute('name', 'heart-outline');
                    }
                    if (countEl) {
                        if (data.count > 0) {
                            countEl.textContent = data.count;
                            countEl.classList.remove('hidden');
                        } else {
                            countEl.classList.add('hidden');
                        }
                    }
                })
                .catch(function (e) {
                    console.error('Like failed:', e.message);
                    _notify('Could not like post: ' + e.message);
                })
                .finally(function () { btn.disabled = false; });
        };

        // ── Share modal state ────────────────────────────────────
        var _sharePostId    = null;
        var _shareBtn       = null;
        var _shareDestType  = null;
        var _shareDestId    = null;
        var _shareHistStack = []; // 'dest' | 'items'

        function _shareStep(step) {
            var dest    = document.getElementById('share-step-dest');
            var items   = document.getElementById('share-step-items');
            var caption = document.getElementById('share-step-caption');
            var backBtn = document.getElementById('share-back-btn');
            var title   = document.getElementById('share-modal-title');
            if (!dest) return;
            dest.classList.toggle('hidden',    step !== 'dest');
            items.classList.toggle('hidden',   step !== 'items');
            caption.classList.toggle('hidden', step !== 'caption');
            backBtn.classList.toggle('hidden', step === 'dest');
            var titles = { dest: 'Share Post', items: 'Choose Destination', caption: 'Add a Message' };
            if (title) title.textContent = titles[step] || 'Share';
        }

        window.showShareModal = function (btn) {
            _sharePostId    = btn.dataset.postId;
            _shareBtn       = btn;
            _shareDestType  = null;
            _shareDestId    = null;
            _shareHistStack = [];
            var captionEl = document.getElementById('share-caption-input');
            if (captionEl) captionEl.value = '';
            _shareStep('dest');
            if (typeof UIkit !== 'undefined') UIkit.modal('#share-post-modal').show();
        };

        // Back button
        var _shareBackBtn = document.getElementById('share-back-btn');
        if (_shareBackBtn) {
            _shareBackBtn.addEventListener('click', function () {
                var prev = _shareHistStack.pop();
                _shareStep(prev || 'dest');
            });
        }

        // Destination cards click
        document.querySelectorAll('.share-dest-card').forEach(function (card) {
            card.addEventListener('click', function () {
                _shareDestType = this.dataset.dest;
                if (_shareDestType === 'profile') {
                    _shareDestId = null;
                    _populateDestBadge('My Profile', 'person-circle-outline', '#3b82f6');
                    _shareHistStack.push('dest');
                    _shareStep('caption');
                } else {
                    var endpointMap = { group: 'groups', event: 'events', page: 'pages' };
                    _loadShareItems(endpointMap[_shareDestType], this.dataset.label);
                    _shareHistStack.push('dest');
                    _shareStep('items');
                }
            });
        });

        function _loadShareItems(endpoint, destLabel) {
            var listEl = document.getElementById('share-items-list');
            if (!listEl) return;

            var emptyMessages = {
                groups: "You haven't joined or created any groups yet.",
                events: "You haven't created or joined any events yet.",
                pages:  "You haven't created or followed any pages yet."
            };
            var emptyMsg = emptyMessages[endpoint] || 'No items found.';

            listEl.innerHTML = '<div class="text-center py-8 text-gray-400 text-sm">Loading...</div>';
            fetch('/share-data/' + endpoint, {
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': _csrf }
            })
                .then(function (r) {
                    if (!r.ok) {
                        return r.text().then(function (body) {
                            throw new Error('Server error ' + r.status);
                        });
                    }
                    return r.json();
                })
                .then(function (items) {
                    if (!Array.isArray(items) || items.length === 0) {
                        listEl.innerHTML =
                            '<div class="flex flex-col items-center gap-2 py-10 text-gray-400 dark:text-white/40">' +
                            '<ion-icon name="' + (endpoint === 'groups' ? 'people-outline' : endpoint === 'events' ? 'calendar-outline' : 'flag-outline') + '" class="text-4xl opacity-40"></ion-icon>' +
                            '<p class="text-sm font-normal text-center px-6">' + emptyMsg + '</p>' +
                            '</div>';
                        return;
                    }
                    listEl.innerHTML = items.map(function (item) {
                        var safeName = String(item.name || '').replace(/&/g,'&amp;').replace(/"/g,'&quot;').replace(/</g,'&lt;');
                        var img = item.cover
                            ? '<img src="' + item.cover + '" class="w-10 h-10 rounded-lg object-cover shrink-0" alt="">'
                            : '<div class="w-10 h-10 rounded-lg bg-slate-100 dark:bg-slate-600 flex items-center justify-center shrink-0 text-gray-400 text-lg">📌</div>';
                        return '<button type="button" class="share-item-row w-full flex items-center gap-3 px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-700/40 transition-colors text-left"' +
                            ' data-id="' + item.id + '" data-name="' + safeName + '">' +
                            img +
                            '<span class="text-sm font-medium text-black dark:text-white flex-1 truncate">' + safeName + '</span>' +
                            '<ion-icon name="chevron-forward-outline" class="text-gray-300 dark:text-white/30 text-lg shrink-0"></ion-icon>' +
                            '</button>';
                    }).join('');

                    listEl.querySelectorAll('.share-item-row').forEach(function (row) {
                        row.addEventListener('click', function () {
                            _shareDestId = this.dataset.id;
                            var iconMap  = { groups: 'people-outline', events: 'calendar-outline', pages: 'flag-outline' };
                            var colorMap = { groups: '#22c55e', events: '#f97316', pages: '#a855f7' };
                            var typeLabel = { groups: 'Group', events: 'Event', pages: 'Page' };
                            _populateDestBadge((typeLabel[endpoint] || '') + ': ' + this.dataset.name, iconMap[endpoint] || 'location-outline', colorMap[endpoint] || '#3b82f6');
                            _shareHistStack.push('items');
                            _shareStep('caption');
                        });
                    });
                })
                .catch(function (err) {
                    console.error('Share items load failed:', err);
                    listEl.innerHTML =
                        '<div class="flex flex-col items-center gap-2 py-10 text-red-400">' +
                        '<ion-icon name="cloud-offline-outline" class="text-4xl"></ion-icon>' +
                        '<p class="text-sm font-normal">Could not load ' + endpoint + '. Please try again.</p>' +
                        '</div>';
                });
        }

        function _populateDestBadge(label, icon, color) {
            var badge = document.getElementById('share-dest-badge');
            if (!badge) return;
            badge.innerHTML =
                '<ion-icon name="' + icon + '" class="text-lg shrink-0" style="color:' + color + '"></ion-icon>' +
                '<span class="text-sm text-gray-500 dark:text-white/60">Sharing to <strong class="text-black dark:text-white font-semibold">' + label + '</strong></span>';
        }

        // Submit share
        var _shareSubmitBtn = document.getElementById('share-submit-btn');
        if (_shareSubmitBtn) {
            _shareSubmitBtn.addEventListener('click', function () {
                var btn    = this;
                var msgEl  = document.getElementById('share-submitting-msg');
                var caption = (document.getElementById('share-caption-input') || {}).value || '';
                btn.disabled = true;
                if (msgEl) msgEl.classList.remove('hidden');

                fetch('/posts/' + _sharePostId + '/share', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': _csrf,
                        'Accept':       'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        destination_type: _shareDestType,
                        destination_id:   _shareDestId || null,
                        caption:          caption || null,
                    }),
                })
                .then(function (r) {
                    if (!r.ok) throw new Error('HTTP ' + r.status);
                    return r.json();
                })
                .then(function (data) {
                    var countEl = document.getElementById('share-count-' + _sharePostId);
                    if (countEl && data.count > 0) {
                        countEl.textContent = data.count;
                        countEl.classList.remove('hidden');
                    }
                    if (_shareBtn) {
                        var btnIcon = _shareBtn.querySelector('ion-icon');
                        if (btnIcon) btnIcon.setAttribute('name', 'checkmark-circle');
                        _shareBtn.classList.add('text-blue-500');
                        setTimeout(function () {
                            if (btnIcon) btnIcon.setAttribute('name', 'share-social-outline');
                            _shareBtn.classList.remove('text-blue-500');
                        }, 2000);
                    }
                    if (typeof UIkit !== 'undefined') UIkit.modal('#share-post-modal').hide();
                    if (document.getElementById('share-caption-input')) {
                        document.getElementById('share-caption-input').value = '';
                    }
                    _notify('Post shared successfully!', 'success');
                })
                .catch(function (e) {
                    console.error('Share failed:', e.message);
                    _notify('Could not share post: ' + e.message);
                })
                .finally(function () {
                    btn.disabled = false;
                    if (msgEl) msgEl.classList.add('hidden');
                });
            });
        }

        window.toggleCommentBox = function (postId) {
            var section = document.getElementById('comments-' + postId);
            if (section) section.classList.toggle('hidden');
        };

        window.toggleReplyBox = function (commentId) {
            var box = document.getElementById('reply-form-' + commentId);
            if (!box) return;
            box.classList.toggle('hidden');
            if (!box.classList.contains('hidden')) {
                var inp = box.querySelector('input[name="content"]');
                if (inp) inp.focus();
            }
        };

        window.showUsersList = function (postId, type, title) {
            var modal   = document.getElementById('users-list-modal');
            var titleEl = document.getElementById('users-list-title');
            var listEl  = document.getElementById('users-list-body');
            if (!modal || !listEl) return;
            if (titleEl) titleEl.textContent = title;
            listEl.innerHTML = '<div class="text-center py-6 text-gray-400">Loading...</div>';
            if (typeof UIkit !== 'undefined') UIkit.modal(modal).show();
            fetch('/posts/' + postId + '/' + type, { headers: { 'Accept': 'application/json' } })
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    if (!data.users || data.users.length === 0) {
                        listEl.innerHTML = '<div class="text-center py-6 text-gray-400 font-normal text-sm">No one yet.</div>';
                        return;
                    }
                    listEl.innerHTML = data.users.map(function (u) {
                        return '<div class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-50 dark:hover:bg-slate-700/40">' +
                            '<img src="' + u.avatar + '" class="w-9 h-9 rounded-full object-cover" alt="">' +
                            '<div><p class="font-semibold text-sm text-black dark:text-white">' + u.name + '</p>' +
                            '<p class="text-xs text-gray-400 dark:text-white/40">@' + u.username + '</p></div>' +
                            '</div>';
                    }).join('');
                })
                .catch(function () {
                    listEl.innerHTML = '<div class="text-center py-6 text-red-400 text-sm">Failed to load.</div>';
                });
        };
    })();
    </script>
</body>
</html>
