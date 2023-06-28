<div>

    @include('livewire.components.notify')

    <div class="grid md:grid-cols-2 py-8  lg:py-16 gap-8">
        <section
            class="p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700  ">
            <div class="px-4">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new destination</h2>
                <form wire:submit.prevent="create" method="post">
                    <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                State
                            </label>
                            <input type="text" name="state" id="state" wire:model="state"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type destination state" required="">
                            @error('state')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                city
                            </label>
                            <input type="text" name="city" id="city" wire:model="city"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type destination city" required="">
                            @error('city')
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
            class="block  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 overflow-x-auto">

            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Available destinations</h2>


            <div class="relative overflow-x-auto">
                @if ($destinations->isNotEmpty())
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    state
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    city
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                            </tr>
                        </thead>
                        <tbody class="capitalize">

                            @foreach ($destinations as $each)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                        {{ $each->state }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $each->city }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span wire:click="edit('{{ $each->id }}')"
                                            class="text-[blue] font-bold cursor-pointer">
                                            edit
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        <span wire:click="remove('{{ $each->id }}')"
                                            class="text-[red] font-bold cursor-pointer">
                                            remove
                                        </span>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $destinations->links() }}
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
        @include('livewire.modals.destination-edit-modal')
    @endif



</div>
