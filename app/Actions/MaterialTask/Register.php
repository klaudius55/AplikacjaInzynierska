<?php

namespace App\Actions\MaterialTask;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class Register extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Add material";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "plus";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        // Your code here
    }
}
