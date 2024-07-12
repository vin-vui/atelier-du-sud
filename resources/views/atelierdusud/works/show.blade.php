<x-guest-layout>
    <div class=" overflow-hidden bg-white pt-24 flex flex-cols md:flex-row  md:pb-32">
        <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
            <div class="text-lg font-semibold text-yellow-600 font-lacquer">Découvrez</div>
            <h2 class="mt-2 text-3xl font-bold leading-8 tracking-tight text-gray-900 sm:text-4xl font-barriecito">
                {{ $work->title }}
            </h2>
            <svg class="absolute right-0 top-0 -mr-20 -mt-20 hidden lg:block" width="404" height="384" fill="none"
                viewBox="0 0 404 384" aria-hidden="true">
                <defs>
                    <pattern id="de316486-4a29-4312-bdfc-fbce2132a2c1" x="0" y="0" width="20" height="20"
                        patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#de316486-4a29-4312-bdfc-fbce2132a2c1)" />
            </svg>

        </div>
    </div>

    <div class=" mx-auto my-2 p-8 rounded-sm shadow-2xl shadow-orange-500/40">
        <div class="flex">


            <img class="rounded w-1/4 md:w-1/2 object-cover" src="{{ url($work->url) }}" alt="{{ $work->title }}">

            <p class="my-6 mx-5 text-base leading-7 text-gray-600">
                {{ Str::limit($work->description, 200) }}
            </p>
        </div>
    </div>
    </div>
    </div>

</x-guest-layout>