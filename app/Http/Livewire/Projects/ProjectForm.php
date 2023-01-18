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
        $this->notification()->success(
            $title = $this->editMode
                ?__('translation.messages_projects.successes.updated_title')
                :__('translation.messages_projects.successes.stored_title'),
            $description = $this->editMode
                ?__('translation.messages_projects.successes.updated',['name'=>$this->project->name])
                :__('translation.messages_projects.successes.stored',['name'=>$this->project->name])
        );
        $this->editMode = true;
    }
}
