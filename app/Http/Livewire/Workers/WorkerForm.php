<?php

namespace App\Http\Livewire\Workers;

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
            $title = 'Pracownik zapisany'
        );
    }
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
