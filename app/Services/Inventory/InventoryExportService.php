<?php

declare(strict_types=1);

namespace App\Services\Inventory;

use App\Models\Inventory;
use App\Exporters\InventoryExport;
use Maatwebsite\Excel\Facades\Excel;

class InventoryExportService
{

    private int $area_id;

    public function __construct(
        int $area_id
    )
    {
        $this->area_id = $area_id;
    }

    public function execute()
    {
        if($this->area_id !== 1) {
            $inventories = Inventory::whereHas('currentAssignment', function ($query) {
                $query->where('area_id', $this->area_id);
            })->get();
        }
        else {
            $inventories = Inventory::all();
        }

        $dateNow = date('d-m-Y');
        return Excel::download(new InventoryExport($inventories), 'inventario-' . $dateNow . '.xlsx');

    }
}
