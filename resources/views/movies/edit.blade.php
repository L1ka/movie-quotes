

<h1>Edit Movie: {{ $movies ->find($movie)->title }}</h1>


<form method="Post" action="{{ route('movies.update', ['movie' => $movie]) }}" >
    @csrf
    @method('PATCH')
        <input type="text" name="title[ka]"  value="{{ $movies ->find($movie)->getTranslation('title', 'ka') }}" placeholder="ka title">

        @error('title.ka')
        {{ $message }}
        @enderror

        <input type="text" name="title[en]"  value="{{ $movies ->find($movie)->getTranslation('title', 'en') }}" placeholder="en title">

        @error('title.en')
        {{ $message }}
        @enderror
        <button type="submit" >Save</button>
</form>


