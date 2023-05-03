<?php
    include_once '../Model/commande.php';
    include_once '../Controller/commandeC.php';

    

    $error = "";

    // create commande
    $commande = NULL;

    // create an instance of the controller
    $commandeC = new commandeC();
      if (
                //isset($_POST["idCom"]) &&
                isset($_POST["nom"]) &&
		        isset($_POST["telephone"]) && 
                isset($_POST["adresse"]) && 
                isset($_POST["prix"])
    ) {
        if (
                    //!empty($_POST['idCom']) &&
                    !empty($_POST['nom']) &&
			        !empty($_POST["telephone"]) && 
                    !empty($_POST["adresse"]) && 
                    !empty($_POST["prix"])
        ) {
            $commande = new commande(
                        //$_POST['idCom'],
                        $_POST['nom'],
				        $_POST['telephone'],
                        $_POST["adresse"],
                        $_POST['prix']
            );
            $commandeC->ajoutercommande($commande);
            header('Location:affichercommande.php');
        }
        else
            $error = "Missing information";
    }

?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Contact</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <script type="text/javascript" src="script.js" ></script>
    
<link rel="stylesheet" href="Contact.css" media="screen">

    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <!-- 
    <meta name="generator" content="Nicepage 4.8.2, nicepage.com">
  -->
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "W.png",
		"sameAs": []
}</script>


    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Contact">
    <meta property="og:type" content="website">
    
  </head>
  <body class="u-body u-xl-mode"><header class="u-clearfix u-header u-header" id="sec-8fd7"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="." class="u-image u-logo u-image-1" data-image-width="500" data-image-height="500">
          <img src="W.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 44px 20px;">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#" style="padding: 44px 20px;">Offers</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.html" style="padding: 44px 20px;">Contact</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Accueil.html">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">Offers</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.php">Contact</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <a href="https://nicepage.com/c/contact-form-html-templates" class="u-border-2 u-border-black u-btn u-btn-round u-button-style u-hover-black u-none u-radius-50 u-text-hover-white u-btn-1">login</a><!--shopping_cart-->
        <!--<a class="u-shopping-cart u-shopping-cart-1" href="#"><span class="u-icon u-shopping-cart-icon"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-c8ab"></use></svg><svg class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-c8ab"><path d="M14.5,3l-2.1,5H6.1L5.9,7.6L4,3H14.5 M0,0v1h2.1L5,8l-2,4h11v-1H4.6l1-2H13l3-7H3.6L2.8,0H0z M12.5,13
	c-0.8,0-1.5,0.7-1.5,1.5s0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5S13.3,13,12.5,13L12.5,13z M4.5,13C3.7,13,3,13.7,3,14.5S3.7,16,4.5,16
	S6,15.3,6,14.5S5.3,13,4.5,13L4.5,13z"></path></svg>
        <span class="u-black u-icon-circle u-shopping-cart-count" style="font-size: 0.75rem;"><!--shopping_cart_count-->2<!--/shopping_cart_count--></span>
    </span>
        </a>
      </div></header> 
      <section class="u-clearfix u-section-1" id="sec-bba5">
        <div class="u-clearfix u-sheet u-sheet-1">
          <div class="u-expanded-width u-list u-list-1">
            <div class="u-repeater u-repeater-1">
              <div class="u-container-style u-list-item u-repeater-item">
                <div class="u-container-layout u-similar-container u-container-layout-1">
                  
                 
                </div>
              </div>
              <div class="u-container-style u-list-item u-repeater-item">
                <div class="u-container-layout u-similar-container u-container-layout-2">
                 
                   
                </div>
              </div>
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-2"> 
                
                
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="u-clearfix u-palette-5-dark-1 u-section-1" id="sec-6473">
        <div class="u-align-left u-clearfix u-sheet u-sheet-1"></div>
      <div class="col-lg-4">
          <div class="commande-info">
            
              <div id="error">
            
        </div>
        
        <form name="Form" id="Form" onclick="return validateForm(event)" action=""  method="POST">
        <table border="1" align="center">
            
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom" id="nom"></td>
            </tr>
            <p style="color: red;" id="errornom"></p>
            <tr>
                <td>Telephone</td>
                <td><input type="number" name="telephone" id="telephone"></td>
            </tr>
            <p style="color: red;" id="errortelephone"></p>
            <tr>
                <td>Adresse</td>
                <td><input type="text" name="adresse" id="adresse"></td>
            </tr>
            <p style="color: red;" id="erroradresse"></p>
            <tr>
                <td>Prix</td>
                <td><input type="number" name="prix" id="prix"></td>
            </tr>
            <p style="color: red;" id="errorprix"></p>
            <tr>
                
                <td><input type="submit" name="Ajouter" value="Passer la commande">
                </td>
                <td>
                        <input type="reset" value="Annuler" >
                    </td>
            </tr>
            
        </table>
        
    </form>
          </div>
      </div>

      </section>
      <hr>
      <section class="u-clearfix u-palette-5-dark-1 u-section-1" id="sec-6473">
        <div class="u-align-left u-clearfix u-sheet u-sheet-1"></div>
      <div class="col-lg-4">
          <div class="commande-info">
          <br>
            <center> <font size="5"><strong>Chat with us</strong></font></center> 
            <center> <font size="6"></font>You can get an answer to frequently asked questions by chatting with our virtual assistant <br>by Email to FitZone@gmail.com, available 24/7.<br>
                
              During the detailed opening hours, he can also redirect you to one of our agents if you need additional help.
            </center>
            <br>
            <center> <font size="5"><strong> Call us</strong> </font></center>
                    <center><br>Here is the fastest way to reach us<br>
                    +216 70 310 310 (free number)</center>
              
              <div id="error11">
           
        </div>
        
          </div>
      </div>

      </section>
     
    
    <footer class="u-align-center-sm u-align-center-xs u-clearfix u-footer u-grey-80" id="sec-4c85"><div class="u-clearfix u-sheet u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-100 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-style u-layout-cell u-size-28 u-layout-cell-1">
                <div class="u-container-layout u-valign-top u-container-layout-1"><!--position-->
                  <div data-position="" class="u-position"><!--block-->
                    <div class="u-block">
                      <div class="u-block-container u-clearfix"><!--block_header-->
                        <h5 class="u-block-header u-text u-text-1"><!--block_header_content-->about us<!--/block_header_content--></h5><!--/block_header--><!--block_content-->
                        <div class="u-block-content u-text"><!--block_content_content-->
                          <br>.......... <!--/block_content_content-->
                        </div><!--/block_content-->
                      </div>
                    </div><!--/block-->
                  </div><!--/position-->
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-12 u-layout-cell-2">
                <div class="u-container-layout u-valign-top u-container-layout-2"><!--position-->
                  <div data-position="" class="u-position u-position-2"><!--block-->
                    <div class="u-block">
                      <div class="u-block-container u-clearfix"><!--block_header-->
                        <h5 class="u-block-header u-text u-text-3"><!--block_header_content--> Our Official Brands of Supplements<!--/block_header_content--></h5><!--/block_header--><!--block_content-->
                        <div class="u-block-content u-text"><!--block_content_content-->
                          <br>Optimium Nutrition<br>MuscleTech<br>Impact &amp; many more!<br>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br><!--/block_content_content-->
                        </div><!--/block_content-->
                      </div>
                    </div><!--/block-->
                  </div><!--/position-->
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-20 u-layout-cell-3">
                <div class="u-container-layout u-valign-top u-container-layout-3"><!--position-->
                  <div data-position="" class="u-position u-position-3"><!--block-->
                    <div class="u-block">
                      <div class="u-block-container u-clearfix"><!--block_header-->
                        <h5 class="u-block-header u-text u-text-5"><!--block_header_content-->
                          <span style="font-weight: 700;"></span>Quick Links<!--/block_header_content-->
                        </h5><!--/block_header--><!--block_content-->
                        <div class="u-block-content u-text"><!--block_content_content-->
                          <br>Contact Us<br>Contribute<br>Privacy Policy<br>
                          <br><!--/block_content_content-->
                        </div><!--/block_content-->
                      </div>
                    </div><!--/block-->
                  </div><!--/position-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="u-social-icons u-spacing-20 u-social-icons-1">
          <a class="u-social-url" title="facebook" target="_blank" href=""><span class="u-file-icon u-icon u-social-facebook u-social-icon u-icon-1"><img src="C:\xampp\htdocs\clothespph\images/145802.png" alt=""></span>
          </a>
          <a class="u-social-url" title="twitter" target="_blank" href=""><span class="u-file-icon u-icon u-social-icon u-social-twitter u-icon-2"><img src="C:\xampp\htdocs\clothespph\images/145812.png" alt=""></span>
          </a>
          
        </div>
        <p class="u-text u-text-7">
          <span style="font-size: 1.25rem;"> Copyright &amp;copy; 2022 All Rights Reserved by</span>&nbsp;<span style="font-size: 1.25rem;"> e-wear</span>&nbsp;&nbsp;
        </p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Website Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="" target="_blank">
        <span>Website Builder Software</span>
      </a>. 
    </section>
  </body>
</html>