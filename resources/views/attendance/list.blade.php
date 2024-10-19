<div class="mb-3 bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-17">
    <div class="bg-pink-200 py-2 px-4">
        <h2 class="text-xl font-semibold text-gray-800">Recent Scanned</h2>
    </div>
    <ul class="divide-y divide-gray-200">
        @foreach($scanned as  $value)
            <li class="flex items-center py-4 px-3 hover:bg-green-200">
                <span class="text-gray-700 font-medium m-1">{{$value->id}}</span>
                <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{$value->img}}"
                alt="User avatar">
                <div class="flex flex-col">
                    <h3 class="font-medium text-gray-800">{{$value->name}}</h3>
                    <p class="text-gray-600 ">
                        time in: {{$value->time_in}} <br>
                        time out: {{$value->time_out}}
                    </p>
                </div>
            </li>
            
        @endforeach
    </ul>

</div>