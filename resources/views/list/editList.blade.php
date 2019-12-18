<!doctype html>
@include('layouts.header')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <div class="bg-white rounded-b w-full" style="height: 400px;">
			<form class="flex justify-center" method="post" action="{{ url('editlist/' . $list->id) }}">
        		@csrf
        		<div class="">
            		<div class="mt-10">
            			<p class="text-{{ auth()->user()->color }} text-3xl">Edit your list</p>
            		</div>
            		<div>
                		<p class="mt-5 text-xl">Enter name of list</p>
                		<input type="hidden" name="user_id" value='{{ auth()->user()->id }}'">
            			<input class="border rounded text-xl" value="{{ $list->name }}" type="text" name="name" style="height: 30px; width: 200px">
            		</div>
            		<button class="bg-{{ auth()->user()->color }} hover:shadow hover:bg-{{ auth()->user()->color }}-dark rounded p-2 px-4 mt-2 text-white shadow" type="submit">Submit</button>
            	</div>
        	</form>
        </div>
    </body>
</html>
