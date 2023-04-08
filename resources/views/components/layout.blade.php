<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//db.onlinewebfonts.com/c/7a20d101126c5370e8b5811da3569fb4?family=Sansation" rel="stylesheet" type="text/css"/>
        @vite('resources/css/app.css')
        <title>Movie Quotes</title>

    </head>


    <body class="h-screen w-screen flex  flex-col items-center">

        {{ $slot }}

        <div class="absolute left-[50px] top-[473px]">
            <div class="w-[58px] h-[58px] border rounded-full flex justify-center items-center mb-4 cursor-pointer">
                <h3 class="text-2xl  text-white "><a   href="{{ route('set-locale', ['locale' =>'en'] ) }}">en</a></h3>
            </div>
            <div class="w-[58px] h-[58px] border rounded-full flex justify-center items-center bg-white cursor-pointer">
                <h3 class="text-2xl  text-black font-sans"><a href="{{ route('set-locale', ['locale' =>'ka'] ) }}">ka</button></h3>
            </div>
        </div>

    </body>
</html>


