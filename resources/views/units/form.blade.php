<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (isset($unit))
            <livewire:units.unit-form :worker="$unit" :editMode="true"/>
        @else
            <livewire:units.unit-form :editMode="false"/>
        @endif
    </div>
</x-app-layout>
