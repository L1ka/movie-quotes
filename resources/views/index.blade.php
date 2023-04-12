
<x-layout>

       @if ($quotes->count() && $quote=$quotes->random())
             <img class="object-cover w-[700px] h-[386px] mb-[65px] block mt-[228px]" src="{{ $quote->thumbnail }}" alt="movie-poster">
            <p class="font-sans text-5xl text-white">"{{ $quote->quote }}"</p>
            <p class="underline text-5xl mt-[114px] text-white cursor-pointer"><a href="{{ route('movie.list', ['movie' => $quote->movie_id]) }}">{{ $quote->movie->title }}</a></p>
       @else
            <a class="font-sans text-5xl italic underline mt-[25%]" href="{{ route('login.index') }}">{{ __('click_to_add') }}</a>
       @endif

</x-layout>

