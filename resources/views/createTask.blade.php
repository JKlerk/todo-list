<!doctype html>
@include('layouts.header')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <div class="flex mt-20 justify-center w-full">
            <div class="w-1/2 shadow">
                <div class="flex bg-blue p-4 rounded-t">
                    <h1 class="text-white"><a class="text-white no-underline" href="/">Todo list</a></h1>
                    <p class="flex flex-1 my-auto text-white justify-end">{{ auth()->user()->name }}</p>               
                </div>
                <div class="bg-white rounded-b w-full" style="height: 400px;">
        			<form class="flex justify-center" method="post" action="{{ url("/createtask") }}">
                		@csrf
                		<div class="">
	                		<div class="mt-10">
	                			<p class="text-blue text-3xl">Create a new task</p>
	                		</div>
	                		<div>
		                		<p class="mt-5 text-xl">Enter name of task</p>
		                		<input type="hidden" name="user_id" value='{{ auth()->user()->id }}'">
	                			<input class="border rounded text-xl" type="text" name="name" style="height: 30px; width: 200px">
	                		</div>
	                		<button class="bg-blue rounded p-2 px-4 mt-2 text-white shadow" type="submit">Submit</button>
	                	</div>
                	</form>
                </div>
            </div>
        </div>
    </body>
</html>
