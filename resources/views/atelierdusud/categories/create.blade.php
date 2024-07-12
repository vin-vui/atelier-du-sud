<x-app-layout>

    <div name="header" class="bg-white sticky top-0 shadow-lg">
        <div class="flex items-center justify-between px-8 py-2">
            <h2 class="font-semibold font-amaranth text-xl text-gray-800 leading-tight">Ajouter une catégorie</h2>
            <a href='{{ route('categories.index') }}' class="border-2 font-amaranth border-yellow-300 rounded-md hover:bg-yellow-300 py-2 px-3 transition-all duration-300"> ⬅️Retour aux catégories</a>
        </div>

        <div class="bg-white max-w-5xl mx-auto my-12 p-8 shadow-xl">
            <form action='{{ route('categories.store') }}' method="POST" class="flex flex-col gap-8">
                @csrf
                <div>
                    <label class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <input type="text" id="name" name="name">
                </div>
                <div>
                    <label for="status">Status</label>
                    <input type="text" id="status" name="status" placeholder="Entrez le nom de la catégorie" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white uppercase tracking-widest py-2 rounded-md">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>