<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <h1><b>Zadanie</b></h1>
    </div>

    <form wire:submit.prevent="save">
        <x-select
            label="Wybierz zużyty materiał"
            name="materials.async"
            wire:model.defer="materials.async"
            placeholder="Select some user"
            :async-data="route('materials.async')"
            option-label="name"
            option-value="id"
            description="type_id"
        />
        <x-input
            label="Ilosć"
            placeholder="ilość zużytego materiału"
        />
        <x-select
            label="Wybierz pracownika"
            name="workers.worker_id"
            placeholder="Wybierz"
            wire:model.defer="workers.worker_id"
            :async-data="route('workers.allOpen')"
            option-label="name"
            option-value="id"
        />
        <x-select
            label="Ilość godzin"
            placeholder="Wybierz ilość przepracowanych godzin"
            :options="['0,5','1', '2', '3', '4','5','6','7','8','9','10','11','12']"
        />

        <div>
            <x-button href="{{route('tasks.index')}}" label="{{('back')}}"/>
            <x-button type="submit" primary label="{{('save')}}" spinner/>
        </div>
    </form>
</div>
