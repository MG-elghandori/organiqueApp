<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion De Stock</title>
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
            <h4 class="text-orange-400 font-bold  text-xl">Gestion De Stock</h4>
            <div>
                <a href="{{route('Stockcreate')}}" class="text-white bg-orange-500 rounded p-1 underline mr-3">
                    <span>Ajouter</span>
                </a>

                <a href="{{route('Accueil')}}" class="text-white bg-red-600 rounded p-1 underline">
                    <span>Accueil</span>
                </a>
            </div>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            @if ($message = Session::get('success'))
            <div id="message" class="md:w-1/2 md:mx-auto lg:w-2/3 mb-2 mt-0 flex justify-between items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded  relative" role="alert">
                <span class="block sm:inline">{{ $message }}</span>
                <div class="font-bold text-lime-600 cursor-point" onclick="deleteMessage()">X</div>
            </div>
            @endif

            @if(count($dataStock)>0)
            <table class="w-full text-left text-gray-500 dark:text-gray-400 text-center ">
                <thead class="text-gray-700 uppercase  bg-orange-400">
                    <tr>
                        <th class="text-white p-3 border ">
                            En Stock
                        </th>
                        <th class="text-white p-3 border">
                            déjà utiliser
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white text-orange-400">
                    <tr class="border">
                        <td class="px-4 py-2 font-bold border w-1/2" >

                            <span class="flex flex-col gap-2" style="max-height: 400px; overflow-y: auto;">
                                @foreach($dataStock as $itemStock)

                                @if($itemStock->use == 0)
                                <span class="flex justify-between items-center bg-white drop-shadow-lg p-3 border-orange-400 border rounded flex-col sm:flex-row">
                                <div class="flex flex-col">
                                        <span class="text-lg"> {{$itemStock->produitStock}}</span>
                                        <span class="text-xs text-black">{{$itemStock->created_at}}</span>
                                    </div>
                                    <form action="{{route('delteStock.destroy', $itemStock->id) }}" method="POST" class="flex gap-1 mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('editUse',$itemStock->id)}}" class="bg-lime-600 p-1  text-white rounded text-sm cursor-point">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                        </a>

                                        <a href="{{route('editStock.edit',$itemStock->id)}}" class="bg-orange-500 p-1 text-white rounded text-sm sm:text-base cursor-point">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>

                                        </a>

                                        <button type="submit" onclick="return confirm('Voulez vous vraiment supprimer le client : {{$itemStock->id }}')" class="bg-red-600 p-1 text-white rounded text-sm sm:text-base cursor-point">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                                @endif
                                @endforeach
                            </span>

                        </td>

                        <td class="px-4 py-2 font-bold border w-1/2">
                        <span class="flex flex-col gap-2" style="max-height: 400px; overflow-y: auto;">
                                @foreach($dataStock as $itemStock)

                                @if($itemStock->use == 1)
                                <span class="flex justify-between items-center bg-white drop-shadow-lg p-3 border-orange-400 border rounded flex-col sm:flex-row">
                                <div class="flex flex-col">
                                <span class="text-lg"> {{$itemStock->produitStock}}</span>
                                        <span class="text-xs text-black">{{$itemStock->created_at}}</span>
                                    </div>
                                    <form action="{{route('delteStock.destroy', $itemStock->id) }}" method="POST" class="flex gap-1 mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('AnulereditUse',$itemStock->id)}}" class="bg-pink-900 p-1  text-white rounded text-sm cursor-point">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>

                                        <a href="{{route('editStock.edit',$itemStock->id)}}" class="bg-orange-500 p-1 text-white rounded text-sm sm:text-base cursor-point">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>

                                        </a>

                                        <button type="submit" onclick="return confirm('Voulez vous vraiment supprimer le client : {{$itemStock->id }}')" class="bg-red-600 p-1 text-white rounded text-sm sm:text-base cursor-point">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                                @endif
                                @endforeach
                            </span>


                        </td>

                    </tr>
                </tbody>
            </table>

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