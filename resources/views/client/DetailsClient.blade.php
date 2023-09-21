<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details De Clients</title>
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
    <div class="container mx-auto">
        
    @isset($item)
        
    <div class="mt-2 mx-auto p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 md:w-1/2 lg:w-2/4">
    <ul class="flex justify-between	 text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
        <li class="mr-2">
            <h4 id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-red rounded-tl-lg  dark:bg-gray-800  dark:text-red-500"> Détails du client numéro : <span class="text-white"> {{$item->id}}</span></h4>
        </li>
        <li class="mr-2">
          <a href="{{route('listClients')}}" id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="text-blue-600 inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300"> page précédente</a>
        </li>
    </ul>

    <div class="container mx-auto text-white">
            <div class="mt-3">
                <strong class="text-green-500">Nom complet :</strong>
                {{ $item->nom }}
            </div>

            <div class="mt-3">
                <strong class="text-green-500">phone :</strong>
                {{ $item->phone }}
            </div>

            <div class="mt-3">
                <strong class="text-green-500">Le produit :</strong>
                {{ $item->produit }}
            </div>

            <div class="mt-3">
                <strong class="text-green-500">type De compte :</strong>
                {{ $item->typeDecompte }}
            </div>

            <div class=" mt-3">
                <strong class="text-green-500">prix :</strong>
                {{ $item->prix }}
            </div>

            <div class=" mt-3">
                <strong class="text-green-500">method Pay:</strong>
                {{ $item->methodPay }}
            </div>
        

            <div class=" mt-3">
                <strong class="text-green-500">date d'achat :</strong>
                {{ $item->created_at }}
            </div>

            <div class=" mt-3">
                <strong class="text-green-500">date fin :</strong>
                {{ $item->date_fin }}
            </div>

            <div class=" mt-3">
                <strong class="text-green-500">date modification :</strong>
                {{ $item->updated_at ? $item->updated_at : 'Rien' }}
            </div>
        </div>

</div>

    @endisset
    </div>

</body>

</html>