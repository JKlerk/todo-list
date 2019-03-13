@include('layouts.header')
<form method="POST" action="{{ route('login') }}" autocomplete="off">
    @csrf
    <div class="mt-20 animated fadeIn container mx-auto rounded shadow border p-10" style="max-width: 400px;">
        <div class="text-white">
            <h1 class="text-3xl text-black mb-5 text-center">Login page</h1>
            @if ($errors)
                <div class="text-red rounded shadow mt-2">
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                </div>
            @endif
            <input class="border w-full p-2 text-xl mt-5" type="email" placeholder="E-Mail" name="email" value="{{ old('email') }}"/>
            <input class="border w-full p-2 text-xl" type="password" placeholder="Password" name="password"/>
            <button type="submit" class="text-xl mt-4 w-full p-3 rounded shadow text-white bg-blue">Login</button>
            <p class="text-grey mt-5">Need an account? <a href="/register" class="text-blue no-underline hover:underline">Click here</a></p>
        </div>
    </div>
</form>