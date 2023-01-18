<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <h1><b>Dodaj materiał</b></h1>
    </div>
    <form wire:submit.prevent="save">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

            <x-select
                label="Wybierz materiał"
                placeholder="np. Stal kwasoodporna"
                :options="['Stal kwasoodporna', 'Stal węglowa', 'Aluminium']"
                wire:model.defer="material.name"
            />
            <x-select
                label="Wybierz grubość [mm]"
                placeholder="np. 3"
                :options="[ 0.5 , 0.8 , 1 , 1.5 , 2 , 2.5 , 3 , 4 , 5 , 6 , 8 , 10 , 12 , 15 , 16 , 20 , 22 , 25 , 30 , 35 ]"
                wire:model="material.thickness"
            />
            <x-select
                label="Wybierz typ"
                name="material.type_id"
                placeholder="np. blacha , profil 40x40"
                wire:model.defer="material.type_id"
                :async-data="route('types.allOpen')"
                option-label="name"
                option-value="id"
            />
            <x-select
                label="Wybierz jednostkę"
                name="material.unit_id"
                placeholder="np. cm lub m2"
                wire:model.defer="material.unit_id"
                :async-data="route('units.allOpen')"
                option-label="name"
                option-value="id"
            />
        </div>
        <div>
            <x-button href="{{route('materials.index')}}" label="{{__('translation.attributes.back')}}"/>
            <x-button type="submit" primary label="{{__('translation.attributes.save')}}" spinner/>
        </div>
    </form>
</div>
