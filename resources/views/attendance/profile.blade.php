<div x-data="{close(){$refs.modalRef.close(); document.getElementById('existbutton').click();}}">
    <dialog class="relative z-10" x-ref="modalRef">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto" x-init="$refs.modalRef.showModal()">
                <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">

                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 mx-14">
                            <div class="sm:flex sm:items-start">
                                <div class="my-3 text-cennter">
                                    <h2 class="">{{$student->date}}</h2>
                                </div>
                                <div class="mx-auto flex h-20 w-30 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-14 sm:w-14">
                                     <img class="w-full h-full" src="{{$student->img}}" alt="">
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">{{$student->id}}</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">{{$student->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" @click="close()" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
</div>
