<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;
use WireUi\Traits\Actions;



class TaskForm extends Component
{
    use Actions;

    public Task $task;
    public Bool $editMode;
    public Project $project;


    public function rules(){

        return[
            'task.name'=>[
                'required',
                'string'
            ],
            'task.project_id'=>[
                'nullable',
            ],
        ];

    }
    public function getValidationAttributes()
    {
        return[
            'name'=> __('zadanie')
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
        $this->tasks->save();
        $this->notification()->success(
            $title = $this->editMode
                ?__('translation.messages_tasks.successes.updated_title')
                :__('translation.messages_tasks.successes.stored_title'),
            $description = $this->editMode
                ?__('translation.messages_tasks.successes.updated',['name'=>$this->task->name])
                :__('translation.messages_tasks.successes.stored',['name'=>$this->task->name])
        );
        $this->editMode = true;
    }

}
