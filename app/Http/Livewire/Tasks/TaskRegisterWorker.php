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

    public Task $task;
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
        $this->notification()->success('Dopisano pracownika');
    }
}
