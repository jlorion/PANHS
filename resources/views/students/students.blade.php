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
                                <form class="rounded-md w-full md:flex-row mb-4 p-4 flex flex-col gap-4">
                                    <input name="search" class="focus:border-indigo-700 focus:outline-none
      focus:shadow-outline flex-grow transition duration-200 appearance-none p-2 border-2 border-gray-300 text-black
      bg-gray-100 font-normal w-full h-12 text-xs rounded-md shadow-sm" placeholder="Keyword" type="search" autofocus="" placeholder="Search....">
                                    <button type="submit" class="inline-flex border border-indigo-500 focus:outline-none focus:ring-2
      focus:ring-indigo-500 focus:ring-offset-2 justify-center rounded-md py-2 px-4 bg-indigo-600 text-sm font-medium
      text-white shadow-sm">Search</button>
                                </form>
                            <div class="w-full md:flex-row flex flex-col gap-4">
                                    <form class="focus:border-indigo-700 focus:outline-none focus:shadow-outline transition duration-200 font-normal w-full h-12 text-xsrounded-md shadow-sm">
                                        <select id="section" name="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-pink-100 dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>All Classes</option>
                                            <option value="DE">Section/class</option>
                                        </select>
                                    </form>
                                    <form class="focus:border-indigo-700 focus:outline-none focus:shadow-outline font-normal w-full h-12 text-xs rounded-md shadow-sm">
                                        <select id="dropped" name="dropped" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-pink-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Status</option>
                                            <option value="false">active</option>
                                            <option value="true">dropped</option>
                                        </select>
                                    </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="py-4 flex justify-center">
            <ul class="space-y-4 max-w-md w-full">
                <li class="flex items-center p-4 bg-pink-200 border border-gray-300 mx-1 rounded-lg shadow-sm">
                    <div class="w-20 h-20 flex-shrink-0 rounded-full overflow-hidden border-2 border-gray-300 mr-4">
                        <img src="path-to-image.jpg" alt="Item Image" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <p class="text-lg font-semibold">John Doe samantha dave</p>
                        <p class="text-gray-600">ID: 12345</p>
                        <p class="text-gray-600">Class: A</p>
                    </div>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Edit</button>
                </li>

                                <li class="flex items-center p-4 bg-pink-200 border border-gray-300 mx-1 rounded-lg shadow-sm">
                    <div class="w-20 h-20 flex-shrink-0 rounded-full overflow-hidden border-2 border-gray-300 mr-4">
                        <img src="path-to-image.jpg" alt="Item Image" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <p class="text-lg font-semibold">John Doe samantha dave</p>
                        <p class="text-gray-600">ID: 12345</p>
                        <p class="text-gray-600">Class: A</p>
                    </div>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Edit</button>
                </li>
 
             
            </ul>
        </div>

    </div>


</x-app-layout>