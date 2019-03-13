<!doctype html>
@include('layouts.header')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <div class="bg-white rounded-b w-full" style="height: 400px;">
			<form class="flex justify-center" method="post" action="{{ url("/createlist") }}">
        		@csrf
        		<div class="">
            		<div class="mt-10">
            			<p class="text-blue text-3xl">Create a new list</p>
            		</div>
            		<div>
                		<p class="mt-5 text-xl">Enter name of list</p>
                		<input type="hidden" name="user_id" value='{{ auth()->user()->id }}'">
            			<input class="border rounded text-xl" type="text" name="name" style="height: 30px; width: 200px">
            		</div>
            		<button class="bg-blue rounded p-2 px-4 mt-2 text-white shadow" type="submit">Submit</button>
            	</div>
        	</form>
        </div>
    </body>
</html>
