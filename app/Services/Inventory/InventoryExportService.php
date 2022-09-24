<?php

declare(strict_types=1);

namespace App\Services\Inventory;

use App\Models\Inventory;
use App\Exporters\InventoryExport;
use Maatwebsite\Excel\Facades\Excel;

class InventoryExportService
{

    private int $organization_id;

    public function __construct(
        int $organization_id
    )
    {
        $this->organization_id = $organization_id;
    }

    public function execute()
    {
        if($this->organization_id !== 1) {
            $inventories = Inventory::where('organization_id', $this->organization_id)->get();
        }
        else {
            $inventories = Inventory::all();
        }

        $dateNow = date('d-m-Y');
        return Excel::download(new InventoryExport($inventories), 'inventario-' . $dateNow . '.xlsx');

    }
}
