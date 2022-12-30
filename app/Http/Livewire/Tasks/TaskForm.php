<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use WireUi\Traits\Actions;



class TaskForm extends Component
{
    use Actions;

    public Task $task;
    public Bool $editMode;


    public function rules(){

        return[
            'task.name'=>[
                'required',
                'string'
            ],

        ];

    }

    public function mount(Task $task, Bool $editMode){
        $this->task = $task;
        $this->editMode = $editMode;
    }

    public function render(){
        return view('livewire.tasks.taskForm');
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
