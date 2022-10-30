<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="GET" action="{{ route('workers.create') }}">
            <x-primary-button class="mt-4">{{ __('Dodaj') }}</x-primary-button>
        <livewire:workers.workers-table-view/>
        </form>
    </div>

</x-app-layout>

