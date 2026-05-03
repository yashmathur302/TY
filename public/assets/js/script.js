/* =========================================
   EduConnect - Custom JavaScript
   ========================================= */

document.addEventListener('DOMContentLoaded', function () {

    // -----------------------------------------
    // Night Mode Toggle
    // -----------------------------------------
    const nightModeBtn = document.getElementById('night-mode-toggle');
    const html = document.documentElement;

    // Dark is the DEFAULT. If user previously chose light mode, remove the dark class.
    if (localStorage.getItem('darkMode') === 'false') {
        html.classList.remove('dark');
    }

    if (nightModeBtn) {
        nightModeBtn.addEventListener('click', function () {
            html.classList.toggle('dark');
            localStorage.setItem('darkMode', html.classList.contains('dark'));
        });
    }

    // -----------------------------------------
    // Story Image Preview (Create Story Modal)
    // -----------------------------------------
    const fileInput = document.getElementById('createStatusUrl');
    const previewImg = document.getElementById('createStatusImage');

    if (fileInput && previewImg) {
        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewImg.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // -----------------------------------------
    // Post Like Button Toggle
    // -----------------------------------------
    document.querySelectorAll('.post-like .button-icon').forEach(function (btn) {
        btn.addEventListener('click', function () {
            this.classList.toggle('text-red-500');
            this.classList.toggle('bg-red-100');
            this.classList.toggle('text-gray-500');
            this.classList.toggle('bg-slate-200/70');
        });
    });

    // -----------------------------------------
    // Auto-resize Comment Textareas
    // -----------------------------------------
    document.querySelectorAll('textarea').forEach(function (textarea) {
        textarea.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    });

    // -----------------------------------------
    // SimpleBar Init (custom scrollbars)
    // -----------------------------------------
    document.querySelectorAll('[data-simplebar]').forEach(function (el) {
        if (typeof SimpleBar !== 'undefined') {
            new SimpleBar(el);
        }
    });

    // -----------------------------------------
    // Close mobile sidebar on overlay click
    // -----------------------------------------
    const overlay = document.getElementById('site__sidebar__overly');
    const sidebar = document.getElementById('site__sidebar');

    if (overlay && sidebar) {
        overlay.addEventListener('click', function () {
            sidebar.classList.remove('!-translate-x-0');
        });
    }

    // -----------------------------------------
    // Mark notifications as read on click
    // -----------------------------------------
    document.querySelectorAll('.notif-item--unread').forEach(function (item) {
        item.addEventListener('click', function () {
            this.classList.remove('notif-item--unread', 'bg-teal-500/5');
            const dot = this.querySelector('.notif-dot');
            if (dot) dot.remove();
        });
    });

    // -----------------------------------------
    // Search box: show/hide on mobile
    // -----------------------------------------
    const searchBox = document.getElementById('search--box');
    if (searchBox) {
        searchBox.querySelector('input').addEventListener('focus', function () {
            searchBox.classList.add('shadow-md');
        });
        searchBox.querySelector('input').addEventListener('blur', function () {
            searchBox.classList.remove('shadow-md');
        });
    }

});
