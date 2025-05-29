<x-layouts.app :title="__('Crear juego')">
    <div class="flex flex-col items-center mt-8 mb-4">
        <x-app-logo class="w-16 h-16 mb-2" />
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-white">
            {{ config('app.name', 'Laravel') }}
        </h1>
    </div>
    <div class="max-w-xl mx-auto bg-white dark:bg-zinc-800 p-6 rounded shadow">
        <form action="{{ route('games.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">{{ __('Título') }}</label>
                <input type="text" name="name" id="name" class="w-full rounded border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="genre" class="block font-semibold mb-1">{{ __('Género') }}</label>
                <input type="text" name="genre" id="genre" class="w-full rounded border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="image_url" class="block font-semibold mb-1">{{ __('URL de la imagen') }}</label>
                <input type="url" name="image_url" id="image_url" class="w-full rounded border px-3 py-2" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    {{ __('Crear juego') }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>