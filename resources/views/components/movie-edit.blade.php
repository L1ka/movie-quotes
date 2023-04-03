
<h1>Edit Movie: {{ $movie->title }}</h1>

<form method="Post" action="{{ route('update') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
        <input type="text" name="title[ka]"  value="{{ $geo }}" placeholder="ka title">

        @error('title.ka')
        {{ $message }}
        @enderror

        <input type="text" name="title[en]"  value="{{ $en }}" placeholder="en title">

        @error('title.en')
        {{ $message }}
        @enderror
        <button type="submit" >Save</button>
</form>
