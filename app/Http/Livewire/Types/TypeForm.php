<?php

namespace App\Http\Livewire\Types;

use Livewire\Component;
use PhpParser\Node\Expr\Cast\Bool_;
use WireUi\Traits\Actions;
use App\Models\Type;


class TypeForm extends Component
{
    use Actions;

    public Type $type;
    public Bool $editMode;


    public function rules(){

        return[
            'type.name'=>[
                'required',
                'string'
            ],
        ];

    }

    public function mount(Type $type, Bool $editMode){
        $this->type = $type;
        $this->editMode = $editMode;
    }

    public function render(){
        return view('livewire.types.typeForm');
    }


    public function save(){
        $this->validate();
        $this->type->save();
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