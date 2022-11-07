<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <form wire:submit.prevent="save">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <x-input icon="user" label="Name" placeholder="Imię" wire:model="worker.name" />

            <x-input icon="user" label="Surname" placeholder="Nazwisko" wire:model="worker.surname" />
        </div>
        <div>
<x-button href="{{route('workers.index')}}" label="{{('back')}}"/>
            <x-button type="submit" primary label="{{('save')}}" spinner/>
        </div>
    </form>
</div>
