<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Informe General</title>
    <style>
      @page {size: A4;margin-top: 30px;margin-top: 210px; margin-right: 40px;margin-left: 40px; margin-bottom: 35px;}

      #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; text-align: center; margin-top: 0px; }
      #footer { position: fixed; left: 0px; bottom: 10px; right: 0px; height: 30px;}
      #footer .page:after { content: counter(page, upper-number); }
      .logo {
        text-align: left;
        vertical-align: top;
        margin-top: 30px;
        margin-bottom: 0;
      }
      .logo img {
        height: 100px;
      }
      .hed {
        padding: 0px 0;
        border-top: 1px solid #AAAAAA;
      }
      .box{
        padding: 11px;
        margin-bottom: 15px;
      }
      .bold{
        font-weight: bold;
      }
      .astast td{
         border: 1px solid #000000;
         padding: 4px;
      }
      body { 
        writing-mode: tb-rl;
        position: relative;      
        margin: 0 auto;
        width: 18cm;  
        height: 29.7cm; 
        color: #000000;
        background: #FFFFFF; 
        font-size: 10px; 
        font-family: Impact, Charcoal, sans-serif;
        
      }
      
       .p-class{
        font-size: 100%;   /*siz de la letra*/
        font-family: Helvetica;
        height: 45px;
      } 

      table {
        width: 100%;
        /*border-collapse: collapse;*/
        border-spacing: -1px;
        margin-bottom: 0px;
      }

      .tabletr tr td{
          border: 1px solid #ddd; /* cceeff*/
      }


      .table tr td{
           }
          /*cceeff*/

      td {
        font-size: 100%;   /*siz de la letra*/
        font-family: Helvetica;
        height: 35px;
      }
      h2  {
        color: #808080;
      }
      h1  {
        color: #808080;
      }

    </style>
  </head>
<body>
  <!-- HEADER -->
  <div id="header">
    <table class="new">
      <tr>
        <td class="logo"><img src="img/informe/hoja.jpg" ></td>
        <td>
        </td>
      </tr>
    </table>
  </div>

  <!-- CONTENT -->
  <div id="content" style="padding-top: -85px; margin-left: -40px;">
          <div id="content" style="margin-top: -55px;">
            <div class="box">
                <div class="box">
                  <br><br>
                  <center> <b style="font-size: 25px;">P&C {{$caso->num_ajuste}}</b></center>
                  <center> <b style="font-size: 25px;">{{$caso->asegurado_name}}</b></center>

                    <table class="first table" style="margin-left: 2px;">
                        <tr>
                            <td style="font-size: 18px; padding-left: 200px;"><b>CIA : </b>{{$caso->Cia->nombre_comercial}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px; padding-left: 200px;"><b>EJECUTIVO : </b> {{$caso->ejecutivo_aseguradora_name}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px; padding-left: 200px;"><b>POLIZA : </b>@isset($caso->TipoPoliza->description){{$caso->TipoPoliza->description}}@endisset</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px; padding-left: 200px;"><b>SINIESTRO : </b> @isset($caso->TipoSiniestro->description){{$caso->TipoSiniestro->description}}@endisset</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px; padding-left: 200px;"><b>FECHA SINIESTRO : </b> @isset($caso->fecha_siniestro) {{date('d/m/Y',strtotime($caso->fecha_siniestro))}} @endisset</td>
                        </tr>
                        <tr>
                            <td style="font-size: 18px; padding-left: 200px;"><b>N° SINIESTRO :</b> @isset($caso->num_siniestro_cia) {{$caso->num_siniestro_cia}} @endisset</td>
                        </tr>
                        @if($caso->ramo_id == 1)
 
                        <tr>
                            <td style="font-size: 18px; padding-left: 200px;"><!-- Tercero Afectado:  <br>-->
                            @if(count($caso->TercerAfectado)>0)
                            <b>TERCERO AFECTADO : </b>
                              @foreach($caso->TercerAfectado as $val)
                              <br>
                                {{$val->quien_reclama}}
                              @endforeach 
                            @endif</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
          </div>
  </div>
</body>
</html>