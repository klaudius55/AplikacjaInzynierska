<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <h1><b>Dodaj zadanie</b></h1>
    </div>

    <form wire:submit.prevent="save">
    <h1>Wybierz zużyty materiał</h1>
        <x-select
            name="material_task.material_id"
            wire:model.defer="material_task.material_id"
            placeholder="Select some user"
            :async-data="route('materials.async')"
            option-label="name"
            option-value="id"
        />

        <div>
            <x-button href="{{route('tasks.index')}}" label="{{('back')}}"/>
            <x-button type="submit" primary label="{{('save')}}" spinner/>
        </div>
    </form>
</div>
