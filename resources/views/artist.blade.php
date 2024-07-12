{{--ce code génère une page HTML qui affiche les détails de chaque artiste. Chaque détail est affiché dans un bouton, avec différents boutons montrant le nom de l'artiste, la collection, la catégorie, et l'oeuvre --}}
<x-guest-layout>
    <div class="overflow-hidden bg-white pt-24 flex flex-col">
        <div class="relative mx-auto max-w-7xl px-6 py-16 lg:px-8">
            <img class="absolute bottom-0 left-3/4 top-0 hidden w-screen bg-yellow-200 lg:block"
                src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
            <div class="mx-auto max-w-prose text-base lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-8">
                <div>
                    <div class="text-lg font-semibold text-yellow-600 font-lacquer">Découvrez</div>
                    <h2
                        class="mt-2 text-3xl font-bold leading-8 tracking-tight text-gray-900 sm:text-4xl font-barriecito">
                        {{ $artist->name }}</h2>
                </div>
            </div>
            <div class="mt-8 grid  grid-cols-1 lg:grid-cols-2 lg:gap-8">
                <div class="relative lg:col-start-2 lg:row-start-1">
                    <svg class="absolute right-0 top-0 -mr-20 -mt-20 hidden lg:block" width="404" height="384"
                        fill="none" viewBox="0 0 404 384" aria-hidden="true">
                        <defs>
                            <pattern id="de316486-4a29-4312-bdfc-fbce2132a2c1" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#de316486-4a29-4312-bdfc-fbce2132a2c1)" />
                    </svg>
                    <div class="relative mx-auto max-w-prose text-base lg:max-w-none">
                        <img class="rounded-full w-[24rem] h-[24rem] md:w-[36rem] md:h-[36rem] object-cover object-center shadow-lg"
                            src="{{ url($artist->url) }}" alt="{{ $artist->name }}">
                    </div>
                </div>
                <div class="mt-8 lg:mt-0">
                    <div class="mx-auto max-w-prose text-base lg:max-w-none">
                        <p class="text-lg text-gray-500">
                            {{ $artist->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-base leading-7 text-gray-700">
            <p data-aos="zoom-in-up" data-aos-duration="1000"
                class="text-xl mx-auto max-w-3xl text-center tracking-widest font-lacquer font-semibold leading-7 text-yellow-500">
                Les Oeuvres
            </p>
            <h3 data-aos="zoom-in-down" data-aos-duration="1000"
                class="mb-8 mx-auto max-w-3xl text-center text-3xl font-barriecito font-bold tracking-tight text-gray-900 sm:text-4xl">
                de {{ $artist->name }}
            </h3>

            <div class="md:gap-2 lg:gap-4 columns-1 md:columns-2 lg:columns-3 [&>img:not(:first-child)]:mt-4 px-4">
                @foreach ($artist->works as $work)
                <img data-aos="zoom-in-down" data-aos-duration="500" class="rounded-lg" src="{{ url($work->url) }}"
                    alt="">
                @endforeach
            </div>
        </div>

    </div>



    {{-- </x-guest-layout>: C'est la fin du composant guest-layout. --}}
</x-guest-layout>