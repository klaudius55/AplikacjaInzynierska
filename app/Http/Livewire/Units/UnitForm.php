<?php

namespace App\Http\Livewire\Units;

use Livewire\Component;
use PhpParser\Node\Expr\Cast\Bool_;
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
                'string'
            ],
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
        $this->notification()->success('successes');
        /*
        $this->notification()->success(
            $title = $this->editMode
            ?__('messages.successes.updated_title')
            :__('messages.successes.stored_title'),
           $description = $this->editMode
               ?__('messages.successes.updated',['name'=>$this->worker->name])
               :__('messages.successes.stored',['name'=>$this->worker->name])
        );
*/
    }
}
