<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Activación usuario</title>
  <!-- Designed by https://github.com/kaytcat -->
  <!-- Header image designed by Freepik.com -->
  <style type="text/css">
  .ggi{
    background-color:#f5774e;
    color:#ffffff;
    display:inline-block;
    font-family:'Source Sans Pro', Helvetica, Arial, sans-serif;
    font-size:18px;
    font-weight:400;
    text-align:center;text-decoration:none;width:180px;-webkit-text-size-adjust:none;
    }
  /* Take care of image borders and formatting */
  img { max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
  a img { border: none; }
  table { border-collapse: collapse !important; }
  #outlook a { padding:0; }
  .ReadMsgBody { width: 100%; }
  .ExternalClass {width:100%;}
  .backgroundTable {margin:0 auto; padding:0; width:100% !important;}
  table td {border-collapse: collapse;}
  .ExternalClass * {line-height: 115%;}
  td {font-family: Arial, sans-serif;}
  body {-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width: 100%;height: 100%;color: #6f6f6f;font-weight: 400;font-size: 18px;}
  h1 {margin: 10px 0;}
  a {color: #0076bc;text-decoration: none;}
  .force-full-width {width: 100% !important;}
  .body-padding {padding: 0 45px;}
  </style>

  <style type="text/css" media="screen">
      @media screen {
        @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,900);
        * {font-family: 'Source Sans Pro', 'Helvetica Neue', 'Arial', 'sans-serif' !important;}
        .w280 {width: 280px !important;}
      }
  </style>

  <style type="text/css" media="only screen and (max-width: 480px)">
    /* Mobile styles */
    @media only screen and (max-width: 480px) {
      table[class*="w320"] {width: 320px !important;}
      td[class*="w320"] {width: 280px !important;padding-left: 20px !important;padding-right: 20px !important;}
      img[class*="w320"] {width: 250px !important;}
      td[class*="mobile-spacing"] {padding-top: 10px !important;padding-bottom: 10px !important;}
      *[class*="mobile-hide"] {display: none !important;}
      *[class*="mobile-br"] {font-size: 12px !important;}
      td[class*="mobile-w20"] {width: 20px !important;}
      img[class*="mobile-w20"] {width: 20px !important;}
      td[class*="mobile-center"] {text-align: center !important;}
      table[class*="w100p"] {width: 100% !important;}
      td[class*="activate-now"] {padding-right: 0 !important;padding-top: 20px !important;}
    }
  </style>
</head>
<body  offset="0" class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
  <tr>
    <td align="center" valign="top" style="background-color:#ffffff" width="100%">
    <center>
      <table cellspacing="0" cellpadding="0" width="600" class="w320">
        <tr>
          <td align="center" valign="top">
          <table style="margin:0 auto;" cellspacing="0" cellpadding="0" width="100%">
            <tr>
              <td style="text-align: center;">
                <a href="#"><img class="w320" width="311" src="{{asset('img/logo.jpg')}}" alt="company logo" style="padding-top: 20px;" ></a>
              </td>
            </tr>
          </table>
          <table cellspacing="0" cellpadding="0" width="100%" style="background-color:#0076bc;">
            <tr>
              <td style="background-color:#0076bc;">
                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td style="font-size:40px; font-weight: 600; color: #ffffff; text-align:center;" class="mobile-spacing">
                    <div class="mobile-br">&nbsp;</div>
                      Hola {{$usuario->Persona->nombres}} {{$usuario->Persona->apellido_paterno}},
                    <br>
                    <div class="mobile-br">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size:24px; text-align:center; padding: 0 75px; color:#6f6f6f;" class="w320 mobile-spacing">
                    </td>
                  </tr>
                </table>
                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td>
                      <!--<img src="https://www.filepicker.io/api/file/4BgENLefRVCrgMGTAENj" style="max-width:100%; display:block;">-->
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" >
            <tr>
              <td style="background-color:#ffffff;">
              <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                  <td style="text-align:center;" class="mobile-center body-padding w320">
                  <br>
                    Se le ha habilitado acceso al portal SR2 <br>
                    Para tu referencia, tu usuario es tu email: <strong style="font-size: 1.1em">{{$usuario->email}}</strong><br>
                    Su cuenta fue registrada y aprobada con exito ahora solo falta activarla y fijar su contraseña en el siguiente enlace: 
              </table>
              <table style="margin:0 auto;" cellspacing="0" cellpadding="10" width="100%">
                <tr>
                  <td style="text-align:center; margin:0 auto;">
                    <div>
                          <a href="{{URL::to('ActivarUsuario', array('email' => $usuario->email))}}" class="ggi">Activar Usuario</a>
                    </div>
                    <br>
                  </td>
                </tr>
              </table>
              <table cellspacing="0" cellpadding="0" bgcolor="#363636"  class="force-full-width">
                <tr>
                  <td style="background-color:#363636; text-align:center;">
                  <br>
                  <!--
                    <img width="62" height="56" img src="https://www.filepicker.io/api/file/FjkhDKXsTFyaHnXhhBCw">
                    <img width="68" height="56" src="https://www.filepicker.io/api/file/W6gXqm5BRL6qSvQRcI7u">
                    <img width="61" height="56" src="https://www.filepicker.io/api/file/eV9YfQkBTiaOu9PA9gxv">
                    -->
                  </td>
                </tr>
                <tr>
                  <td style="color:#f0f0f0; font-size: 14px; text-align:center; padding-bottom:4px;">
                    ACMETIC © 2017 All Rights Reserved
                  </td>
                </tr>
                <tr>
                  <td style="color:#27aa90; font-size: 14px; text-align:center;">
                   <!-- <a href="#">View in browser</a> | <a href="#">Contact</a> | <a href="#">Unsubscribe</a>-->
                  </td>
                </tr>
                <tr>
                  <td style="font-size:12px;">
                    &nbsp;
                  </td>
                </tr>
              </table>
              </td>
            </tr>
          </table>
          </td>
        </tr>
      </table>
    </center>
    </td>
  </tr>
</table>
</body>
</html>
