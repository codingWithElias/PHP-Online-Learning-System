<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="Courses.php">
      <img src="../assets/img/Logo.png" alt="Online learning system" width="50" height="40">
      EduPulse
    </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="Courses.php">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Enrolled-Course.php">Enrolled Courses</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        

        
      </ul>


     <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Profile-View.php">View Profile</a></li>
            <li><a class="dropdown-item" href="Profile-Edit.php">Edit Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="Profile-Edit.php#ChangePassword">Change Password</a></li>
          </ul>
        </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Logout.php"><i class="fa fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Notifications</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <ul class="list-group">
          <li class="list-group-item">New course started</b></li>
          <li class="list-group-item">New course started</b></li>
        </ul>
      </div>
    </div>
  </div>
</div>