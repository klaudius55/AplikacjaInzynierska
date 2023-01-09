<?php

namespace App\Http\Livewire\MaterialTasks;

use App\Models\Material;
use App\Models\Material_Task;
use App\Models\Task;
use WireUi\Traits\Actions;
use Livewire\Component;

class MaterialTaskForm extends Component
{
    use Actions;

    public Task $task;
    public Material $material;
    public Material_Task $material_Task;



    public function rules(){

        return[
            'material.name'=>[
                '',
            ],

        ];

    }



    public function render(){
        return view('livewire.materialtasks.materialtaskForm');

    }
    public function save(){

        $this->validate();
        $this->material_Task->save();
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

