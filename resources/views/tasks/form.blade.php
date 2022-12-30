<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (isset($task))
            <livewire:tasks.task-form :type="$task" :editMode="true"/>
        @else
            <livewire:tasks.task-form :editMode="false"/>
        @endif
    </div>
</x-app-layout>
