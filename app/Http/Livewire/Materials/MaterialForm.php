<?php

namespace App\Http\Livewire\Materials;

use App\Models\Type;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\Bool_;
use WireUi\Traits\Actions;
use App\Models\Material;


class MaterialForm extends Component
{
    use Actions;

    public Material $material;
    public Type $type;
    public Bool $editMode;


    public function rules(){

        return[
            'material.name'=>[
                'required',
                'string'
            ],
            'material.thickness'=>[
                'required',

            ],
            'material.type_id'=>[
                'required',
            ],
            'material.unit_id'=>[
                'required'
            ],


        ];

    }

    public function mount(Material $material, Bool $editMode){
        $this->material = $material;
        $this->editMode = $editMode;
    }

    public function render(){
        return view('livewire.materials.materialForm');
    }


    public function save(){
        $this->validate();
        $this->material->save();
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
