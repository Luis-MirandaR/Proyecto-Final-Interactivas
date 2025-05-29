<x-layouts.app :title="__('Categorías')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="w-3/5 mx-auto mb-4">
            <form action="{{ route('categories.store') }}" method="POST" class="flex items-center gap-2">
                @csrf
                <input type="text" name="name" placeholder="{{ __('Nombre de la categoría') }}" class="flex-1 rounded border px-3 py-2" required>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    {{ __('Agregar') }}
                </button>
            </form>
            @error('name')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="overflow-x-auto w-3/5 mx-auto">
            <table class="min-w-full bg-white dark:bg-zinc-800 rounded shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">{{ __('Nombre') }}</th>
                        <th class="px-4 py-2 text-left">{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr class="border-b dark:border-zinc-700">
                            <td class="px-4 py-2">{{ $category->id }}</td>
                            <td class="px-4 py-2">{{ $category->name }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">
                                        {{ __('Eliminar') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 dark:text-gray-400 py-4">
                                {{ __('No has creado ninguna categoría todavía.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->has('name'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ $errors->first('name') }}',
        });
    </script>
@endif
@endsection