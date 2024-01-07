<div>
    @if (session('success'))
        <span>{{ session('success') }}</span>
    @endif
    <form wire:submit.prevent="save">
        <input wire:model.live="name" type="text" placeholder="name">
        @error('name')
        <p>{{ $message }}</p>
        @enderror
        <br><br>
        <input wire:model.live="email" type="email" placeholder="email">
        @error('email')
        <p>{{ $message }}</p>
        @enderror
        <br><br>
        <input wire:model.live="password" type="password" placeholder="password">
        @error('password')
        <p>{{ $message }}</p>
        @enderror
        <br><br>

        <button type="submit">Create</button>
    </form>
</div>
