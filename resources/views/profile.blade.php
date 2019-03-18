<!doctype html>
@include('layouts.header')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="animated fadeIn">
        <div class="bg-white rounded-b w-full flex" style="height: 400px;">
            <div class="w-full">
            	<div class="flex m-10">
            		<div class="w-1/2">
	            		<p>Your name</p>
	            		<input type="text" disabled="disabled" class="mt-2 w-full block border py-2 px-2 rounded cursor-not-allowed" value="{{ auth()->user()->name }}">
	            		<input type="text" disabled="disabled" class="mt-2 w-full block border py-2 px-2 rounded cursor-not-allowed" value="{{ auth()->user()->email }}">
	            		<p class="mt-5">Profile creation date</p>
	            		<input type="text" disabled="disabled" class="mt-2 w-full block border py-2 px-2 rounded cursor-not-allowed" value="{{ auth()->user()->created_at }}">
	            		<div class="mt-5">
		            		<a class="bg-{{ auth()->user()->color }} p-2 rounded text-white hover:shadow hover:bg-{{ auth()->user()->color }}-dark no-underline hover:cursor-pointer" href="#" onclick="passwordChange()">Change password</a>
	            			<a class="bg-red p-2 rounded text-white hover:shadow hover:bg-e-dark no-underline" href="">Delete account</a>
	            		</div>
	            		<div class="mt-5">
	            			<p>Change color scheme</p>
	            			<div class="flex mt-2">
	            				<form name="myform" method="POST" action="{{ url('changecolor/') }}" autocomplete="off">
	            					@csrf
	            					<input id="colorStatus" type="hidden" name="color" value="color">
	            					<button onclick="choose('red')" class="bg-red p-2 rounded-full border-white shadow border cursor-pointer"></button>
	            					<button onclick="choose('blue')" class="bg-blue p-2 mx-2 rounded-full border-white shadow border cursor-pointer"></button>
            						<button onclick="choose('green')" class="bg-green p-2 rounded-full border-white shadow border cursor-pointer"></button>
	            					<script type="text/javascript">
	            						function choose(choice){ 
    										document.getElementById("colorStatus").value = choice;
    										console.log(colorStatus)
    										document.myform.submit()
										};
	            					</script>
	            				</form>
	            			</div>
	            		</div>
	            	</div>
            		<div id="pc" class="hidden w-1/2 animated">
            			<form class="flex justify-center" method="POST" action="{{ route('password.update') }}" autocomplete="off">
            				@csrf
            				<div>
            					<p>Enter your new password</p>
            					<input class="mt-2 block border py-2 px-2 rounded" type="password" placeholder="Old Password" name="current-password"/>
			            		<input class="mt-2 block border py-2 px-2 rounded" type="password" placeholder="New Password" name="new-password"/>
       							<input class="mt-2 block border py-2 px-2 rounded" type="password" placeholder="Confirm Password" name="new-password_confirmation"/>
       							@if ($errors)
       								<strong class="text-red">{{ $errors->first('current-password') }}</strong>
       								<strong class="text-red block">{{ $errors->first('new-password') }}</strong>
       								<strong class="text-red">{{ $errors->first('new-password_confirmation') }}</strong>
       							@endif
            					<button type="submit" class="bg-orange p-2 w-full rounded text-white hover:shadow hover:bg-e-dark no-underline mt-3">Change password</button>
            				</div>
            			</form>
            		</div>
            	</div>
            </div>
        </div>
        <script type="text/javascript">
        	function passwordChange(){
        		document.getElementById("pc").classList.remove('hidden');
        		document.getElementById("pc").classList.add('fadeIn');
        	}
        </script>
    </body>
</html>