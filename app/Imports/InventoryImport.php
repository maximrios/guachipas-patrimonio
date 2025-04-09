<?php

namespace App\Imports;

use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InventoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $orderValue = explode('/', $row[0]);
        $number = $orderValue[0];
        $year = $orderValue[1];
        if (strlen($year) == 2) {
            $year = '20' . $year;
        }
        $order = Order::where('number', $number)
            ->where('year', $year)
            ->first();
        if ($order == null) {
            $order = Order::create([
                'character' => 'ADMINISTRACIÓN CENTRAL',
                'institution' => 'PODER EJECUTIVO',
                'organization_name' => 'SINDICATURA GENERAL DE LA PROVINCIA DE SALTA',
                'user_id' => 1,
                'status_id' => 2,
                'organization_id' => 1,
                'number' => $number,
                'year' => $year,
            ]);
        }
        
        $type = $row[2] . $row[3];
        $group = $row[4] . $row[5];
        $subgroup = $row[6] . $row[7];
        $account = $row[8] . $row[9];
        $species = $row[10] . $row[11] . $row[12];
        $subspecies = $row[13] . $row[14];

        if ($type == null || $group == null || $subgroup == null || $account == null || $species == null || $subspecies == null) {
            return null;
        }
        
        //$nomenclature = $row['type'] . $row['group'] . $row['subgroup'] . $row['account'] . $row['species'] . $row['subspecies'];
        $nomenclature = $type . $group . $subgroup . $account . $species . $subspecies;
        
        $product = Product::where('type', (int) $type)
            ->where('group', (int) $group)
            ->where('subgroup', (int) $subgroup)
            ->where('account', (int) $account)
            ->where('species', (int) $species)
            //->where('subspecies', (int) $subspecies)
            ->first();
        if ($product == null) {
            return null;
        }
        Log::info('Product: ' . $product->id);
        Log::info('From: ' . $row[15]);
        $mat = (int) $row[15];
        $orderProduct = new OrderProduct([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'order_product_found_id' => 5,
            'order_product_status_id' => 1,
            'order_product_origin_id' => 1,
            'valuation' => 1,
            'quantity' => 1,
            'description' => $row[16],
            'registration_from' => str_pad($mat, 9, '0', STR_PAD_LEFT),
            'registration_to' => str_pad($mat, 9, '0', STR_PAD_LEFT),
            'section' => 1,
            'subsection' => 1,
            'invoice' => $row[17],
            'date_invoice' => null,
            'order_payment' => null,
            'provider_id' => 1,
            'unit_price' => $row[18],
            'total_price' => $row[18],
        ]);

        $orderProduct->save();


        
        $inventory = new Inventory([
            'order_product_id' => $orderProduct->id,
            'product_id' => $product->id,
            'organization_id' => 1,
            'registration' => str_pad($row[15], 9, '0', STR_PAD_LEFT),
            'order_id' => $order->id,
            'sale_id' => null,
            'current_organization' => 1,
            'description' => $row[16],
            'observations' => $row[17] . ' ' . $row[18] . ' ' . $row[19] . ' ' . $row[20] . ' ' . $row[21] . ' ' . $row[22],
            'status_id' => 1,
        ]);
        $inventory->save();
        return $inventory;
        
    }
}
