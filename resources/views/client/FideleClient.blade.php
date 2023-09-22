<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Fidèles</title>

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
            <h4 class="text-red-500 font-bold  text-xl">Lists Des Clients Fidèles</h4>
            <a href="{{route('Accueil')}}" class="text-white bg-red-600 rounded p-1 underline">
                <span>Accueil</span>
            </a>
        </div>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if ($message = Session::get('success'))
        <div id="message" class="md:w-1/2 md:mx-auto lg:w-2/3 mb-2 mt-0 flex justify-between items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded  relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
            <div class="font-bold text-lime-600 cursor-point" onclick="deleteMessage()">X</div>
        </div>
        @endif
            @if(count($clientFidele)>0)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400  text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-2">
                            id
                        </th>
                        <th scope="col" class="px-3 py-2">
                            Nom complet
                        </th>
                  
                        <th scope="col" class="px-3 py-2">
                            Type de Compte
                        </th>
                      
                        <th scope="col" class="px-3 py-2">
                            Actions
                        </th>
                    </tr>
                </thead>
                @foreach($clientFidele as $item)
                @if($item->fidele == 1)
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">                       
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            #{{ $item->id }}
                        </td>

                        <td scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->nom }}
                        </td>
                      
                        <td class="px-3 py-2">
                            {{ $item->typeDecompte }}
                        </td>

                        <td class="px-3 py-2">
                            <a href="{{route('AnulerFidele',$item->id)}}"onclick="return confirm('Voulez vous vraiment annuler le client : {{$item->id }}')" class="bg-red-700 p-1  text-white rounded text-sm cursor-point">
                               annuler 
                            </a>
                               
                        </td>
                    </tr>
                </tbody>
                @endif
                @endforeach
            </table>

            @if ($clientFidele->lastPage() > 1)
            <div class="flex flex-col items-end mt-2">
                <div class="inline-flex">

                    @if ($clientFidele->onFirstPage())
                    <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded-l cursor-not-allowed">
                        Prev
                    </button>
                    @else
                    <a href="{{ $clientFidele->previousPageUrl() }}" class="px-3 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-l hover:bg-gray-300">
                        Prev
                    </a>
                    @endif

                    <div class="flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-900 bg-gray-200">
                        {{ $clientFidele->currentPage() }}
                    </div>

                    @if ($clientFidele->hasMorePages())
                    <a href="{{ $clientFidele->nextPageUrl() }}" class="px-3 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-r hover:bg-gray-300">
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