<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <x-primary-button class="mt-4">{{ __('AddWorker') }}</x-primary-button>
        <livewire:workers.workers-with-sort-columns-table-view />
    </div>
</x-app-layout>
