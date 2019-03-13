@include('layouts.header')
<form method="POST" action="{{ route('register') }}" autocomplete="off">
    @csrf
    <div class="mt-20 animated fadeIn container mx-auto rounded shadow border p-10" style="max-width: 400px;">
        <div class="text-white">
            <h1 class="text-3xl text-black mb-5 text-center">Register page</h1>
            @if ($errors)
                <div class="text-red rounded shadow mt-2">
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                        <strong>{{ $errors->first('name') }}</strong>
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                </div>
            @endif
            <input class="border w-full p-2 text-xl mt-5" type="text" placeholder="Username" name="name" value="{{ old('name') }}"/>
            <input class="border w-full p-2 text-xl" type="email" placeholder="E-Mail" name="email" value="{{ old('email') }}"/>
            <input class="border w-full p-2 text-xl" type="password" placeholder="Password" name="password"/>
            <input class="border w-full p-2 text-xl" type="password" placeholder="Confirm password" name="password_confirmation" required/>
            <button type="submit" class="text-xl mt-4 w-full p-3 rounded shadow text-white bg-blue">Register</button>
            <p class="text-grey mt-5">Already have an account? <a href="/login" class="text-blue no-underline hover:underline">Click here</a></p>
        </div>
    </div>
</form>