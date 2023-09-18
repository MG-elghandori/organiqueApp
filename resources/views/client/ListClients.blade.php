<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lists Des Clients</title>

    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
    <div class="container mx-auto mt-2">

        <div class="flex justify-between mb-4 bg-slate-800 p-2 rounded">
            <h4 class="text-red-700 font-bold  text-xl">Lists Des Clients</h4>
            <a href="{{route('Accueil')}}" class="text-sky-500 underline">
                <span>Accueil</span>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            @if(count($data)>0)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400  text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nom complet
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Numéro de téléphone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type de Compte
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Prix
                        </th>
                        <th scope="col" class="px-6 py-3">
                            payment
                        </th>
                        <th scope="col" class="px-6 py-3">
                            date d'fin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                @foreach($data as $item)
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            #{{ $item->id }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->nom }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->phone}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->typeDecompte }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->prix }}dh
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->methodPay }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->date_fin}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

            @if ($data->lastPage() > 1)
            <div class="flex flex-col items-end mt-2">
                <div class="inline-flex">

                    @if ($data->onFirstPage())
                    <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded-l cursor-not-allowed">
                        Prev
                    </button>
                    @else
                    <a href="{{ $data->previousPageUrl() }}" class="px-3 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-l hover:bg-gray-300">
                        Prev
                    </a>
                    @endif

                    <div class="flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-900 bg-gray-200">
                        {{ $data->currentPage() }}
                    </div>

                    @if ($data->hasMorePages())
                    <a href="{{ $data->nextPageUrl() }}" class="px-3 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-r hover:bg-gray-300">
                        Next
                    </a>
                    @else
                    <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded-r cursor-not-allowed">
                        Next
                    </button>
                    @endif
                </div>
            </div>
            @endif
            @else
            <div class="text-center text-lime-500 mt-3">Rien données disponibles !!</div>
            @endif
        </div>
    </div>
</body>

</html>