<div class="rounded-lg border bg-white dark:bg-zinc-800 shadow-sm flex flex-col items-center w-full max-w-xs mx-auto" style="height: 400px;">
    <div class="w-full h-48 rounded-t-lg overflow-hidden">
        <img src="{{ $game->image_url }}" alt="{{ $game->name }}" class="w-full h-full object-cover" />
    </div>
    <div class="flex-1 flex flex-col justify-between w-full p-4">
        <div>
            <div class="font-semibold text-lg text-zinc-900 dark:text-white text-center">
                {{ $game->name }}
            </div>
            <div class="text-sm text-zinc-600 dark:text-zinc-300 text-center">
                {{ $game->genre }}
            </div>
        </div>
        <div class="flex gap-2 mt-6 justify-center">
            <a href="{{ route('games.edit', $game) }}"
               class="px-3 py-1 rounded bg-yellow-500 hover:bg-yellow-600 text-white text-sm transition">
                Editar
            </a>
            <form action="{{ route('games.destroy', $game) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este juego?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 rounded bg-red-600 hover:bg-red-700 text-white text-sm transition">
                    Eliminar
                </button>
            </form>
        </div>
    </div>
</div>