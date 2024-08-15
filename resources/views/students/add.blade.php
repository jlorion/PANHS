<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            <a href="{{route('students')}}" class="text-gray-600 hover:text-gray-400">Students</a> >> Add Students
        </h2>
    </x-slot>
    <script>
        function state(){
            return {
                id: null,
                class_id: 'NULL',
                name: "",
                imgSrc: null,
                fileChosen(event){
                    this.previewFile(event, (src)=> this.imgSrc = src)
                },
                previewFile(event, callback){
                    if (! event.target.files.length) return
                    let file = event.target.files[0]
                    reader = new FileReader()
                    reader.readAsDataURL(file)
                    reader.onload = e => {
                        callback(e.target.result)
                    }
                },
                datas: [],
                isEmpty() {
                    return this.datas.length !==0
                },
                newData(){
                    const imageData = document.getElementById("inputImage");
                    const obj = {
                        dataId: this.id,
                        dataname: this.name,
                        imgsrc: this.imgSrc,
                        classvalue: this.class_id
                    }
                    console.log(imageData)
                    this.datas.push(obj);
                    this.id = null
                    this.name = ''
                    this.img= null
                },
                insertName(index, param){
                    return `data[${index}][${param}]`;
                },
                editable: false,
                optionAssignment(index, data){
                    const selection = document.querySelector(`select[name="data[${index}][class_id]"]`);
                    selection.value = data.classvalue
                }
           }
        }
    </script>

    <div x-data="state()">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-3">
            <div class="bg-white bg-gradient-to-r from-pink-300 to-pink-500 overflow-hidden shadow-sm sm:rounded-lg p-3 flex flex-col items-center">

                <div>
                    <img class="" :src="imgSrc" style="height: 100px; width: 100px">
                </div>
                <div class="w-full flex flex-col sm:flex-row justify-center items-center m-2">
                    <input type="number" x-model="id" placeholder="LRN" class="flex-initial w-full sm:w-56 rounded-md m-1">
                    <input type="text" x-model="name" placeholder="NAME" class="flex-1 rounded-md m-1 w-full">
                    <input type="file" @change="fileChosen" accept="image/*" id="inputImage" class="flex-initial w-52 m-1">
                </div>
                
                <div class="w-full flex flex-col sm:flex-row justify-center items-center">
                    
                    <select x-model="class_id" class="flex-initial w-full sm:w-56 rounded-md p-3">
                        <option selected>Section</option>
                        <option value="1">class 1</option>
                    </select>
    
                    <button x-on:click="newData" class="bg-blue-400 m-1 inline-flex w-32 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        push
                    </button>

                </div>    

            </div>
        </div>


        <form action="{{route('students.store')}}" method="POST"  enctype="multipart/form-data" class="flex flex-col items-end m-2">
            @csrf

            <ul class="w-full flex flex-col justify-center p-5">
                <template x-for="(data, index) in datas" :key="index" >
                    <li class="flex justify-center m-1 p-2 bg-gradient-to-b from-white to-green-200 rounded-lg border border-zinc-400 items-center flex-col sm:flex-row">
                        <div class="m-1 rounded-md shadow-sm hover:shadow-pink-300 ">
                            <img :src="data.imgsrc" class="block rounded-lg h-24 w-24" x-init="console.log(data.imgsrc)" class="size-96 border border-black">
                        </div>
                        <input type="number" x-model="data.dataId" :name="insertName(index, 'id')" class="m-1 rounded-md flex-initial w-full sm:w-40">
                        <input type="text" x-model="data.dataname" :name="insertName(index, 'name')"  class="m-1 rounded-md flex-1 w-full sm:w-1/2">
                        <input type="file" @change="" accept="image/*" id="inputImage" class="flex-initial w-52 m-1">
                        <div class="flex">

                            <select :name="insertName(index, 'class_id')" x-init="optionAssignment(index, data)" class="flex-initial m-1 w-full sm:w-56 rounded-md p-3">
                                <option value="NULL">none for now</option>
                                <option value="1">1</option>
                            </select>
                            <button type="button" class="bg-red-400 flex-initial rounded-lg m-1 h-10 w-20" @click="datas.splice(index, 1)">&cross;</button>
                        </div>
                    </li>
                </template>
            </ul>
                
    
            <button type="submit" class="bg-green-500 inline-flex w-32 items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm bg-green-500">
                Add Students
            </button>
    
        </form>
    </div>

    </div>


</x-app-layout>