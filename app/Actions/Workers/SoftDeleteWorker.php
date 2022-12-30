<?php

namespace App\Actions\Workers;

use App\Models\Worker;
use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;
use LaravelViews\Views\View;

class SoftDeleteWorker extends Action
{
    use Confirmable;

    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Delete";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "delete";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        {
            $view->dialog()->confirm([
                'title' => 'Usunac',
                'description' => $model->name,
                'icon' => 'qestion',
                'iconColor' => 'text-red-500',
                'accept' => [
                        'method'=> 'softDelete',
            'params'=> $model->id
            ],
            'reject'=>[
            'label' => 'no'
        ]
        ]
            );
            }

        }
        public function renderIf($model, View $view)
        {
            return $model-> deleted_at === null;
        }

}
