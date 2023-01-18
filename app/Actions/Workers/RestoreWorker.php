<?php

namespace App\Actions\Workers;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class RestoreWorker extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Przywróć";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "trash";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
                'title' => __('translation.messages_workers.restore.title'),
                'description' => __('translation.messages_workers.restore.description',[
                    'name' => $model->name
                ]),
                'icon' => 'question',
                'iconColor' => 'text-gree-500',
                'accept' => [
                    'label' => __('translation.yes'),
                    'method'=> 'restore',
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
        return $model-> deleted_at !== null;
    }
}
