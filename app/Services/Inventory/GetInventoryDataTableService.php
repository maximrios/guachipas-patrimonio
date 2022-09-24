<?php

declare(strict_types=1);

namespace App\Services\Inventory;

use Exception;
use App\Models\Inventory;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\InventoryCollection;

class GetInventoryDataTableService
{

    private int $datatableStart;
    private int $datatableLength;
    private ?string $datatableSearchValue;
    private int $datatableDraw;

    public function __construct(
        int $datatableStart,
        int $datatableLength,
        ?string $datatableSearchValue,
        int $datatableDraw = 1
    )
    {
        $this->datatableStart = $datatableStart;
        $this->datatableLength = $datatableLength;
        $this->datatableSearchValue = $datatableSearchValue;
        $this->datatableDraw = $datatableDraw;
    }

    public function execute(): JsonResponse
    {
        try {

            $totalData = Inventory::all()->count();

            $totalFiltered = $totalData;
            $start  = $this->datatableStart;
            $length  = $this->datatableLength;
            $columns = [
                0 => 'id',
                1 => 'nif',
                2 => 'denomination',
                3 => 'email',
                4 => 'telefono'
            ];
            $order = $columns[0];
            $dir = 'DESC';
            if (empty($this->datatableSearchValue))
            {

                $inventories = Inventory::offset($start)
                    ->limit($length)
                    ->orderBy($order, $dir)
                    ->get();

            }
            else
            {

                $search = $this->datatableSearchValue;
                $totalFiltered = Inventory::where(function ($query) use ($search) {
                        $query->where('id', 'LIKE', "%{$search}%")
                            ->orWhere('registration', 'LIKE', "%{$search}%");
                        })->count();

                $inventories = Inventory::where(function ($query) use ($search) {
                        $query->where('id', 'LIKE', "%{$search}%")
                            ->orWhere('registration', 'LIKE', "%{$search}%");
                    })->offset($start)->limit($length)->orderBy($order, $dir)->get();

            }


            $data = new InventoryCollection($inventories);
            $data = json_encode($data);
            $data = json_decode($data);

            $dataResult = array(
                "draw"            => intval($this->datatableDraw),
                "recordsTotal"    => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data->data
            );


            return response()->json($dataResult);

        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }
}
