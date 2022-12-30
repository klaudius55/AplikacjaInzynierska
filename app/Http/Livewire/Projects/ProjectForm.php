<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Project;


class ProjectForm extends Component
{
    use Actions;

    public Project $project;
    public Bool $editMode;


    public function rules(){

        return[
            'project.name'=>[
                'string',
            ],
        ];

    }

    public function mount(Project $project, Bool $editMode){
        $this->project = $project;
        $this->editMode = $editMode;
    }

    public function render(){
        return view('livewire.projects.projectForm');
    }


    public function save(){
        $this->validate();
        $this->project->save();
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
