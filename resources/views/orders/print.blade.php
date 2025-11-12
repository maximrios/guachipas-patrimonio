<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Planilla de Alta - Sindicatura General de la Provincia de Salta</title>
    <style>
        @page {
            margin: 0.5cm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 4.1cm;
        }
        .page_break { 
            page-break-after: always; 
        }
        .align-left {
            text-align: left!important;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 4.45cm;
        }
        
        /** Table **/
        table {
            border-collapse: collapse;
        }
        
        table tr td {
            border: 1px solid #000;
            font-size: 13px;
            height: 11px;
            text-align: center;
            width: 11px!important;
        }
        table tr.hidden td {
            border-color: #fff!important;
            color: #fff;
        }
        table.no-border tr td {
            border: 1px solid #fff;
        }
        table tr.clean td {
            border-left: none;
            border-right: none;
        }
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 3.17cm;
        }
        footer table tr td {
            border-top: none;
            border-left: 1px solid #000000!important;
            border-right: 1px solid #000000!important;
            border-bottom: none;
        }
        

        .btop {
            border-top: 3px solid #000000;
        }
        .border-left {
            border-left: 1px solid #000000!important;
        }
        .border-right {
            border-right: 1px solid #000000!important;
        }
        .border-bottom {
            border-bottom: 1px solid #000000!important;
        }
        .bsides {
            border-top: 3px solid #000000;
        }
        .separator-top {
            border-top: 2px solid #000000!important;
        }
        .separator-left {
            border-left: 2px solid #000000!important;
        }
        .separator-right {
            border-right: 2px solid #000000!important;
        }
        .separator-bottom {
            border-bottom: 2px solid #000000!important;
        }
        .border-none {
            border: none;
        }

        
        /** Text */
        .align-left {
            text-align: left;
        }
    </style>
