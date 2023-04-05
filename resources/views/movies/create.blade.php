<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<form method="Post" action="{{ route('movies.store') }}">
    @csrf
    <input type="text" name="title[ka]"  value="{{ old('title.ka') }}" placeholder="ka title">
    @error('title.ka')
    {{ $message }}
    @enderror
    <input type="text" name="title[en]"  value="{{ old('title.en') }}" placeholder="en title">
    @error('title.en')
    {{ $message }}
    @enderror
    <button type="submit" >Save</button>

    @if(Session::get('success'))
        <div x-data="{show: true}"
             x-init="setTimeout(()=> show =false, 2000)"
             x-show="show">
            {{session::get('success')}}
        </div>
    @endif
</form>
