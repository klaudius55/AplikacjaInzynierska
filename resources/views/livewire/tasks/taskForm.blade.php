<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <h1><b>Dodaj zadanie</b></h1>
    </div>
    <form wire:submit.prevent="save">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

            <x-input icon="pencil" label="Wprowadź nazwę zadania" placeholder="Zadanie" wire:model="task.name" />
            <x-datetime-picker
                label="Podaj date"
                placeholder="Appointment Date"
                wire:model.defer="normalPicker"
            />
        </div>
        <div>
            <x-button href="{{route('tasks.index')}}" label="{{('back')}}"/>
            <x-button type="submit" primary label="{{('save')}}" spinner/>
        </div>
    </form>
</div>
