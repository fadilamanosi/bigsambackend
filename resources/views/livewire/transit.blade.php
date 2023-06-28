<div>

    @include('livewire.components.notify')

    <div class="grid md:grid-cols-7 py-8  lg:py-16 gap-8">
        <section
            class=" col-span-4 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700  ">
            <div class="px-4">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new transit</h2>
                <form wire:submit.prevent="create" method="post">
                    <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">

                        <div class="sm:col-span-2">
                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Select Vehicle
                            </label>
                            <select wire:model="car_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected >Choose state/city</option>

                                @foreach ($cars as $each)
                                    <option value="{{ $each->id }}">{{ $each->name .': '.  $each->plate_number  }}</option>
                                @endforeach
                            </select>

                            @error('car_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="from_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Select from to move from
                            </label>
                            <select  wire:model="from_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected >Choose state/city</option>
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
                            <select wire:model="to_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected >Choose state/city</option>
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
                            <input type="number" name="amount" id="amount" wire:model="amount"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type destination amount" required="">
                            @error('amount')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="sm:col-span-2">
                            <label for="departure_time"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                departure_time
                            </label>
                            <input type="datetime-local" name="departure_time" id="departure_time"
                                wire:model="departure_time"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type destination departure_time" required="">
                            @error('departure_time')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>



                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Add destination
                    </button>
                </form>
            </div>
        </section>




        <section 
            class=" col-span-7 block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 overflow-x-auto">

            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Available transits</h2>


            <div class="relative overflow-x-auto">
                @if ($transits->isNotEmpty())
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Vehicle
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    From
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    To
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    amount
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    departure_ ime
                                </th>
                            </tr>
                        </thead>
                        <tbody class="capitalize">

                            @foreach ($transits as $each)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                        {{ $each->car->name .': '. $each->car->plate_number }}
                                    </th>
                                    <th class="px-6 py-4">
                                        {{ $each->from->state .': '.  $each->from->city }}
                                    </th>

                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                        {{ $each->to->state .': '.  $each->to->city }}
                                    </th>
                                    <th class="px-6 py-4">
                                        {{ $each->amount }}
                                    </th>
                                    <th class="px-6 py-4">
                                        {{ $each->departure_time }}
                                    </th>

                                    <th class="px-6 py-4">
                                        <span wire:click="edit('{{ $each->id }}')"
                                            class="text-[blue] font-bold cursor-pointer">
                                            edit
                                        </span>
                                    </th>

                                    <th class="px-6 py-4">
                                        <span wire:click="remove('{{ $each->id }}')"
                                            class="text-[red] font-bold cursor-pointer">
                                            remove
                                        </span>
                                    </th>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $transits->links() }}
                @else
                    <div class="text-center text-4xl font-bold">
                        Empty
                    </div>
                @endif
            </div>

        </section>


    </div>



    <div wire:loading wire:target="create">
        @include('livewire.components.loader')
    </div>
    
    @if ($isEdit)
        @include('livewire.modals.transit-edit-modal')
    @endif



</div>
