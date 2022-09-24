<?php

declare(strict_types=1);

namespace App\Services\Order;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Permission;
use App\Exporters\OrderExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class OrderExportService
{

    private string $date_from;
    private string $date_to;
    private int $organization_id;

    public function __construct(
        string $date_from,
        string $date_to,
        int $organization_id
    )
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->organization_id = $organization_id;
    }

    public function execute()
    {
        $this->date_from = Carbon::createFromFormat('d/m/Y', $this->date_from)
            ->format('Y-m-d');
        $this->date_to = Carbon::createFromFormat('d/m/Y', $this->date_to)
            ->format('Y-m-d');

        $query = Order::whereDate('created_at', '>=', $this->date_from)
            ->whereDate('created_at', '<=', $this->date_to);
        if($this->organization_id !== 1) {
            $query->where('organization_id', $this->organization_id);
        }
        $orders = $query->get();
        //$user = Auth::user();
        $dateNow = date('d-m-Y');
        return Excel::download(new OrderExport($orders), 'altas-' . $dateNow . '.xlsx');

    }
}
