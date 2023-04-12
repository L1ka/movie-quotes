
@vite('resources/css/app.css')

<div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900 tracking-widest">{{ __('edit_movie') }}: {{ $movie->title }}</h2>
      </div>
      <form class="mt-8 space-y-6" method="Post" action="{{ route('movies.update', ['movie' => $movie]) }}" >
        @csrf
        @method('PATCH')
            <div>
                <input class="relative block w-full rounded-t-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-m sm:leading-6 indent-3" type="text" name="title[ka]"  value="{{old('title.ka') ?? $movie->getTranslation('title', 'ka') }}" placeholder="{{ __('geo_title') }}">
            </div>
            @error('title.ka')
            {{ $message }}
            @enderror
    <div>
        <input class="relative block w-full rounded-t-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-m sm:leading-6 indent-3" type="text" name="title[en]"  value="{{ old('title.en') ?? $movie->getTranslation('title', 'en') }}" placeholder="{{ __('en_title') }}">
    </div>
    @error('title.en')
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
