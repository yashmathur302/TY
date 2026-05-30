{{-- Create Status Modal. Pass $modalRedirectTo = 'feed' | 'profile' --}}
@php $redirectTo = $modalRedirectTo ?? 'feed'; @endphp

<div class="hidden lg:p-20" id="create-status" uk-modal="">
    <div class="modal-create-status uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

        <div class="modal-header text-center py-4 border-b mb-0 dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Create Status</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" id="create-status-form">
            @csrf
            <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">
            <input type="hidden" name="privacy" id="cs-privacy" value="public">
            <input type="hidden" name="feeling" id="cs-feeling" value="">
            <input type="hidden" name="location" id="cs-location" value="">

            <div class="modal-body space-y-3 mt-3 p-4">
                <textarea name="content" id="cs-content"
                    class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                    rows="4" placeholder="What do you have in mind?"></textarea>

                {{-- Feeling picker --}}
                <div id="cs-feeling-row" class="hidden">
                    <div class="flex flex-wrap gap-1.5 p-2 bg-slate-50 dark:bg-slate-800 rounded-lg">
                        @foreach(['😊 Happy','😢 Sad','😂 Laughing','😍 Loved','🥳 Celebratory','😎 Cool','🤔 Thoughtful','😤 Motivated'] as $emotion)
                        <button type="button"
                                class="cs-feeling-btn text-xs px-2.5 py-1 rounded-full bg-orange-50 hover:bg-orange-100 dark:bg-orange-900/30 dark:hover:bg-orange-800/40 text-orange-700 dark:text-orange-300"
                                data-feeling="{{ $emotion }}">{{ $emotion }}</button>
                        @endforeach
                    </div>
                    <p id="cs-feeling-label" class="hidden text-xs text-orange-600 dark:text-orange-400 mt-1 px-1"></p>
                </div>

                {{-- Location input --}}
                <div id="cs-location-row" class="hidden">
                    <input type="text" id="cs-location-input"
                           placeholder="Where are you? City, venue..."
                           class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-white"
                           oninput="document.getElementById('cs-location').value=this.value">
                </div>

                {{-- Image preview --}}
                <div id="cs-image-preview" class="hidden">
                    <div class="relative">
                        <img id="cs-image-thumb" src="#" alt="Preview" class="w-full max-h-52 object-cover rounded-lg">
                        <button type="button" id="cs-remove-image" class="absolute top-1 right-1 bg-black/50 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">&times;</button>
                    </div>
                </div>

                {{-- Video preview --}}
                <div id="cs-video-preview" class="hidden">
                    <div class="relative">
                        <video id="cs-video-thumb" src="#" controls class="w-full max-h-52 rounded-lg bg-black"></video>
                        <button type="button" id="cs-remove-video" class="absolute top-1 right-1 bg-black/50 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">&times;</button>
                    </div>
                </div>

                <input type="file" name="image" id="cs-image-input" class="hidden" accept="image/*">
                <input type="file" name="video" id="cs-video-input" class="hidden" accept="video/*">
            </div>

            <div class="modal-media-options flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                <button type="button" id="cs-trigger-image"
                        class="flex items-center gap-1.5 bg-sky-50 text-sky-600 rounded-full py-1 px-2 border-2 border-sky-100 dark:bg-sky-950 dark:border-sky-900">
                    <ion-icon name="image" class="text-base"></ion-icon> Image
                </button>
                <button type="button" id="cs-trigger-video"
                        class="flex items-center gap-1.5 bg-teal-50 text-teal-600 rounded-full py-1 px-2 border-2 border-teal-100 dark:bg-teal-950 dark:border-teal-900">
                    <ion-icon name="videocam" class="text-base"></ion-icon> Video
                </button>
                <button type="button" id="cs-trigger-feeling"
                        class="flex items-center gap-1.5 bg-orange-50 text-orange-600 rounded-full py-1 px-2 border-2 border-orange-100 dark:bg-yellow-950 dark:border-yellow-900">
                    <ion-icon name="happy" class="text-base"></ion-icon> Feeling
                </button>
                <button type="button" id="cs-trigger-location"
                        class="flex items-center gap-1.5 bg-red-50 text-red-600 rounded-full py-1 px-2 border-2 border-rose-100 dark:bg-rose-950 dark:border-rose-900">
                    <ion-icon name="location" class="text-base"></ion-icon> Check in
                </button>
            </div>

            <div class="modal-footer p-5 flex justify-between items-center">
                <div>
                    <button class="inline-flex items-center py-1 px-2.5 gap-1 font-medium text-sm rounded-full bg-slate-50 border-2 border-slate-100 dark:text-white dark:bg-slate-700 dark:border-slate-600" type="button" id="cs-privacy-btn">
                        Everyone <ion-icon name="chevron-down-outline" class="text-base duration-500"></ion-icon>
                    </button>
                    <div class="p-2 bg-white rounded-lg shadow-lg text-black font-medium border border-slate-100 w-60 dark:bg-slate-700"
                         uk-drop="offset:10;pos: bottom-left; reveal-left;animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left ; mode:click">
                        <div>
                            <div class="cs-privacy-option relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery dark:bg-dark3" data-value="public" data-label="Everyone">
                                <div class="text-sm">Everyone</div>
                                <ion-icon name="checkmark-circle" class="cs-check text-2xl text-blue-600"></ion-icon>
                            </div>
                            <div class="cs-privacy-option relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery dark:bg-dark3" data-value="friends" data-label="Friends">
                                <div class="text-sm">Friends</div>
                                <ion-icon name="checkmark-circle" class="cs-check hidden text-2xl text-blue-600"></ion-icon>
                            </div>
                            <div class="cs-privacy-option relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery dark:bg-dark3" data-value="private" data-label="Only me">
                                <div class="text-sm">Only me</div>
                                <ion-icon name="checkmark-circle" class="cs-check hidden text-2xl text-blue-600"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="cs-submit-btn" class="button bg-blue-500 text-white py-2 px-12 text-[14px]">Create</button>
            </div>

            {{-- Upload progress bar (hidden until upload starts) --}}
            <div id="cs-upload-progress" class="hidden px-5 pb-4">
                <div class="flex items-center justify-between text-xs text-gray-500 dark:text-white/60 mb-1.5">
                    <span id="cs-progress-label">Uploading media...</span>
                    <span id="cs-progress-pct">0%</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-slate-700 rounded-full h-2 overflow-hidden">
                    <div id="cs-progress-bar" class="bg-blue-500 h-2 rounded-full transition-all duration-200"></div>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var form       = document.getElementById('create-status-form');
    var imgTrigger = document.getElementById('cs-trigger-image');
    var imgInput   = document.getElementById('cs-image-input');
    var imgPreview = document.getElementById('cs-image-preview');
    var imgThumb   = document.getElementById('cs-image-thumb');
    var vidTrigger = document.getElementById('cs-trigger-video');
    var vidInput   = document.getElementById('cs-video-input');
    var vidPreview = document.getElementById('cs-video-preview');
    var vidThumb   = document.getElementById('cs-video-thumb');
    var progressWrap = document.getElementById('cs-upload-progress');
    var progressBar  = document.getElementById('cs-progress-bar');
    var progressPct  = document.getElementById('cs-progress-pct');
    var progressLbl  = document.getElementById('cs-progress-label');
    var submitBtn    = document.getElementById('cs-submit-btn');

    // Image picker
    if (imgTrigger) {
        imgTrigger.addEventListener('click', function () { imgInput.click(); });
        imgInput.addEventListener('change', function () {
            if (this.files[0]) {
                imgThumb.src = URL.createObjectURL(this.files[0]);
                imgPreview.classList.remove('hidden');
            }
        });
        document.getElementById('cs-remove-image').addEventListener('click', function () {
            imgInput.value = '';
            imgThumb.src = '#';
            imgPreview.classList.add('hidden');
        });
    }

    // Video picker
    if (vidTrigger) {
        vidTrigger.addEventListener('click', function () { vidInput.click(); });
        vidInput.addEventListener('change', function () {
            if (this.files[0]) {
                vidThumb.src = URL.createObjectURL(this.files[0]);
                vidPreview.classList.remove('hidden');
            }
        });
        document.getElementById('cs-remove-video').addEventListener('click', function () {
            vidInput.value = '';
            vidThumb.src = '#';
            vidPreview.classList.add('hidden');
        });
    }

    // Feeling
    var feelingTrigger = document.getElementById('cs-trigger-feeling');
    if (feelingTrigger) {
        feelingTrigger.addEventListener('click', function () {
            document.getElementById('cs-feeling-row').classList.toggle('hidden');
        });
        document.querySelectorAll('.cs-feeling-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var f = this.dataset.feeling;
                document.getElementById('cs-feeling').value = f;
                var lbl = document.getElementById('cs-feeling-label');
                lbl.textContent = 'Feeling: ' + f;
                lbl.classList.remove('hidden');
                document.getElementById('cs-feeling-row').classList.add('hidden');
            });
        });
    }

    // Location
    var locTrigger = document.getElementById('cs-trigger-location');
    if (locTrigger) {
        locTrigger.addEventListener('click', function () {
            var row = document.getElementById('cs-location-row');
            row.classList.toggle('hidden');
            if (!row.classList.contains('hidden')) {
                document.getElementById('cs-location-input').focus();
            }
        });
    }

    // Privacy
    document.querySelectorAll('.cs-privacy-option').forEach(function (opt) {
        opt.addEventListener('click', function () {
            document.getElementById('cs-privacy').value = this.dataset.value;
            document.getElementById('cs-privacy-btn').childNodes[0].textContent = this.dataset.label + ' ';
            document.querySelectorAll('.cs-check').forEach(function (c) { c.classList.add('hidden'); });
            this.querySelector('.cs-check').classList.remove('hidden');
        });
    });

    // Form submit — use XHR for media uploads so we can show a real progress bar
    if (form) {
        form.addEventListener('submit', function (e) {
            var hasMedia = (imgInput && imgInput.files[0]) || (vidInput && vidInput.files[0]);

            if (!hasMedia) {
                // Text-only post: submit normally (near-instant)
                return;
            }

            e.preventDefault();

            // Lock UI
            submitBtn.disabled = true;
            submitBtn.textContent = 'Uploading...';
            progressWrap.classList.remove('hidden');
            progressBar.style.width = '0%';
            progressPct.textContent = '0%';
            progressLbl.textContent = 'Uploading media...';

            var xhr = new XMLHttpRequest();

            // Track bytes sent to server
            xhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    var pct = Math.round((e.loaded / e.total) * 100);
                    progressBar.style.width = pct + '%';
                    progressPct.textContent = pct + '%';
                    if (pct >= 100) {
                        progressLbl.textContent = 'Processing post...';
                        progressBar.style.width = '100%';
                        progressPct.textContent = '100%';
                    }
                }
            });

            xhr.addEventListener('load', function () {
                // Server finished — navigate to wherever it redirected us
                window.location.href = xhr.responseURL || '/feed';
            });

            xhr.addEventListener('error', function () {
                // Reset UI on network error
                submitBtn.disabled = false;
                submitBtn.textContent = 'Create';
                progressWrap.classList.add('hidden');
                if (typeof _notify === 'function') {
                    _notify('Upload failed. Please check your connection and try again.', 'danger');
                }
            });

            xhr.open('POST', form.action);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.send(new FormData(form));
        });
    }
});
</script>
