<?php

namespace App\Exports;

use App\Models\TaskWorker;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;


class WorkerMultiSheetExport implements FromView, WithTitle
{
    private $month;
    private $year;

    public function __construct(int $year, int $month)
    {
        $this->month = $month;
        $this->year  = $year;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function view():View
    {
        return view('exports.workers',[
            'taskworkers'=>TaskWorker
                ::query()
                ->leftJoin('workers', 'task_worker.worker_id', '=', 'workers.id')
                ->whereYear('task_worker.created_at', $this->year)
                ->whereMonth('task_worker.created_at', $this->month)
                ->select('task_worker.worker_id','task_worker.timeWork','workers.name','workers.surname')
                ->selectRaw('sum(timeWork) as cp')
                ->groupBy('task_worker.worker_id','task_worker.timeWork','workers.name','workers.surname')
                ->get()
        ]);

    }
    /**
     * @return string
     */
    public function title(): string
    {
        return 'Miesiąc ' . $this->month;
    }
}
