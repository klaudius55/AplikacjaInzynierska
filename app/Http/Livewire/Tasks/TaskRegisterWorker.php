<?php
namespace App\Http\Livewire\Tasks;
use App\Models\Worker;
use App\Models\Task;
use Livewire\Component;
use WireUi\Traits\Actions;

class TaskRegisterWorker extends Component
{
    use Actions;

    public Worker $worker;
    public Task $task ;



    public function rules(){

        return[
            'worker.name'=>''
            ];
    }

    public function mount(Task $task)
    {
        $this->task = new Task();
    }



    public function render(){
        return view('livewire.tasks.taskRegisterWorker');

    }
    public function save(){
   /* public function push()
    {
        if (! $this->save()) {
            return false;
        }

        // To sync all of the relationships to the database, we will simply spin through
        // the relationships and save each model via this "push" method, which allows
        // us to recurse into all of these nested relations for the model instance.
        foreach ($this->material as $tasks) {
            $tasks = $tasks instanceof Collection
                ? $tasks->all() : [$tasks];

            foreach (array_filter($tasks) as $task) {
                if (! $task->push()) {
                    return false;
                }
            }
        }

        return true;
*/

        $this->validate();
        $this->task->workers()->attach(1)->save();
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
