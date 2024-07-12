<x-app-layout>

    <div class="bg-white sticky top-0 shadow-lg">
        <div class="flex items-center justify-between px-8 py-2">
            <h2 class="font-semibold text-xl font-amaranth text-gray-800 leading-tight">
                🖼️ Oeuvres ({{ $works->count() }})
            </h2>
            <a href="{{ route('works.create') }}"
                class="font-amaranth border-2 border-yellow-300 rounded-md hover:bg-yellow-300 py-2 px-3 transition-all duration-300">
                ➕ Ajouter une nouvelle Création
            </a>
        </div>
    </div>

    <div class="p-8 w-full">
        <table class="w-full">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 text-left">Visuel</th>
                    <th scope="col" class="px-6 py-3 text-left">Titre</th>
                    <th scope="col" class="px-6 py-3 text-left">Artistes</th>
                    <th scope="col" class="px-6 py-3 text-left">Categories</th>
                    <th scope="col" class="px-6 py-3 text-left">Description</th>
                    <th scope="col" class="px-6 py-3 text-left">Status</th>
                    <th scope="col" class="px-6 py-3 text-left"></th>
                </tr>
            </thead>
            <tbody class="divide-y-2 shadow-xl">
                @foreach ($works as $work)
                <tr class="bg-white hover:bg-gray-100 transition-all duration-150">
                    <td class="px-6 py-3">
                        <img class="rounded h-12 w-full object-cover" src="{{ url($work->url) }}"
                            alt="{{ $work->title }}">
                    </td>
                    <td class="px-6 py-3 font-semibold">{{ $work->title }}</td>
                    <td class="px-6 py-3">
                        @foreach ($work->artists as $artist)
                        <a href="{{ route('artists.edit', $artist) }}"
                            class="group text-xs text-center text-gray-900 hover:text-yellow-600 flex items-center gap-1 whitespace-nowrap">
                            <svg class="text-gray-900 group-hover:text-yellow-600 h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6m-7 1l9-9m-5 0h5v5" />
                            </svg>
                            {{ $artist->name }}
                        </a>
                        @endforeach
                    </td>
                    <td class="px-6 py-3">
                        <span
                            class="text-xs text-center text-gray-900 bg-gray-100 border py-1 px-2 rounded-full">{{ $work->category->name }}</span>
                    </td>
                    <td x-data="{ open: false }" class="px-6 py-3">
                        {{ Str::limit($work->description, 50) }}
                        <button x-on:click="open = ! open"
                            class="ml-2 text-gray-600 text-sm hover:border-gray-300 border border-transparent py-0.5 px-2">→
                            lire la suite</button>
                        <div x-cloak x-transition x-show="open" @click.outside="open = false"
                            class="absolute mt-2 bg-white shadow-xl p-4 w-96 ">
                            {{ $work->description }}
                        </div>
                    </td>
                    <td class="px-6 py-3">
                        @switch($work->status)
                        @case(0)
                        <span
                            class="rounded-full text-xs py-1 px-3 bg-red-100 border border-red-500 text-red-700">Inactif</span>
                        @break
                        @case(1)
                        <span
                            class="rounded-full text-xs py-1 px-3 bg-green-100 border border-green-500 text-green-700">Actif</span>
                        @break
                        @endswitch
                    </td>

                    <td class="px-6 py-3">
                        <div class="flex items-center gap-4 justify-end">

                            <a class="text-sm text-blue-600 hover:border-gray-300 border border-transparent py-0.5 px-2 transition-all duration-150"
                                href="{{ route('works.edit', $work) }}">
                                ✏️ Editer
                            </a>
                            <form action="{{ route('works.destroy', $work) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button
                                    class="text-sm text-red-600 hover:border-gray-300 border border-transparent py-0.5 px-2 transition-all duration-150"
                                    type="submit">
                                    ❌ Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>