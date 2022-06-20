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
            margin: 0.5cm 1cm;
        }
        body {
            margin-top: 4.1cm;
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
            height: 6cm;
            
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
            width: 14px!important;
        }
        table tr.hidden td {
            border: 1px solid transparent!important;
            color: #fff;
        }
        table.no-border tr td {
            border: 1px solid #fff;
        }
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 4.36cm;
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
        .border-bottom {
            border-bottom: 1px solid #000000!important;
        }
        .bsides {
            border-top: 3px solid #000000;
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
            @php
                $totalProducts = ($products->count() > 0) ? $products->count():5;
                $perPage = 5;
                $rest = $totalProducts%$perPage;
                $complete = ($rest === 0) ? 0 : $perPage - $rest;
                $total = $complete + $totalProducts;
                $i = 1;
                $j = 0;
            @endphp
            @foreach ($products as $product)
                <tr class="btop">
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

                    <td></td>
                    <td>{{ $product->product->type }}</td>

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
                    <td>{{ $product->origin->id }}</td>
                    <td>{{ $product->status->id }}</td>

                    <!--  Right 38-->
                    <td colspan="28" rowspan="5">{{ $product->description }}</td>
                    <td colspan="5">{{ $product->unit_price }}</td>
                    <td colspan="5">{{ $product->total_price }}</td>
                    
                </tr>
                <tr>
                    <td colspan="38" class="align-left">Observaciones</td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="38" class="align-left">N° Planilla de Alta: </td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="38" class="align-left"></td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="38" style="color: #fff;">a</td>
                    <td colspan="5" style="color: #fff;">a</td>
                    <td colspan="5" style="color: #fff;">a</td>
                </tr>
                @if($i % 5 === 0 && $i<$total)
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
                    <td style="color:#FFF;">a</td>
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

                    <!--  Right 38-->
                    <td colspan="28" rowspan="5"></td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                    
                </tr>
                <tr>
                    <td colspan="38" class="align-left">Observaciones</td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="38" class="align-left">N° Planilla de Alta:</td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="38" style="color:#FFF;">a</td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="38" style="color:#FFF;">a</td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                </tr>
            @endfor
        </table>
    </main>
</body>
</html>