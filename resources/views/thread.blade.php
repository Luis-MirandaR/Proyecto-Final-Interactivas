<x-layouts.app>
    <div class="w-4/5 mx-auto mt-8 bg-white dark:bg-zinc-800 p-6 rounded shadow relative">
        <div class="flex justify-between items-center mb-4">
            <span class="text-xs text-zinc-400">
                {{ $thread->created_at->format('d/m/Y H:i') }}
            </span>
            <form action="{{ route('suscribed_threads.store') }}" method="POST">
                @csrf
                <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded text-sm">
                    {{ __('Suscribirse') }}
                </button>
            </form>
        </div>
        <h1 class="text-2xl font-bold text-zinc-900 dark:text-white mb-4">
            {{ $thread->title }}
        </h1>
        <div class="mb-4 text-zinc-800 dark:text-zinc-200">
            {{ $thread->content }}
        </div>
        @if(!empty($thread->image_url))
            <img src="{{ $thread->image_url }}" alt="Imagen del hilo" class="rounded mb-4 max-h-80 object-cover w-full">
        @endif
    </div>
</x-layouts.app>