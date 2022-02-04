<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <div style="width: 650px; height: 792px;background-color: white; margin: auto;">
            <div style="padding: 42px 0px;border: 2px solid black;">
                <img src="{{public_path('/images/logo_caet.png')}}" alt="" style="position: absolute;top: -20px;width: 80px;">
                <div style="text-aling:center;">
                    <h5 style="margin:0;    text-align: center;">SERVICIO DE AMBULANCIA</h5>
                    <h5 style="margin:0;    text-align: center;">FORMATO DE DESESTIMIENTO</h5>
                </div>
            </div>
            <div style="width: 650px;" style="margin-top:30px;">
                <div>
                    <p style="text-align:justify;">
                        Yo <u>{{$desestimiento->nombre}}</u> identificado con la cédula de ciudadanía número <u>{{$desestimiento->cedula}}</u> expedida en <u>{{$desestimiento->expedida}}</u>
                        Obrando en nombre propio y en mi condición de paciente o en representación del 
                        Paciente <u>{{$desestimiento->paciente}}</u>
                        <br>
                        En calidad (parentesco) <u>{{$desestimiento->parentesco}}</u> en forma LIBRE, ESPONTANEA Y VOLUNTARIAMENTE
                        MANIFIESTO MI NEGATIVA A NO ACEPTAR QUE SE REALICE EL TRASLADO EN VEHÍCULO DE EMERGENCIA  
                        CORRESPONDIENTE TIPO AMBULANCIA BASICA () MEDICALIZADA ()
                        <br>
                        Se me explico clara y detalladamente que puedo presentar riesgos y posibles complicaciones para
                        mi salud en general al no ser trasladado.
                        <br>
                        En consecuencia NO AUTORIZO la realización del traslado a pesar del propósito, ventajas, posibles
                        riesgos y consecuencias, que ayudan a determinar la mejoría o el deterioro de la enfermedad, los
                        cuales fueron explicados clara y detalladamente por los profesionales y personal de la tripulación de
                        la ambulancia.
                        <br>
                        Se me ha dado la oportunidad de hacer preguntas y todas han sido contestadas satisfactoriamente.
                        <br>
                        Por lo anterior en forma consistente doy firma asumiendo toda responsabilidad, exonerando al
                        prestador de servicio <strong>CENTRAL DE ATENCION DE EMERGENCIAS Y TRASLADO S.A.S
                        AMBULANCIAS C.A.E.T CARTAGO</strong> y profesionales de la ambulancia, de mi estado de salud o de
                        mi representado, por las siguientes causas:-
                        <br>
                        <u>{{$desestimiento->causas}}</u>
                        <br>
                        Y para que así conste, firmo el presente documento hoy día <u>{{$desestimiento->dia}}</u> del mes de <u>{{$desestimiento->mes}}</u> año <u>{{$desestimiento->año}}</u>
                    </p>
                </div>
                <div style="width:100%;margin-top:40px;">
                    <div style="width: 50%;float:left;">
                        <img src="{{public_path('/files/firmas/'.$desestimiento->firmaPaciente)}}" width="300">
                        <p style="text-align:center;">Firma del paciente o persona responsable</p>
                    </div>
                    <div style="width: 50%;float:left;margin-top:103px;text-align:center;">
                        <u>{{$desestimiento->cedulaPaciente}}</u>
                        <p style="text-align:center;">Documento de identidad</p>
                    </div>
                </div>
                <br>
                <div>
                    <p>He explicado la naturaleza, propósito, ventajas, riesgos y alternativas del procedimiento mencionado
                    y he contestado todas las preguntas:
                    </p>
                </div>
                <br>
                <div  style="width:650px;text-align:center;display:inline-block;">
                    <div style="width: 325px;float:left;">
                        <u>{{$desestimiento->testigo}}</u>
                        <p style="text-align:center;">Testigo</p>
                    </div>
                    <div style="width: 325px;float:left;">
                        <u>{{$desestimiento->cedulaTestigo}}</u>
                        <p style="text-align:center;">Con cedula</p>
                    </div>
                </div>
                <div  style="width:650px;text-align:center;display:inline-block;">
                    <div style="width: 325px;float:left;">
                        <u>{{$desestimiento->auxiliarAmbulancia}}</u>
                        <p style="text-align:center;">Auxilia ambulancia</p>
                    </div>
                    <div style="width: 325px;float:left;">
                        <u>{{$historia}}</u>
                        <p style="text-align:center;">Historia #</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>