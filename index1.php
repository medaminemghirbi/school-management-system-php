<?php include('header.php')
?>
<nav class="navbar navbar-expand-lg navbar-dark default-color">
    <a class="navbar-brand" href="#"><b>ETV</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
      aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Events</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Dropdown
          </a>
          <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
        
        <li class="nav-item dropdown">
          <?php if (isset($_SESSION['login'])) { ?>
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user mr-2"></i>Account
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default"
            aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="/sms/admin/dashboard.php">Dashboard</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
          <?php } else { ?>
          <a href="view/login.php" class="nav-link"><i class="fa fa-user mr-2"></i>User login</a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </nav>
  <div class="py-5 shadow" style="background:linear-gradient(-45deg, #3923a7 50%, transparent 50%)">
    <div class="container-fluid my-2">
      <div class="row">
        <div class="col-lg-6 my-auto">
        <figure class="figure3"> 
                    <a href="https://inscription.education.tn/index_p.html" target="_blank"> 
                       <img src="./assets/images/newnew.gif" width="100px"> <img class="figure-img" src="./inscription à distance_files/inscpPrim.jpg" alt=""> 
                    </a>                     
                                    
                </figure> 
          <h3 class="display-3 font-weight-bold">Ecole Tunisienne Virtuelle</h3>
          <p class="py-lg-4">Binvenue Aux (المدرسة التونسية الافتراضية) Année Scolaire 2021-2022 </p>
          <a href="help.php" class="btn btn-lg btn-primary">Besoin d'aide ?? </a>
        </div>
        <div class="col-lg-6">
          <div class="col-lg-8 mx-auto card shadow-lg">
            <div class="card-body py-5">
              <h3>Demande d'inscription</h3>
              <form action="actions/index-action.php" method="post" class="">
                <!-- Material input -->
                <div class="md-form">
                  <input name="nom" type="text" id="form1" class="form-control">
                  <label for="form1">Nom</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                  <input name="email" type="email" id="email" class="form-control">
                  <label for="email">Email</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                  <input name="phone" type="text" id="mobile" class="form-control">
                  <label for="mobile">Téléphone</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                  <!-- <input type="text" id="class" class="form-control"> -->
                  <textarea name="info" id="message" class="form-control md-textarea" rows="3"></textarea>
                  <label for="message">Info Personnel</label>
                </div>

                <button name="valider" type="submit" class="btn btn-primary btn-block">Confirmer Inscription</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 py-5 ">
          <h2 class="font-weight-bold">A propos <br>  Ecole Tunisienne Virtuelle</h2>
          <div class="pr-5">
            <p>L'université virtuelle de Tunis (arabe : مدرسة تونس الافتراضية) ou EVT est une Ecole virtuelle publique tunisienne fondée en 01 octobre 2021.</p>
            <p>Basée au numéro 13 de la rue Ibn Nadim dans le quartier de Montplaisir, l'UVT est appelée à concrétiser, à long terme, le projet d'une formation ouverte et à distance (FOAD), axée fondamentalement sur l'exploitation des possibilités offertes par les technologies de l'information et de la communication. L'UVT a pour principale mission de développer des cours et des programmes universitaires d'enseignement en ligne pour les universités tunisiennes.</p>
          </div>
          <a href="about-us.php" class="btn btn-secondary">Know More</a>
        </div>
        <div class="col-lg-6" style="background:url(./assets/images/1.jpg)">
        </div>
      </div>
    </div>
  </section>
  <style>
  .course-image
  {
    width:100%;
    height: 170px !important;
    object-fit: cover;
    object-position: center;
  }
  </style>
  <footer style="background:url(./assets/images/still-life-851328_1280.jpg) center/cover no-repeat">
    <div  class="py-5 text-white" style="background:#000000bb"> 
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4">
              <h5>Useful Links</h5>

              <ul class="fa-ul ml-4">
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Home</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>About Us</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Terms & Conditions</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Privacy Policy</a></li>
              </ul>
            </div>
            <div class="col-lg-4">
              <h5>Social Presence</h5>

              <div>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-instagram fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-youtube fa-stack-1x fa-inverse text-dark"></i>
                </span>
              </div>
            </div>
            <div class="col-lg-3">
              <h5>Subscribe Now</h5>
              <form action="">
                <!-- Material input -->
                <div class="form-group">
                  <input type="email" id="email-s" class="form-control" placeholder="Your Email">
                </div>
                <button class="btn btn-secondary py-2 btn-block">Submit</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </footer>

  <section class="py-2 bg-dark text-light">
    <div class="container-fluid" style="text-align:center;">
      Copyright 2020-2020 All Rights Reseved. <a href="#" class="text-light">Ecole Virtuelle Tunsienne</a>
    </div>
  </section>
  
  <?php include('footer.php') ?>