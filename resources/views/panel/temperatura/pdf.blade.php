
<html>
    <head>
    </head>
    <body>
        <div style="width: 612px; height: 792px;background-color: white; margin: auto;">
        
            <img src="{{public_path('/images/logo_caet.png')}}" width="100" style="position:absolute; top: 0px;">
            <h4 style="text-align: center;margin: 2px;color: red;">AMBULANCIAS C.A.E.T</h4>
            <h4 style="text-align: center;margin: 2px;color: red;">CENTRO DE ATENCION DE EMERGENCIAS</h4>
            <h4 style="text-align: center;margin: 2px;color: red;">Y TRASLADOS S.A.S</h4>
            <h4 style="text-align: center;margin: 2px;color: red;">NIT. 900864772-1</h4>
            <h4 style="text-align: center;margin-bottom: 2px;">REGISTRO DE TEMPERATURA</h4>
            <h4 style="text-align: center;margin: 2px;">MES: <u style="margin-right: 10px;">{{$mes}}</u> AÑO: <u>{{$año}}</u></h4>
            <table style="border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-top: 20px;">
                <tbody>
                    <tr style="border-bottom: 1px solid black;">
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">DÍA</th>
                        <th colspan="3" style="border-right: 1px solid black;border-bottom: 1px solid black;">MAÑANA</th>
                        <th colspan="3" style="border-right: 1px solid black;border-bottom: 1px solid black;">TARDE</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">RESPONSABLE</th>
                    </tr>
                    <tr style="border-bottom: 1px solid black;">
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;"></th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">TEMPERATURA</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">HUMEDAD</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">HORA</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">TEMPERATURA</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">HUMEDAD</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">HORA</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;"></th>
                    </tr>
                    @foreach($temperaturas as $temperatura)
                    <tr style="border-bottom: 1px solid black;">
                        <td style="text-align:center;border-right: 1px solid black;border-bottom: 1px solid black;">{{substr($temperatura->fecha, 8, 9)}}</td>
                        <td style="text-align:center;border-right: 1px solid black;border-bottom: 1px solid black;">{{$temperatura->temperatura1}}</td>
                        <td style="text-align:center;border-right: 1px solid black;border-bottom: 1px solid black;">{{$temperatura->humedad1}}</td>
                        <td style="text-align:center;border-right: 1px solid black;border-bottom: 1px solid black;">{{$temperatura->hora1}}</td>
                        <td style="text-align:center;border-right: 1px solid black;border-bottom: 1px solid black;">{{$temperatura->temperatura2}}</td>
                        <td style="text-align:center;border-right: 1px solid black;border-bottom: 1px solid black;">{{$temperatura->humedad2}}</td>
                        <td style="text-align:center;border-right: 1px solid black;border-bottom: 1px solid black;">{{$temperatura->hora2}}</td>
                        <td style="text-align:center;border-right: 1px solid black;border-bottom: 1px solid black;">{{$temperatura->nombres}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>