
@vite('resources/css/app.css')


<x-layout>
<div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">{{ __('Sign in to your account') }}</h2>

      </div>
      <form class="mt-8 space-y-6" action="#" method="POST">
        @csrf

        <input type="hidden" name="remember" value="true">

          <div>
            <input value="{{ old('username') }}"  name="username" type="text" autocomplete="username" class="relative block w-full rounded-t-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-lg sm:leading-6 indent-5" placeholder="User Name">
          </div>
          @error('username')
          {{ $message }}
          @enderror
          <div>
            <input value="{{ old('password') }}" name="password" type="password" autocomplete="current-password" class="relative block w-full rounded-b-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-lg sm:leading-6 indent-5" placeholder="Password">
          </div>
          @error('password')
          {{ $message }}
          @enderror

        <div>
          <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            {{ __('Sign in') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</x-layout>
