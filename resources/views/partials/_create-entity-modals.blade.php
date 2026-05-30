{{-- Create Group / Page / Event / Blog modals — included once in layouts/app.blade.php --}}

{{-- ── CREATE GROUP ────────────────────────────────────────── --}}
<div class="hidden lg:p-20" id="create-group-modal" uk-modal="">
    <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-xl md:w-[500px] w-full dark:bg-dark2">
        <div class="text-center py-4 border-b dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Create Group</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('groups.store') }}" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Group Name <span class="text-red-400">*</span></label>
                <input type="text" name="name" required placeholder="e.g. Photography Enthusiasts"
                       class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Description</label>
                <textarea name="description" rows="3" placeholder="What is this group about?"
                          class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Privacy</label>
                <select name="privacy" class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="public">Public — Anyone can see &amp; join</option>
                    <option value="private">Private — Members only</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Cover Photo</label>
                <input type="file" name="cover" accept="image/*"
                       class="w-full text-sm text-gray-500 dark:text-white/60 file:mr-3 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 dark:file:bg-blue-900/30 dark:file:text-blue-400">
            </div>
            <div class="flex justify-end gap-2 pt-1">
                <button type="button" class="button bg-slate-100 dark:bg-slate-700 dark:text-white uk-modal-close">Cancel</button>
                <button type="submit" class="button bg-blue-500 text-white">Create Group</button>
            </div>
        </form>
    </div>
</div>

{{-- ── CREATE PAGE ─────────────────────────────────────────── --}}
<div class="hidden lg:p-20" id="create-page-modal" uk-modal="">
    <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-xl md:w-[500px] w-full dark:bg-dark2">
        <div class="text-center py-4 border-b dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Create Page</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Page Name <span class="text-red-400">*</span></label>
                <input type="text" name="name" required placeholder="e.g. EduConnect Official"
                       class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Description</label>
                <textarea name="description" rows="3" placeholder="Tell people what your page is about..."
                          class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-purple-400"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Category</label>
                <select name="category" class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                    <option value="">Select a category</option>
                    <option value="Education">Education</option>
                    <option value="Business">Business</option>
                    <option value="Arts & Entertainment">Arts &amp; Entertainment</option>
                    <option value="Community">Community</option>
                    <option value="Sports">Sports</option>
                    <option value="Technology">Technology</option>
                    <option value="Health & Wellness">Health &amp; Wellness</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Cover Photo</label>
                <input type="file" name="cover" accept="image/*"
                       class="w-full text-sm text-gray-500 dark:text-white/60 file:mr-3 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-purple-50 file:text-purple-600 hover:file:bg-purple-100 dark:file:bg-purple-900/30 dark:file:text-purple-400">
            </div>
            <div class="flex justify-end gap-2 pt-1">
                <button type="button" class="button bg-slate-100 dark:bg-slate-700 dark:text-white uk-modal-close">Cancel</button>
                <button type="submit" class="button bg-purple-500 text-white">Create Page</button>
            </div>
        </form>
    </div>
</div>

{{-- ── CREATE EVENT ─────────────────────────────────────────── --}}
<div class="hidden lg:p-20" id="create-event-modal" uk-modal="">
    <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-xl md:w-[500px] w-full dark:bg-dark2">
        <div class="text-center py-4 border-b dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Create Event</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Event Title <span class="text-red-400">*</span></label>
                <input type="text" name="title" required placeholder="e.g. Annual Science Fair 2026"
                       class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Description</label>
                <textarea name="description" rows="3" placeholder="Describe the event..."
                          class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-rose-400"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Location</label>
                <input type="text" name="location" placeholder="Venue or online link"
                       class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400">
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Start Date <span class="text-red-400">*</span></label>
                    <input type="datetime-local" name="start_date" required
                           class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">End Date</label>
                    <input type="datetime-local" name="end_date"
                           class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-rose-400">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Cover Photo</label>
                <input type="file" name="cover" accept="image/*"
                       class="w-full text-sm text-gray-500 dark:text-white/60 file:mr-3 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-rose-50 file:text-rose-600 hover:file:bg-rose-100 dark:file:bg-rose-900/30 dark:file:text-rose-400">
            </div>
            <div class="flex justify-end gap-2 pt-1">
                <button type="button" class="button bg-slate-100 dark:bg-slate-700 dark:text-white uk-modal-close">Cancel</button>
                <button type="submit" class="button bg-rose-500 text-white">Create Event</button>
            </div>
        </form>
    </div>
</div>

{{-- ── CREATE BLOG POST ─────────────────────────────────────── --}}
<div class="hidden lg:p-20" id="create-blog-modal" uk-modal="">
    <div class="uk-modal-dialog relative overflow-hidden mx-auto bg-white shadow-xl rounded-xl md:w-[560px] w-full dark:bg-dark2">
        <div class="text-center py-4 border-b dark:border-slate-700">
            <h2 class="text-sm font-medium text-black dark:text-white">Write a Blog Post</h2>
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Title <span class="text-red-400">*</span></label>
                <input type="text" name="title" required placeholder="Your blog post title..."
                       class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Category</label>
                <select name="category" class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">Select a category</option>
                    <option value="Education">Education</option>
                    <option value="Science">Science</option>
                    <option value="Technology">Technology</option>
                    <option value="Arts">Arts</option>
                    <option value="Sports">Sports</option>
                    <option value="Career">Career</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Content <span class="text-red-400">*</span></label>
                <textarea name="content" rows="6" required placeholder="Write your blog post content here..."
                          class="w-full rounded-lg border border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white px-3 py-2 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-teal-400"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white/80 mb-1">Cover Image</label>
                <input type="file" name="cover" accept="image/*"
                       class="w-full text-sm text-gray-500 dark:text-white/60 file:mr-3 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-teal-50 file:text-teal-600 hover:file:bg-teal-100 dark:file:bg-teal-900/30 dark:file:text-teal-400">
            </div>
            <div class="flex justify-end gap-2 pt-1">
                <button type="button" class="button bg-slate-100 dark:bg-slate-700 dark:text-white uk-modal-close">Cancel</button>
                <button type="submit" class="button bg-teal-500 text-white">Publish Post</button>
            </div>
        </form>
    </div>
</div>
