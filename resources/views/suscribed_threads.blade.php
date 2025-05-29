<x-layouts.app :title="__('Hilos que sigo')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            @forelse($threads as $thread)
                <x-thread.card :thread="$thread" />
            @empty
                <div class="col-span-full text-center text-gray-500 dark:text-gray-400">
                    {{ __('No sigues ningún hilo todavía.') }}
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>