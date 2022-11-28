<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>REGITECH</title>
<!--Bootstrap-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/navbar.css')}}">


<!--Responsive-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
<!--Animation-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
<!--Prettyphoto-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prettyPhoto.css')}}">
<!--Font-Awesome-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
<!--Owl-Slider-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.transitions.css')}}">

</head>
<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
<!--Preloader-->
<div id="preloader">
  <div id="pre-status">
    <div class="preload-placeholder"></div>
  </div>
</div>
<!--Navigation-->
<div class="topnav">
  <a href="{{route('/')}}">
    <img src="{{asset('assets/images/logo/logoR.png')}}"  alt="">
  </a>
  <a href="{{route('etatCart')}}">
    <img src="{{asset('assets/images/logo/basket.png')}}" alt="">
    <span class="total"><?php if(Session::get('idP')!=null){ echo count(Session::get('idP')); } ?></span>
  </a> 
<!--      
    <form action="" style="float:right;">
       <input type="text">
     </form> -->
  </div>
<div id="container" style="margin-top:-2em;">
    <nav >
        <ul>
            <li><a href="{{route('/')}}" >Accueil</a></li>
            <?php 
               foreach($prod['modele'] as $mod){
                    if(isset($prod['active'])){
                        if($mod['id']==$prod['active']){
                            $active="active";
                        }else{
                            $active="";
                        }
                    }else{
                        $active="";
                    }
            ?>
               <li> 
                  <?php 
                    if($mod->config!=3){  
                  ?>
                        
                    <a href="#"  class="menu" id="<?php echo $active ?>">
                      {{$mod->modele}}
                    </a>  
                      <ul>
                        <?php foreach($prod['categorie'] as $menu){ 
                            if($mod->id==$menu->idmodele){ ?> 
                                <li><a href="{{route('/categorie',[$menu->idcategorie])}}"><?php echo $menu->categorie; ?></a></li>
                        <?php } } ?>
                      </ul>  
                  <?php } else{?>
                    <a href="{{route('/categ',[$mod->id])}}" class="menu" id="<?php echo $active ?>">
                      {{$mod->modele}}
                    </a>  
                  <?php } ?>
                </li>
            <?php } ?>
          
            <li><a href="{{route('contact')}}" class="menu">Contact</a></li>
        </ul>
    </nav>
 </div>


