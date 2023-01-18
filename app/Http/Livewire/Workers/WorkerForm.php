<?php

namespace App\Http\Livewire\Workers;

use Dotenv\Util\Str;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\Bool_;
use WireUi\Traits\Actions;
use App\Models\Worker;


class WorkerForm extends Component
{
    use Actions;

    public Worker $worker;
    public Bool $editMode;


    public function rules(){

        return[
            'worker.name'=>[
                'required',
                'string'
            ],
            'worker.surname'=>[
                'required',
                'string'
            ]
        ];

    }
    public function getValidationAttributes()
    {
        return[
            'name'=> __('Imię'),
            'surname'=> __('translation.attributes.surname')
        ];
    }

    public function mount(Worker $worker, Bool $editMode){
        $this->worker = $worker;
        $this->editMode = $editMode;
    }

    public function render(){
        return view('livewire.workers.workerForm');
    }


    public function save(){
        $this->validate();
        $this->worker->save();
        $this->notification()->success(
            $title = $this->editMode
                ?__('translation.messages_workers.successes.updated_title')
                :__('translation.messages_workers.successes.stored_title'),
            $description = $this->editMode
                ?__('translation.messages_workers.successes.updated',['name'=>$this->worker->name])
                :__('translation.messages_workers.successes.stored',['name'=>$this->worker->name])
        );
        $this->editMode = true;
    }
}
