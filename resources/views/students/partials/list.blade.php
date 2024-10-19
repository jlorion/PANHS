
<ul class=" mx-7 w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
    @for($i = 0; $i < $students->count(); $i++)
    <a href="{{route('student.show', ['id'=> $students[$i]['id']])}}">
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