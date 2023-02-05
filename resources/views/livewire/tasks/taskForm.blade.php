<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <h1><b>Dodaj zadanie</b></h1>
    </div>
    <form wire:submit.prevent="save">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

            <x-input icon="pencil" label="Wprowadź nazwę zadania" placeholder="np. Taca" wire:model="task.name" />
            <x-select
                label="Wybierz projekt"
                name="task.project_id"
                placeholder="Projekt może być pusty"
                wire:model.defer="task.project_id"
                :async-data="route('projects.async')"
                option-label="name"
                option-value="id"
            />
        </div>
        <div>
            <x-button href="{{route('tasks.index')}}" label="{{(__('translation.attributes.back'))}}"/>
            <x-button type="submit" primary label="{{(__('translation.attributes.save'))}}" spinner/>
        </div>
    </form>
</div>
