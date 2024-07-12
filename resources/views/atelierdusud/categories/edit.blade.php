<x-app-layout>
    <div class="flex w-1/3 items-center justify-center h-screen">
        <div>
            <div class="max-w-xs content-center">
                <h2> ✏️ Editer une catégorie</h2>
                <a href="{{ route('categories.index') }}">Retour aux catégories</a>
            </div>
            <form action="{{ route('categories.update') }}" method="POST"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-80">
                @csrf
                @method('PUT')
                <label>Name</label>
                <input type="text" name="name" value="{{ $category->name }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
                <span class="font-medium text-gray-900">Activer la catégorie</span>
                <span class="text-gray-500">(apparaitra en ligne)</span>
            </span>
        </div>
        <div>
            <button type="submit"
                class="bg-green-500 hover:bg-green-700 text-white uppercase tracking-widest py-2 rounded-md">Enregistrer
            </button>
        </div>
    </div>
    </form>
</x-app-layout>
