<!-- Mon code génère une page HTML qui affichent les détails de chaque oeuvre.-->
<x-guest-layout>
    <div class="overflow-hidden bg-white pt-24 flex flex-col">
        <div class="relative mx-auto max-w-7xl px-6 py-16 lg:px-8">
            <img class="absolute bottom-0 left-3/4 top-0 hidden w-screen bg-yellow-200 lg:block"
                src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
            <div class="mx-auto max-w-prose text-base lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-8 ">
                <div>
                    <div class="text-lg font-semibold text-yellow-600 font-lacquer pb-10">Découvrez</div>
                    <h2
                        class="mt-2 text-3xl font-bold leading-8 tracking-tight text-gray-900 sm:text-4xl font-barriecito">

                        {{ $work->title }}</h2>
                </div>
            </div>
            <div class="mt-8 lg:mt-0">
                <div class="overflow-hidden bg-white pt-24 flex flex-col w-6/12">
                    <p class="text-lg text-gray-500">
                        {{ $work->description }}
                    </p>
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
                        <img class="w-[24rem] h-[24rem] md:w-[36rem] md:h-[36rem] lg:w-full object-cover object-center shadow-lg"
                            src="{{ url($work->url) }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>