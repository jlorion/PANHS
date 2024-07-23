<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Students
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3">
                        <div class="flex flex-1 items-center justify-center p-6">
                            <div class="max-w-lg mx-5">
                                <form class="mt-5 sm:flex sm:items-center sm:justify-center">
                                    <input name="search" class="inline w-48 rounded-md border border-gray-300 bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:border-indigo-500 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="Keyword" type="search" autofocus="" placeholder="Search....">
                                    <button type="submit" class="bg-blue-400 inline-flex w-32 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Search</button>
                                </form>
                            </div>
                            <div class="mx-5">
                                <form class="">
                                    <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class or Section</label>
                                    <select id="section" name="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>All</option>
                                        <option value="DE">Section/class</option>
                                    </select>
                                </form>
                            </div>
                             <div class="mx-5">
                                <form class="">
                                    <label for="dropped" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dropped</label>
                                    <select id="dropped" name="dropped" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>No</option>
                                        <option value="DE">Yes</option>
                                    </select>
                                </form>
                            </div>

                            <div class="mx-5">
                                <button  class="bg-green-500 inline-flex w-32 items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm bg-green-500">Add Student</button>
                            </div>
                                
                        </div>
                
                </div>
            </div>
        </div>
    </div>


</x-app-layout>