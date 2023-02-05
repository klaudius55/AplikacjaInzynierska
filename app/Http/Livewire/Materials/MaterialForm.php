<?php

namespace App\Http\Livewire\Materials;

use App\Models\Type;
use Livewire\Component;
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
                'string',

            ],
            'material.thickness'=>[
                'required',


            ],
            'material.type_id'=>[
                'required'

            ],
            'material.unit_id'=>[
                'required'
            ],
        ];
    }
    public function getValidationAttributes()
    {
        return[
            'name'=> __('materiał'),
            'thickness'=>__('grubość'),
            'type_id'=>__('typ'),
            'unit_id'=>__('jednostka')
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
        $this->notification()->success(
        $title = $this->editMode
            ?__('translation.messages_materials.successes.updated_title')
            :__('translation.messages_materials.successes.stored_title'),
            $description = $this->editMode
                ?__('translation.messages_materials.successes.updated',['name'=>$this->material->name])
                :__('translation.messages_materials.successes.stored',['name'=>$this->material->name])
        );
        $this->editMode = true;
    }
}
