{{-- Mon code présente un formulaire pour créer un artiste --}}
{{-- x-app-layout contient des éléments qui sont communs a plusieurs pages --}}
<x-app-layout>

    <div class="bg-white sticky top-0 shadow-lg">
        <div class="flex items-center justify-between px-8 py-2">
            <h2 class="font-semibold font-amaranth text-xl text-gray-800 leading-tight">
                👩‍🎨 Artistes > Ajouter un nouvel artiste
            </h2>
            <a href="{{ route('artists.index') }}"
                class="border-2 font-amaranth border-yellow-300 rounded-md hover:bg-yellow-300 py-2 px-3 transition-all duration-300">
                ⬅️ Retour aux artistes
            </a>
        </div>
    </div>

    <div class="bg-white max-w-5xl mx-auto my-12 p-8 shadow-xl rounded-sm">
        {{-- C'est le formulaire que les utilisateurs rempliront pour créer un nouvel artiste. L'attribut action du
        formulaire est défini sur la route qui gère la création de nouveaux artistes --}}
        <form action="{{ route('artists.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col gap-8">
            {{-- L'attribut method est défini sur POST, qui est la méthode HTTP utilisée pour envoyer les données du
            formulaire. --}}
            @csrf
            {{-- CSRF est utilisés pour la protectino contre les attaques de type cross-site request forgery --}}

            <div>
                {{-- C'est un champ de saisie pour le nom de l'artiste. L'attribut name est défini sur 'name', qui est
                la clé qui sera utilisée dans les données de la requête. L'attribut placeholder fournit un indice à
                l'utilisateur sur ce qu'il doit entrer dans le champ. --}}
                {{-- @error('name')...@enderror sont des directives de Blade qui affichent un message d'erreur si il y a
                une erreur de validation pour le champ 'name'. Si une erreur se produit, la bordure du champ de saisie
                sera colorée en rouge. --}}
                <label class="block text-sm font-medium leading-6 text-gray-900">Artiste</label>
                <div class="mt-2">
                    <input type="text" name="name" value="{{ old('name') }}" id="name"
                        placeholder="Entrez le nom de l'artiste"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div>
                {{-- C'est un élément textarea HTML qui permet à l'utilisateur d'entrer du texte sur plusieurs lignes.
                --}}
                {{-- name="description": C'est l'attribut qui permet de référencer les données du formulaire après la
                soumission du formulaire.
                cols="50": Cet attribut définit la largeur du champ de texte en caractères.
                rows="10": Cet attribut définit la hauteur du champ de texte en lignes. --}}
                {{-- placeholder="Entrer votre description": Cet attribut affiche un texte d'indication dans le champ de
                texte avant que l'utilisateur n'entre du texte. --}}
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900 capitalize">à
                    propos</label>
                <div class="mt-2">
                    <textarea name="description" id="description" cols="50" rows="10"
                        placeholder="Écrivez quelques lignes à propos de l'artiste"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="">
                {{-- C'est un champ de formulaire de type file pour l'URL ou le statut de l'artiste. Lorsque le
                formulaire est soumis, les données saisies par l'utilisateur seront utilisées pour créer ou mettre à
                jour l'URL ou le statut de l'artiste. --}}
                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                <div class="mt-2 flex items-center gap-x-3">
                    <label for="url"
                        class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 hover:text-blue-500">
                        <span>Téléverser une photo</span>
                        <input id="url" name="url" type="file" class="sr-only">
                    </label>
                </div>
                @error('url')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center" x-data="{ on: false }">
                <button type="button"
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 bg-gray-200"
                    role="switch" aria-checked="false" x-ref="switch" x-state:on="Enabled" x-state:off="Not Enabled"
                    :class="{ 'bg-blue-600': on, 'bg-gray-200': !(on) }" aria-labelledby="annual-billing-label"
                    :aria-checked="on.toString()" @click="on = !on">
                    <span aria-hidden="true"
                        class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out translate-x-0"
                        x-state:on="Enabled" x-state:off="Not Enabled"
                        :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }"></span>
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

            <button type="submit"
                class="bg-green-500 hover:bg-green-700 text-white uppercase tracking-widest py-2 rounded-md">
                Enregistrer
            </button>
        </form>
    </div>
</x-app-layout>