<section id="features" style="padding: 0;">
  <div class="container">
    <div class="col-md-9 ">
      <div class="heading">
        <h2 style="text-transform:none">Demande de devis  <span>Protection électrique</span></h2>
        <div class="line"></div>
        <p><span><strong></strong></span>texte concernant la demande </p>
      </div>
    </div>
      <div class="col-md-7 col-sm-6">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active feat-sec" id="tab-1">                  
            <form id="main-contact-form" name="contact-form" method="post" action="{{route('devisTemp',[$prod['produit'][0]['id'] ])}}">
              {{ csrf_field() }}
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label id="labelO"for="puissance">Puissance en VA</label>
                            <input type="number"  name="puissance" class="form-control" min=0  value="15000" required="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label id="labelO"for="rq">Materiel à protéger</label>
                          <input type="text" name="materiel" id="rq" class="form-control" value="ordinateur" required >
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label id="labelO"for="exampleFormControlSelect2">Frequence</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                  <option>basse</option>
                                  <option>haute</option>
                              </select>   
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label id="labelO"for="exampleFormControlSelect2">Phase</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Monophase</option>
                                  <option>Triphase</option>
                              </select>   
                          </div>
                      </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label id="labelO"for="rq">Remarques</label>
                            <textarea name="remarques" id="rq" class="form-control" rows="4" placeholder="Vos remarques" ></textarea>
                          </div>
                        </div>
                  </div>
                  <a class="btn-send col-md-6 " href="#tab-2" id="btn-valider" data-toggle="tab">Suivant</a>
              </div>
              <div role="tabpanel" class="tab-pane" id="tab-2">                  
                      <div class="row">
                          <div class="col-sm-6" style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Nom <span style="color:red;">*</span></label>
                                <input type="text"  name="nomClient" class="form-control" required="">
                            </div>
                          </div>
                          <div class="col-sm-6"  style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Email <span style="color:red;">*</span></label>
                                <input type="email"  name="emailClient" class="form-control" required="">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-6" style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Société <span style="color:red;"></span></label>
                                <input type="text"  name="societe" class="form-control" required="">
                            </div>
                          </div>
                          <div class="col-sm-6"  style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Activité <span style="color:red;"></span></label>
                                <input type="text"  name="activite" class="form-control" required="">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6" style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Tel <span style="color:red;">*</span></label>
                                <input type="text"  name="tel" class="form-control" placeholder="034 04 204 00" required="">
                            </div>
                          </div>
                          <div class="col-md-6"  style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Poste <span style="color:red;"></span></label>
                                <input type="text"  name="poste" class="form-control" required="">
                            </div>
                          </div>
                      </div>
                      <button class="btn-send col-md-10 col-sm-12 col-xs-12"type="submit" id="btn-valider">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
        <div class="col-md-5" style="float:right;">
                <section id="blog">
                   <div class="row" >
                        <div class="col-md-10 blog-sec" style="float:right;">
                          <div class="blog-info"> <img src="{{asset('assets/images/Blog/1.jpg')}}" class="img-responsive" alt="">
                            <div class="data-meta">
                              <h4>Jan</h4>
                              <strong>10</strong><br>
                              2020 </div>
                            <a href="#">
                            <h5>Evenement ou promotion</h5>
                            </a>
                            <!-- <ul class="blog-icon">
                              <li><i class="fa fa-pencil"></i><a href="#">
                                <h6>John</h6>
                                </a></li>
                              <li class="comment"><i class="fa fa-comment"></i><a href="#">
                                <h6>13</h6>
                                </a></li>
                            </ul> -->
                            <p>Description de l'evenement</p>
                            <a href="#" class="btn-blg">En savoir plus</a> 
                          </div>
                        </div>
                      </div>

                          <div class="col-md-10">
                           <a href="#tab-1" role="tab" data-toggle="tab" data-placement="top" title="Grand format"><i class="fa fa-th-large"></i></a>
                           <div class="tab-content">
   
                              <div role="tabpanel" class="tab-pane fade in active feat-sec" id="tab-1">
                                  <div class="row">
                                      <div class="col-md-6 tab">
                                        <!-- <h5>toggle</h5> -->
                                        <!-- <div class="line"></div> -->
                                        <div class="row">
                                          <div class="col-md-1"></div>
                                          <div class="col-md-6">
                                            <div class="clearfix"></div>
                                            <!-- <p class="feat-sec">Text description catégorie<br>
                                            </p>
                                            <p class="feat-sec-1">Paragraphe 2  raha misy </p> -->
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                      <div class="col-md-6 tab-img" id="division">
                                        <a href="{{route('/')}}">
                                          <img src="{{asset('')}}" class="img-responsive" alt="">
                                        </a>
                                      </div>
                                      </div>
                          </div>

                    </div>
                </section>
          </div>
  </div>
</section>
<footer id="footer">
</footer>
<footer id="footer-down">
  <!-- <h2>Suivez-nous sur</h2>
  <ul class="social-icon">
    <li class="facebook hvr-pulse"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
    <li class="twitter hvr-pulse"><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li class="linkedin hvr-pulse"><a href="#"><i class="fa fa-linkedin"></i></a></li>
    <li class="google-plus hvr-pulse"><a href="#"><i class="fa fa-google-plus"></i></a></li>
    <li class="youtube hvr-pulse"><a href="#"><i class="fa fa-youtube"></i></a></li>
    <li class="instagram hvr-pulse"><a href="#"><i class="fa fa-instagram"></i></a></li>
    <li class="behance hvr-pulse"><a href="#"><i class="fa fa-behance"></i></a></li>
  </ul> -->
  <p> &copy; Copyright 2021 REGITECH  </p>
</footer>
<!--Jquery-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
<!--Boostrap-Jquery-->
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.js')}}"></script>
<!--Preetyphoto-Jquery-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.prettyPhoto.js')}}"></script>
<!--NiceScroll-Jquery-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.nicescroll.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/waypoints.min.js')}}"></script>
<!--Isotopes-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.isotope.js')}}"></script>
<!--Wow-Jquery-->
<script type="text/javascript" src="{{ asset('assets/js/wow.js')}}"></script>
<!--Count-Jquey-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.inview.min.js')}}"></script>
<!--Owl-Crousels-Jqury-->
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.js')}}"></script>
<!--Main-Scripts-->
<script type="text/javascript" src="{{ asset('assets/js/script.js')}}"></script>
<script type="text/javascript">
function submitForm(){
      document.checkPass.submit();
    
  }
</script>
</body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
