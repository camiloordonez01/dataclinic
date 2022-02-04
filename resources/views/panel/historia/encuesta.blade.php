<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="width: 650px; height: 792px;background-color: white; margin: auto;">
        <div style="padding: 20px 0px;color:white;">
            <img src="{{public_path('/images/logo_caet.png')}}" width="70" style="margin-left: 5px;position:absolute;">
            <div>
                <h3 style="text-align: center;margin-bottom:2px;color:red;">AMBULANCIAS C.A.E.T.</h3>
                <h5 style="text-align: center;margin-bottom:2px;margin-top:2px;color:red;">CENTRAL DE ATENCIÓN DE EMERGENCIAS Y TRASLADO S.A.S</h5>
                <h5 style="text-align: center;margin-top:2px;color:red;">NIT. 900.864.772-1</h5>
            </div>
        </div>
        <p style="margin-top:0;">Estimado usuario, nos permitimos robarle unos minutos de su tiempo para solicitar su ayuda para contestar este breve Encuesta para saber el grado de satisfacción con nuestra Empresa. </p>
        <table style="border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-top: 40px;width:650px;">
            <thead>
                <tr style="border-bottom: 1px solid black;">
                    <th style="border-right: 1px solid black;border-bottom: 1px solid black;">Descripcion</th>
                    <th style="border-right: 1px solid black;border-bottom: 1px solid black;">Muy bueno</th>
                    <th style="border-right: 1px solid black;border-bottom: 1px solid black;">Bueno</th>
                    <th style="border-right: 1px solid black;border-bottom: 1px solid black;">Regular</th>
                    <th style="border-right: 1px solid black;border-bottom: 1px solid black;">Malo</th>
                    <th style="border-right: 1px solid black;border-bottom: 1px solid black;">Muy malo</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid black;width:100%;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">1. El trato y amabilidad del personal de la Ambulancia fue:</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->trato==1){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->trato==2){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->trato==3){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->trato==4){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->trato==5){{'x'}}@endif</td>
                </tr>
                <tr style="border-bottom: 1px solid black;width:100%;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">2. La Velocidad y la Seguridad durante su trayecto le pareció:</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->velocidad==1){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->velocidad==2){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->velocidad==3){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->velocidad==4){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->velocidad==5){{'x'}}@endif</td>
                </tr>
                <tr style="border-bottom: 1px solid black;width:100%;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">3. La comodidad y la higiene de las móviles le parecieron:</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->comodidad==1){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->comodidad==2){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->comodidad==3){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->comodidad==4){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->comodidad==5){{'x'}}@endif</td>
                </tr>
                <tr style="border-bottom: 1px solid black;width:100%;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">4. Cómo calificaría su experiencia global del servicio recibido por parte de Ambulancias CAET?</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->calificacion==1){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->calificacion==2){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->calificacion==3){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->calificacion==4){{'x'}}@endif</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;text-align:center;">@if ($encuesta->calificacion==5){{'x'}}@endif</td>
                </tr>
            </tbody>
        </table>
        <h5 style="text-align:center;">¿RECOMENDARIA A SUS FAMILIARES Y AMIGOS NUESTROS SERVICIOS?</h5>
        <p>Definitivamente SI @if ($encuesta->recomendacion==1){{'__x__'}}@else{{'_____'}}@endif Probablemente SI @if ($encuesta->recomendacion==2){{'__x__'}}@else{{'_____'}}@endif Definitivamente NO @if ($encuesta->recomendacion==3){{'__x__'}}@else{{'_____'}}@endif Probablemente NO @if ($encuesta->recomendacion==4){{'__x__'}}@else{{'_____'}}@endif</p>
        <h5 style="color:red">RECOMENDACIONES Y SUGERENCIAS:</h5>
        <p><u>{{$encuesta->sugerencias}}</u></p>
        <h5 style="color:red;text-align:center;">¡SU OPINION ES MUY IMPORTANTE PARA NOSOTROS!</h5>
        <div >
            <p style="width: 33%;float: left;">Nombre: <u>{{$encuesta->nombre}}</u></p>
            <p style="width: 33%;float: left;">CC: <u>{{$encuesta->cedula}}</u></p>
            <p style="width: 33%;float: left;">Teléfono: <u>{{$encuesta->telefono}}</u></p>
        </div>
    </div>
</body>
</html>