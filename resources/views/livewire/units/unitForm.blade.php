<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <form wire:submit.prevent="save">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <x-input icon="pencil" label="Dodaj jednostke" placeholder=" np. m2 lub mb" wire:model="unit.name" />
        </div>
        <div>
<x-button href="{{route('units.index')}}" label="{{__('translation.attributes.back')}}"/>
            <x-button type="submit" primary label="{{__('translation.attributes.save')}}" spinner/>
        </div>
    </form>
</div>
