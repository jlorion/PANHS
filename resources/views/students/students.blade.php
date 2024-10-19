<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            Students >> <a href="{{route('students.create')}}" class="text-gray-600 hover:text-gray-400">Add Students</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-gradient-to-r from-pink-300 to-pink-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3">
                        <div class=" md:px-20 lg:px-32 xl:px-52 items-center p-6 flex flex-col">
                                    <input name="search" class="focus:border-indigo-700 my-2 focus:outline-none focus:shadow-outline flex-grow transition duration-200 appearance-none p-2 border-2 border-gray-300 text-black
                                    bg-gray-100 font-normal w-full h-12 text-xs rounded-md shadow-sm" type="search" autofocus="" placeholder="Search...." 
                                    hx-get="{{route('students')}}"
                                    hx-trigger="keyup changed delay:500ms"
                                    hx-target="#div-target"
                                    hx-indicator=".load"
                                    >
                            <div class="w-full md:flex-row flex flex-col gap-4">
                                        <select id="section" name="section"
                                        hx-get="{{route('students')}}"
                                        hx-trigger="change"
                                        hx-target="#div-target"
                                        hx-indicator=".load"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-pink-100 dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>All Classes</option>
                                            @for($i = 0; $i <$classes->count(); $i++)
                                                <option value="{{$classes[$i]->id}}">{{$classes[$i]->grade}} - {{$classes[$i]->section}}</option>
                                            @endfor
                                        </select>
                                        <select id="dropped" name="dropped" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-pink-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Status</option>
                                            <option value="false">active</option>
                                            <option value="true">dropped</option>
                                        </select>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="flex w-full justify-center">
            <div class="load" style="display: none;">Loading...</div>
        </div>
    
        <div class="py-4 flex flex-col items-center justify-center" id="div-target" hx-get="{{route('students')}}" hx-trigger="load">
            <ul class=" mx-7 w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                @for($i = 0; $i < $students->count(); $i++)
                <a href="{{route('student.show', ['id'=>$students[$i]['id']])}}">
                <li class="flex items-center p-4 bg-pink-200 border border-gray-300 mx-3 my-3 rounded-lg shadow-sm hover:bg-pink-500">
                    <div class="w-20 h-20 flex-shrink-0 rounded-full overflow-hidden border-2 border-gray-300 mr-4">
                        <img src="{{$students[$i]['img']}}" alt="&#x21;" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <p class="text-lg font-semibold">{{$students[$i]['last_name']}}, {{$students[$i]['first_name']}}</p>
                        <p class="text-gray-600">LRN: {{$students[$i]['id']}}</p>
                        <p class="text-gray-600">Class: {{$students[$i]['grade']}} - {{$students[$i]['section']}}</p>
                    </div>
                </li>
                </a>

             
                @endfor
            </ul>
            <div class="my-3 p-1 bg-transparent" hx-boost="true" hx-target="#div-target">
                {{$students->links()}}
            </div>
        </div>

    </div>


</x-app-layout>