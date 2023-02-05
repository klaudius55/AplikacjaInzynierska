<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <h1><b>Godziny pracownika</b></h1>
    </div>
    <form wire:submit.prevent="save">
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
            :options="[0.5,1,2,3,4,5,6,7,8,9,10,11,12]"
            wire:model="Worker.timeWork"
        />
        <div>
            <x-button href="{{route('tasks.index')}}" label="{{__('translation.attributes.back')}}"/>
            <x-button type="submit" primary label="{{__('translation.attributes.save')}}" spinner/>
        </div>
    </form>
</div>
