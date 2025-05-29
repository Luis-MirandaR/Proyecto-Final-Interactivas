<x-layouts.app :title="__('Juegos')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex justify-end mb-2">
            <a href="{{ route('games.create') }}" class="inline-flex items-center gap-2 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg> 
                {{ __('Crear juego') }}
            </a>
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            @forelse($games as $game)
                <x-game.card :game="$game" />
            @empty
                <div class="col-span-full text-center text-gray-500 dark:text-gray-400">
                    {{ __('No has creado ningún juego todavía.') }}
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>