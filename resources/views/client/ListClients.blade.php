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
    <style>
        .cursor-point:hover {
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
    <div class="container mx-auto mt-2">

        <div class="flex justify-between mb-3 bg-slate-800 p-2 rounded">
            <h4 class="text-red-500 font-bold  text-xl">Lists Des Clients</h4>
            <a href="{{route('Accueil')}}" class="text-white bg-red-600 rounded p-1 underline">
                <span >Accueil</span>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if ($message = Session::get('success'))
        <div id="message" class="md:w-1/2 md:mx-auto lg:w-2/3 mb-2 mt-0 flex justify-between items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded  relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
            <div class="font-bold text-lime-600 cursor-point" onclick="deleteMessage()">X</div>
        </div>
        @endif

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
                       
                    @if ($item->date_fin <= now()->format('Y-m-d'))
                        <td scope="row" class="bg-rose-700 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            #{{ $item->id }}
                        </td>
                        @else
                        <td scope="row" class="bg-lime-600 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            #{{ $item->id }}
                        </td>
                        @endif

                        <td scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                        <td class="px-6 py-4 ">

                            <form action="{{ route('delteClients.destroy', $item->id) }}" method="POST" class="flex justify-around items-center">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('showClients.show', $item->id) }}" class="text-white bg-lime-700 p-1 rounded"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                                <a href="{{ route('editClients.edit', $item->id) }}" class=" text-white bg-amber-500 p-1 rounded"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                <button type="submit" class="text-white bg-red-800 p-1 rounded" onclick="return confirm('Voulez vous vraiment supprimer le client : {{$item->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
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

<script>
    function deleteMessage() {
        var messageDiv = document.getElementById('message');
        messageDiv.remove();
    }
    
</script>

</body>

</html>