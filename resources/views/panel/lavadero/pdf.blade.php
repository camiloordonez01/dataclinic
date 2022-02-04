<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <div style="width: 650px; height: 792px;background-color: white; margin: auto;">
            <div style="background-color:#9bc2e6;padding: 20px 0px;color:white;">
                <img src="{{asset('/images/logo_caet.png')}}" width="70" style="    float: left;margin-left: 5px;">
                <div style="width:calc(100% - 75px);">
                    <h3 style="text-align: center;margin-bottom:2px;">FORMATO DE DESINFECCION DEL LAVADERO</h3>
                    <h5 style="text-align: center;margin-bottom:2px;margin-top:2px;">CENTRAL DE ATENCION DE EMERGENCIAS Y TRASLADO S.A.S</h5>
                    <h5 style="text-align: center;margin-top:2px;">AMBULACIAS C.A.E.T</h5>
                </div>
            </div>
            <h4>FORMATO CONTROL DESINFECCION</h4>
            <h4>LAVADERO</h4>
            <h4>MES: {{$mes}}, 2020</h4>
            <table style="border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-top: 40px;width:600px;">
                <thead>
                    <tr style="border-bottom: 1px solid black;">
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">DIA</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">HORA</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">OBSERVACION</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">RESPONSABLE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $dato)
                    <tr style="border-bottom: 1px solid black;width:100%;">
                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;width:10%;text-align:center;">{{date("d", strtotime($dato->fecha))}}</td>
                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;width:10%;text-align:center;">{{$dato->hora}}</td>
                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;width:70%;">{{$dato->observaciones}}</td>
                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;width:10%;text-align:center;"><img src="@if (!($dato->firma == '')){{ asset('files/lavadero/'.$dato->firma) }} @endif" width="100"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>OBSERVACIONES : <u>{{$observaciones}}</u></p>
        </div>
    </body>
</html>