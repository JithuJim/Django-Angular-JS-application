
<?php
    //set validation error flag as false
    $error = false;
    //check if form is submitted
    if (isset($_POST['submit']))
  {

		$to = "divu333@gmail.com";
		$subject = trim($_POST['txt_subject']);
		$message = trim($_POST['txt_msg']);
        $name = trim($_POST['txt_name']);
        $fromemail = trim($_POST['txt_email']);



        //name can contain only alpha characters and space
        /*if (!preg_match("/^[a-zA-Z ]+$/",$name))
        {
            $error = true;
            $name_error = "Please Enter Valid Name";
        }
        if(!filter_var($fromemail,FILTER_VALIDATE_EMAIL))
        {
            $error = true;
            $fromemail_error = "Please Enter Valid Email ID";
        }
        if(empty($subject))
        {
            $error = true;
            $subject_error = "Please Enter Your Subject";
        }
        if(empty($message))
        {
            $error = true;
            $message_error = "Please Enter Your Message";
        }


*/
        if (!$error)

        {

            if (mail("divu333@gmail.com", "Comment from website!","Name: '. $_POST['txt_name'].'"

                 Email: ".$_POST['txt_email']."

                 Comment: ".$_POST['txt_msg'])) */

                    {

                         $result='<div class="alert alert-success"><strong>Thank
                        you!</strong> Well be in touch.</div>';

                     } else
                     {

                               $result='<div class="alert alert-danger">Sorry, there was
                              an error sending your message. Please try again later.</div>';

                     }
        }
    }




?>


divya kr	1:52 PM
https://www.ecowebhosting.co.uk/cp/listdomains
rajesh.parappil@yahoo.ca

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="stylesheet" type="text/css" href="styles/contact.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



  </head>
  <body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">

    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand">ESPT</a>
    </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
                    <li><a href="training.php">Registration</a></li>


          <li class="active"><a href="contact.php">Contact Us</a></li>
        </ul>
        <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control"placeholder="search">
        </div>
        <button type="search" class="btn btn-success">Search</button>
        </form>
      </div>
  </div>
</div>


<!-- Contact Form -->





<div class="container">
    <div class="row">



        <div class="col-lg-6  well">


            <form role="form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="contactform">
            <fieldset>
                <legend> Contact US</legend>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_name" class="control-label">Name</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="txt_name" placeholder="Your Full Name" type="text" value="<?php if($error) echo $name; ?>" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_email" class="control-label">Email ID</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="txt_email" placeholder="Your Email ID" type="text" value="<?php if($error) echo $fromemail; ?>" />
                        <span class="text-danger"><?php if (isset($fromemail_error)) echo $fromemail_error; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_subject" class="control-label">Subject</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" name="txt_subject" placeholder="Your Subject" type="text" value="<?php if($error) echo $subject; ?>" />
                        <span class="text-danger"><?php if (isset($subject_error)) echo $subject_error; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="txt_msg" class="control-label">Message</label>
                    </div>
                    <div class="col-md-12">
                        <textarea class="form-control" name="txt_msg" rows="4" placeholder="Your Message"><?php if($error) echo $message; ?></textarea>
                        <span class="text-danger"><?php if (isset($message_error)) echo $message_error; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">

                     <button type="submit" name="submit" class="btn btn-primary submit_contact" >Submit</button>

<!--                         <input name="submit" type="submit" class="btn btn-primary submit_contact" value="Send" />
 -->                    </div>
                </div>
            </fieldset>
            </form>


            <?php if (isset($alertmsg)) { echo $alertmsg; } ?>


        </div>

        <div class="col-lg-6 ">
          <div class="address">
                <div class="panel panel-default">
                    <div class="panel-body text-center address_conact ">
                        <h4>Office Location</h4>
                        <div >
                        NNESS <br />
                        Kunnamangalam<br />
                        Kozhikkode<br />
                        Phone No:5365237 <br/>

                        </div>
                        <hr />
<div id="map_canvas" class="span12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>
</div>



<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h6>About Us</h6>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Praesent commodo ex vitae porttitor placerat. Cras ut augue at elit rhoncus iaculis id sed nulla.
           Sed enim lorem, tincidunt in mauris non, commodo venenatis ligula. Maecenas ut aliquam arcu.
            Vestibulum sollicitudin cursus finibus. Pellentesque habitant morbi tristique senectus et netus et
             fames ac turpis egestas. Praesent </p>
      </div>

      <div class="col-sm-2">
          <h6>Contact Us</h6>
          <p>consectetur adipiscing elit. Praesent commodo ex vitae porttitor placerat.</p>
      </div>
      <div class="col-sm-2">
        <h6>Follow Us</h6>
          <div class="logo">
            <a href=""><img src="images/fb.png"></a>
            <a href=""><img src="images/google.png"></a>
            <a href=""><img src="images/twitter.png"></a>
          </div>

      </div>

      <div class="col-sm-2 copy">
        <h6>Copyright &copy; 2015 NMESS</h6>
      </div>


    </div>
  </div>


  </footer>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">


 $(".contentContainer").css("height",$(window).height());

    jQuery(function ($) {
        function init_map1() {
            var myLocation = new google.maps.LatLng(11.323788, 75.878620);
            var mapOptions = {
                center: myLocation,
                zoom: 16
            };
            var marker = new google.maps.Marker({
                position: myLocation,
                title: "Property Location"
            });
            var map = new google.maps.Map(document.getElementById("map_canvas"),
                mapOptions);
            marker.setMap(map);
        }
        init_map1();
    });
</script>

  </body>
</html>