{{-- ce code affiche un formulaire pour éditer un artiste existant. Lorsque vous remplissez le formulaire et que vous cliquez sur le bouton "Enregistrer", les données du formulaire sont envoyées au serveur et utilisées pour mettre à jour l'artiste dans la base de données --}}
{{-- C'est un composant Blade qui inclut le layout principal de l'application. Le layout principal contient généralement des éléments qui sont communs à plusieurs pages --}}
<x-app-layout>

    <div class="bg-white sticky top-0 shadow-lg">
        <div class="flex items-center justify-between px-8 py-2">
            <h2 class="font-semibold font-amaranth text-xl text-gray-800 leading-tight">
                👩‍🎨 Artistes > Modifier l'artiste > {{ $artist->name }}
            </h2>
            <a href="{{ route('artists.index') }}" class="border-2 font-amaranth border-yellow-300 rounded-md hover:bg-yellow-300 py-2 px-3 transition-all duration-300">
                ⬅️ Retour aux artistes
            </a>
        </div>
    </div>

    <div class="bg-white max-w-5xl mx-auto my-12 p-8 shadow-xl rounded-sm">
        {{-- C'est le formulaire qui permet de modifier un artiste existant. L'attribut action du formulaire est défini sur la route qui gère la mise à jour des artistes  --}}
        {{-- L'attribut method est défini sur POST, qui est la méthode HTTP utilisée pour envoyer les données du formulaire. --}}
        {{-- @csrf et @method('PUT'): Ce sont des directives Blade qui génèrent un jeton CSRF et définissent la méthode HTTP du formulaire sur PUT. Ces directives sont nécessaires pour protéger contre les attaques de type cross-site request forgery et pour indiquer à Laravel que le formulaire doit envoyer une requête PUT. --}}
        <form action="{{ route('artists.update', $artist) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-8">
            @csrf
            @method('PUT')

            <div class="">
                <label class="block text-sm font-medium leading-6 text-gray-900">Artiste</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name" value="{{ $errors->has('name') ? old('name') : $artist->name }}" placeholder="Entrez le nom de l'artiste" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900 capitalize">à propos</label>
                <div class="mt-2">
                    <textarea name="description" id="description" cols="50" rows="10" placeholder="Écrivez quelques lignes à propos de l'artiste" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">{{ $errors->has('description') ? old('description') : $artist->description }}</textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="">
                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                <img src="{{ url($artist->url) }}" alt="{{ $artist->url }}" class="h-44 w-44 rounded-full object-cover">
                <div class="mt-2 flex items-center gap-x-3">
                    <label for="url" class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 hover:text-blue-500">
                        <span>Téléverser une nouvelle photo</span>
                        <input id="url" name="url" type="file" class="sr-only">
                    </label>
                </div>
                @error('url')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center" x-data="{ on: {{ $artist->status }} }">
                <button type="button" class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 bg-gray-200" role="switch" aria-checked="false" x-ref="switch" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-blue-600': on, 'bg-gray-200': !(on) }" aria-labelledby="annual-billing-label" :aria-checked="on.toString()" @click="on = !on">
                    <span aria-hidden="true" class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out translate-x-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }"></span>
                </button>
                <span class="ml-3 text-sm" id="annual-billing-label" @click="on = !on">
                    <span class="font-medium text-gray-900">Activer l'artiste</span>
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