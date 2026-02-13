<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Planilla de Baja - Hospital San Bernardo</title>
    <style>
        @page {
            margin: 0.5cm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 4.1cm;
        }
        .page_break { 
            page-break-before: always; 
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
    @include('sales.template.header')
    @include('sales.template.footer')
    <main>
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
            @php
                $totalProducts = ($products->count() > 0) ? $products->count():5;
                $perPage = 4;
                $rest = $totalProducts%$perPage;
                $complete = ($rest === 0) ? 0 : $perPage - $rest;
                $total = $complete + $totalProducts;
                $i = 1;
                $j = 0;
            @endphp
            @foreach ($products as $product)
                <tr class="btop">
                    <!-- Clasificacion Institucional 9-->
                    <td class="separator-left">5</td>
                    <td>6</td>
                    <td class="separator-left">{{ $product->inventory->area?->code[0] }}</td>
                    <td>{{ $product->inventory->area?->code[1] }}</td>
                    <td>{{ $product->inventory->area?->code[2] }}</td>
                    <td class="separator-left">0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <!-- Clasificacion Patrimonial 13-->

                    <td class="separator-left">{{ $product->inventory->product->type[0] }}</td>
                    <td>{{ $product->inventory->product->type[1] }}</td>

                    <td>{{ $product->inventory->product->group[0] }}</td>
                    <td>{{ $product->inventory->product->group[1] }}</td>

                    <td>{{ $product->inventory->product->subgroup[0] }}</td>
                    <td>{{ $product->inventory->product->subgroup[1] }}</td>

                    <td>{{ $product->inventory->product->account[0] }}</td>
                    <td>{{ $product->inventory->product->account[1] }}</td>

                    <td>{{ $product->inventory->product->species[0] }}</td>
                    <td>{{ $product->inventory->product->species[1] }}</td>
                    <td>{{ $product->inventory->product->species[2] }}</td>

                    <td>{{ $product->inventory->product->subspecies[0] }}</td>
                    <td>{{ $product->inventory->product->subspecies[1] }}</td>
                    <!-- Cantidad 4-->
                    <td class="separator-left">0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <!-- Matriculas 10-->
                    <td class="separator-left" colspan="5">
                        {{ @$product->inventory->registration }}
                    </td>
                    <td class="separator-left" colspan="5">
                        {{ @$product->inventory->registration }}
                    </td>
                    <!-- Procedencia y Estado -->
                    <td class="separator-left"></td>
                    <td class="separator-left"></td>
                    <td class="separator-left"></td>

                    <!--  Right 38-->
                    <td colspan="28" rowspan="6" class="separator-left" style="vertical-align:top; text-align:justify;padding:0 5px;">{{ $product->inventory->product->description }}</td>
                    <td colspan="5" class="separator-left"><small></small></td>
                    <td colspan="5" class="separator-left separator-right"><small></small></td>
                    
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="4" class="align-left"><strong>Bien:</strong> </td>
                    <td colspan="34" class="align-left border-right">{{ $product->inventory->product->name }}</td>
                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="10" class="align-left"><strong>Motivo de baja:</strong> </td>
                    <td colspan="28" class="align-left border-right">{{ $product->reason->name }}</td>
                    <td colspan="5" class="separator-left" style="color: #fff;">a</td>
                    <td colspan="5" class="separator-left separator-right" style="color: #fff;">a</td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="8" class="align-left"><strong>Observaciones:</strong> </td>
                    <td colspan="30" class="align-left border-right">{{ $product->description }}</td>
                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="10" class="align-left"><strong>N° Planilla de Alta:</strong> </td>
                    <td colspan="28" class="align-left border-right">{{ $product->inventory->order->number }}</td>
                    <td colspan="5" class="separator-left"></td>
                    <td colspan="5" class="separator-left separator-right"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="38" class="align-left border-right"></td>
                    <td colspan="5" class="separator-left" style="color: #fff;">a</td>
                    <td colspan="5" class="separator-left separator-right" style="color: #fff;">a</td>
                </tr>
                @if($i === 4 && $i<$total)
                    <div class="page_break"></div>
                    <tr class="hidden">
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
                    </tr>
                @endif
                @php $i++; @endphp
            @endforeach
            @for ($j=$i-1;$j<$total;$j++)
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
                    <td colspan="5"></td>
                    <td colspan="5"></td>
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
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="10" class="align-left"><strong>Motivo de baja:</strong> </td>
                    <td colspan="28" class="align-left border-right"></td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="8" class="align-left"><strong>Observaciones:</strong> </td>
                    <td colspan="30" class="align-left border-right"></td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="10" class="align-left"><strong>N° Planilla de Alta:</strong> </td>
                    <td colspan="28" class="align-left border-right"></td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
                <tr class="clean">
                    <td class="border-left"></td>
                    <td colspan="38" style="color:#FFF;">a</td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
            @endfor
        </table>
    </main>
</body>
</html>