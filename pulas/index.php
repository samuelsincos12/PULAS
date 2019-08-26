<?php
 include 'func/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PULAS - Pesebaran Pusat Pelayanan Kesehatan di Pekanbaru</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link rel="icon" type="image/png" href="assets/img/hhh.png" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui-1.10.3.custom.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script type="text/javascript">
      function onReady(callback) {
          var intervalID = window.setInterval(checkReady, 300);
          function checkReady() {
              if (document.getElementsByTagName('body')[0] !== undefined) {
                  window.clearInterval(intervalID);
                  callback.call(this);
              }
          }
      }
      function show(id, value) {
          document.getElementById(id).style.display = value ? 'block' : 'none';
      }
      onReady(function () {
          show('home', true);
          show('cssload', false);
      });
    </script>
  </head>
  <body>
    <div id='cssload' style="background:url(assets/img/loading.gif) no-repeat center;background-color:#fff;width:100%;height:100%;position:fixed;left:0;top:0;z-index:3000;"></div>
    <!--Navigation bar-->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../pulas"><img src="assets/img/asa.png" width="35%"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#home" data-toggle="tooltip" title="Home"><i class="fa fa-home"></i>&nbsp; Home</a></li>
          <li><a href="cari" data-toggle="tooltip" title="Telusuri"><i class="fa fa-search"></i>&nbsp; Telusuri</a></li>
          <li><a href="lokasi_anda" data-toggle="tooltip" title="Terdekat"><i class="fa fa-map"></i>&nbsp; Terdekat</a></li>
          <li><a href="#kami" data-toggle="tooltip" title="Kontak"><i class="fa fa-phone"></i>&nbsp; Kontak</a></li>
        </ul>
        </div>
      </div>
    </nav>
    <!--/ Navigation bar-->
    <!--Banner-->
    <div id="home" class="banner">
      <div class="bg-color">
        <div class="container">
          <div class="row">
            <div class="banner-text text-center">
              <div class="text-border">
                <h2 class="text-dec"><img src="assets/img/asd.png" width="50%"></h2>
              </div>
              <div class="intro-para text-center quote">
                <p class="big-text">Pesebaran Pusat Pelayanan Kesehatan</p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="cta-2-form text-center">
                <form action="func/search" method="get" id="workshop-newsletter-form">
                  <input id="fruit" name="search" placeholder="Telusuri Disini" type="text" autocomplete="off">
                  <button class="cta-2-form-submit-btn"><i class="fa fa-search"></i></button>
                </form>
              </div>
            </div>
            <a href="#cari" class="mouse-hover" data-toggle="tooltip" title="Penelusuran Berdasarkan..."><div class="mouse"></div></a>
          </div>
        </div>
      </div>
    </div>
    <!--/ Banner-->
    <!--cari-->
    <section id ="cari" class="section-padding" style="background-color: rgb(247, 247, 247);">
          <img src="assets/img/spes.jpg" style="width: 100%;">
          <div class="container-fluid">
          <div class="row" style="padding: 0 0 50px 0;">
            <div class="header-section text-center">
              <h4 style="margin-bottom: 50px">Telusuri Berdasarkan Spesialis</h4>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari">
                    <img src="assets/img/semua.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=1">
                    <img src="assets/img/umum.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=2">
                    <img src="assets/img/gigi.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=3">
                    <img src="assets/img/mata.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=4">
                    <img src="assets/img/tht.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=5">
                    <img src="assets/img/jantung.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=6">
                    <img src="assets/img/kandungan.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=7">
                    <img src="assets/img/bedah.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=8">
                    <img src="assets/img/gizi.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=9">
                    <img src="assets/img/anak.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=10">
                    <img src="assets/img/penyakit-dalam.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=11">
                    <img src="assets/img/saraf.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=12">
                    <img src="assets/img/jiwa.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=13">
                    <img src="assets/img/ortopedi.png" style="width: 50%;">
                  </a>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <a href="cari/?spes=14">
                    <img src="assets/img/fisioterapi.png" style="width: 50%;">
                  </a>
                </div>
            </div>
          </div>
      </div>
    </section>
	
    <!--About-->
    <section id ="kami" class="sections-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center" style="margin:100px 0 200px 0;">
            <h2>Hubungi Kami</h2>
            <h4>Sampaikan Segala Keluhan, Pertanyaan dan Saran anda <br/>ke email atau nomor telepon kami di :</h4>
            <br><br>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h4><i class="fa fa-envelope fa-2x"></i></h4>
              <h5>support@pulas.com</h5>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <h4><i class="fa fa-phone fa-2x"></i></h4>
              <h5>+62 823 8509 1200</h5>
            </div>
          </div>
        </div>
      </div><br>
    </section>
    <!--/ About-->
    <!--Footer-->
    <footer id="footer" class="footer">
      <div class="container text-center">
        © 2017 PULAS. All rights reserved
      </div>
    </footer>
    <!--/ Footer-->
    <script src="assets/js/auto.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/contactform/contactform.js"></script>
  </body>
</html>