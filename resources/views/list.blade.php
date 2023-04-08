<x-layout>

    <p class="text-5xl mt-[79px] text-white cursor-pointer  mb-[82px]">{{ $movie->title }}</p>

    @foreach ($movie->quotes as  $quote)
        <div class="w-[748px] h-[533px]   bg-white mb-[67px]">
            <img class="object-cover w-full h-4/5  block" src="{{ $quote->thumbnail }}" alt="movie-poster">

            <div class="w-full h-1/5 flex justify-center items-center ">
                <h3 class="font-sans text-[36px] text-black text-center">{{ $quote->quote }}</h3>
            </div>
        </div>
    @endforeach


</x-layout>
