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
            <a tabindex=1 class="{{ app()->getLocale() === 'en' ? 'bg-white text-black' : 'text-white' }} text-2xl w-[58px] h-[58px] border rounded-full flex justify-center items-center mb-4 cursor-pointer "
            href="{{ route('set-locale', ['locale' =>'en'] ) }}">en</a>
            <a class="{{ app()->getLocale() === 'ka' ? 'bg-white text-black' : 'text-white' }} text-2xl w-[58px] h-[58px] border rounded-full flex justify-center items-center cursor-pointer focus:bg-white focus:text-black "
            tabindex=2 href="{{ route('set-locale', ['locale' =>'ka'] ) }}">ka</a>
        </div>

    </body>
</html>


