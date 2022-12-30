<?php
namespace App\Http\Livewire\Tasks;
use App\Models\Material;
use App\Models\Task;
use Livewire\Component;
use WireUi\Traits\Actions;

class TaskRegisterUsedMaterial extends Component
{
    use Actions;

    public Task $task;
    public Material $material;



    public function rules(){

        return[
            'material_task.material_id'=>[
                'required',
        ],
            ];

    }



    public function render(){
        return view('livewire.tasks.taskRegisterUsedMaterial');
    }


    public function save(){
        $this->validate();
        $this->task->save();
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
