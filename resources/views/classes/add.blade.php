
<x-app-layout>
    {{-- {{dd($errors->all())}} --}}
    {{-- {{dd(old()['data'])}} --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            <a href="{{route('classes')}}" class="text-gray-600 hover:text-gray-400">Classes</a> >> Add Classes 
        </h2>
    </x-slot>
    <script>
        function state(){
            return {
                grade: null,
                user_id: '',
                section: null, 
                datas: [],
                isEmpty() {
                    return this.datas.length !==0
                },
                newData(){
                    const obj = {
                        grade: this.grade,
                        section: this.section,
                        userid: this.user_id
                    }
                    this.datas.push(obj);
                    this.grade = null
                    this.section = ''
                    this.user_id= null
                },
                insertName(index, param){
                    return `data[${index}][${param}]`;
                },
                editable: false,
                optionAssignment(index, data){
                    const selection = document.querySelector(`select[name="data[${index}][user_id]"]`);
                    selection.value = data.userid
                }
           }
        }
    </script>

    <div x-data="state()">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div class="bg-white bg-gradient-to-r from-pink-300 to-pink-500 overflow-hidden shadow-sm sm:rounded-lg p-3 flex flex-col sm:flex-row items-center">

                <input type="number" x-model="grade" placeholder="GRADE" class="flex-initial w-full m-1 rounded-lg sm:w-32" >
                <input type="text" x-model="section" placeholder="SECTION" class="flex-1 rounded-lg m-1 w-full" min="7" max="12">
        
                <select x-model="user_id" class="bg-gray-50 flex-initial w-full rounded-lg m-1 p-1 text-gray-400 focus:text-black sm:w-60">
                    <option selected>Adviser</option>
                    <option value="1" >something</option>
                </select>
        
                <button x-on:click="newData" class="bg-blue-400 flex flex-none w-full items-center justify-center rounded-md border sm:w-32 border-transparent bg-indigo-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    push 
                </button>
            </div>    
        </div>
                
        <form action="{{route('classes.store')}}" method="POST"  enctype="multipart/form-data" class="flex flex-col items-end mx-4 mt-5 ">
            @csrf
            <ul class="w-full flex flex-col items-center">
                <template x-for="(data, index) in datas" :key="index" >
                    <li class="w-full sm:w-4/5 rounded-lg bg-gradient-to-b from-green-200 to-white p-2 my-1 border border-zinc-400">
                        <div class="flex w-full flex-col sm:flex-row">
                            <input type="number" x-model="data.grade" :name="insertName(index, 'grade')" min="7" max="12" class="w-full rounded-md flex-initial sm:w-24 m-1">
                            <input type="text" x-model="data.section" :name="insertName(index, 'section')"  class="flex-inital m-1 w-full rounded-md sm:w-96">
                            <select :name="insertName(index, 'user_id')" x-init="optionAssignment(index, data)" class="bg-gray-50 flex-initial w-full rounded-lg m-1 p-1 text-gray-400 focus:text-black sm:w-60" >
                                <option>none</option>
                                <option value="1">something</option>
                            </select>

                            <button type="button" class="bg-red-400 rounded-lg h-10 w-20 m-1" @click="datas.splice(index, 1)">&cross;</button>
                        </div>
                    </li>
                </template>
            </ul>
                
    
            <button type="submit" x-bind:disabled="!isEmpty()" :class="!isEmpty()?'bg-gray-500': 'bg-green-600'" class="bg-green-500 mt-2 inline-flex w-32 items-center justify-center rounded-md border border-transparent  px-4 py-2 font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm bg-green-500">
                Add Students
            </button>
    
        </form>
    </div>

    </div>


</x-app-layout>