@vite('resources/css/app.css')

<div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900 tracking-widest">{{ __('create_quote') }}</h2>
      </div>
      <form class="mt-8 space-y-6" action="{{ route('quotes.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <select name="movie_id" id="movie_id" >
            @foreach ($movies as $movie)
                <option
                    value="{{ $movie->id }}"
                    {{ old('movie_id') }}
                >{{ ucwords($movie->title) }}</option>
            @endforeach
        </select>
          <div>
            <input  name="quote[ka]" value="{{ old('quote.ka') }}" type="text"  class="relative block w-full rounded-t-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-m sm:leading-6 indent-3" placeholder="{{ __('geo_quote') }}">
          </div>
          @error('quote.ka')
          {{ $message }}
          @enderror
          <div>
            <input  name="quote[en]" value="{{ old('quote.en') }}" type="text" class="relative block w-full rounded-b-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-m sm:leading-6 indent-3" placeholder="{{ __('en_quote') }}">
          </div>
          @error('quote.en')
          {{ $message }}
          @enderror
          <div>
            <input  name="thumbnail" value="{{ old('thumbnail') }}" type="file"  class="relative block w-full rounded-b-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-m sm:leading-6 indent-3">
          </div>
          @error('thumbnail')
          {{ $message }}
          @enderror

        <div>
          <button type="submit" class="tracking-widest group relative flex w-full justify-center rounded-md bg-gray-600 px-3 py-3 text-sm font-semibold text-white hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            {{ __('save') }}
          </button>
        </div>
      </form>
    </div>
  </div>



