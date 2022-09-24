<?php

declare(strict_types=1);

namespace App\Exporters;

use Carbon\Carbon;
use App\Models\Order;
// use App\Services\Services;
// use App\Services\CertiBoxApiService;
use App\Models\Document;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrderExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    private $orders;

    public function __construct(
        $orders
    )
    {
        $this->orders = $orders;
    }

    public function headings(): array
    {
        return [
            '#',
            'Unidad organizacional',
            'Expediente',
            'Fecha de creación',
            'Fecha de emisión',
            'Estado',
        ];
    }

    public function collection(): object
    {
        return $this->orders;
    }

    public function map($row): array
    {
        if( !empty( $this->orders ) ) {

            return [
                $row->id,
                $row->organization->name,
                $row->file,
                $row->created_at,
                $row->generated_at,
                $row->status->name,
            ];

        }
        else {
            return [];
        }
    }
}
