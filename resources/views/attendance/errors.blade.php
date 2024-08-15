<div x-data="{close(){$refs.modalRef.close(); document.getElementById('existbutton').click();}}">
    <dialog class="relative z-10" x-ref="modalRef">
        <div x-init="$refs.modalRef.showModal()">
            
            <div class="items-center justify-center bg-gray-800 fixed inset-0 flex bg-opacity-50">
                <div class="bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full overflow-hidden transform transition-all p-6">
                    <div class="items-center justify-center sm:flex-row sm:space-x-4 flex flex-col">
                        <div class="h-16 w-16 mb-4 sm:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"><rect width="100%" height="100%" fill="#EF4444"/><path fill="#FFF" d="M30.19 20.32h3.71v9.16q0 1.45-.14 2.85-.15 1.4-.37 2.97H30.7q-.22-1.57-.37-2.97-.14-1.4-.14-2.85v-9.16Zm-.62 20.96q0-.49.18-.94.18-.45.51-.77t.78-.51q.45-.19.96-.19.49 0 .94.19.45.19.78.51t.52.77q.19.45.19.94 0 .52-.19.96-.19.44-.52.76t-.78.5q-.45.18-.94.18-.51 0-.96-.18-.45-.18-.78-.5t-.51-.76q-.18-.44-.18-.96Z"/></svg>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-800">Error</p>
                            @foreach($handle as $key => $value)
                                <p class="mt-2 text-gray-600">
                                    {{$value[0]}}<br>
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-6 justify-center flex">
                        <button @click="close()" class="rounded shadow hover:bg-indigo-700 focus:outline-none focus:ring-2
                focus:ring-offset-2 focus:ring-indigo-500 px-4 py-2 bg-indigo-600 text-white text-sm
                font-medium">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
</div>
