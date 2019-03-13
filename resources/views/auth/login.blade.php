@include('layouts.header')
<form method="POST" action="{{ route('login') }}" autocomplete="off">
    @csrf
    <div class="animated fadeIn bg-black container mx-auto rounded shadow p-10" style="max-width: 400px;">
        <div class="text-white">
            <h1 class="text-3xl">Login page</h1>
            <div class="w-full shadow h-1 mt-1 bg-teal"></div>
            @if ($errors)
                <div class="text-red rounded shadow mt-2">
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                </div>
            @endif
            <p class="text-lg mb-1 mt-3">E-Mail</p>
            <input class="rounded w-full p-2 mb-6 text-xl" type="email" placeholder="E-Mail" name="email" value="{{ old('email') }}"/>
            <p class="text-lg mb-1">Password</p>
            <input class="rounded w-full p-2 mb-6 text-xl" type="password" placeholder="Password" name="password"/>
            <button type="submit" class="text-xl mt-4 w-full p-3 rounded shadow text-white bg-blue">Login</button>
        </div>
    </div>
</form>