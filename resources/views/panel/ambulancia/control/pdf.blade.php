
<div style="width: 650px; height: 792px;background-color: white; margin: auto;">
    <table style="width: 100%;border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-top: 40px;">
        <tbody>
            <tr style="border-bottom: 1px solid black;">
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;"><img src="{{public_path('images/logo_caet.png')}}" width="80"></th>
                <th colspan="3" style="border-right: 1px solid black;border-bottom: 1px solid black;">CONTROL DIARIO DE AMBULANCIA</th>
            </tr>
            <tr style="border-bottom: 1px solid black;text-align:left;">
                <th colspan="2" style="border-right: 1px solid black;border-bottom: 1px solid black;padding: 0px 5px;">EMPRESA: {{$control->empresa}}</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;padding: 0px 5px;">PLACA: {{$control->placa}}</th>
                <th style="border-right: 1px solid black;border-bottom: 1px solid black;padding: 0px 5px;">SERVICIO: {{$control->servicios}}</th>
            </tr>
            <tr style="border-bottom: 1px solid black;text-align:left;">
                <th colspan="2" style="border-right: 1px solid black;border-bottom: 1px solid black;padding: 0px 5px;">INSPECCIONADO POR:<br> {{$control->inspector}}</th>
                <th colspan="2" style="border-right: 1px solid black;border-bottom: 1px solid black;padding: 0px 5px;">{{$control->razon}}</th>
            </tr>
        </tbody>
    </table>
    <div style="width:100%;margin-top:20px;">
        <table style="float:left;width:325px;border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-right: 19px">
            <thead>
                <tr style="border-bottom: 1px solid black;">
                    <th style="border-right: 1px solid black;border-bottom: 1px solid black;">ASPECTO A REVISAR EN EL <br>VEHICULO</th>
                    <th style="border-right: 1px solid black;border-bottom: 1px solid black;">B</th>
                    <th style="border-right: 1px solid black;border-bottom: 1px solid black;">M</th>
                    <th style="border-right: 1px solid black;border-bottom: 1px solid black;">NA</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">DOCUMENTACIÓN DEL VEHICULO</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Licencia de tránsito ( legible y disponible en el vehiculo )</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion1" value="B" @if($revision->opcion1 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion1" value="M" @if($revision->opcion1 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion1" value="NA" @if($revision->opcion1 == 'NA') {{'checked'}} @endif ></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">SOAT</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion2" value="B" @if($revision->opcion2 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion2" value="M" @if($revision->opcion2 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion2" value="NA" @if($revision->opcion2 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Seguro ( legible y disponible en el vehiculo ) </td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion3" value="B" @if($revision->opcion3 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion3" value="M" @if($revision->opcion3 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion3" value="NA" @if($revision->opcion3 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Revision tecnicomecanica y de gases ( legible y disponible en el vehiculo ) </td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion4" value="B" @if($revision->opcion4 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion4" value="M" @if($revision->opcion4 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion4" value="NA" @if($revision->opcion4 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">DOCUMENTACIÓN DEL CONDUCTOR</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Licencia de conducion ( legal y vigente )</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion5" value="B" @if($revision->opcion5 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion5" value="M" @if($revision->opcion5 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion5" value="NA" @if($revision->opcion5 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">EPS-ARP-AFP</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion6" value="B" @if($revision->opcion6 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion6" value="M" @if($revision->opcion6 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion6" value="NA" @if($revision->opcion6 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Certificado de manejo (vigente)</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion7" value="B" @if($revision->opcion7 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion7" value="M" @if($revision->opcion7 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion7" value="NA" @if($revision->opcion7 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">ESTADO MECANICO</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Niveles de fluido</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion8" value="B" @if($revision->opcion8 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion8" value="M" @if($revision->opcion8 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion8" value="NA" @if($revision->opcion8 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Estado y tensión de correas</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion9" value="B" @if($revision->opcion9 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion9" value="M" @if($revision->opcion9 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion9" value="NA" @if($revision->opcion9 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Estado y sujeción de las mangueras</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion10" value="B" @if($revision->opcion10 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion10" value="M" @if($revision->opcion10 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion10" value="NA" @if($revision->opcion10 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Fuga de fluidos</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion11" value="B" @if($revision->opcion11 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion11" value="M" @if($revision->opcion11 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion11" value="NA" @if($revision->opcion11 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Estado y sujeción de la bateria ( comes y cables )</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion12" value="B" @if($revision->opcion12 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion12" value="M" @if($revision->opcion12 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion12" value="NA" @if($revision->opcion12 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Freno de servicio</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion13" value="B" @if($revision->opcion13 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion13" value="M" @if($revision->opcion13 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion13" value="NA" @if($revision->opcion13 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Freno de emergencia</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion14" value="B" @if($revision->opcion14 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion14" value="M" @if($revision->opcion14 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion14" value="NA" @if($revision->opcion14 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Estado de suspensión</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion15" value="B" @if($revision->opcion15 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion15" value="M" @if($revision->opcion15 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion15" value="NA" @if($revision->opcion15 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">PARTE EXTERNA DEL VEHICULO</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Estado general de latoneria y pintura ( en buen estado, sin rayones, golpes)</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion16" value="B" @if($revision->opcion16 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion16" value="M" @if($revision->opcion16 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion16" value="NA" @if($revision->opcion16 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Puertas en buen estado (cierre y bloqueo)</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion17" value="B" @if($revision->opcion17 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion17" value="M" @if($revision->opcion17 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion17" value="NA" @if($revision->opcion17 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Espejo retroviso (izquiedo y derecho) sin roturas, manchas, bien ajustado</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion18" value="B" @if($revision->opcion18 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion18" value="M" @if($revision->opcion18 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion18" value="NA" @if($revision->opcion18 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Vidrio parabrisas/ vidrios ventanas(sin ropturas/ manchas/ distinciones/ no polarizadas)</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion19" value="B" @if($revision->opcion19 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion19" value="M" @if($revision->opcion19 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion19" value="NA" @if($revision->opcion19 == 'NA') {{'checked'}} @endif></td>
                </tr>
                
            </tbody>
        </table>
        <table style="float:left;width:325px;border-left: 1px solid black;border-top: 1px solid black; font-size:14px;">
            <tbody>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">ASPECTO A REVISAR EN EL VEHICULO</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">EQUIPO DE PREVENCION</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Gato, cruceta, Señales de carretera en forma de triangulo. Dos tacos para bloqueo, linterna de funcionamiento</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion34" value="B" @if($revision->opcion34 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion34" value="M" @if($revision->opcion34 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion34" value="NA" @if($revision->opcion34 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Botiquin del vehiculo, extintor</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion35" value="B" @if($revision->opcion35 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion35" value="M" @if($revision->opcion35 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion35" value="NA" @if($revision->opcion35 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Caja de herramientas (alicate, destornilladores, llave de expacion y fijas)</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion36" value="B" @if($revision->opcion36== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion36" value="M" @if($revision->opcion36== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion36" value="NA" @if($revision->opcion36== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Con mas de 5mm de laboratorio tip A/T</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion64" value="B" @if($revision->opcion64== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion64" value="M" @if($revision->opcion64== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion64" value="NA" @if($revision->opcion64== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Rines, pernos completos y ajustados</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion37" value="B" @if($revision->opcion37== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion37" value="M" @if($revision->opcion37== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion37" value="NA" @if($revision->opcion37== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Llantas de repuesto/ rin (en buen estado o inflada) con mas de 5mm de laborado tipo A/T</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion38" value="B" @if($revision->opcion38== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion38" value="M" @if($revision->opcion38== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion38" value="NA" @if($revision->opcion38== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">UNIDAD OPERATIVA</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Luces de emergencia</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion39" value="B" @if($revision->opcion39== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion39" value="M" @if($revision->opcion39== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion39" value="NA" @if($revision->opcion39== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Baliza delantera (luces led)</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion40" value="B" @if($revision->opcion40== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion40" value="M" @if($revision->opcion40== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion40" value="NA" @if($revision->opcion40== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Luces frontal intermitentes</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion41" value="B" @if($revision->opcion41== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion41" value="M" @if($revision->opcion41== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion41" value="NA" @if($revision->opcion41== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Luces laterales blancas</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion42" value="B" @if($revision->opcion42== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion42" value="M" @if($revision->opcion42== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion42" value="NA" @if($revision->opcion42== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Luces laterales rojas intermitentes</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion43" value="B" @if($revision->opcion43== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion43" value="M" @if($revision->opcion43== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion43" value="NA" @if($revision->opcion43== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Luces trasera intermitentes</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion44" value="B" @if($revision->opcion44== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion44" value="M" @if($revision->opcion44== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion44" value="NA" @if($revision->opcion44== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Exploradora antiniebla</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion45" value="B" @if($revision->opcion45== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion45" value="M" @if($revision->opcion45== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion45" value="NA" @if($revision->opcion45== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Baliza trasera</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion46" value="B" @if($revision->opcion46== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion46" value="M" @if($revision->opcion46== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion46" value="NA" @if($revision->opcion46== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">PARTE EXTERNA DE LA UNIDAD</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Puerta lateral (estado y cierre)</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion47" value="B" @if($revision->opcion47== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion47" value="M" @if($revision->opcion47== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion47" value="NA" @if($revision->opcion47== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Puerta trasera (estado y cierre)</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion48" value="B" @if($revision->opcion48== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion48" value="M" @if($revision->opcion48== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion48" value="NA" @if($revision->opcion48== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Estribo de acceso con piso deslizante</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion49" value="B" @if($revision->opcion49== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion49" value="M" @if($revision->opcion49== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion49" value="NA" @if($revision->opcion49== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">EQUIPO BASICO</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Balas centrales de oxigeno</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion50" value="B" @if($revision->opcion50== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion50" value="M" @if($revision->opcion50== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion50" value="NA" @if($revision->opcion50== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">camilla principal con bala de oxigeno portatil</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion51" value="B" @if($revision->opcion51== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion51" value="M" @if($revision->opcion51== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion51" value="NA" @if($revision->opcion51== 'NA') {{'checked'}} @endif></td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
<div class="page-break"></div>
<div style="width: 650px; height: 792px;background-color: white; margin: auto;">
    <div style="width:100%;">
        <table style="float:left;width:325px;border-left: 1px solid black;border-top: 1px solid black; font-size:14px;margin-right: 19px">
            <tbody>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">EQUIPO BASICO</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Tabla rigida</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion52" value="B" @if($revision->opcion52== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion52" value="M" @if($revision->opcion52== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion52" value="NA" @if($revision->opcion52== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Tabla de media espinal</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion53" value="B" @if($revision->opcion53== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion53" value="M" @if($revision->opcion53== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion53" value="NA" @if($revision->opcion53== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Lampara de luz fria</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion54" value="B" @if($revision->opcion54== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion54" value="M" @if($revision->opcion54== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion54" value="NA" @if($revision->opcion54== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Silla cabecera de paciente con cinturon de 3 puntos</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion55" value="B" @if($revision->opcion55== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion55" value="M" @if($revision->opcion55== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion55" value="NA" @if($revision->opcion55== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Gabinetes para insumos (quirurgicos circulatorio, respiratorio. pediatrico)</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion56" value="B" @if($revision->opcion56== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion56" value="M" @if($revision->opcion56== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion56" value="NA" @if($revision->opcion56== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Aspirador de secreciones</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion57" value="B" @if($revision->opcion57== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion57" value="M" @if($revision->opcion57== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion57" value="NA" @if($revision->opcion57== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Tablero y caja de sistema electrico</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion58" value="B" @if($revision->opcion58== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion58" value="M" @if($revision->opcion58== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion58" value="NA" @if($revision->opcion58== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Tomas de 12 voltios</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion59" value="B" @if($revision->opcion59== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion59" value="M" @if($revision->opcion59== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion59" value="NA" @if($revision->opcion59== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Caja de corrientes de luces externas</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion60" value="B" @if($revision->opcion60== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion60" value="M" @if($revision->opcion60== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion60" value="NA" @if($revision->opcion60== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Caja de control de tonos</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion61" value="B" @if($revision->opcion61== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion61" value="M" @if($revision->opcion61== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion61" value="NA" @if($revision->opcion61== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Aire acondicionada del vehiculo</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion62" value="B" @if($revision->opcion62== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion62" value="M" @if($revision->opcion62== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion62" value="NA" @if($revision->opcion62== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Extractor de olores</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion63" value="B" @if($revision->opcion63== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion63" value="M" @if($revision->opcion63== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion63" value="NA" @if($revision->opcion63== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">PARTE INTERNA DEL VEHICULO</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Cinturón de seguridad en todos los asientos</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion20" value="B" @if($revision->opcion20 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion20" value="M" @if($revision->opcion20 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion20" value="NA" @if($revision->opcion20 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Airbag</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion21" value="B" @if($revision->opcion21 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion21" value="M" @if($revision->opcion21 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion21" value="NA" @if($revision->opcion21 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Podios y mandos</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion22" value="B" @if($revision->opcion22 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion22" value="M" @if($revision->opcion22 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion22" value="NA" @if($revision->opcion22 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Pedales y mandos</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion23" value="B" @if($revision->opcion23 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion23" value="M" @if($revision->opcion23 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion23" value="NA" @if($revision->opcion23 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Indicadores de tableros</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion24" value="B" @if($revision->opcion24 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion24" value="M" @if($revision->opcion24 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion24" value="NA" @if($revision->opcion24 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Estado de tapiceria</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion25" value="B" @if($revision->opcion25 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion25" value="M" @if($revision->opcion25 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion25" value="NA" @if($revision->opcion25 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Luz de techo</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion26" value="B" @if($revision->opcion26 == 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion26" value="M" @if($revision->opcion26 == 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion26" value="NA" @if($revision->opcion26 == 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Parasoles sujeción y estado</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion27" value="B" @if($revision->opcion27== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion27" value="M" @if($revision->opcion27== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion27" value="NA" @if($revision->opcion27== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Aire acondicionado del vehiculo</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion28" value="B" @if($revision->opcion28== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion28" value="M" @if($revision->opcion28== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion28" value="NA" @if($revision->opcion28== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <th colspan="4" style="border-right: 1px solid black;border-bottom: 1px solid black;">LUCES DEL VEHICULO</th>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Frontales</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion29" value="B" @if($revision->opcion29== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion29" value="M" @if($revision->opcion29== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion29" value="NA" @if($revision->opcion29== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Direccionales delanteras y parqueo</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion30" value="B" @if($revision->opcion30== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion30" value="M" @if($revision->opcion30== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion30" value="NA" @if($revision->opcion30== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">Direccionales trasera y de parqueo</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion31" value="B" @if($revision->opcion31== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion31" value="M" @if($revision->opcion31== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion31" value="NA" @if($revision->opcion31== 'NA') {{'checked'}} @endif></td>
                </tr>
                
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">De stop y de señal trasera</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion32" value="B" @if($revision->opcion32== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion32" value="M" @if($revision->opcion32== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion32" value="NA" @if($revision->opcion32== 'NA') {{'checked'}} @endif></td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;">luz y alarma de reversa</td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion33" value="B" @if($revision->opcion33== 'B') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion33" value="M" @if($revision->opcion33== 'M') {{'checked'}} @endif></td>
                    <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><input type="radio" required name="opcion33" value="NA" @if($revision->opcion33== 'NA') {{'checked'}} @endif></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>