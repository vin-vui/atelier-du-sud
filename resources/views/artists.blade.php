{{-- <x-guest-layout>: C'est un composant Blade qui définit la structure de base de la page
    Il est défini dans un autre fichier Blade et contient le code HTML commun à toutes les pages, comme l'en-tête et le pied de page --}}

<x-guest-layout>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl sm:text-center">
                <div class="text-lg font-semibold text-yellow-600 font-lacquer">Découvrez</div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl font-barriecito">Notre Gallerie
                    d'Artistes</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Nos quelques <span class="font-lacquer text-yellow-600 ">{{ $artists->count() }} artistes</span>
                    vous invitent à explorer un monde d'expression artistique diversifié.
                    Découvrez des talents créatifs dans divers médiums, de la peinture à la sculpture, en passant par la
                    photographie.
                    Chaque artiste apporte sa vision unique à travers des œuvres captivantes.
                    Laissez-vous inspirer par des histoires visuelles fascinantes et plongez dans l'art contemporain
                    avec nous.
                </p>
            </div>
            <ul role="list"
                class="mx-auto mt-10 md:mt-20 grid max-w-2xl grid-cols-1 gap-x-3 md:gap-x-6 gap-y-10 md:gap-y-20 md:grid-cols-2 lg:max-w-4xl lg:gap-x-8 xl:max-w-none">

                {{-- boucle Blade qui parcourt tous les artistes dans la base de données. --}}
                @foreach ($artists as $artist)
                <li class="flex flex-col gap-3 md:gap-6 md:flex-row">
                    <img class="aspect-[4/5] w-24 h-24 md:w-52 md:h-52 flex-none rounded-full object-cover  shadow-xl shadow-blue-500/50 mt-10"
                        src="{{ $artist->url }}" alt="">
                    <div class="flex-auto">
                        <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900 font-lacquer">
                            {{ $artist->name }}</h3>

                        {{-- C'est un paragraphe qui affiche une description de l'artiste. La fonction Str::limit() de Laravel est utilisée pour limiter la description à 200 caractères. --}}
                        <p class="my-6 text-base leading-7 text-gray-600">
                            {{ Str::limit($artist->description, 200) }}
                        </p>
                        <a href="{{ route('front.artists.show', $artist) }}"
                            class="border rounded-full py-1 px-3 hover:border-yellow-300 transition-all duration-300">
                            Découvrir l'artiste <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>

</x-guest-layout>