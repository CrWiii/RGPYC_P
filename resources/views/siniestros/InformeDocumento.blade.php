 <html lang="es">
 <head>
  <meta charset="utf-8">
  <title>Informe General</title>
  <style>
    @page {size: A4;margin-top: 30px;margin-top: 210px; margin-right: 40px;margin-left: 25px; margin-bottom: 35px;}

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
      padding-left: 11px;
      margin-bottom: 15px;
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
    font-size: 15px; 
    font-family: Impact, Charcoal, sans-serif;
  }

  .p-class{
    font-size: 15px;  /*siz de la letra*/
    font-family: arial;
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

  td {
    font-size: 15px;  /*siz de la letra*/
    font-family: Helvetica;
    height: 20px;
  }

  h1{
    color: #808080;
  }

  h2{
    color: #808080;
  }

  .page-break {
    page-break-after: always;
  }

  #container {
    display: table;
  }

  #row  {
    display: table-row;
  }

  #left, #right, #middle {
    display: table-cell;
  }

</style>
</head>
<body>

  <div id="header">
    <table >
      <tr>
        <td class="logo"><img src="img/informe/header.jpg" ></td>
        <td>
        </td>
      </tr>
    </table>
  </div>
  <!-- SOLO INFORME BASICO -->
      <?php $info = $caso->Informe->where('tipo_informe_id',1)->first(); ?>
  <!-- FOOTER -->
  <div id="footer">
    <table>
      <tr>
        <td width="5" style="padding-top: 7px;"><img src="img/informe/footer_rc.jpg" style="padding-top: 0px; position:absolute; top:-20px; bottom: 10px"  height="100"> </td>
        <td style="font-size: 9; padding-left: 135px;"> </td>
        <td style="text-align: right; padding-top: 15px;"><p class="back_page"><p class="page" style="font-size: 13px;">Pag. </p></p></td>
      </tr>
    </table>
  </div>
  <div id="content" style="padding-top: -65px; margin-left: 10px;">
    <div class="">
      <div style="font-size: 15px; padding-left: 32px; margin-left: 10px;" >
        <p style="padding-bottom: -10px;"><label style="padding-left: 440px;">N° Carta :{{$caso->num_ajuste}}-0{{$info->DocumentoGenerado()->where('tipo_doc_generado',1)->max('num_carta')}}@empty($info->DocumentoGenerado()->where('tipo_doc_generado',1)->max('num_carta')){{1}}@endempty</label></p> 
        <p><label style="padding-left: 440px;">Lima, {{date('d/m/Y')}}</label></p>
      </div>
    </div>

