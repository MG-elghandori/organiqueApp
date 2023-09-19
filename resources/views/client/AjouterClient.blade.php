<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter client</title>
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        .cursor-point:hover {
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
    <div class="container mx-auto">
        @if ($message = Session::get('success'))
        <div id="message" class="md:w-1/2 md:mx-auto lg:w-1/2 mt-2 flex justify-between items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
            <div class="font-bold text-lime-600 cursor-point" onclick="deleteMessage()">X</div>
        </div>
        @endif
        <div class="mt-2 mx-auto p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 md:w-1/2 lg:w-2/4">

            <div class="flex justify-between mb-4">
                <h4 class="text-red-500 font-bold">Ajouter Client</h4>
                <a href="{{route('Accueil')}}" class="text-sky-500 underline">
                    <span>Accueil</span>
                </a>
            </div>
            <form method="post" action="{{route('client.Ajouter')}}">
                @csrf
                <div class="mb-2">
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom complet</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                    @if($errors->has('nom'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('nom')}}</div>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numéro de téléphone</label>
                    <input type="text" value="{{ old('phone') }}" name="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                    @if($errors->has('phone'))
                    <div class="text-red-500 text-xs mt-1">{{ $errors->first('phone') }}</div>
                    @endif

                </div>
                <div class="mb-2">
                    <label for="typeDecompte" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de Compte</label>
                    <select value="{{ old('typeDecompte') }}" id="typeDecompte" name="typeDecompte" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choisissez le mois</option>
                        <option value="1mois">1 mois</option>
                        <option value="3mois">3 mois</option>
                        <option value="6mois">6 mois</option>
                        <option value="1ans">1 ans</option>
                    </select>
                @if($errors->has('typeDecompte'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('typeDecompte')}}</div>
                 @endif
                </div>

                <div class="mb-2">
                    <label for="prix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Le prix</label>
                    <input type="text" value="{{ old('prix') }}" name="prix" id="prix" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                @if($errors->has('prix'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('prix')}}</div>
                @endif
                </div>

                <div class="mb-2">
                    <label for="methodPay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">method de payment</label>
                    <select value="{{ old('methodPay') }}" id="methodPay" name="methodPay" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choisissez la méthode de paiemen</option>
                        <option value="CIH">CIH</option>
                        <option value="TIJARI">TIJARI</option>
                        <option value="Autres">Autres</option>
                    </select>
                    @if($errors->has('methodPay'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('methodPay')}}</div>
                   @endif
                </div>
                <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistre</button>
            </form>
        </div>
    </div>
</body>
<script>
    function deleteMessage() {
        var messageDiv = document.getElementById('message');
        messageDiv.remove();
    }
</script>

</html>