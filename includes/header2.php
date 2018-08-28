<?php session_start(); ?>
  <nav class="navbar navbar-expand-sm fixed-top" style="background-color: #044279;">
    <p style="color: white"><a class="navbar-brand" href="index.php" style="color: white"><img src="">RESEARCH SYMPOSIUM</a></p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" href="index.php" style="color: white">HOME</a>
          </li>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#"data-toggle="dropdown" style="color: white"> ABOUT</a>
              <div class="dropdown-menu" style="background-color: #485DCA">
                  <a class="dropdown-item" href="about_sliate.php" style="color: white">ABOUT SLIATE</a>
                  <a class="dropdown-item" href="about_symposium.php" style="color: white">ABOUT SYMPOSIUM</a>
              </div>
          </li> 

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#"data-toggle="dropdown" style="color: white"> SYMPOSIUM</a>
              <div class="dropdown-menu" style="background-color: #485DCA">
                  <a class="dropdown-item" href="symposium.php" style="color: white">SYMPOSIUM</a>
                  <a class="dropdown-item" href="#" style="color: white;">SYMPOSIUM SHEDULE</a>
                  <a class="dropdown-item" href="#" style="color: white">ANNOUNCEMENTS</a>
              </div>
          </li> 

          <li class="nav-item">
              <a class="nav-link" href="contact.php" style="color: white">CONTACT US</a>
          </li>

          <li class="nav-item">
            <a href="ad_login.php"><button class="btn btn-primary btn-sm"  style="float: right;">Login-Admin</button></a>
          </li>
          <li>
            
          </li>

      </ul>
    

  </div>  

</nav>


