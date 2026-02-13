<?php

declare(strict_types=1);

namespace App\Exporters;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AssignmentExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    private $assignments;

    public function __construct(
        $assignments
    )
    {
        $this->assignments = $assignments;
    }

    public function headings(): array
    {
        return [
            '#',
            'Area',
            'Asignado a',
            'Fecha de creación',
            'Fecha de aprobación',
            'Observaciones',
        ];
    }

    public function collection(): object
    {
        return $this->assignments;
    }

    public function map($row): array
    {
        if( !empty( $this->assignments ) ) {

            return [
                $row->id,
                $row->area->name,
                $row->assign_to,
                $row->created_at,
                $row->approved_at,
                $row->observation,
            ];

        }
        else {
            return [];
        }
    }
}
