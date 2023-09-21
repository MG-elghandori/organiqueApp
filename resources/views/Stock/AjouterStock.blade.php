<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Stock</title>
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

        <div class="flex  justify-center items-center">
            <div class="flex justify-between mb-3 bg-slate-800 p-2 rounded sm:full lg:w-1/2 md:w-1/2">
                <h4 class="text-orange-400 font-bold sm:text-xs lg:text-xl md:text-xl">Gestion De Stock</h4>
                <a href="{{route('Stockpage')}}" class="text-sky-500 underline ">
                    <span  class="text-white bg-red-600 rounded p-1 underline" >page précédente</span>
                </a>
            </div>
        </div>


        <div class="flex  justify-center relative overflow-x-auto shadow-md sm:rounded-lg">
            <form action="{{route('Stockcreate.store')}}" method="post" class="w-1/2">
                @csrf

                <label for="produitStock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ajouter un nouvel élément</label>
                <textarea id="produitStock" name="produitStock" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ajouter ..."></textarea>
                <div>
                    <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistre</button>
                </div>
            </form>
        </div>

        @if ($message = Session::get('success'))
        <div id="message" class="md:w-1/2 md:mx-auto lg:w-1/2 mt-2 flex justify-between items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
            <div class="font-bold text-lime-600 cursor-point" onclick="deleteMessage()">X</div>
        </div>
        @endif
    </div>

    <script>
    function deleteMessage() {
        var messageDiv = document.getElementById('message');
        messageDiv.remove();
    }
</script>

</body>

</html>