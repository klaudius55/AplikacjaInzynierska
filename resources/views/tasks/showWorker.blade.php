<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg" id="table-view-wrapper">
                <div class="grid justify-items-stretch pt-2 pr-2">
                    <form method="GET" action="{{ route('tasks.index') }}">
                        <x-primary-button class="m-4">{{ __('Powrót') }}</x-primary-button>
                    </form>
                </div>
                <livewire:tasks.task-worker-table-view/>
            </div>
        </div>
    </div>
</x-app-layout>
