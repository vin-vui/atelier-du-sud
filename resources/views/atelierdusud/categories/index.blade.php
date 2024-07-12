{{-- ce code affiche une liste de categories et un formulaire pour supprimer chaque categories. Lorsque vous soumettez un formulaire (delete), une requête HTTP est envoyée à une route spécifique qui gère l'opération correspondante --}}

<x-app-layout>

    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
        </h2>
        <a href="{{ route('categories.create') }}"
            class="font-amaranth border-2 border-yellow-300 rounded-md hover:bg-yellow-300 py-2 px-3 transition-all duration-300">
            ➕ Ajouter une nouvelle catégorie
        </a>
    </div>
    {{-- je crée mon tableau qui affiche une liste de catégorie, avec chaque catégorie représenté par une ligne du tableau. --}}
    <div>
        <table>
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3">Nom</th>
                    <th scope="col" class="px-6 py-3">Couleur</th>
                    <th scope="col" class="px-6 py-3">status</th>
                </tr>
            </thead>
            <tbody>
                {{-- foreach est une boucle Blade qui parcourt chaque catégorie dans la variable $catégorie. Pour chaque catégorie, elle génère une ligne de tableau. --}}
                {{-- C'est une cellule de tableau qui affiche le nom de la (catégorie.) propriété name  --}}
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @foreach ($categories as $category)
                    <tr>
                        <th>
                            {{ $category->id }}
                        </th>
                        <td class="px-6 py-3">{{ $category->name }}</td>
                        <td class="px-6 py-3">{{ $category->color }}</td>
                        <td class="px-6 py-3">{{ $category->status }}</td>

                        <td class="px-6 py-3">
                            {{-- C'est un lien qui pointe vers la route artists.show pour l'artiste actuel. Lorsque vous cliquez sur ce lien, vous serez redirigé vers la page de détail de l'artiste. --}}
                            <a href="{{ route('categories.show', $category) }}">Voir</a>
                            <a href="{{ route('categories.edit', $category) }}">✏️ Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">

                                {{-- @csrf et @method('delete'): Ce sont des directives Blade qui génèrent un jeton CSRF (est une mesure de sécurité utilisée pour protéger les applications web contre les attaques de type cross-site request forgery (CSRF).) et définissent la méthode HTTP du formulaire sur DELETE. Ces directives sont nécessaires pour protéger contre les attaques de type cross-site request forgery et pour indiquer à Laravel que le formulaire doit envoyer une requête DELETE. --}}

                                @csrf
                                @method('delete')
                                {{-- ce code affiche un bouton qui, lorsqu'il est cliqué, soumet le formulaire et envoie les données du formulaire au serveur. cela signifie que l'utilisateur souhaite supprimer un artiste --}}

                                {{-- type="submit": Cet attribut indique que le bouton est utilisé pour soumettre un formulaire --}}
                                <button type="submit">❌ Supprimer</button>
                              
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>