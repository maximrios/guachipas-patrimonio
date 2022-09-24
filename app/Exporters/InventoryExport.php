<?php

declare(strict_types=1);

namespace App\Exporters;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InventoryExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    private $inventories;

    public function __construct(
        $inventories
    )
    {
        $this->inventories = $inventories;
    }

    public function headings(): array
    {
        return [
            '#',
            'Unidad organizacional',
            'Matrícula N°',
            'Nomenclador',
            'Nombre',
            'Descripción',
            'Fecha de creación',
        ];
    }

    public function collection(): object
    {
        return $this->inventories;
    }

    public function map($row): array
    {
        if( !empty( $this->inventories ) ) {

            return [
                $row->id,
                $row->organization->name,
                $row->registration,
                $row->product->nomenclator,
                $row->product->name,
                $row->description,
                $row->created_at,
            ];

        }
        else {
            return [];
        }
    }
}
