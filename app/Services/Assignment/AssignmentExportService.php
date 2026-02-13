<?php

declare(strict_types=1);

namespace App\Services\Assignment;

use Carbon\Carbon;
use App\Models\Assignment;
use App\Exporters\AssignmentExport;
use Maatwebsite\Excel\Facades\Excel;

class AssignmentExportService
{

    private string $date_from;
    private string $date_to;
    private int $area_id;

    public function __construct(
        string $date_from,
        string $date_to,
        int $area_id
    )
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->area_id = $area_id;
    }

    public function execute()
    {
        $this->date_from = Carbon::createFromFormat('d/m/Y', $this->date_from)
            ->format('Y-m-d');
        $this->date_to = Carbon::createFromFormat('d/m/Y', $this->date_to)
            ->format('Y-m-d');

        $query = Assignment::whereDate('created_at', '>=', $this->date_from)
            ->whereDate('created_at', '<=', $this->date_to);

        if($this->area_id !== 1) {
            $query->where('area_id', $this->area_id);
        }

        $orders = $query->get();
        //$user = Auth::user();
        $dateNow = date('d-m-Y');
        return Excel::download(new AssignmentExport($orders), 'asignaciones-' . $dateNow . '.xlsx');

    }
}
