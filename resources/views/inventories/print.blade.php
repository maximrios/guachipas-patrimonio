<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        @page {
            margin: 0.5cm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 3.85cm;
            /*margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm; */
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
            font-size: 12px;
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
    @include('inventories.template.header')
    @include('inventories.template.footer')
    <main>
        <table class="">
            <tr class="hidden">
                <td class="separator-left">a</td>
                <td>a</td>
                <td class="separator-left">a</td>
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
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
            </tr>
            @php
                $totalProducts = ($inventories->count() > 0) ? $inventories->count():5;
                $perPage = 25;
                $rest = $totalProducts%$perPage;
                $complete = ($rest === 0) ? 0 : $perPage - $rest;
                $total = $complete + $totalProducts;
                $i = 1;
                $j = 0;
            @endphp
            @foreach ($inventories as $inventory)
                <tr class="">
                    <!-- Clasificacion Institucional 9-->
                    <td>5</td>
                    <td>6</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <!-- Clasificacion Patrimonial 13-->

                    <td class="separator-left">{{ $inventory->product->type[0] }}</td>
                    <td>{{ $inventory->product->type[1] }}</td>

                    <td>{{ $inventory->product->group[0] }}</td>
                    <td>{{ $inventory->product->group[1] }}</td>

                    <td>{{ $inventory->product->subgroup[0] }}</td>
                    <td>{{ $inventory->product->subgroup[1] }}</td>

                    <td>{{ $inventory->product->account[0] }}</td>
                    <td>{{ $inventory->product->account[1] }}</td>

                    <td>{{ $inventory->product->species[0] }}</td>
                    <td>{{ $inventory->product->species[1] }}</td>
                    <td>{{ $inventory->product->species[2] }}</td>

                    <td>{{ $inventory->product->subspecies[0] }}</td>
                    <td>{{ $inventory->product->subspecies[1] }}</td>
                    <!-- Cantidad 4-->
                    <td class="separator-left"></td>
                    <td></td>
                    <td></td>
                    <td>1</td>
                    <!-- Matriculas 10-->
                    <td class="separator-left">{{ $inventory->registration[0] }}</td>
                    <td>{{ $inventory->registration[1] }}</td>
                    <td>{{ $inventory->registration[2] }}</td>
                    <td>{{ $inventory->registration[3] }}</td>
                    <td>{{ $inventory->registration[4] }}</td>
                    <td>{{ $inventory->registration[0] }}</td>
                    <td>{{ $inventory->registration[1] }}</td>
                    <td>{{ $inventory->registration[2] }}</td>
                    <td>{{ $inventory->registration[3] }}</td>
                    <td>{{ $inventory->registration[4] }}</td>
                    <!-- Estado -->
                    <td class="separator-left"></td>

                    <!--  Right 38-->
                    <td class="separator-left" colspan="28">{{ Str::substr($inventory->orderProduct->description, 0, 60) }}</td>
                    <td class="separator-left" colspan="5">{{ $inventory->orderProduct->unit_price }}</td>
                    <td colspan="5">{{ $inventory->orderProduct->total_price }}</td>
                </tr>
                @if($i % 29 === 0 && $i<$total)
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
                        
                        <td class="border-left"></td>
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
                        
                        <td class="border-left"></td>
                        <td>a</td>
                        <td>a</td>
                        <td>a</td>
                        
                        <td class="border-left"></td>
                        <td>a</td>
                        <td>a</td>
                        <td>a</td>
                        <td>a</td>
                        <td>a</td>
                        <td>a</td>
                        <td>a</td>
                        <td>a</td>
                        <td>a</td>

                        <td class="border-left"></td>

                        <td class="border-left"></td>
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
                        
                        <td class="border-left"></td>
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
                <tr>
                    <!-- Clasificacion Institucional 9-->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <!-- Clasificacion Patrimonial 13-->
                    <td class="border-left"></td>
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
                    <td style="color:#FFF;">a</td>
                    <!-- Cantidad 4-->
                    <td class="border-left"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <!-- Matriculas 10-->
                    <td class="border-left"></td>
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
                    <td class="border-left"></td>

                    <!--  Right 38-->
                    <td class="border-left" colspan="28"></td>
                    <td class="border-left" colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
            @endfor
        </table>
    </main>
</body>
</html>