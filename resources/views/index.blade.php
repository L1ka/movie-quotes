
<x-layout>

        @if ($quote)
            <img class="object-cover w-[700px] h-[386px] mb-[65px] block mt-[228px]" src="{{ $quote->thumbnail }}" alt="movie-poster">
            <p class="font-sans text-5xl text-white">"{{ $quote->quote }}"</p>
            <p class="underline text-5xl mt-[114px] text-white cursor-pointer"><a href="{{ route('movie.list', ['movie' => $movie->id]) }}">{{ $movie->title }}</a></p>
        @else
            <p class="underline text-5xl mt-96 mb-12 text-white">{{ $movie->title }}</p>
            <p class="font-sans text-5xl text-white mb-8 ">{{ __('no-quote') }}</p>
            <a class="font-sans text-5xl italic underline" href="{{ route('login.index') }}">{{ __('click_to_add') }}</a>
        @endif

</x-layout>

