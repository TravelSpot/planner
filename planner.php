<?php
$con = mysqli_connect('localhost','root','','spot');
$sql = mysqli_query($con , "SELECT * FROM tbl_plan WHERE id='$id'");
?>
<?php
if(isset($_POST["submit"])){
	
	//get the text data from the fields
	$user_name = trim(mysqli_real_escape_string($con, $_POST['user_name']));
	$package_name = trim(mysqli_real_escape_string($con, $_POST['package_name']));
	$country = trim(mysqli_real_escape_string($con, $_POST['country']));
	$area = trim(mysqli_real_escape_string($con, $_POST['area']));
	$language = trim(mysqli_real_escape_string($con, $_POST['language']));
	$phone = trim(mysqli_real_escape_string($con, $_POST['phone']));
	$description = trim(mysqli_real_escape_string($con, $_POST['description']));
	
	  $Submit = mysqli_query($con, "INSERT INTO tbl_plan(user_name,package_name,country,area,language,phone,description) VALUES('$user_name','$package_name','$country','$area','$language','$phone','$description')") or die(mysqli_error($con));
		  echo "<div class='alert alert-success'><strong>Success!</strong>Your Plan Is Now Ready To Be Booked.Please Choose Your Plan Location</div>"; 
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Become A Planner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
    margin-top:40px;
}
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
</style>
<script type="text/javascript"> 
$(document).ready(function() {
        
            /* affix the navbar after scroll below header */
$('#nav').affix({
      offset: {
        top: $('header').height()-$('#nav').height()
      }
});    

/* highlight the top nav as scrolling occurs */
$('body').scrollspy({ target: '#nav' })

/* smooth scrolling for scroll to top */
$('.scroll-top').click(function(){
  $('body,html').animate({scrollTop:0},1000);
})

/* smooth scrolling for nav sections */
$('#nav .navbar-nav li>a').click(function(){
  var link = $(this).attr('href');
  var posi = $(link).offset().top;
  $('body,html').animate({scrollTop:posi},700);
});

});


$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
</head>
<body>
<nav class="navbar navbar-findcond navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html">Spot</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> Me <span class="badge">0</span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#"><i class="fa fa-fw fa-tag"></i> <span class="badge">Music</span> sayfası <span class="badge">Video</span> sayfasında etiketlendi</a></li>
						<li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Music</span> sayfasında iletiniz beğenildi</a></li>
						<li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Video</span> sayfasında iletiniz beğenildi</a></li>
						<li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Game</span> sayfasında iletiniz beğenildi</a></li>
					</ul>
				</li>
				<li class="active"><a href="../explore/explore.html">Explore<span class="sr-only">(current)</span></a></li>
				<li><a href="planner.html">Be A Planner</a></li>
				<ul class="nav navbar-nav navbar-right">
                  <li><a href="../view_trip/view_trip.html">View Trip</a></li>
                  <li class="dropdown" style="margin-right: 50px;">
                     <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
									   <input type="checkbox" onclick="myFunction()">Show Password
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> Remember me
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-success btn-block">Sign in</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                        </li>
                     </ul>
                  </li>
               </ul>
			</ul>
			<div class="col-md-4 col-md-offset-3" style="margin-top: 12px;">
            <form action="" class="search-form">
                <div class="form-group has-feedback">
            		<label for="search" class="sr-only">Find Your Journey</label>
            		<input type="text" class="form-control" name="search" id="search" placeholder="Find Your Journey">
              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
            	</div>
            </form>
        </div>
		</div>
</nav>
<div class="container">
  <h2 style="margin-left: 150px; margin-bottom: 50px; margin-top: 30px;">Please Follow This Simple Step To Complete Your Guide Plan</h2>
