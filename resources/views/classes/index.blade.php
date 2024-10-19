
{{-- add hero for aadding 
add hero for search 
add list of all classes with button for delete and edit --}}

<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
                Classes >> <a href="{{route('classes.create')}}" class="text-gray-600 hover:text-gray-400"> Add Classes</a>

            </h2>
        </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-gradient-to-r from-pink-300 to-pink-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3">
                        <div class=" md:px-20 lg:px-32 xl:px-52 items-center p-4 flex flex-col">
                                <form class="rounded-md w-full md:flex-row p-4 flex flex-col gap-4">
                                    <input name="search" class="focus:border-indigo-700 focus:outline-none
      focus:shadow-outline flex-grow transition duration-200 appearance-none p-2 border-2 border-gray-300 text-black
      bg-gray-100 font-normal w-full h-12 text-xs rounded-md shadow-sm" placeholder="Keyword" type="search" autofocus="" placeholder="Search....">
                                    <button type="submit" class="inline-flex border border-indigo-500 focus:outline-none focus:ring-2
      focus:ring-indigo-500 focus:ring-offset-2 justify-center rounded-md py-2 px-4 bg-indigo-600 text-sm font-medium
      text-white shadow-sm">Search</button>
                                </form>
                        </div>
                </div>
            </div>
        </div>
        <div class="py-4 flex justify-center">
            <ul class="space-y-4 lg:w-2/3 md:w-1/2 w-full">
                @for($i = 0; $i < $classes->count(); $i++)
                    
                <li id="classes_{{$classes[$i]->id}}" class="flex flex-col md:flex-row items-center p-4 bg-pink-200 border border-gray-300 mx-1 rounded-lg shadow-sm">
                    <div class="flex-1">
                        <p class="text-lg font-semibold">{{$classes[$i]->section}}</p>
                        <p class="text-gray-600">Grade: {{$classes[$i]->grade}}</p>
                        <p class="text-gray-600">Prof: {{$classes[$i]->name}}</p>
                    </div>
                    <div class="my-2">
                        <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Edit</button>
                        <button class="mt-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
                    </div>
                </li>
             
                @endfor
            </ul>
        </div>

    </div>


</x-app-layout>

