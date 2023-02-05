<?php

namespace App\Http\Livewire\Units;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Unit;


class UnitForm extends Component
{
    use Actions;

    public Unit $unit;
    public Bool $editMode;


    public function rules(){

        return[
            'unit.name'=>[
                'required',
                'string',
                'unique:units,name' .
                ($this->editMode ? (',' .$this->unit->id):'')
            ],
        ];

    }
    public function getValidationAttributes()
    {
        return[
            'name'=> __('jednostka')
        ];
    }

    public function mount(Unit $unit, Bool $editMode){
        $this->unit = $unit;
        $this->editMode = $editMode;
    }

    public function render(){
        return view('livewire.units.unitForm');
    }


    public function save(){
        $this->validate();
        $this->unit->save();
        $this->notification()->success(
            $title = $this->editMode
                ?__('translation.messages_units.successes.updated_title')
                :__('translation.messages_units.successes.stored_title'),
            $description = $this->editMode
                ?__('translation.messages_units.successes.updated',['name'=>$this->unit->name])
                :__('translation.messages_units.successes.stored',['name'=>$this->unit->name])
        );
        $this->editMode = true;
    }
}
