<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Etiquetas - Orden</title>
    <style>
        @page {
            margin: 0.5cm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }
        table {
            border-collapse: separate;
            border-spacing: 0 5px; 
        }
        td {
            border: 1px solid black;
            padding: 3px 5px;
            text-align: center;
        }
        td span {
            display: block;
        }
        .page_break { 
            page-break-before: always; 
            page-break-after: always;
        }
    </style>
</head>
<body>
    <main>
        <table>
            <tbody>
                @foreach ($inventories as $inventory)
                    <tr>
                        @for ($i=1; $i<=5; $i++)
                            <td>
                                <img src="data:image/png;base64,{{ $inventory['barcode'] }}" width="125px">
                                <span>{{ $inventory['code'] }}</span>
                            </td>    
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>