<?php
namespace App\Http\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use WireUi\Traits\Actions;

class TaskRegisterUsedMaterial extends Component
{
    use Actions;

    public Task $task;
    public int|null $material_id = null;
    public float|null $quantity =0;


    public function rules()
    {
        return [
            'material_id' => [
                'required',
            ],
            'quantity' => [
                'required',
                'numeric',

            ],
        ];
    }

    public function render()
    {
        return view('livewire.tasks.taskRegisterUsedMaterial');

    }
    public function save()
    {
        $this->validate();

//        $material = Material::query()->find($this->material_id);

        $this->task->materials()->attach([$this->material_id => ['quantity' => $this->quantity]]);
        $this->notification()->success('Dopisano zużyty materiał');
    }
}
