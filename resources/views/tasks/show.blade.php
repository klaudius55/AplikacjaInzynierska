<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <form method="GET" action="{{ route('tasks.index') }}">
        <x-primary-button class="mt-4">{{ __('Powrót') }}</x-primary-button>
    </form>
<livewire:tasks.material-task-table-view/>
    </div>
</x-app-layout>
