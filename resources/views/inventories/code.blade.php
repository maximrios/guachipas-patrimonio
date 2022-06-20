<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Etiquetas - {{ $inventory->product->name }}</title>
    <style>
        @page {
            margin: 0.5cm;
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
                <tr>
                    <td>
                        <img src="data:image/png;base64,{{ $barcode }}" width="125px">
                        <span>{{ $code }}</span>
                    </td>
                    <td>
                        <img src="data:image/png;base64,{{ $barcode }}" width="125px">
                        <span>{{ $code }}</span>
                    </td>
                    <td>
                        <img src="data:image/png;base64,{{ $barcode }}" width="125px">
                        <span>{{ $code }}</span>
                    </td>
                    <td>
                        <img src="data:image/png;base64,{{ $barcode }}" width="125px">
                        <span>{{ $code }}</span>
                    </td>
                    <td>
                        <img src="data:image/png;base64,{{ $barcode }}" width="125px">
                        <span>{{ $code }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="data:image/png;base64,{{ $barcode }}" width="125px">
                        <span>{{ $code }}</span>
                    </td>
                    <td>
                        <img src="data:image/png;base64,{{ $barcode }}" width="125px">
                        <span>{{ $code }}</span>
                    </td>
                    <td>
                        <img src="data:image/png;base64,{{ $barcode }}" width="125px">
                        <span>{{ $code }}</span>
                    </td>
                    <td>
                        <img src="data:image/png;base64,{{ $barcode }}" width="125px">
                        <span>{{ $code }}</span>
                    </td>
                    <td>
                        <img src="data:image/png;base64,{{ $barcode }}" width="125px">
                        <span>{{ $code }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </main>
</body>
</html>