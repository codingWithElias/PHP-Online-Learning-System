<div class="side-by-side mt-5">
    <div class="l-side shadow p-3 ">
      <div class="profile">
        <img src="../Upload/profile/<?=$instructor['profile_img']?>" class="circle" alt="PROFILE IMG" width="250">
        <form action="Action/upload-profile.php" 
              class="text-center"
              enctype="multipart/form-data"
              method="POST">
          <input type="file" 
                 class="form-control mb-1" 
                 name="profile_picture">
          <input type="submit"
                 value="Change Profile Picture"
                 class="btn btn-primary w-100">
        </form>
        <h4 class="text-center pt-2"><b><?=$instructor['username']?></b></h4>
      </div>
      <ul class="list-group">
          <li class="list-group-item"><a href="Profile-View.php" class="btn badge-primary">View Profile</a></li>
          <li class="list-group-item"><a href="Profile-Edit.php" class="btn badge-primary">Edit Profile</a></li>
          <li class="list-group-item"><a href="Profile-Edit.php#ChangePassword" class="btn badge-primary">Change Password</a></li>
          <li class="list-group-item" ><a href="../Logout.php" class="btn badge-primary">Logout</a></li>
        </ul>
    </div>