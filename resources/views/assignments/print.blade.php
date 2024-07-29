<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Planilla de Asignacion - Sindicatura General de la Provincia</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <style>
        @page {
            margin: 0.5cm 1.5cm;
            margin-bottom: 2.5cm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 1.5cm;
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
            width: 100%;
        }
        
        table tr td {
            border: 1px solid #000;
            font-size: 13px;
            text-align: center;
        }
        table tr.hidden td {
            border-color: #fff!important;
            color: #fff;
        }
        table.no-border tr td {
            border: none;
        }
        table tr.clean td {
            border-left: none;
            border-right: none;
        }
        table.products tbody tr td {
            padding: 2px 5px;
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
        p {
            font-size: 14px;
        }

        
        /** Text */
        .align-left {
            text-align: left;
        }
    </style>
</head>
<body>
    <footer>
        <table class="no-border">
            <tr class="clean">
                <td style="height:100px;border:none!important;"></td>
                <td style="height:100px;border:none!important;">Relevamiento Físico al: {{ date('d/m/Y') }}</td>
            </tr>
            <tr class="clean">
                <td style="height:100px;border:none!important;">Firma Jefe Del Servicio</td>
                <td style="height:100px;border:none!important;">Firma Jefe Del Servicio de Patrimonio</td>
            </tr>
        </table>
    </footer>
    <main>
        <table class="no-border">
            <tr>
                <td class="align-left">Sindicatura General de la Provincia - SALTA</td>
                <td style="width:250px!important;" rowspan="2"><img width="175px" src="data:image/png;base64,{{ $logo }}"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="align-left">{{ $assignment->assign_to }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="align-left">JEFE/PNAL. DEL SEC: {{ $assignment->organization->name }} - {{ $assignment->organization->name }}</td>
            </tr>
            <tr></tr>
        </table>
        <br>
        <p>-------------------- Por la presente se hace <strong>Cargo</strong> (según el Art. 48 de la Ley de Contabilidad) de los Bienes Muebles que se encuentran en uso en su Unidad de Organización, Sección, Sector, según detalle, los que por ningún concepto deberán desplazarse sin conocimiento previo del Encargado de Patrimonio. Cualquier novedad que se registre con relacion a la existencia en condiciones de uso de los bienes detallados, se debe comunicar de inmediato.----------------------------------------------------- </p>
        <br><br>
        <table class="products">
            <thead>
            <tr>
                <td class="border-none"></td>
                <td class="border-none"></td>
                <td class="border-none"></td>
                <td style="width:450px;">MOTIVO: Cambio de Encargado de Bienes</td>
            </tr>
            <tr>
                <td style="width:80px;" rowspan="2">Cant</td>
                <td colspan="2">MATRICULAS</td>
                <td rowspan="2">DETALLE</td>
            </tr>
            <tr>
                <td>Desde</td>
                <td>Hasta</td>
            </tr>
            </thead>
            <tbody>
                @foreach ($assignment->products as $product)
                    <tr>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->registration }}</td>
                        <td>{{ $product->registration }}</td>
                        <td class="align-left">{{ $product->name }}</td>
                    </tr>    
                @endforeach
                
            </tbody>

        </table>
    </main>
</body>
</html>