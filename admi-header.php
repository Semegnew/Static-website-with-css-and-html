<div>
    <nav class="navbar-custom">
      <div class="header-title">
        <h3><?php echo $lang['title']?></h3>
      </div> <div class="profile"> <?php include("profile.php"); ?>  </div>
    </nav>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class=" nav-item active">
            <a class="nav-link" href="admin-dahboard.php">Home</a>
          </li>
          <li class=" nav-item ">
            <a class="nav-link" href="Admin-Request-approve.php">Request </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage.php">Manage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search.php">User Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="msgToUser.php">Send Message</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin_View_Cancel_Request.php">View Cancel Request </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AdminViewNonRenewed.php">View None Renewed</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin_Set_Expire_License.php">Set License Expire</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin_view_user_renwed_License.php">View Renewed Request </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
       

        </ul>
      </div>

      <div class="lang">
        <input type="button" onclick="location.href='admin-dahboard.php?lang=en';" value="<?php echo $lang['lang_en'] ?>" />

        <input type="button" onclick="location.href='admin-dahboard.php?lang=amha';" value="<?php echo $lang['lang_amha'] ?>" />

      </div>
    </nav>

