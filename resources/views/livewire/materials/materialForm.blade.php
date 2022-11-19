<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <h1><b>Dodaj materiał</b></h1>
    </div>
    <form wire:submit.prevent="save">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

            <x-select
                label="Wybierz materiał"
                placeholder="stop stali"
                :options="['Stal kwasoodporna', 'Stal węglowa', 'Aluminium']"
                wire:model.defer="material.name"
            />
            <x-select
                label="Wybierz grubość"
                placeholder="w milimetrach"
                :options="[ 0.5 , 0.8 , 1 , 1.5 , 2 , 2.5 , 3 , 4 , 5 , 6 , 8 , 10 , 12 , 15 , 16 , 20 , 22 , 25 , 30 , 35 ]"
                wire:model="material.thickness"
            />
            <x-select

                name="material.type_id"
                placeholder="Wybierz"
                wire:model.defer="material.type_id"
                :async-data="route('types.allOpen')"
                option-label="name"
                option-value="id"
            />
            <x-select

                name="material.unit_id"
                placeholder="Wybierz"
                wire:model.defer="material.unit_id"
                :async-data="route('units.allOpen')"
                option-label="name"
                option-value="id"
            />
        </div>
        <div>
            <x-button href="{{route('materials.index')}}" label="{{('back')}}"/>
            <x-button type="submit" primary label="{{('save')}}" spinner/>
        </div>
    </form>
</div>