<!-- 
    @isset($info->DocumentoGenerado()->first()->num_carta)
    <h1>{{$info->DocumentoGenerado()->max('num_carta')}}</h1>
    @endisset -->

 

    <div id="content">
      <div class="box-main">

        <div class="box" style="margin-left: 5px;">
          <table class="first table" style="margin-left: 10px;" >
            <tr>
              <td class="border-table" width="190">Señores</td>
              <td width="10" style="text-align:center; padding-left:4px; padding-right: 4px;"></td>
              <td style="padding-left:5px;"></td>
            </tr>
            <tr>
              <td class="border-table"><b>{{$caso->Broker->description}}</b></td>
              <td width="10" style="text-align:center; padding-left:4px; padding-right: 4px;"></td>
              <td style="padding-left:5px;"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr> 
          </table>
        </div>

        <div class="box" style="margin-left: 5px;">
            <table class="first table" style="margin-left: 10px;">
              <tr>
                <td class="border-table" width="70">Atención</td>
                <td width="10" style="text-align:center; padding-left:4px; padding-right: 4px;">:</td>
                <td style="padding-left:5px; text-transform: capitalize; "><ins>SR. {{$caso->ejecutivo_aseguradora_name}}</ins></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="border-table">Referencia</td>
                <td width="10" style="text-align:center; padding-left:4px; padding-right: 4px;">:</td>
                <td style="padding-left:5px;"><b>{{$caso->asegurado_name}}</b></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                  <table>
                    <tr>
                       <td style="padding-left:5px;">N° Poliza : {{$caso->num_poliza}}</td>
                    </tr>
                    <tr>
                       <td style="padding-left:5px;">N° Siniestro Aseguradora: {{$caso->num_siniestro_cia}} </td>
                    </tr>
                    <tr>
                       <td style="padding-left:5px;">N° Siniestro Broker: {{$caso->num_siniestro_broker}} </td>
                    </tr>
                    <tr>
                       <td style="padding-left:5px;">Reclamo : {{$caso->TipoSiniestro->description}} </td>
                    </tr>
                    <tr>
                       <td style="padding-left:5px;">Fecha de Ocurrencia : {{date('d/m/Y',strtotime($caso->fecha_siniestro))}} </td>
                    </tr>
                    <!-- <tr>
                       <td style="padding-left:5px;">Tipo de Poliza N° : {{$caso->Ramo->description}}</td>
                    </tr> -->
                    <tr>
                      <td style="padding-left:5px;"><ins>Ajuste : {{$caso->num_ajuste}}</ins></td>
                    </tr>
                    <tr>
                      <td style="padding-left:5px;">Solicitud de Documentos</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
        </div>

        <p style="font-size: 15px; padding-left: 30px;">Estimados Señores</p> 
        <p style="font-size: 15px; padding-left: 30px; padding-bottom: -11px;" align="justify">Con el fin de proceder al análisis del reclamo indicado en referencia, mucho les agradeceremos se sirvan alcanzarnos a la brevedad, los documentos detallados a continuación:</p> <br>

        <?php $sw = 1; ?> 
        <div>
           @foreach($caso->Informe as $inf)@foreach($inf->Documento as $doc)<div style="padding-left: 30px;">{{$sw}}. 
           {{ $doc->title }} @foreach($documentsSelected as $documSel)@if($doc->id == $documSel->documento_id) @isset($documSel->extra) :</div>  @endisset <div style="padding-left: 47px;" align="justify"> {{$documSel->extra}} </div> @endif @endforeach<br> <?php $sw++ ?>
             @endforeach
          @endforeach
        </div>

        <div style="page-break-inside: avoid;">
          <p style="font-size: 15px; padding-left: 30px;" align="justify">Finalmente, cabe destacar que, si como consecuencia del estudio de la documentacion entregada se desprendiera la necesidad de requerir nueva documentación y/o información, ésta deberá entenderse como un requerimiento que fue parte de la solicitud primigenia.</p>
        </div>

          <br>
          <p style="font-size: 15px; padding-left: 30px;">Atentos a sus noticias, aprovechamos la oportunidad para saludarlos.</p>
          <br>
          <p style="font-size: 15px; padding-left: 30px;">Atentamente,</p>

          <p style="font-size: 15px; padding-left: 30px;">{{$Ajustador->search}}<br><b style="font-size: 15px;">{{$Ajustador->cargo}}</b></p>
          

           <!-- <div id="container">
              <div id="row">
                <div id="left">
                  <p>noticias</p>
                  <p>Atentamente</p>
                  <p>noticias</p>
                  <p>Atentamente</p>
                </div>
              </div>
            </div> -->
          <!-- 
          <h1>Page 1</h1>
          <div class="page-break"></div>
          <h1>Page 2</h1>

          <p style="font-size: 15px; padding-left: 30px;">Estimados Señores</p> 
          <p style="font-size: 15px; padding-left: 30px;" align="justify">Con el fin de proceder al análisis del reclamo indicado en referencia, mucho les agradeceremos se sirvan alcanzarnos a la brevedad, los documentos detallados a continuación:</p><?php $sw = 1; ?> 
          <p style="font-size: 15px; padding-left: 30px;">@foreach($caso->Informe as $inf)
          @foreach($inf->Documento as $doc)<label style="text-transform: uppercase !important;">{{$sw}}.{{ str_limit($doc->title , $limit = 1, $end = '') }}</label><label style="text-transform: lowercase !important;">{{substr($doc->title, 1)}}</label>@foreach($documentsSelected as $documSel)@if($doc->id == $documSel->documento_id) @isset($documSel->extra) : @endisset {{$documSel->extra}}  @endif @endforeach<br> <?php $sw ?> @endforeach @endforeach </p>
          <br> 
        -->
      </div>
    </div>
  </div>

</body>
</html>