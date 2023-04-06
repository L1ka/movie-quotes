<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@vite('resources/css/app.css')


 <div class="flex justify-center">
<div class="w-[100%]">
  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-left text-sm font-light  table-auto">
            <thead class="border-b font-medium dark:border-neutral-500">
              <tr>
                <th scope="col" class="px-8 py-6 text-2xl">#ID</th>
                <th scope="col" class="px-8 py-6 text-2xl">Movie Title</th>
                <th scope="col" class="px-8 py-6 text-2xl">Movie Quote</th>
                <th scope="col" class="px-8 py-6 text-2xl">Movie Poster</th>
                <th scope="col" class="px-8 py-6 text-2xl">Edit Movie</th>
                <th scope="col" class="px-8 py-6 text-2xl">Edit Quote</th>
                <th scope="col" class="px-8 py-6 text-2xl">+ Add Quote</th>
                <th scope="col" class="px-8 py-6 text-2xl">+ Add Movie</th>
                <th scope="col" class="px-8 py-6 text-2xl">Delete Movie</th>
                <th scope="col" class="px-8 py-6 text-2xl">Delete Quote</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    @if ($movie->quotes->count() !== 0)
                        @foreach ($movie->quotes as $quote )
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-8 py-6 font-medium  text-xl">{{ $movie->id }}</td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl">{{ $movie->title }}</td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl">{{ $quote->quote }}</td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl">{{ $quote->thumbnail }}</td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer"><a href="{{ route('movies.edit', ['movie' => $movie->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer"><a href="{{ route('quotes.edit', ['quote' => $quote->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer"><a href="{{ route('quotes.create') }}"><i class="fa-solid fa-plus"></i></a></td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer"><a href="#"><i class="fa-solid fa-plus"></i></a></td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer">
                                    <form method="POST" action="{{ route('movies.destroy', ['movie' => $movie->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('All quotes for this movie will be also deleted. Continue?')">Delete</button>
                                    </form>
                                </td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer">
                                    <form method="POST" action="{{ route('quotes.destroy', ['quote' => $quote->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Image for this quote will be also deleted. Continue?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-8 py-6 font-medium  text-xl">{{ $movie->id }}</td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl">{{ $movie->title }}</td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl">--</td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl">--</td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer"><a href="{{ route('movies.edit', ['movie' => $movie->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer">--</td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer"><a href="{{ route('quotes.create', ['id' => $movie->id]) }}"><i class="fa-solid fa-plus"></i></a></td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer">--</td>
                                <td class="whitespace-nowrap px-8 py-6 text-xl cursor-pointer">
                                    <form method="POST" action="{{ route('movies.destroy', ['movie' => $movie->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('All quotes for this movie will be also deleted. Continue?')">Delete</button>
                                    </form>
                                </td>

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
