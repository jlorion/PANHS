
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            Scan
        </h2>
    </x-slot>

    <script src="{{asset('js/scanscript.js')}}"></script>

    <div x-data="scanData" class="flex flex-col justify-center items-center ">
        <div class="flex w-full my-3" x-init="setLogtype">
            <button :class="logType==='time_in'? 'bg-green-500': 'bg-green-200' " class="bg-blue-200 w-full hover:bg-green-300 mx-1 rounded" x-on:click="logType = 'time_in'" onclick="typeThing= 'time_in'">time in</button>
            <button :class="logType==='time_out'? 'bg-green-500': 'bg-green-200'" class="w-full hover:bg-green-300 mx-1 rounded" x-on:click="logType = 'time_out'" onclick="typeThing = 'time_out'">time out</button>
        </div>
        <div class="flex" id="response">
            {{-- output here after scan  --}}
        </div>

        <div class="text-black my-5 lg:h-1/2 lg:w-1/2 md:w-1/2 w-full">
            <div id="my-qr-reader" class="mx-2 rounded">
            </div>
        </div>

        {{-- form type shit --}}
        <form id="form-control" style="display: none;">
            @csrf
            <input type="text" name="date" :value="dateToday">
            <button id="postattendance" style="display: none;" hx-post="{{route('attendacne.store')}}" hx-target="#response"></button>
        </form>

        {{-- proof of concept remove afterwards --}}
        <button style="display: none;" id="existbutton" hx-get="{{route('attendance.call')}}" hx-target="#recent"></button>

        <div id="recent" class="lg:w-3/4">

        </div>
        
    </div>


</x-app-layout>