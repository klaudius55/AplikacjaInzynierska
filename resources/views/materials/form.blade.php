<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (isset($material))
            <livewire:materials.material-form :material="$material" :editMode="true"/>
        @else
            <livewire:materials.material-form :editMode="false"/>
        @endif
    </div>
</x-app-layout>
