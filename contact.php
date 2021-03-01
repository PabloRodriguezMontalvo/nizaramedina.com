<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form'; 
		$to = 'paulrodmont@gmail.com'; 
		$subject = 'Message from Contact Demo ';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nizar Allibhoy Medina</title>
    <link rel="icon" href="img/favicon.ico" type="image/png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <!-- needed for mobile devices -->


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
    crossorigin="anonymous">
    
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- build:css styles/vendor.css -->
    <!-- bower:css -->
    <!-- endbower -->
    <!-- endbuild -->

    <!-- build:css styles/main.css -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/demo.css">
    <!-- endbuild -->

    <!-- build:js scripts/vendor/modernizr.js -->
    <script src="bower_components/modernizr/modernizr.js"></script>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <!-- Media Boxes CSS files -->
    <link rel="stylesheet" href="styles/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="styles/mediaBoxes.css">


    <style>
        /* == LETS MODIFY SOME COLORS AND STYLE FOR THE DEMO == */
        /* hide no more entries button */
        
        .media-boxes-no-more-entries {
            display: none;
        }
        /* make your own style of the filter */
        
        .filters-container {
            margin-bottom: 20px;
        }
        
        .custom-filter {
            padding: 0;
            text-align: right;
        }
        
        .custom-filter li {
            list-style: none;
            display: inline-block;
            margin-left: 18px;
            font-size: 18px;
        }
        
        .custom-filter li a {
            color: #999;
            text-decoration: none;
        }
        
        .custom-filter li a:hover {
            color: #333;
        }
        
        .custom-filter li a.selected {
            color: #D1474C !important;
        }
        /* Set the style of the thumbnail overlay items */
        
        .media-box-title {
            color: #fff;
            font-size: 11px;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 2px;
            line-height: 28px;
        }
        
        .media-box-date {
            color: #F2F2F2;
            font-size: 10px;
        }
        /* Remove box shadow and border-radius from the media boxes */
        
        .media-box-container {
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            -o-box-shadow: none;
            -ms-box-shadow: none;
            box-shadow: none;
        }
        /* thumbnail overlay background */
        
        .thumbnail-overlay {
            background-color: rgba(0, 0, 0, .40);
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            -o-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;
        }
        /* thumbnail overlay background (in the first grid change the initial background) */
        
        #grid .thumbnail-overlay {
            background-color: rgba(0, 0, 0, 0);
        }
        /* hover effect on the thumbnail-overlay */
        
        .thumbnail-overlay:hover {
            background-color: rgba(0, 0, 0, .20) !important;
        }
        /* hover effect on the image */
        
        .media-box-image img {
            -webkit-transition: all 0.6s ease-in-out;
            -moz-transition: all 0.6s ease-in-out;
            -o-transition: all 0.6s ease-in-out;
            -ms-transition: all 0.6s ease-in-out;
            transition: all 0.6s ease-in-out;
            -webkit-transform-origin: bottom left;
            -moz-transform-origin: bottom left;
            -o-transform-origin: bottom left;
            -ms-transform-origin: bottom left;
            transform-origin: bottom left;
        }
        
        .media-box-image:hover img {
            -webkit-transform: scale(1.2) translate(-20px);
            -moz-transform: scale(1.2) translate(-20px);
            -o-transform: scale(1.2) translate(-20px);
            -ms-transform: scale(1.2) translate(-20px);
            transform: scale(1.2) translate(-20px);
        }
    </style>


</head>

<body>
    <!--[if lt IE 10]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <div class="container">
        <div class="section">
            <div class="content">
                <div class="row">
                    
                    <form class="form-horizontal" role="form" method="post" action="contact.php">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
            	<?php echo "<p class='text-danger'>$errName</p>";?>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
            	<?php echo "<p class='text-danger'>$errEmail</p>";?>
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label">Message</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="4" name="message"></textarea>
            	<?php echo "<p class='text-danger'>$errMessage</p>";?>
        </div>
    </div>
    <div class="form-group">
        <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
            <?php echo "<p class='text-danger'>$errHuman</p>";?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
       	<?php echo $result; ?>	
        </div>
    </div>
</form>
              </div>    
        </div>
    </div>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='https://www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

    <!-- build:js scripts/vendor.js -->

    <!-- endbuild -->



    <!-- jQuery 1.8+ -->
    <script src="scripts/jquery-1.10.2.min.js"></script>

    <!-- endbuild -->
    <!-- build:js scripts/plugins.js -->
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/affix.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/modal.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/popover.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/carousel.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/scrollspy.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap/tab.js"></script>

    <!-- endbuild -->
    <script src="scripts/jquery.isotope.min.js"></script>
    <script src="scripts/jquery.imagesLoaded.min.js"></script>
    <script src="scripts/jquery.transit.min.js"></script>
    <script src="scripts/jquery.easing.js"></script>
    <script src="scripts/waypoints.min.js"></script>
    <script src="scripts/modernizr.custom.min.js"></script>
    <script src="scripts/jquery.magnific-popup.min.js"></script>
    <script src="scripts/jquery.mediaBoxes.js"></script>
    <!-- build:js scripts/main.js -->
    <script src="scripts/main.js"></script>
    <!-- Bootstrap JS file -->
    <script src="scripts/bootstrap.min.js"></script>
    <!-- endbuild -->
</body>
<script>
    $('#grid').mediaBoxes({
	    	filterContainer: '#filter',
	    	search: '#search',
	    	columns: 4,
	    	boxesToLoadStart: 9,
	    	boxesToLoad: 9,
	    	horizontalSpaceBetweenBoxes: 20,
        	verticalSpaceBetweenBoxes: 20,
        	minBoxesPerFilter: 20,
	    });

</script>

</html>