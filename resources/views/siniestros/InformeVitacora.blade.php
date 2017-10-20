 <html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Vitacora Llamada</title>
    <style>
      @page {size: A4;margin-top: 30px;margin-top: 150px; margin-right: 40px;margin-left: 25px; margin-bottom: 35px;}

      #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; text-align: center; margin-top: 0px; }
      #footer { position: fixed; left: 0px; bottom: 10px; right: 0px; height: 30px; }
      #footer .page:after { content: counter(page, upper-number); }

      .logo {
        text-align: left;
        vertical-align: top;
        margin-top: 30px;
        margin-bottom: 0;
      }
      .logo img {
        height: 124px;
      }
      .hed {
        padding: 0px 0;
        border-top: 1px solid #AAAAAA;
      }
      .box{
        padding: 11px;
        margin-bottom: 15px;
        border: 1px solid #000;

      }

      .box-main{
        padding-left:  11px;
        padding-right:   11px;
        padding-bottom: 11px;
        margin-bottom: 15px;
        margin-top: 0px;
        padding-top:   0px;

      }
      .bold{
        font-weight: bold;
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

      .table tr td{
          border: 1px solid #000; /* cceeff*/
      }

      td {
        font-size: 100%;   /*siz de la letra*/
        font-family: Helvetica;
        height: 20px;
      }
      h1  {
        color: #808080;
      }
      h2  {
        color: #808080;
      }
      .first-letter:first-letter {  
          text-transform: lowercase !important;
      }

    </style>

  </head>
<body>

 <!--  <div id="header">
    <table >
      <tr>
        <td class="logo"><img src="img/informe/header.jpg" ></td>
        <td>
        </td>
      </tr>
    </table>
  </div> -->
   <!-- FOOTER -->
  <div id="footer"  >
    <table>
        <tr>
          <!-- <td><img src="img/informe/footer_rc.jpg" style="padding-top: 0px;"  width="470"  ></td>  -->
          <!-- <td><p class="back_page"><p class="page" style="font-size: 13px;"></p></p> -->
          </td>
        </tr>
    </table>
  </div>
  <div id="content" style="padding-top: -40px;">
  
  <div id="content">
    <div class="box-main">
            
          <div class="box">
              <table class="first" style="margin-left: 10px;">
                  <tr>
                      <td style="padding-left: 9px; margin-bottom: 0px;" class="bold border-table" width="170">N° AJUSTE</td>
                      <td width="10" style="text-align:center; padding-left:4px; padding-right: 4px;">:</td>
                      <td style="padding-left:4px;">{{$caso->num_ajuste}}</td>
                  </tr>
                  <tr>
                      <td style="padding-left: 9px;" class="bold border-table">CIA SEGUROS</td>
                      <td style="text-align:center; padding-left:4px; padding-right: 4px;">:</td>
                      <td style="padding-left:4px;">{{$caso->Cia->nombre_comercial}}</td>
                  </tr>
                  <tr>
                      <td style="padding-left: 9px;" class="bold border-table">ASEGURADO</td>
                      <td style="text-align:center; padding-left:4px; padding-right: 4px;">:</td>
                      <td style="padding-left:4px;">{{$caso->asegurado_name}}</td>
                  </tr>
                  <tr>
                      <td style="padding-left: 9px;" class="bold border-table">FECHA SINIESTRO</td>
                     <td style="text-align:center; padding-left:4px; padding-right: 4px;">:</td>
                      <td style="padding-left:4px;">@if($caso->fecha_siniestro !== null) {{date('d/m/Y',strtotime($caso->fecha_siniestro))}} @endif</td>
                  </tr>
                  <tr>
                      <td style="padding-left: 9px;" class="bold border-table">N° DE SINIESTRO</td>
                      <td style="text-align:center; padding-left:4px; padding-right: 4px;">:</td>
                      <td style="padding-left:4px;">{{$caso->num_siniestro_cia}}</td>
                  </tr> 
                  <tr>
                      <td style="padding-left: 9px;" class="bold border-table">EJECUTIVO</td>
                      <td style="text-align:center; padding-left:4px; padding-right: 4px;">:</td>
                      <td style="padding-left:4px;">{{$caso->ejecutivo_broker_name}}</td>
                  </tr> 
                  <tr>
                      <td style="padding-left: 9px;" class="bold border-table">RAMO</td>
                      <td style="text-align:center; padding-left:4px; padding-right: 4px;">:</td>
                      <td style="padding-left:4px;">{{$caso->Ramo->description}}</td>
                  </tr> 
              </table>
              <br>
              <h2 style="text-align: center; color: #000;">HOJA DE CONTROL</h2>

              <h3 style="color: #000; padding-left: 22px;">GASTOS:</h3>
              <table style="margin-left: 10px;" class="table" >
                  <tr>
                    <td style="padding-left: 9px; text-align: center;" class="bold">N°</td>
                    <td style="padding-left: 9px; text-align: center;" class="bold">FECHA</td>
                    <td style="padding-left: 9px; text-align: center;" class="bold">COMENTARIO</td>
                    <td style="padding-left: 9px; text-align: center;" class="bold">MONTO</td>
                    <td style="padding-left: 9px; text-align: center;" class="bold">FIRMA</td> 
                  </tr>
                  <?php $sw = 1; ?> <?php $con = 1; ?> 

                  @foreach($vitacoraGastos as $val) 
                    <?php $cant = $vitacoraGastos->where('num_group',$val->num_group)->count() ?>
                      <tr>
                        <td style="padding-left: 9px; text-align: center;">{{$sw}}</td>
                        <td style="padding-left: 9px; text-align: center;">{{date('d/m/Y',strtotime($val->fecha))}}</td>
                        <td style="padding-left: 9px; text-align: center;">{{$val->concepto}}</td>
                        <td style="padding-left: 9px; text-align: center;">{{number_format($val->importe,2)}}</td>
                        <td style="padding-left: 9px; text-align: center;"></td>
                      </tr>
                    @if($con==$cant)
                      <tr>
                        <td></td>
                        <td></td>
                        <td style="padding-left: 9px; text-align: center; background: #e6e6e6;" class="bold">Total</td>
                        <td style="padding-left: 9px; text-align: center; background: #e6e6e6;" class="bold">{{number_format($vitacoraGastos->where('num_group',$val->num_group)->sum('importe'),2)}}</td>
                        <td></td>
                      </tr>
                      <?php $con = 0;?>
                    @endif
                    <?php $con++ ?><?php $sw++ ?>
                  @endforeach
              </table>
              <br>
          </div>
    </div>
  </div>
</div>

</body>
</html>