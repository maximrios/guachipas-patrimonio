<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Etiquetas</title>
    <style>
        @page {
            margin-top: 10.5mm;
            margin-bottom: 10mm;
            margin-left: 0mm;
            margin-right: 0mm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            text-align: center;
        }
        tr.no-border {
            border-bottom: 1px solid black;
        }
        td.no-border {
            border: none;
            padding: 8.7px 16px;
        }
        td span {
            display: block;
        }
        /*
        .page_break { 
            page-break-before: always; 
            page-break-after: always;
        }
            */
    </style>
</head>
<body>
    <main>
        <table>
            <tbody>
                @php
                    // usamos cada inventario una sola vez; cada celda muestra dos líneas del mismo código
                    $labels = collect($inventories);
                @endphp

                @foreach($labels->chunk(3) as $row)
                    <tr>
                        @foreach($row as $label)
                            <td>
                                <table>
                                    <tr class="no-border">
                                        <td class="no-border" style="border-bottom: 1px solid black;">
                                            <img src="data:image/png;base64,{{ $label['barcode'] }}" width="230px">
                                            <span>{{ $label['code'] }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="no-border">
                                            <img src="data:image/png;base64,{{ $label['barcode'] }}" width="230px">
                                            <span>{{ $label['code'] }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        @endforeach
                        @if($row->count() < 3)
                            <td colspan="{{ 3 - $row->count() }}" style="border:none;"></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </main>
</body>
</html>