<div class="stepwizard col-md-offset-3" style="margin-top: 40px;">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
	  <div class="stepwizard-step">
        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
        <p>Step 4</p>
      </div>
	  <div class="stepwizard-step">
        <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
        <p>Step 5</p>
      </div>
    </div>
  </div>
  
  <form role="form" action="" method="post">
    <div class="row setup-content" id="step-1">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 1</h3>
             <div class="form-group">
                 <label class="control-label">Add Your Photo</label>
                    <input type="file" name="image" required="required" class="form-control" />
					   <span id="uploaded_image"></span>
              </div>
			 <div class="form-group">
                 <label class="control-label">First Name</label>
                    <input maxlength="100" name="user_name" type="text" required="required" class="form-control" placeholder="Enter First Name" />
             </div>
              <div class="form-group">
                 <label class="control-label">Package Name</label>
                    <input maxlength="100" name="package_name" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
               </div>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-2">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 2</h3>
          <div class="form-group">
             <label class="control-label">Which Country You Are Planning To Guide?</label>
                <select name="country">
					<option value="Malaysia">Malaysia</option>
					<option value="Australia">Australia</option>
					<option value="Vietnam">Vietnam</option>
					<option value="Singapore">Singapore</option>
					<option value="Thailand">Thailand</option>
					<option value="Indonesia">Indonesia</option>
				</select>
           </div>
          <div class="form-group">
              <label class="control-label">Where are the area you will be planned?</label>
                    <select name="area">
						<option value="Kuala Lumpur">Kuala Lumpur</option>
						<option value="Johor Bahru">Johor Bahru</option>
						<option value="Melbourne">Melbourne</option>
						<option value="Sydney">Sydney</option>
						<option value="Ho Chi Minh">Ho Chi Minh</option>
						<option value="Hanoi">Kuala Lumpur</option>
						<option value="Singapore">Singapore</option>
						<option value="Bangkok">Bangkok</option>
						<option value="Pattaya">Pattaya</option>
						<option value="Jakarta">Jakarta</option>
						<option value="Bandung">Bandung</option>
					</select>
            </div>
			<div class="form-group">
                <label class="control-label">What Langauge Would You Be Comfortable To Talk?</label>
					<select name="language">
						<option value="Bahasa Malaysia">Bahasa Malaysia</option>
						<option value="English">English</option>
						<option value="Mandarin">Mandarin</option>
						<option value="japanese">Japanese</option>
					</select>
		    </div>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-3">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12" style="margin-bottom: 50px;">
          <h3> Step 3</h3>
		  <div class="form-group">
               <label class="control-label">We would require your phone number for user to contact</label>
                    <input  maxlength="100" type="text" required="required" name="phone" class="form-control" placeholder="Enter Your Phone Number"  />
          </div>
		  <br />
				<button class="btn btn-primary btn-lg pull-right" style="border-radius: 30px; color: #fff" type="button" style="padding-bottom: 50px;">Confirm Phone Number</button>
				<br />
		 </div>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">Next</button>
        </div>
      </div>
	      <div class="row setup-content" id="step-4">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 4</h3>
             <h5><i>Last But Not Least</i></h5>
                <div class="form-group">
                    <label class="control-label">Please Tell Us About Yourself<br/><span>just for user to be excited</span></label>
                        <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name"  />
                 </div>
                 <div class="form-group">
                      <textarea cols="50" rows="5" name="description" placeholder="Please Tell Us About Your Charm"></textarea>
             </div>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
      </div>
    </div>
	    <div class="row setup-content" id="step-5">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 5</h3>
			<h5><i>That's it, folks!<br>Here Is The Preview Of Your Plan</i></h5>
         </div>
		 <div class="preview">
		   <div class="row">
		       <div class="image" style="margin-bottom: 20px; margin-top: 20px;"><?php echo $image; ?></div>
			   <hr><br>
			   <div class="user_name" style="margin-bottom: 20px; margin-top: 20px;"><?php echo $user_name; ?></div>
			   <hr><br>
			   <div class="package_name" style="margin-bottom: 20px; margin-top: 20px;"><?php echo $package_name; ?></div>
			   <hr><br>
		       <div class="country" style="margin-bottom: 20px; margin-top: 20px;"><?php echo $country; ?></div>
			   <hr><br>
			   <div class="area" style="margin-bottom: 20px; margin-top: 20px;"><?php echo $area; ?></div>
			   <hr><br>
		       <div class="language" style="margin-bottom: 20px; margin-top: 20px;"><?php echo $language; ?></div>
			   <hr><br>
		       <div class="phone" style="margin-bottom: 20px; margin-top: 20px;"><?php echo $phone; ?></div>
			   <br><hr>
		      <div class="description" style="margin-bottom: 20px; margin-top: 20px;"><?php echo $description; ?></div>
		   </div>
		 </div>
			<button class="btn btn-success btn-lg pull-right" type="submit" name="submit" >Finish</button> 
        </div>
      </div>
    </div>
    </div>
  </form>
  <div class="tips" style=" margin-top: 40px;  margin-left: 450px;" ><i>**You can turn to previous page by clicking the number of step above</i></div>
  
</div>
<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();

  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   });
  }
 });
});
</script>
</body>
</html>