<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Create Post</h2>

    <form wire:submit.prevent="savePost">
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" wire:model="title" class="w-full px-4 py-2 border rounded-lg">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Location</label>
            <input type="text" wire:model="location" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <textarea wire:model="description" class="w-full px-4 py-2 border rounded-lg"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Media</label>
            <input type="file" wire:model="media" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <button type="submit" class="px-4 py-2 rounded-lg">Create Post</button>
    </form>
</div>
