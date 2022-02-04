<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="width: 650px; height: 792px;background-color: white; margin: auto;">
    <table style="width: 650px;border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-top: 40px;">
        <tbody>
            <tr style="border-bottom: 1px solid black;">
                <th colspan="2" style="border-right: 1px solid black;border-bottom: 1px solid black;padding:20px 0px;">HOJA DE VIDA DE AMBULANCIA</th>
                <th rowspan="2" style="border-right: 1px solid black;border-bottom: 1px solid black;"><img src="{{public_path('images/logo_caet.png')}}" alt=""></th>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;padding:20px 0px;">VERSION: 01</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;padding:20px 0px;">
                    <span style="font-weight: 100;">FECHA DE ACTUALIZACION</span><br>
                    {{$ambulancia->fechaActualizacion}}
                </th>
            </tr>
        </tbody>
    </table>
    <h4 style="text-align: center;padding: 5px 50px;">ESPECIFICACIONES TECNICAS</h4>
    <table style="width: 650px;border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-top: 40px;">
        <tbody>
            <tr style="border-bottom: 1px solid black;">
                    <th colspan="2" style="border-right: 1px solid black;border-bottom: 1px solid black;">
                        <img src="{{public_path('files/ambulancias/'.$ambulancia->foto)}}" style="max-height:400px;">
                    </th>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;width: 30%; ">DETALLE</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;">CARACTERISTICAS</th>
            </tr>
            <tr style="border-bottom: 1px solid black;text-align: left; padding: 0px 5px;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;width: 30%; ">NOMBRE DEL VEHICULO</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$ambulancia->nombre}}</th>
            </tr>
            <tr style="border-bottom: 1px solid black;text-align: left;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;width: 30%; ">PLACA</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$ambulancia->placa}}</th>
            </tr>
            <tr style="border-bottom: 1px solid black;text-align: left;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;width: 30%; ">MOVIL</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$ambulancia->movil}}</th>
            </tr>
            <tr style="border-bottom: 1px solid black;text-align: left;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;width: 30%; ">MARCA</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$ambulancia->marca}}</th>
                </tr>
            <tr style="border-bottom: 1px solid black;text-align: left;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;width: 30%; ">MODELO</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$ambulancia->modelo}}</th>
            </tr>
            <tr style="border-bottom: 1px solid black;text-align: left;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;width: 30%; ">TIPO CARROCERIA</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$ambulancia->tipo_carroceria}}</th>
            </tr>
            <tr style="border-bottom: 1px solid black;text-align: left;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;width: 30%; ">LINEA</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$ambulancia->linea}}</th>
            </tr>
        </tbody>
    </table>
    <table style="width: 650px;border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-top: 40px;">
        <tbody>
            <tr style="border-bottom: 1px solid black;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;padding:10px;">REALIZADO</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;padding:10px;">REVISADO</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;padding:10px;">APROBADO</th>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;padding:10px;">{{$ambulancia->realizado}}</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;padding:10px;">{{$ambulancia->revisado}}</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;padding:10px;">{{$ambulancia->aprovado}}</th>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <th colspan="3" style="border-right: 1px solid black;border-bottom: 1px solid black;">
                    CARRERA 4 N 17-131 B / EL LLANO<br>
                    Correo electrónico: ambulanciascaet@gmail.com<br>
                    Teléfono: 3206784510
                </th>
            </tr>
        </tbody>
    </table>
    </div>
</body>
</html>