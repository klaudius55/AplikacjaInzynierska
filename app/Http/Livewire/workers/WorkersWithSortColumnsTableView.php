<?php

namespace App\Http\Livewire\workers;

use DB;
use LaravelViews\Facades\Header;

class WorkersWithSortColumnsTableView extends WorkersTableView
{
    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('id'),
            Header::title('Name')->sortBy('name'),
            Header::title('Surname')->sortBy('surname'),
            Header::title('Created')->sortBy('created_at'),
            Header::title('Modified')->sortBy('update_at')
        ];
    }
}
