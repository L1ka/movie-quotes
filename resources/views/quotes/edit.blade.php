@vite('resources/css/app.css')

<div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900 tracking-widest">{{ __('edit_quote') }}Edit Quote</h2>
      </div>
      <form class="mt-8 space-y-6" action="{{ route('quotes.update', ['quote' => $quote]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PATCH')
        <select name="movie_id" id="movie_id" required>
                <option
                    value="{{ $quote -> movie_id }}"
                    selected
                >{{ ucwords($movie->title) }}</option>
        </select>
          @error('quote_id')
          {{ $message }}
          @enderror

          <div>
            <input  name="quote[ka]" value="{{ $quote->getTranslation('quote', 'ka') }}" type="text" required class="relative block w-full rounded-t-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-m sm:leading-6 indent-3" placeholder="Georgian Quote">
          </div>
          @error('quote.ka')
          {{ $message }}
          @enderror
          <div>
            <input  name="quote[en]" value="{{ $quote->getTranslation('quote', 'en') }}" type="text" required class="relative block w-full rounded-b-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-m sm:leading-6 indent-3" placeholder="English Quote">
          </div>
          @error('quote.ka')
          {{ $message }}
          @enderror
          <img src="{{ $quote->thumbnail }}" alt="movie-poster">
          <div>
            <input  name="thumbnail"  value="{{ $quote->thumbnail }}" type="file" required class="relative block w-full rounded-b-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-m sm:leading-6 indent-3">
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
