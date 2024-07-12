<x-app-layout>

    <div class="bg-white sticky top-0 shadow-lg">
        <div class="flex items-center justify-between px-8 py-2">
            <h2 class="font-semibold font-amaranth text-xl text-gray-800 leading-tight">
                🖼️ Oeuvres > Ajouter une nouvelle oeuvre
            </h2>
            <a href="{{ route('works.index') }}" class="font-amaranth border-2 border-yellow-300 rounded-md hover:bg-yellow-300 py-2 px-3 transition-all duration-300">
                ⬅️ Retour aux oeuvres
            </a>
        </div>
    </div>

    <div class="bg-white max-w-5xl mx-auto my-12 p-8 shadow-xl rounded-sm">
        <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-8">
            @csrf
            @method('POST')

            <div class="">
                <label class="block text-sm font-medium leading-6 text-gray-900">Oeuvre</label>
                <div class="mt-2">
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Entrez le nom de l'oeuvre" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900 capitalize">à propos</label>
                <div class="mt-2">
                    <textarea name="description" id="description" cols="50" rows="10" placeholder="Écrivez quelques lignes à propos de l'oeuvre" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="">
                <label for="category" class="block text-sm font-medium leading-6 text-gray-900 capitalize">Catégorie</label>
                <select class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" name="category_id" id="category">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="">
                <label for="artist" class="block text-sm font-medium leading-6 text-gray-900 capitalize">Artistes</label>
                <div class="flex flex-wrap gap-2">
                    @foreach ($artists as $artist)
                    <div class="mt-2 flex items-center gap-x-1 cursor-pointer rounded-full px-2 border bg-gray-50 text-gray-900">
                        <input type="checkbox" name="artists[]" id="artist_{{ $artist->id }}" value="{{ $artist->id }}" class="rounded-md border-gray-300 shadow-sm focus:border-blue-300 cursor-pointer focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <label for="artist_{{ $artist->id }}" class="block text-sm font-medium cursor-pointer leading-6 capitalize">{{ $artist->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="">
                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                <div class="mt-2 flex items-center gap-x-3">
                    <label for="url" class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 hover:text-blue-500">
                        <span>Téléverser une photo</span>
                        <input id="url" name="url" type="file" class="sr-only">
                    </label>
                </div>
                @error('url')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex items-center" x-data="{ on: false }">
                <button type="button" class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 bg-gray-200" role="switch" aria-checked="false" x-ref="switch" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-blue-600': on, 'bg-gray-200': !(on) }" aria-labelledby="annual-billing-label" :aria-checked="on.toString()" @click="on = !on">
                    <span aria-hidden="true" class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out translate-x-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }"></span>
                </button>
                <span class="ml-3 text-sm" id="annual-billing-label" @click="on = !on">
                    <span class="font-medium text-gray-900">Activer l'oeuvre</span>
                    <span class="text-gray-500">(apparaitra en ligne)</span>
                </span>
                <input type="hidden" name="status" :value="on ? 1 : 0">
                @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white uppercase tracking-widest py-2 rounded-md">
                Enregistrer
            </button>
        </form>
    </div>

</x-app-layout>