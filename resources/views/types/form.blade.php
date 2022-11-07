<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (isset($type))
            <livewire:types.type-form :type="$type" :editMode="true"/>
        @else
            <livewire:types.type-form :editMode="false"/>
        @endif
    </div>
</x-app-layout>
