<div>
    <input wire:model="search" type="search" placeholder="Recherche..." class="shadow appearance-none border rounded w-3/4 py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    <br>
    <div class="w-3/4 mx-auto">
        {{ $theses->links() }}
    </div>

    <table class="table-fixed m-4">
        <thead>
        <tr>
            <th class="w-1/3">
                Titre
            </th>
            <th class="w-1/3">
                Auteur
            </th>
            <th class="w-1/3">
                Discipline
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($theses as $these)
            <tr>
                <td class="px-4 py-2">
                    <div class="text-justify">
                        {{ $these->titre }}
                    </div>
                </td>
                <td class="px-4 py-2">
                    <div class="px-auto">
                        {{ $these->auteur }}
                    </div>
                </td>
                <td class="px-4 py-2">
                    <div class="p-auto">
                        {{ $these->discipline }}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
