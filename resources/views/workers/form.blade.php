<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (isset($worker))
<livewire:workers.worker-form :worker="$worker" :editMode="true"/>
        @else
            <livewire:workers.worker-form :editMode="false"/>
        @endif
    </div>
</x-app-layout>

