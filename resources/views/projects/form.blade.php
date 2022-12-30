<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (isset($project))
            <livewire:projects.project-form :project="$project" :editMode="true"/>
        @else
            <livewire:projects.project-form :editMode="false"/>
        @endif
    </div>
</x-app-layout>
