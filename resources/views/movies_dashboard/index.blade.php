<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@vite('resources/css/app.css')


<x-layout>
    <div class="flex w-[70vw] space-x-5 mt-16 mb-16  justify-end">
        <a href="{{ route('quotes.create') }}" class="group relative flex w-[10%] justify-center rounded-md bg-gray-300 px-3 py-3 text-sm font-semibold text-black hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('add_quote') }}</a>
        <a  href="{{ route('movies.create') }}" class="group relative flex w-[10%] justify-center rounded-md bg-gray-300 px-3 py-3 text-sm font-semibold text-black hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('add_movie') }}</a>
    </div>
 <div class="flex justify-center w-screen">
<div class="w-[80%]">
  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-left text-sm font-light  table-auto">
            <thead class="border-b font-medium dark:border-neutral-500">
              <tr>
                <th scope="col" class="px-8 py-6 text-2xl">{{ __('movie_title') }}</th>
                <th scope="col" class="px-8 py-6 text-2xl">{{ __('movie_quote') }}</th>
                <th scope="col" class="px-8 py-6 text-2xl">{{ __('movie_poster') }}</th>
                <th scope="col" class="px-8 py-6 text-2xl">{{ __('edit_movie') }}</th>
                <th scope="col" class="px-8 py-6 text-2xl">{{ __('edit_quote') }}</th>
                <th scope="col" class="px-8 py-6 text-2xl">{{ __('delete_movie') }}</th>
                <th scope="col" class="px-8 py-6 text-2xl">{{ __('delete_quote') }}</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    @if ($movie->quotes->count() !== 0)
                        @foreach ($movie->quotes as $quote )
                            <tr class="border-b dark:border-neutral-500">
                                <td class="truncate max-w-xs px-8 py-6 text-xl  text-white ">{{ $movie->title }}</td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl   text-white">{{ $quote->quote }}</td>
                                <td class="truncate max-w-xs  px-8 py-6 text-xl  text-white">{{ $quote->thumbnail }}</td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl cursor-pointer  text-white"><a href="{{ route('movies.edit', ['movie' => $movie->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl cursor-pointer  text-white"><a href="{{ route('quotes.edit', ['quote' => $quote->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl cursor-pointer  text-white">
                                    <form method="POST" action="{{ route('movies.destroy', ['movie' => $movie->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button ><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl cursor-pointer  text-white">
                                    <form method="POST" action="{{ route('quotes.destroy', ['quote' => $quote->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr class="border-b dark:border-neutral-500">
                                <td class="truncate max-w-xs px-8 py-6 text-x l text-white ">{{ $movie->title }}</td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl  text-white">--</td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl  text-white">--</td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl cursor-pointer  text-white"><a href="{{ route('movies.edit', ['movie' => $movie->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl cursor-pointer  text-white">--</td>
                                {{-- <td class="truncate max-w-xs px-8 py-6 text-xl cursor-pointer"><a href="{{ route('quotes.create', ['id' => $movie->id]) }}"><i class="fa-solid fa-plus"></i></a></td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl cursor-pointer">--</td> --}}
                                <td class="truncate max-w-xs px-8 py-6 text-xl cursor-pointer  text-white">
                                    <form method="POST" action="{{ route('movies.destroy', ['movie' => $movie->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button ><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                                <td class="truncate max-w-xs px-8 py-6 text-xl cursor-pointer  text-white">--</td>
                            </tr>

                    @endif


               @endforeach


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</x-layout>
