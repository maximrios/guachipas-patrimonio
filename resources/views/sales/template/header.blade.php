<header>
    <table class="table-header">
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
        <tr class="clean">
            <td class="border-none"></td>
            <td class="separator-top separator-left separator-right" style="text-align:center;">1</td>
            <td class="border-none"></td>
            <td class="border-none"></td>
            <td colspan="35" class="border-none align-left"><b>Carácter:</b> {{ @$sale->character }}</td>

            <td colspan="38" class="border-none"></td>
        </tr>
        <tr class="clean">
            <td class="border-none"></td>
            <td class="separator-top separator-left separator-right" style="text-align:center;">2</td>
            <td class="border-none"></td>
            <td class="border-none"></td>
            <td colspan="35" class="border-none align-left"><b>Institución:</b> {{ @$sale->institution }}</td>

            <td colspan="38" class="border-none align-left"><strong>PLANILLA DE BAJA N°</strong> {{ $sale->number }} <strong>- EJERCICIO</strong> {{ $sale->year }}</td>
        </tr>
        <tr class="clean">
            <td class="border-none"></td>
            <td class="separator-top separator-left separator-right" style="text-align:center;">0</td>
            <td class="separator-top separator-left separator-right" style="text-align:center;">8</td>
            <td class="border-none"></td>
            <td colspan="35" class="border-none align-left"><b>Jurisdicción:</b> MINISTERIO DE SALUD PÚBLICA</td>

            <td colspan="38" class="border-none align-left">Expediente N°: {{ $sale->file }}</td>
        </tr>
        <tr class="clean">
            <td class="border-none"></td>
            <td class="separator-top separator-left separator-right" style="text-align:center;">5</td>
            <td class="separator-top separator-left separator-right" style="text-align:center;">9</td>
            <td class="border-none"></td>
            <td colspan="35" class="border-none align-left"><b>Unid. De Organización:</b> Hospital San Bernardo</td>
            @php
                $approvedAt = '';
                if ($sale->generated_at != '') {
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    $fecha = \Carbon\Carbon::parse($sale->generated_at);
                    $mes = $meses[($fecha->format('n')) - 1];
                    $approvedAt = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                }
            @endphp
            <td colspan="38" class="border-none align-left">Fecha de emisión: {{ $approvedAt }}</td>
        </tr>
        <tr>
            <td colspan="9" rowspan="2">Clasificación<br>Insititucional</td>
            <td colspan="13" rowspan="2" class="separator-left">Clasificación<br>Patrimonial</td>
            <td colspan="4" rowspan="4" class="separator-left">Cantidad</td>
            <td colspan="10" rowspan="2" class="separator-left">Matrículas</td>
            <td class="separator-left">P</td>
            <td class="separator-left">E</td>
            <td class="separator-left">M</td>

            <td colspan="28" rowspan="3" class="separator-left align-left" style="font-size: 16px;border-right: none!important;">Sector: Hospital San Bernardo</td>
            <td colspan="10" rowspan="3" style="border-left: none!important;"><img width="100" src="data:image/png;base64,{{ $logo }}"/></td>
        </tr>
        <tr>
            <td class="separator-left">r</td>
            <td class="separator-left">s</td>
            <td class="separator-left">e</td>
        </tr>
        <tr>
            <td colspan="2">Sec</td>
            <td colspan="3" class="separator-left">Sec</td>
            <td colspan="4" class="separator-left">Sub Sec</td>

            <td class="separator-left" colspan="2">Cla</td>
            <td colspan="2">Gru</td>
            <td colspan="2">Sub</td>
            <td colspan="2">Cta</td>
            <td colspan="3">Espe</td>
            <td colspan="2">Sub</td>

            <!--<td colspan="4"></td>-->

            <td colspan="5" rowspan="2" class="separator-left">Desde</td>
            <td colspan="5" rowspan="2" class="separator-left">Hasta</td>
            <td class="separator-left">o</td>
            <td class="separator-left">t</td>
            <td class="separator-left">t</td>

        </tr>
        <tr>
            <td colspan="2">cion</td>
            <td colspan="3" class="separator-left">tor</td>
            <td colspan="4" class="separator-left">tor</td>

            <td class="separator-left" colspan="2">se</td>
            <td colspan="2">po</td>
            <td colspan="2">Gp</td>
            <td colspan="2"></td>
            <td colspan="3">cie</td>
            <td colspan="2">Esp.</td>

            <!--<td colspan="4"></td>-->

            <!--<td colspan="5"></td>-->
            <!--<td colspan="5"></td>-->
            <td class="separator-left">c</td>
            <td class="separator-left"></td>
            <td class="separator-left"></td>

            <td class="separator-left" colspan="28">DESCRIPCION FISICA DE LOS BIENES</td>
            <td class="separator-left" colspan="5">Prec. Unit.</td>
            <td class="separator-left" colspan="5">Prec. Total</td>
        </tr>
    </table>
</header>