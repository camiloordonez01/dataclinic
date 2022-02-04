<html>
    <head>
    </head>
    <body>
        <div style="width: 612px; height: 792px;background-color: white; margin: auto;">
            <div style="background-color: #9bc2e6;padding: 20px 0px;">
                <img src="{{asset('/images/logo_caet.png')}}" width="70" style="    float: left;margin-left: 5px;">
                <div style="width:calc(100% - 75px);">
                    <h6 style="text-align: center;margin: 2px;color: white;">CONTROL DE ASISTENCIA A CAPACITACIÓN, ENTRENAMIENTO Y REUNION</h6>
                    <h6 style="text-align: center;margin: 2px;color: white;">CENTRAL DE ATENCION EN EMERGENCIAS Y TRASLADOS S.A.S</h6>
                    <h6 style="text-align: center;margin: 2px;color: white;">AMBULANCIAS C.A.E.T</h6>
                    <h6 style="text-align: center;margin: 2px;color: white;">CARTAGO - VALLE DEL CAUCA</h6>
                </div>
            </div>
            <h4 style="margin: 2px;margin-top:40px;">TEMA: <u>&nbsp;&nbsp;{{$reunion->tema}}&nbsp;&nbsp;</u></h4>
            <h4 style="margin: 2px;">HORA: <u style="margin-right: 10px;">&nbsp;&nbsp;{{$reunion->hora}}&nbsp;&nbsp;</u> FECHA: <u>&nbsp;&nbsp;{{$reunion->fecha}}&nbsp;&nbsp;</u></h4>
            <table style="border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-top: 20px;width:100%;">
                <tbody>
                    <tr style="border-bottom: 1px solid black; ">
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;background-color: #9bc2e6;">N°</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;background-color: #9bc2e6;">NOMBRE COMPLETO</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;background-color: #9bc2e6;">TELEFONO</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;background-color: #9bc2e6;">CARGO</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;background-color: #9bc2e6;">FIRMA</th>
                    </tr>
                    @foreach($asistentes as $asistente)
                    <tr style="border-bottom: 1px solid black; ">
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$loop->index + 1}}</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$asistente->nombre}}</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$asistente->telefono}}</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$asistente->cargo}}</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;"><img src="{{asset('/files/reuniones/'.$asistente->firma)}}" style="height:30px;"></th>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" style="border-right: 1px solid black;border-bottom: 1px solid black;padding:10px;">
                            <strong>CONTENIDO DEL TEMA:</strong><br>
                            {{$reunion->contenido}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="border-right: 1px solid black;border-bottom: 1px solid black;padding:10px;">
                            <strong>OBSERVACIONES:</strong><br>
                            {{$reunion->observaciones}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="width: 100%;">
                <div style="width: 33.3%;padding: 50px;float: left;">
                    <img src="{{asset('/files/reuniones/'.$reunion->firmaInstructor)}}" style="width:100%;">
                    <hr>
                    <h4 style="margin: 2px;">FIRMA INSTRUCTOR</h4>
                    <h4 style="margin: 2px;">CC. <span style="color: #3e3e3e;">{{$reunion->cedulaInstructor}}</span></h4>
                    <h4 style="margin: 2px;">CARGO. <span style="color: #3e3e3e;">{{$reunion->cargoInstructor}}</span></h4>
                </div>
                <div style="width: 33.3%;padding: 50px;float: left;">
                    <img src="{{asset('/files/reuniones/'.$reunion->firmaCoordinador)}}" alt="" style="width:100%;">
                    <hr>
                    <h4 style="margin: 2px;">FIRMA INSTRUCTOR</h4>
                    <h4 style="margin: 2px;">CC. <span style="color: #3e3e3e;">{{$reunion->cedulaCoordinador}}</span></h4>
                </div>
            </div>
        </div>
    </body>
</html>