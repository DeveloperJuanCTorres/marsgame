<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contactanos</title>
    </head>
    <body>

        <table width='700' height='222' border='0' align='center' cellpadding='5' cellspacing='0'>
            <tr>
                <td width='700' align='center' valign='middle'>
                    <img src="https://marsgame.pe/assets/img/logo.png" width='420' height='160' />
                </td>
            </tr>
            <tr>
                <td align='center' valign='middle' style='color:#000; font-size:18px; font-weight:bold'>Se realizó una reclamación desde la web..</td>
            </tr>
            <tr>
                <td align='center' valign='middle'>&nbsp;</td>
            </tr>
        </table>

        <table width='700' border='1' cellpadding='8' cellspacing='0' align='center'>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Nombre</td>
                <td align='center' >{{$reclamo['nombre']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Tipo de reclamo</td>
                <td align='center' >{{$reclamo['tipo']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Tipo de documento Identidad</td>
                <td align='center' >{{$reclamo['tipo_doc']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Número Documento</td>
                <td align='center' >{{$reclamo['nro_doc']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Nombre completo</td>
                <td align='center'>{{$reclamo['nombre']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Dirección</td>
                <td align='center'>{{$reclamo['direccion']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Teléfono</td>
                <td align='center'>{{$reclamo['telefono']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Correo</td>
                <td align='center'>{{$reclamo['email']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Orden de compra, Identificación del producto o servicio contratado</td>
                <td align='center'>{{$reclamo['orden']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Monto del producto o servicio contratado</td>
                <td align='center'>{{$reclamo['monto']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Moneda</td>
                <td align='center'>{{$reclamo['moneda']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Detalle del reclamo o queja</td>
                <td align='center'>{{$reclamo['detalle']}}</td>
            </tr>
            <tr>
                <td align='center' colspan="1" style='font-weight:bold'>Pedido</td>
                <td align='center'>{{$reclamo['pedido']}}</td>
            </tr>
        </table>

    </body>
</html>