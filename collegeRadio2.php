<!DOCTYPE html>
<html>
<head>
	<title>College Radio</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="collegeRadio.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">College Radio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        About
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#college">College</a>
        <a class="dropdown-item" href="#branches">Branches</a>
      </div>
    </li>
      <li class="nav-item">
        <?php
        echo"<a class='nav-link' href='placements/placements.php'>Placements</a>";
        ?>
      </li>
      <li class="nav-item">
        <a class='nav-link'href='academicCalender.php'>Academic Calendar</a>";
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Games
      </a>
      <div class="dropdown-menu">
        <h5 class="dropdown-header">Indoor games</h5>
        <a class="dropdown-item" href="#">Chess</a>
        <a class="dropdown-item" href="#">Carroms</a>
        <a class="dropdown-item" href="#">Table tennis</a>     
        <h5 class="dropdown-header">Outdoor games</h5>
        <a class="dropdown-item" href="#">Cricket</a>
        <a class="dropdown-item" href="#">Badminton</a>
        <a class="dropdown-item" href="#">Volley Ball</a>
        <a class="dropdown-item" href="#">Throw Ball</a>
        <a class="dropdown-item" href="#">Hand Ball</a>
        <a class="dropdown-item" href="#">Foot Ball</a>
        <a class="dropdown-item" href="#">Shot put</a>
        <a class="dropdown-item" href="#">Kabaddi</a>
        <a class="dropdown-item" href="#">Kho-Kho</a>
      </div>    
    </li>       
      <li class="nav-item">
        <a class="nav-link" href="#">Achievements</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="#">Cinematography</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fest/fest.php">Fest</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Academic results
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">First year</a>
        <a class="dropdown-item" href="#">Second year</a>
        <a class="dropdown-item" href="#">Third year</a>
        <a class="dropdown-item" href="#">Fourth year</a>
      </div>
    </li>  
    <li class="nav-item">
        <a class="nav-link" href="announcements/announcements.php">Announcements</a>
      </li>    
    </ul>
  </div>  
</nav>
<br>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner images">
    <div class="carousel-item active">
      <img src="images/background-jntuhces1.jpg" alt="Jntuhces" width="100%" height="600">
      <h1 class="heading">Welcome to JNTUHCES</h1>
    </div>
    <div class="carousel-item">
      <img src="images/jntuhces.png" alt="Jntuhces" width="100%" height="600">
      <h2 class="heading21">Gateway</h2>
      <br>
      <h2 class="heading22"> To</h2>
      <br>
      <h2 class="heading23"> Excellence</h2>
    </div>
    <div class="carousel-item">
      <img src="images/background-jntuhces3.jpg" alt="Jntuhces" width="100%" height="600">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<br>
<br>
<hr>
<br>
<div class="container" id="college">
	<h3 class="container-heading">College</h3>
	<br>
	<p>JNTUH College of Engineering Sultanpur (JNTUH CES or JNTS) is a university, focusing on engineering, located in Sultanpur(V), Pulkal(M), Sangareddy (D), Telangana, India. Founded in 2012. A new milestone in the history of Jawaharlal Nehru Technological University Hyderabad is the beginning of another Constituent Engineering College situated at Sultanpur in Medak District from the Academic Year 2012-13.JNTUH College of Engineering Sultanpur is just 20 Km away from Sangareddy on the way to Jogipet and well connected by road from Hyderabad as well as Sangareddy, located in the lap of natural green sylvan under Singoor Dam and surrounded by fields producing sugarcane, paddy and cotton.</p>
		<br>
    <p>Realising the requirement of high quality technical education in the rural areas of Telangana, where talent as well as potential is available with dedicated and committed students, JNTUH College of Engineering Sultanpur has taken up an initiative to start new Branches at B.Tech level in Mechanical Engineering with specialization in Material Science and Nano technology, in Civil Engineering with specialization in Environmental Engineering, apart from regular B.Tech Courses in ECE and CSE</p>
</div>
<h3 class="container-heading" id="branches">Branches</h3>
<br>
<div class="container-branches">
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-12 col-12">
	        <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
      					<img src="images/ece.jpg" alt="ece" style="width:300px;height:400px;">
            		</div>
        		<div class="flip-card-back">
      				<p style="text-align: center; padding-top: 75px;">Electronics and Communications Engineering (ECE) involves researching, designing, developing and testing of electronic equipment used in various systems. Electronics and Communications engineers also conceptualize and oversee the manufacturing of communications and broadcast systems.</p>
        		</div>
        		</div>
   			</div>
   		</div>
   		<div class="col-lg-3 col-md-6 col-sm-12 col-12">
   			<div class="flip-card">
  				<div class="flip-card-inner">
    			<div class="flip-card-front">
      				<img src="images/cse.jpg" alt="cse" style="width:300px;height:400px;">
    			</div>
    			<div class="flip-card-back">
      				<p style="text-align: center; padding-top: 75px;">Computer Science Engineering (CSE) encompasses a variety of topics that relates to computation, like analysis of algorithms, programming languages, program design, software, and computer hardware. Computer Science engineering has roots in electrical engineering, mathematics, and linguistics.</p>
    			</div>
  				</div>
   			</div>
   		</div>
   		<div class="col-lg-3 col-md-6 col-sm-12 col-sm-12">
   			<div class="flip-card">
  				<div class="flip-card-inner">
    				<div class="flip-card-front">
     					<img src="images/civil.jpg" alt="civil" style="width:300px;height:400px;">
    				</div>
    			<div class="flip-card-back">
      				<p style="text-align: center; padding-top: 75px;">Civil engineering is a professional engineering discipline that deals with the design, construction, and maintenance of the physical and naturally built environment, including public works such as roads, bridges, canals, dams, airports, sewerage systems, pipelines, structural components of buildings, and railways.</p>
    			</div>
  				</div>
   			</div>
   		</div>
   		<div class="col-lg-3 col-md-6 col-sm-12 col-12">
   			<div class="flip-card">
  				<div class="flip-card-inner">
    				<div class="flip-card-front">
      					<img src="images/mech.jpg" alt="Mech" style="width:300px;height:400px;">
    				</div>
    				<div class="flip-card-back">
      					<p style="text-align: center; padding-top: 75px;"> Mechanical engineering deals with the design, construction, and use of machines. The programme endows students with the basic understanding and knowledge of how heavy tools and machinery work. A student pursuing a mechanical engineering programme will acquire knowledge about designing of automobiles, electric motors, aircraft and other heavy vehicles.</p>
    				</div>
  				</div>
   			</div>
   		</div>
	</div>

</div>
<div class="scrollTop float-right">
      <i class="fa fa-arrow-up" aria-hidden="true" onclick="topFunction()" id="myBtn"></i>
      
    </div>
 <script>
    button=document.getElementById("myBtn");
    window.onscroll =function(){scrollFunction()};
    function scrollFunction(){
      if(document.body.scrollTop>20|| document.documentElement.scrollTop>20){
        button.style.display = "block";
      }
      else{button.style.display="none";}
    }
    function topFunction(){
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
</body>
</html>