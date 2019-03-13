@include('layouts.header')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="animated fadeIn bg-black container mx-auto rounded shadow p-10" style="max-width: 400px;">
        <div class="text-white">
            <h1 class="text-3xl">Register page</h1>
            <div class="w-full shadow h-1 mt-1 bg-teal mb-5"></div>
            @if ($errors)
                <div class="text-red rounded shadow mt-2">
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                        <strong>{{ $errors->first('name') }}</strong>
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                </div>
            @endif
            <p class="text-lg mb-1 mt-3">Enter name</p>
            <input class="rounded w-full p-2 mb-3 text-xl" type="text" placeholder="Username" name="name" value="{{ old('name') }}"/>
            <p class="text-lg mb-1 mt-3">Enter your E-Mail</p>
            <input class="rounded w-full p-2 mb-6 text-xl" type="email" placeholder="E-Mail" name="email" value="{{ old('email') }}"/>
            <p class="text-lg mb-1">Create a password</p>
            <input class="rounded w-full p-2 mb-6 text-xl" type="password" placeholder="Password" name="password"/>
            <p class="text-lg mb-1">Confirm password</p>
            <input class="rounded w-full p-2 mb-6 text-xl" type="password" placeholder="Password" name="password_confirmation" required/>
            <button type="submit" class="text-xl mt-4 w-full p-3 bg-blue rounded shadow text-white">Register</button>
        </div>
    </div>
</form>