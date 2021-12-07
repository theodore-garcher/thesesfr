<div>
    <input wire:model="search" type="search" placeholder="Recherche..." class="shadow appearance-none border rounded w-3/4 py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    <br>
    <div class="w-3/4 mx-auto">
        {{ $theses->links() }}
    </div>
    <div class="flex flex-wrap">
        @foreach($theses as $these)
            <div class="w-full">
                <h2>{{ $these->titre }}</h2>
                <h3>{{ $these->auteur }}</h3>

            </div>
        @endforeach
    </div>
</div>
