<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Finance</title>
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
        <div id="message" class="md:w-1/2 md:mx-auto lg:w-2/3 mb-2 mt-0 flex justify-between items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded  relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
            <div class="font-bold text-lime-600 cursor-point" onclick="deleteMessage()">X</div>
        </div>
        @endif

        <div class="mt-2 mx-auto p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 md:w-1/2 lg:w-2/4">

            <div class="flex justify-between mb-4">
                <h4 class="text-lime-600 font-bold  text-xl">Gestion D'argent</h4>
                <a href="{{route('Financepage')}}" class="text-sky-500 underline">
                    <span  class="text-white bg-red-600 rounded p-1 underline">page précédente</span>
                </a>
            </div>

            <form method="post" action="{{ route('updateFinance', ['id' => $datafinance->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="compteCIH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Compte CIH</label>
                    <input type="text" id="compteCIH" name="compteCIH" value="{{$datafinance->compteCIH}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    @if($errors->has('compteCIH'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('compteCIH')}}</div>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="compteTIJARI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Compte TIJARI</label>
                    <input type="text" name="compteTIJARI" value="{{$datafinance->compteTIJARI}}" id="compteTIJARI" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    @if($errors->has('compteTIJARI'))
                    <div class="text-red-500 text-xs mt-1">{{ $errors->first('compteTIJARI') }}</div>
                    @endif

                </div>

                <div class="mb-2">
                    <label for="echopping" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Echopping</label>
                    <input type="text" name="echopping" value="{{$datafinance->echopping}}" id="echopping" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    @if($errors->has('echopping'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('echopping')}}</div>
                    @endif
                </div>

                <div class="mb-2">
                    <label for="Credit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Credit</label>
                    <input type="text" name="Credit" value="{{$datafinance->Credit}}" id="Credit" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    @if($errors->has('Credit'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('Credit')}}</div>
                    @endif
                </div>

                <div class="mb-2">
                    <label for="argent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Argent</label>
                    <input type="text" name="argent" value="{{$datafinance->argent}}" id="argent" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    @if($errors->has('argent'))
                    <div class="text-red-500 text-xs mt-1">{{$errors->first('argent')}}</div>
                    @endif
                </div>

                <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistre</button>
            </form>

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