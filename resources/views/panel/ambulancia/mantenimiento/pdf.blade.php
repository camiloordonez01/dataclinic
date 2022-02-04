<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="width: 612px; height: 792px;background-color: white; margin: auto;">
        
        <img src="{{public_path('/images/logo_caet.png')}}" width="100" style="position:absolute; top: 0px;">
        <h4 style="text-align: center;margin: 2px;color: red;">AMBULANCIAS C.A.E.T</h4>
        <h4 style="text-align: center;margin: 2px;color: red;">CENTRO DE ATENCION DE EMERGENCIAS</h4>
        <h4 style="text-align: center;margin: 2px;color: red;">Y TRASLADOS S.A.S</h4>
        <h4 style="text-align: center;margin: 2px;color: red;">NIT. 900864772-1</h4>
        <h3 style="text-align: center;margin-top: 30px;">CONTROL DE ARREGLOS Y MANTENIMIENTOS</h3>
        <table style="border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-top: 20px;">
                <tbody>
                    <tr style="border-bottom: 1px solid black;">
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">Movil</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">KM</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">FECHA</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">MANTENIMIENTO REALIZADO</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">RESPONSABLE</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">OBSERVACIONES</th>
                    </tr>
                    @foreach($datos as $dato)
                    <tr style="border-bottom: 1px solid black;">
                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$dato->movil}}</td>
                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$dato->kilometros}}</td>
                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$dato->fecha}}</td>
                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$dato->mantenimiento}}</td>
                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$dato->responsable}}</td>
                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$dato->observacion}}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</body>
</html>