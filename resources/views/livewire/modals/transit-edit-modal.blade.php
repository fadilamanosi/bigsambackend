<div class="fixed top-0 left-0 flex flex-col justify-center h-full w-full bg-[#000000be] z-50">

    <div class="flex justify-center">
        <form wire:submit.prevent="updateEdit" method="post"
            class="flex justify-center p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 max-w-[80%]">
            <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">

                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Select Vehicle
                    </label>
                    <select wire:model="editData.car_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose state/city</option>

                        @foreach ($cars as $each)
                            <option value="{{ $each->id }}">{{ $each->name . ': ' . $each->plate_number }}</option>
                        @endforeach
                    </select>

                    @error('car_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Select from to move from
                    </label>
                    <select wire:model="editData.from_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose state/city</option>
                        @foreach ($cities as $each)
                            <option value="{{ $each->id }}">{{ $each->state }}</option>
                        @endforeach

                    </select>

                    @error('from_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="to_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Select city to move to
                    </label>
                    <select wire:model="editData.to_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose state/city</option>
                        @foreach ($cities as $each)
                            <option value="{{ $each->id }}">{{ $each->state }}</option>
                        @endforeach
                    </select>

                    @error('to_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        amount
                    </label>
                    <input type="number" wire:model="editData.amount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type destination amount" required="">
                    @error('amount')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>



                <div class="sm:col-span-2">
                    <label for="departure_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        departure_time
                    </label>
                    <input type="datetime-local" wire:model="editData.departure_time"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type destination departure_time" required="">
                    @error('departure_time')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>



                <div class="col-span-4">
                    <button wire:click="closeEdit()" type="button"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-orange-700 rounded-lg focus:ring-4 focus:ring-orange-200 dark:focus:ring-orange-900 hover:bg-orange-800">
                        close
                    </button>

                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Edit transit
                    </button>

                </div>

            </div>


        </form>

    </div>


    <div wire:loading wire:target="updateEdit">
        @include('livewire.components.loader')
    </div>



</div>
