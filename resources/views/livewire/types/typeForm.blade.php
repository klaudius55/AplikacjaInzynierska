<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <form wire:submit.prevent="save">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <x-input icon="pencil" label=" Dodaj typ materiału" placeholder="Określ typ materiału np. blacha, profil 40x40" wire:model="type.name" />
        </div>
        <div>
            <x-button href="{{route('types.index')}}" label="{{__('translation.attributes.back')}}"/>
            <x-button type="submit" primary label="{{__('translation.attributes.save')}}" spinner/>
        </div>
    </form>
</div>
