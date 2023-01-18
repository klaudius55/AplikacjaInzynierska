<?php
namespace App\Http\Livewire\Tasks;
use App\Models\Material;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use WireUi\Traits\Actions;

class TaskRegisterUsedMaterial extends Component
{
    use Actions;

    public Task $task;
    public Material $material;



    public function rules(){

        return[
            'material.name'=>[
                '',
        ],

            ];

    }



    public function render(){
        return view('livewire.tasks.taskRegisterUsedMaterial');

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
        $this->task->save();
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
