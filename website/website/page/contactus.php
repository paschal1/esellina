<?php
    session_start();
    include('../dbconn.php');
?>


<?php
if(isset($_POST['send'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $query = "INSERT INTO contact_us (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    $result = mysqli_query($dbconn, $query);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>E-ps | pawn Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" type="image/png" class="img-fluid" href="epsimage/favicon.PNG">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  
        
        <!--content-->
        <div class="container container-240">
            <div class="pd-banner v2">
               <a href="#" class="image-bd effect_img2"><img src="img/megamenu/images (15).jpeg" alt="" class="img-reponsive"></a> 
            </div>
            <ul class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li class="active">Contact </li>
            </ul>
            <div class="e-contact">
                <div id="googlemap1" class="map"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-7">
                        <div class="contact-info">
                            <h1 class="contact-title spc">Contact Details</h1>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has...</p>
                        </div>
                        <div class="e-contact-address footer-about">
                            <h3 class="contact-title v2">Port Harcourt Store</h3> 
                            <ul class="footer-block-content">
                                <li class="address">
                                    <span>45 Grand Central Choba,Port Harcourt Rivers State Nigeria</span>
                                </li>
                                <li class="phone">
                                    <span>(+234) 81 3006 2780 </span>
                                </li>
                                <li class="email">
                                    <span>Contact@epspawn.com</span>
                                </li>
                                <li class="time">
                                    <span>Mon-Sat 9:00pm - 5:00pm  &nbsp;&nbsp;&nbsp;  Sun : Closed</span>
                                </li>
                            </ul>
                        </div>

                        <div class="e-contact-address footer-about">
                            <h3 class="contact-title v2">Abakaliki Store</h3> 
                            <ul class="footer-block-content">
                                <li class="address">
                                    <span>45 Grand Central Terminal New York,NY 1017 United State USA</span>
                                </li>
                                <li class="phone">
                                    <span>(+123) 456 789 - (+123) 666 888</span>
                                </li>
                                <li class="email">
                                    <span>Contact@yourcompany.com</span>
                                </li>
                                <li class="time">
                                    <span>Mon-Sat 9:00pm - 5:00pm  &nbsp;&nbsp;&nbsp;  Sun : Closed</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5 pdl">
                        <h1 class="contact-title spc">Leave a message</h1>
                        <form class="login-form" action="#" method="post">
                            <div class="form-group">
                                  <input type="text" id="author" class="form-control bdr" name="name" value="" placeholder="Name *">
                                  <input type="email" id="email" class="form-control bdr" name="email" value="" placeholder="Emal *">
                                  <input type="text" id="phone" class="form-control bdr" name="phone" value="" placeholder="Phone Number">
                                  <textarea id="message" class="form-control bdr3" name="message" rows="10" placeholder="Your message here..."></textarea>
                            </div>
                              <div class="form-group">
                                  <button type="submit" name="send" class="btn btn-submit btn-gradient">
                                      Send message
                                  </button>
                              </div>
                          </form>
                    </div>
                </div>
                <div class="banner-callus image-bd effect_img2">
                    <a href="#"><img src="img/banner/h1_b7.jpg" alt="" class="img-responsive"></a>
                    <div class="box-center v2">
                        <p>Call us free : + (234) 81 3006 2780</p>
                        <a href="../../../e_ps/index.php" class="btn-callus">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
      
        <!-- / end content -->
       <footer>
            <div class="f-top">
                <div class="container container-240">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="footer-block footer-about">
                                <div class="f-logo">
                                    <a href="#"><img src="img/logo.png" alt="" class="img-reponsive"></a>
                                </div>
                                <ul class="footer-block-content">
                                    <li class="address">
                                        <span>45 Grand Central Terminal New York,NY 1017 United State USA</span>
                                    </li>
                                    <li class="phone">
                                        <span>(+123) 456 789 - (+123) 666 888</span>
                                    </li>
                                    <li class="email">
                                        <span>Contact@yourcompany.com</span>
                                    </li>
                                    <li class="time">
                                        <span>Mon-Sat 9:00pm - 5:00pm  &nbsp;&nbsp;&nbsp;  Sun : Closed</span>
                                    </li>
                                </ul>
                                <div class="footer-social social">
                                    <h3 class="footer-block-title">Follow us</h3>
                                    <a href="#" class="fa fa-twitter"></a>
                                    <a href="#" class="fa fa-dribbble"></a>
                                    <a href="#" class="fa fa-behance"></a>
                                    <a href="#" class="fa fa-instagram"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <div class="footer-block">
                                <h3 class="footer-block-title">Quick menu</h3>
                                <ul class="footer-block-content">
                                    <li><a href="#">TV & Video</a></li>
                                    <li><a href="#">Home Audio & Theater</a></li>
                                    <li><a href="#">Camera, Photo & Video</a></li>
                                    <li><a href="#">Cell Phones & Accessories</a></li>
                                    <li><a href="#">Headphones</a></li>
                                    <li><a href="#">Video Games</a></li>
                                    <li><a href="#">Bluetooth & Wireless Speakers</a></li>
                                    <li><a href="#">Car Electronics</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                            <div class="footer-block">
                                <h3 class="footer-block-title">Customer Service</h3>
                                <ul class="footer-block-content">
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Track your Order</a></li>
                                    <li><a href="#">Returns/Exchange</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Customer Service</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="footer-block">
                                <div class="footer-block-phone">
                                    <h3 class="footer-block-title">Hot Line</h3>
                                    <p class="phone-desc">Call Us toll Free</p>
                                    <p class="phone-light">(+123) 456 789 or (+123) 666 888</p>
                                </div>
                                <div class="footer-block-newsletter">
                                    <h3 class="footer-block-title">Subscription</h3>
                                    <p>Register now to get updates on promotions and coupons.</p>
                                    <form class="form_newsletter" action="#" method="post">
                                        <input type="email" value="" placeholder="Enter your emaill adress" name="EMAIL" id="mail" class="newsletter-input form-control">
                                        <button id="subscribe" class="button_mini btn btn-gradient" type="submit">
                                            Subscribe
                                        </button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="f-bottom">
                <div class="container container-240">
                    <div class="row flex lr">
                        <div class="col-xs-6 f-copyright"><span>© 2010-2018 EngoTheme. All rights reserved.</span></div>
                        <div class="col-xs-6 f-payment hidden-xs">
                            <a href="#"><img src="img/payment/mastercard.png" alt="" class="img-reponsive"></a>
                            <a href="#"><img src="img/payment/paypal.png" alt="" class="img-reponsive"></a>
                            <a href="#"><img src="img/payment/visa.png" alt="" class="img-reponsive"></a>
                            <a href="#"><img src="img/payment/american-express.png" alt="" class="img-reponsive"></a>
                            <a href="#"><img src="img/payment/western-union.png" alt="" class="img-reponsive"></a>
                            <a href="#"><img src="img/payment/jcb.png" alt="" class="img-reponsive"></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /footer -->
        <!-- /footer -->
    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/main.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMfhtZN7ZukEAEQcgR_GszRE4x338Bu9M&callback=initMap"></script>
    <script>
    function initMap() {

        // Create a new StyledMapType object, passing it an array of styles,
        // and the name to be displayed on the map type control.
        var myLatLng = {lat: 40.752988, lng: -73.976869};
        var map = new google.maps.Map(document.getElementById('googlemap1'), {
            center: { lat: 40.752988, lng: -73.976869 },
            zoom: 10,
            styles: [{
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#212121"
                    }]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#212121"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#9e9e9e"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#bdbdbd"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#181818"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#616161"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#1b1b1b"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#2c2c2c"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#8a8a8a"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#373737"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#3c3c3c"
                    }]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#4e4e4e"
                    }]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#616161"
                    }]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#000000"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#3d3d3d"
                    }]
                }
            ]
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });

    }
    </script>
</body>

</html>