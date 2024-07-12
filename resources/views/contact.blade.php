<div id="formulaire"
    class="formulaire flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 mt-12 min-h-screen flex-col">
    <div class="max-w-md w-full space-y-8 mx-auto">
        <div>
            <h2 class="mt-6 text-center text-3xl font-barriecito font-extrabold text-gray-900">
                Nous contacter
            </h2>
        </div>
        <form action="http://atelierdusud.test/contact" method="POST" class="flex flex-col gap-y-6">
            <input type="hidden" name="_token" value="1FwVnpqM3INLSAcMclKeOiZvYSMKSpxyPWM3Ukan" autocomplete="off">
            <input type="hidden" name="_method" value="POST">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                        class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="email" name="email" id="email"
                        class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <div class="mt-1">
                    <textarea name="message" id="message"
                        class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
            </div>
            <div class="flex">
                <button type="submit"
                    class="bg-yellow-600 text-white font-lacquer py-2 px-8 font-medium rounded-xl hover:bg-blue-500 transition-all duration-300">Envoyer</button>
            </div>
        </form>
    </div>
</div>