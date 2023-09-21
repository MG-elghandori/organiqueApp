<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance</title>

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
            <h4 class="text-lime-600 font-bold  text-xl">Gestion D'argent</h4>
            <a href="{{route('Accueil')}}" class="text-sky-500 underline">
                <span class="text-white bg-red-600 rounded p-1 underline">Accueil</span>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if ($message = Session::get('success'))
            <div id="message" class="md:w-1/2 md:mx-auto lg:w-2/3 mb-2 mt-0 flex justify-between items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded  relative" role="alert">
                <span class="block sm:inline">{{ $message }}</span>
                <div class="font-bold text-lime-600 cursor-point" onclick="deleteMessage()">X</div>
            </div>
            @endif

            @if(count($dataFinance)>0)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400  text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th  colspan="2"  scope="col" class="text-white	 px-6 py-3 border bg-lime-600">
                           la Banque
                        </th>
                        <th  colspan="2"  scope="col" class="text-white	 px-6 py-3 border bg-lime-600">
                          la caisse
                        </th>
                    </tr>
                    <tr class="">
                        <th class='border px-6 py-3 text-white	'>compte Bank</th>
                        <th class='border px-6 py-3 text-white	'>e-chopping</th>
                        <th class='border px-6 py-3 text-white	'>Argent</th>
                        <th class='border px-6 py-3 text-white	'>Crédit</th>
                   </tr>
                </thead>
                @foreach($dataFinance as $itemFinance)
                <tbody>
                    <tr class="bg-slate-400	 border">
                        <td scope="row" class="flex justify-around gap-1 border px-6 py-4 font-bold">
                            <span class="bg-red-700	p-1 rounded text-white w-1/2"> CIH:{{ $itemFinance->compteCIH }}dh</span>
                            <span class="bg-red-700	p-1 rounded text-white	w-1/2">TIJARI:{{ $itemFinance->compteTIJARI }}dh</span>
                        </td>
                        <td class="border px-6 py-4  font-bold">
                            <span class="bg-red-700	p-1 rounded text-white  ">
                                {{ $itemFinance->echopping}}dh
                            </span>
                        </td>
                        <td class="border px-6 py-4	font-bold">
                        <span class="bg-red-700	p-1 rounded text-white  ">
                            {{ $itemFinance->Credit}}dh
                        </span>
                        </td>
                        <td class="border px-6 py-4	font-bold">
                            
                        <span class="bg-red-700	p-1 rounded text-white ">
                            {{ $itemFinance->argent}}dh
                        </span>
                        </td>
                    </tr>
                </tbody>
                @php
        $totalElement = $itemFinance->compteCIH + $itemFinance->compteTIJARI + $itemFinance->echopping + $itemFinance->Credit + $itemFinance->argent;
             @endphp
                @endforeach
            </table>

            @endif
        </div>

                <div class="flex justify-between items-center w-full sm:w-auto mb-3 bg-slate-800 p-2 rounded">

                <span class="text-white font-bold text-xl bg-lime-700 p-1 rounded">TOTAL @isset($totalElement) : {{ $totalElement }} dh @else 0 @endisset</span>
           
            <a href="{{route('Financedit',$itemFinance->id)}}" class="w-40 text-center  focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                <span>Gestioner</span>
            </a>
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