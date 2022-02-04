<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <div style="width: 933px; height: 612px;background-color: white; margin: auto;">
        
            <img src="{{public_path('/images/logo_caet.png')}}" width="70" style="position:absolute; top: 0px;">
            <h4 style="text-align: center;border: 2px solid black;width: 350px;margin: auto;padding: 5px 50px;">FORMATO DE CONTROL DE OXIGENO</h4>
            <table style="border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-top: 40px;">
                <tbody>
                    <tr style="border-bottom: 1px solid black;">
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">N° CILINDRO<br>VERIFICADO</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">FECHA</th>
                        <th colspan="2" style="border-right: 1px solid black;border-bottom: 1px solid black;">VERIFICACIÓN DE<br>FUGAS</th>
                        <th colspan="2" style="border-right: 1px solid black;border-bottom: 1px solid black;">VERIFICACIÓN DE<br>ABOLLADURAS</th>
                        <th colspan="2" style="border-right: 1px solid black;border-bottom: 1px solid black;">VERIFICACIÓN DE NIVEL DE<br>CONTENIDO ADECUADO</th>
                        <th colspan="2" style="border-right: 1px solid black;border-bottom: 1px solid black;">VERIFICACIÓN DE<br>CIERRE DE VALVULA</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">RESPONSABLE DE<br>VERIFICACIÓN</th>
                    </tr>
                    <tr style="border-bottom: 1px solid black;">
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;"></th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;"></th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">SI</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">NO</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">SI</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">NO</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">SI</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">NO</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">SI</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">NO</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;"></th>
                    </tr>
                    @foreach($datos as $dato)
                    <tr style="border-bottom: 1px solid black;">
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">CILINDRO DE<br>OXIGENO N° {{$dato->numeroCilindro}}</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$dato->fecha}}</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">@if($dato->fugas=='1') {{'x'}}@endif</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">@if($dato->fugas=='0') {{'x'}}@endif</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">@if($dato->abolladura=='1') {{'x'}}@endif</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">@if($dato->abolladura=='0') {{'x'}}@endif</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">@if($dato->nivelAdecuado=='1') {{'x'}}@endif</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">@if($dato->nivelAdecuado=='0') {{'x'}}@endif</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">@if($dato->cierreValvula=='1') {{'x'}}@endif</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">@if($dato->cierreValvula=='0') {{'x'}}@endif</th>
                        <th style="border-right: 1px solid black;border-bottom: 1px solid black;">{{$dato->nombres}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>