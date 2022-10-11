<?php

namespace App\Actions\workers;

use App\Models\Worker;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class ActivateWorkerAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "My action title";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Worker object of the list where the user has clicked
     * @param $view  view where the action was executed from
     */
    public function handle($model, View $view)
    {
        // Your code here
    }
}
