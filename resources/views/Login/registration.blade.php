<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Utilisateur</title>
    </div>
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
    <div class="container mx-auto mt-2 w-1/2">
        @if(count($user)>0)
        <div class="flex justify-between mb-3 bg-slate-800 p-2 rounded">
            <h4 class="text-red-500 font-bold  text-xl">infos Utilisateur</h4>
            <a href="{{route('Accueil')}}" class="text-white bg-red-600 rounded p-1 underline">
                <span>Accueil</span>
            </a>
        </div>

        <main class="bg-slate-800 p-2 rounded">

            @foreach($user as $item)
            <div class="container mx-auto text-white">
                <div class="mt-3">
                    <strong class="text-green-500">Le Nom :</strong>
                    {{ $item->name }}
                </div>

                <div class="mt-3">
                    <strong class="text-green-500">Email :</strong>
                    {{ $item->email }}
                </div>

                <div class="mt-3">
                    <strong class="text-green-500">Date creation :</strong>
                    {{ $item->created_at }}
                </div>

            </div>
            @endforeach
            <form action="{{route('deleteUser', $item->id)}}" method="post" class="mt-6">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Voulez vous vraiment supprimer le utilisateur ')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Supprimier</button>

            </form>
            @else

            <div class="flex justify-between mb-3 bg-slate-800 p-2 rounded">
                <h4 class="text-red-500 font-bold  text-xl">Ajouter Utilisateur</h4>
                <a href="{{ route('Accueil') }}" onclick="return confirm('Attention : vous devez créer un utilisateur avant de quitter pour vous connecter à l\'application. Voulez-vous continuer?');" class="text-white bg-red-600 rounded p-1 underline">
                    page d'accueil
                </a>
                </a>
            </div>
            <form action="{{route('registerUser')}}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre Nom</label>
                    <input type="text" id="name" name="name" value="{{old('name')}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="nom">
                    @if($errors->has('name'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('name')}}</div>
                    @endif
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
                    <input type="email" id="email" name="email" value="{{old('email')}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="nom@gmail.com">
                    @if($errors->has('email'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('email')}}</div>
                    @endif
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre mot de passe</label>
                    <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="••••••••">
                    @if($errors->has('password'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('password')}}</div>
                    @endif
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmez votre mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="••••••••">
                    @if($errors->has('password_confirmation'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('password_confirmation')}}</div>
                    @endif
                </div>


                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Créer un nouveau compte</button>
            </form>

            @endif


            @if ($message = Session::get('success'))
            <div id="message" class="mt-5 md:w-1/2 md:mx-auto lg:w-2/3 mb-2 mt-0 flex justify-between items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded  relative" role="alert">
                <span class="block sm:inline">{{ $message }}</span>
                <div class="font-bold text-lime-600 cursor-point" onclick="deleteMessage()">X</div>
            </div>
            @endif

            @if(session()->has("err"))
            <div id="message" class="mt-5 md:w-1/2 md:mx-auto lg:w-2/3 mb-2 mt-0 flex justify-between items-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded  relative" role="alert">
                {{session("err")}}
            </div>
            @endif

        </main>


    </div>

    <script>
        function deleteMessage() {
            var messageDiv = document.getElementById('message');
            messageDiv.remove();
        }
    </script>

</body>

</html>