</head>
<body>
    @include('orders.template.header')
    @include('orders.template.footer')
    <main>
        @php
            $perPage = 4;
            $chunks = $products->chunk($perPage);
        @endphp
        @foreach ($chunks as $chunkIndex => $chunk)
            <table class="grid">
                <tr class="hidden">
                <td>a</td>
                <td>a</td>
                <td class="separator-left">a</td>
                <td>a</td>
                <td>a</td>
                <td class="separator-left">a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>

                <td class="separator-left">a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>

                <td class="separator-left">a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>

                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td class="separator-left">a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>

                <td class="separator-left">a</td>
                <td class="separator-left">a</td>
                <td class="separator-left">a</td>

                <td class="separator-left">a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>

                <td class="separator-left">a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>

                <td class="separator-left">a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                </tr>
                @foreach ($chunk as $product)
                    <tr class="btop">
                    <!-- Clasificacion Institucional 9-->
                    <td class="separator-left"></td>
                    <td></td>
                    <td class="separator-left"></td>
                    <td></td>
                    <td></td>
                    <td class="separator-left"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <!-- Clasificacion Patrimonial 13-->

                    <td class="separator-left">{{ $product->product->type[0] }}</td>
                    <td>{{ $product->product->type[1] }}</td>

                    <td>{{ $product->product->group[0] }}</td>
                    <td>{{ $product->product->group[1] }}</td>

                    <td>{{ $product->product->subgroup[0] }}</td>
                    <td>{{ $product->product->subgroup[1] }}</td>

                    <td>{{ $product->product->account[0] }}</td>
                    <td>{{ $product->product->account[1] }}</td>

                    <td>{{ $product->product->species[0] }}</td>
                    <td>{{ $product->product->species[1] }}</td>
                    <td>{{ $product->product->species[2] }}</td>

                    <td>{{ $product->product->subspecies[0] }}</td>
                    <td>{{ $product->product->subspecies[1] }}</td>
                    <!-- Cantidad 4-->
                    @php
                        $quantity = str_pad($product->quantity, 4, '0', STR_PAD_LEFT);
                    @endphp
                    <td class="separator-left">{{ $quantity[0] }}</td>
                    <td>{{ $quantity[1] }}</td>
                    <td>{{ $quantity[2] }}</td>
                    <td>{{ $quantity[3] }}</td>
                    <!-- Matriculas 10-->
                    <td class="separator-left" colspan="5">
                        {{ @$product->registration_from }}
                    </td>
                    <td class="separator-left" colspan="5">
                        {{ @$product->registration_to }}
                    </td>
                    <!-- Procedencia y Estado -->
                    <td class="separator-left">{{ $product->origin->id }}</td>
                    <td class="separator-left">{{ $product->status->id }}</td>
                    <td class="separator-left">{{ $product->valuation }}</td>

                    <!--  Right 38-->
                    <td colspan="28" rowspan="6" class="separator-left" style="vertical-align:top; text-align:justify;padding:0 5px;">{{ $product->description }}</td>
                    <td colspan="5" class="separator-left"><small>$ {{ $product->unit_price }}</small></td>
                    <td colspan="5" class="separator-left separator-right"><small>$ {{ $product->total_price }}</small></td>
                    
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="4" class="align-left"><strong>Bien:</strong> </td>
                    <td colspan="34" class="align-left border-right">{{ $product->product->name }}</td>

                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="7" class="align-left"><strong>Proveedor:</strong></td>
                    <td colspan="31" class="align-left border-right">{{ ($product->provider) ? $product->provider->name : '' }}</td>

                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="7" class="align-left"><strong>Factura N°:</strong></td>
                    <td colspan="10" class="align-left">{{ $product->invoice }}</td>
                    <td colspan="10" class="align-left"><strong>Fecha de Factura:</strong></td>
                    <td colspan="11" class="align-left border-right">{{ $product->date_invoice }}</td>
                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="5" class="align-left"><strong>Fondos:</strong></td>
                    <td colspan="12" class="align-left">{{ $product->found->name }}</td>

                    <td colspan="5" class="align-left"><strong>O.P.N°:</strong></td>
                    <td colspan="16" class="align-left border-right">{{ $product->order_payment }}</td>

                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="38" class="align-left border-right">f.m</td>
                    <td colspan="5" class="separator-left" style="color: #fff;">a</td>
                    <td colspan="5" class="separator-left separator-right" style="color: #fff;">a</td>
                </tr>
                @endforeach
                @for ($f = $chunk->count(); $f < $perPage; $f++)
                <tr class="btop">
                    <!-- Clasificacion Institucional 9-->
                    <td style="color: #FFF;">a</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <!-- Clasificacion Patrimonial 13-->

                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    
                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <!-- Cantidad 4-->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <!-- Matriculas 10-->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <!-- Procedencia y Estado -->
                    <td></td>
                    <td></td>
                    <td></td>

                    <!--  Right 38-->
                    <td colspan="28" rowspan="6" class="separator-left" style="vertical-align:top; text-align:justify;padding:0 5px;"></td>
                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                    
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="4" class="align-left"><strong>Bien:</strong> </td>
                    <td colspan="34" class="align-left border-right"></td>
                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="7" class="align-left"><strong>Proveedor:</strong></td>
                    <td colspan="31" class="align-left border-right"></td>

                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="7" class="align-left"><strong>Factura N°:</strong></td>
                    <td colspan="31" class="align-left border-right"></td>
                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="5" class="align-left"><strong>Fondos:</strong></td>
                    <td colspan="12" class="align-left"></td>

                    <td colspan="5" class="align-left"><strong>O.C.N°:</strong></td>
                    <td colspan="16" clsss="align-left border-right"></td>

                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="38" class="align-left border-right">f.m</td>
                    <td colspan="5" class="separator-left" style="color: #fff;">a</td>
                    <td colspan="5" class="separator-left separator-right" style="color: #fff;">a</td>
                </tr>
                @endfor
            </table>
            @if ($chunkIndex + 1 < $chunks->count())
                <div class="page_break"></div>
            @endif
        @endforeach
    </main>
</body>
</html>