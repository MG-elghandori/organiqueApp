<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page de modification</title>
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
        <div class="mt-2 mx-auto p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 md:w-1/2 lg:w-2/4">

            <div class="flex justify-between mb-4">
            <h3 class="text-red-500 font-bold"> Modifer Le Client Numéro <span class="text-white font-bold ">{{ $item->id }}</span> </h3>
                <a href="{{route('listClients')}}" class="text-white bg-red-600 rounded p-1 underline">
                    <span>page précédente</span>
                </a>
            </div>

            <form method="post" action="{{route('updateClients.update',['id' => $item->id])}}">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom complet</label>
                    <input type="text" id="nom" name="nom" value="{{$item->nom}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    @if($errors->has('nom'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('nom')}}</div>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numéro de téléphone</label>
                    <input type="text" name="phone" value="{{$item->phone}}" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    @if($errors->has('phone'))
                    <div class="text-red-500 text-xs mt-1">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="produit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Le produit</label>
                    <input type="text" value="{{$item->produit}}" name="produit" id="produit" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                    @if($errors->has('produit'))
                    <div class="text-red-500 text-xs mt-1">{{ $errors->first('produit') }}</div>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="typeDecompte" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de Compte</label>
                    <select id="typeDecompte" name="typeDecompte" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choisissez le mois</option>
            <option value="1mois" {{ old('typeDecompte', $item->typeDecompte) === "1mois" ? "selected" : "" }}>1 mois</option>
            <option value="3mois" {{ old('typeDecompte', $item->typeDecompte) === "3mois" ? "selected" : "" }}>3 mois</option>
            <option value="6mois" {{ old('typeDecompte', $item->typeDecompte) === "6mois" ? "selected" : "" }}>6 mois</option>
            <option value="1ans" {{ old('typeDecompte', $item->typeDecompte) === "1ans" ? "selected" : "" }}>1 an</option>
        </select>
                    @if($errors->has('typeDecompte'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('typeDecompte')}}</div>
                    @endif
                </div>

                <div class="mb-2">
                    <label for="prix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Le prix</label>
                    <input type="text" name="prix"  value="{{$item->prix}}"  id="prix" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    @if($errors->has('prix'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('prix')}}</div>
                    @endif
                </div>

                <div>
                    <label for="methodPay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">method de payment</label>
                    <select id="methodPay" name="methodPay" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choisissez la méthode de paiemen</option>
                        <option value="CIH" {{$item->methodPay=="CIH"? "selected":"" }}>CIH</option>
                        <option value="TIJARI" {{$item->methodPay=="TIJARI"? "selected":"" }}>TIJARI</option>
                        <option value="Autres" {{$item->methodPay=="Autres"? "selected":"" }}>Autres</option>
                    </select>
                    @if($errors->has('methodPay'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('methodPay')}}</div>
                    @endif
                </div>
              <div>
              <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistre</button>
              <a href="{{route('updateFidele',$item->id)}}" class="mt-4 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Client Fidèle</a>
              </div>
            </form>
           
        </div>
    </div>
</body>

</html>