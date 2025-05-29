<x-layouts.app :title="__('Crear hilo')">
    <div class="flex flex-col items-center mt-8 mb-4">
        <x-app-logo class="w-16 h-16 mb-2" />
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-white">
            {{ config('app.name', 'Laravel') }}
        </h1>
    </div>
    <div class="max-w-xl mx-auto mt-8 bg-white dark:bg-zinc-800 p-6 rounded shadow">
        <div class="flex items-center gap-2 mb-6">
            <x-icons.threads class="w-7 h-7 text-blue-600" />
            <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">
                {{ __('Crear hilo') }}
            </h1>
        </div>
        <form action="{{ route('threads.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block font-semibold mb-1">{{ __('Título') }}</label>
                <input type="text" name="title" id="title" class="w-full rounded border px-3 py-2" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block font-semibold mb-1">{{ __('Contenido') }}</label>
                <textarea name="content" id="content" rows="5" class="w-full rounded border px-3 py-2" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image_url" class="block font-semibold mb-1">{{ __('URL de la imagen (opcional)') }}</label>
                <input type="url" name="image_url" id="image_url" class="w-full rounded border px-3 py-2" value="{{ old('image_url') }}">
                @error('image_url')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="game_id" class="block font-semibold mb-1">{{ __('Juego') }}</label>
                <select name="game_id" id="game_id" class="w-full rounded border px-3 py-2" required>
                    <option value="">{{ __('Selecciona un juego') }}</option>
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ old('game_id') == $game->id ? 'selected' : '' }}>
                            {{ $game->name }}
                        </option>
                    @endforeach
                </select>
                @error('game_id')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category_id" class="block font-semibold mb-1">{{ __('Categoría') }}</label>
                <select name="category_id" id="category_id" class="w-full rounded border px-3 py-2" required>
                    <option value="">{{ __('Selecciona una categoría') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    {{ __('Crear hilo') }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>