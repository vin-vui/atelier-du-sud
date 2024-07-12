<x-guest-layout>

    <div class="bg-white py-24 sm:py-32 rounded">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="mx-auto max-w-2xl sm:text-center">
                <h2 class="text-3xl font-bold tracking-tight font-barriecito text-gray-900 sm:text-4xl">Gallerie des
                    Oeuvres</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Notre galerie des<span class="font-lacquer text-yellow-600 "> {{ App\Models\Work::all()->count() }}
                        œuvres </span>est une collection soigneusement
                    assemblée qui
                    incarne la diversité et la
                    créativité des artistes que nous représentons. Vous y découvrirez une riche sélection d'œuvres
                    d'art, allant des créations contemporaines aux classiques intemporels. Chaque pièce raconte une
                    histoire unique et invite à une exploration visuelle captivante. Nous croyons en la puissance de
                    l'art pour inspirer, émouvoir et susciter la réflexion. Que vous soyez collectionneur passionné
                    ou
                    simplement en quête d'une expérience artistique enrichissante, notre galerie des œuvres vous
                    offre
                    une opportunité de découvrir des trésors artistiques exceptionnels.
                </p>
            </div>

            <ul role="list"
                class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-20 sm:grid-cols-2 lg:max-w-4xl lg:gap-x-8 xl:max-w-none">

                {{-- boucle Blade qui parcourt tous les oeuvres dans la base de données. --}}
                @foreach (App\Models\Work::all() as $work)
                <li class="flex flex-col gap-6 xl:flex-row">

                    <div class="flex flex-col">
                        <div>
                            <h3
                                class="text-lg font-semibold leading-8 tracking-tight text-gray-900 font-lacquer text-center py-2">
                                {{ $work->title }}</h3>
                        </div>
                        <div>
                            <div>
                                <img class="w-25 gap-5 columns-2 md:columns-3 lg:columns-2 [&>img:not(:first-child)]:mt-4 px-4flex-none rounded object-cover shadow-xl shadow-orange-500/50"
                                    src="{{ $work->url }}" alt="cube de couleur avec du texte au centre">
                            </div>
                            <div class="flex-auto">
                                <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">
                                    {{ $work->name }}
                                </h3>

                                {{-- C'est un paragraphe qui affiche une description de l'oeuvre. La fonction Str::limit() de Laravel est utilisée pour limiter la description à 200 caractères. --}}
                                <p class="my-6 text-base leading-7 text-gray-600 px-2">
                                    {{ Str::limit($work->description, 200) }}
                                </p>
                            </div>
                            <a href="{{ route('front.works.show', $work->id) }}"
                                class="border rounded-full py-1 px-3 hover:border-yellow-300 transition-all duration-300 flex-end">
                                Découvrir l'oeuvre <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>

        </div>
    </div>

</x-guest-layout>