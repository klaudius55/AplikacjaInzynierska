<?php

namespace App\Actions\Units;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class SoftDeleteUnit extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Usuń";

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
        $view->dialog()->confirm([
                'title' => __('translation.attributes.delete'),
                'description' => __('translation.messages_units.soft_delete',[
                    'name' => $model->name
                ]),
                'icon' => 'question',
                'iconColor' => 'text-red-500',
                'accept' => [
                    'label' => __('translation.yes'),
                    'method'=> 'softDelete',
                    'params'=> $model->id
                ],
                'reject'=>[
                    'label' => __('translation.no')
                ]
            ]
        );
    }


    public function renderIf($model, View $view)
    {
        return $model-> deleted_at === null;
    }
}
