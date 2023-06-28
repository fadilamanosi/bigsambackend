<div class="fixed top-0 left-0 flex flex-col justify-center h-full w-full bg-[#000000be] z-50">

    <div class="flex justify-center">
        <form wire:submit.prevent="updateEdit" method="post"
            class="flex justify-center p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 max-w-[50%]">

            <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">

                <div class="sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Vehicle Name
                    </label>
                    <input type="text"
                        wire:model.defer="editData.name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type Vehicle name" required="">

                    @error('editData.name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                </div>

                <div class="sm:col-span-1">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Plate number
                    </label>
                    <input  type="text" 
                        wire:model.defer="editData.plate_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Vehicle plate_number" required="">

                    @error('editData.plate_number')
                            <span class="text-red-500">{{ $message }}</span>
                         @enderror
                   


                </div>

                <div class="sm:col-span-1">
                    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Seats available
                    </label>
                    <input  type="number" 
                        wire:model.defer="editData.seats"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Vehicle seats" required="">

                    {{-- 
                        @error('seats')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror 
                    --}}

                </div>


                <div class="flex w-full col-span-3 gap-4">

                    <button wire:click="closeEdit()" type="button"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-orange-700 rounded-lg focus:ring-4 focus:ring-orange-200 dark:focus:ring-orange-900 hover:bg-orange-800">
                        close
                    </button>

                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        edit Vehicle
                    </button>
                </div>
            </div>

        </form>
    </div>


    <div wire:loading wire:target="updateEdit">
        @include('livewire.components.loader')
    </div>



</div>
