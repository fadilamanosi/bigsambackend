<div class="flex justify-end">
    @if (session()->has('success'))
        <div class="flex p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800 w-fit"
            role="alert">

            @include('livewire.icons.info')

            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">alert!</span>
                {{ session('success') }}
            </div>

            <button wire:click="closeModal" type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                @include('livewire.icons.close')
            </button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            @include('livewire.icons.info')
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">alert!</span>
                {{ session('error') }}
            </div>

            <button wire:click="closeModal" type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                @include('livewire.icons.close')
            </button>

        </div>
    @endif

</div>
