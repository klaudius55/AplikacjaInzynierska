<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <h1><b>Zadanie</b></h1>
    </div>

    <form wire:submit.prevent="save">
        <x-select
            label="Wybierz zużyty materiał"
            name="materials.async"
            wire:model.defer="materials.async"
            placeholder="Wbierz materiał"
            :async-data="route('materials.async')"
            option-label="name"
            option-value="id"
        />
        <x-inputs.currency
            label="Ilosć"
            placeholder="ilość zużytego materiału"
            thousands="."
            decimal=","
            precision="4"
            wire:model="quantity"
        />
        <div>
            <x-button href="{{route('tasks.index')}}" label="{{(__('translation.attributes.back'))}}"/>
            <x-button type="submit" primary label="{{(__('translation.attributes.save'))}}" spinner/>
        </div>
    </form>
</div>
