<div x-data>
    <div class="iq-search-bar">
        <form action="{{ route('search') }}" class="searchbox relative" autocomplete="off">
            <input type="text" class="text search-input" placeholder="¿Qué libro estas buscando?" wire:model="search"
                name="name" id="name">
            <div class="absolute w-full hidden" :class="{ 'hidden': !$wire.open}" @click.away="$wire.open=false">
                <div class="bg-white rounded-lg shadow mt-1">
                    <div class="px-4 py-3 space-y-1">
                        @forelse ($books as $book)
                            <a href="{{ route('books.show', $book) }}" class="flex">
                                <img class="w-12 h-15 object-cover"
                                    src="{{ Storage::url($book->images->first()->url) }}" alt="">
                                <div class="ml-4 text-gray-700">
                                    <p class="text-lg font-semibold leading-5">{{ $book->nombre }}</p>
                                    <p>Categoria: {{ $book->category->nombre }}</p>
                                </div>
                            </a>
                        @empty
                            <p class="text-lg leading-5">No existe ningun libro con ese nombre.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
