<div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm shadow border-teal-500 border-t-2">
    <div class="flex">
        <h2 class="text-center font-semibold text-2x text-gray-800 mb-5">Create New Account</h2>
    </div>
    <div>
        @if (session('success'))
            <span>{{ session('success') }}</span>
        @endif
        <form wire:submit.prevent="create">
            <label class="mt-3 block text-sm font-medium lending-6 text-gray-900">Name</label>
            <input wire:model.live.debounce.500ms="name" type="text" placeholder="name" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-4 py-2">
            @error('name')
            <p>{{ $message }}</p>
            @enderror

            <label class="mt-3 block text-sm font-medium lending-6 text-gray-900">Email</label>
            <input wire:model.live.debounce.500ms="email" type="email" placeholder="email" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-4 py-2">
            @error('email')
            <p>{{ $message }}</p>
            @enderror

            <label class="mt-3 block text-sm font-medium lending-6 text-gray-900">Password</label>
            <input wire:model.debounce.500ms="password" type="password" placeholder="password" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-4 py-2">
            @error('password')
            <p>{{ $message }}</p>
            @enderror

<label class="mt-3 block text-sm font-medium lending-6 text-gray-900">Profile picture</label>
<input wire:model.live.debounce.500ms='image' accept="image/png, image/jpeg, image/jpg" type="file" id="image" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-4 py-2">

@error('image')
    <span class="text-red-500 text-xs">{{ $message }}</span>
@enderror

@if ($image)
<img class="rounded w-10 h-10 mt-5 block" src="{{ $image->temporaryUrl() }}">
@endif

<div wire:loading wire:target="image">
    <span class="text-green-500">Uploading ...</span>
</div>

            <button type="submit" class="block mt-3 py-2 px-4 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Create</button>
        </form>
    </div>
</div>

