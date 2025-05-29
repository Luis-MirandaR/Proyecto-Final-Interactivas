<div class="rounded-lg border bg-white dark:bg-zinc-800 p-4 shadow-sm flex flex-col gap-2">
    <div class="font-semibold text-lg text-zinc-900 dark:text-white">
        <a href="{{ route('threads.show', $thread) }}" class="hover:underline">
            {{ $thread->title }}
        </a>
    </div>
    <div class="text-sm text-zinc-600 dark:text-zinc-300 line-clamp-3">
        {{ Str::limit($thread->content, 120) }}
    </div>
    @if(!empty($thread->image))
        <img src="{{ asset('storage/' . $thread->image) }}" alt="Imagen del hilo" class="rounded mt-2 max-h-40 object-cover">
    @endif
    <div class="text-xs text-zinc-400 mt-2">
        {{ __('Publicado el') }} {{ $thread->created_at->format('d/m/Y') }}
    </div>
</div>