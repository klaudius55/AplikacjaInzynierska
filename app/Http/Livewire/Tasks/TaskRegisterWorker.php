<?php
namespace App\Http\Livewire\Tasks;

use App\Models\TaskWorker;
use App\Models\Worker;
use App\Models\Task;
use Livewire\Component;
use WireUi\Traits\Actions;

class TaskRegisterWorker extends Component
{
    use Actions;

//    public Worker $worker;
    public Task $task;
//    public TaskWorker $taskWorker;
    public float $timeWork = 0;
    public int|null $worker_id = null;


    public function rules(){

        return[
            'worker.name'=>''
            ];
    }

    public function mount(Task $task)
    {
        $this->task = new Task();
    }



    public function render()
    {
        return view('livewire.tasks.taskRegisterWorker', [
            "task" => $this->task
        ]);

    }

    public function save()
    {
        $this->task->workers()->attach([$this->worker_id => ['timeWork' => $this->timeWork]]);
        $this->notification()->success('Zapisano');
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
