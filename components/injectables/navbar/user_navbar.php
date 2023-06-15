<nav class="navbar navbar-expand-lg navbar-light px-3" style="background-color:#827c7c;">
    <a class="navbar-brand" href="#">      
        <i class="fa-solid fa-pen-nib"></i>
        Inkdown 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav px-2">
            <a class="nav-item nav-link btn btn-outline-light px-2" id="home_active" href="../../views/user/home.php"><i class="fa-solid fa-house-chimney"></i> My Editor</a>
            <a class="nav-item nav-link btn btn-outline-light px-2" id="signup_active" href="../../views/user/notes.php"><i class="fa-solid fa-note-sticky"></i> My Notes</a>
            <!-- <a class="nav-item nav-link btn btn-outline-light px-2" id="login_active" href="../../views/user/trash.php"><i class="fa-solid fa-trash"></i> Trash</a> -->
            <div class="dropdown show">
            <a class="btn btn-outline-dark dropdown-toggle mx-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More Options
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <span class="dropdown-item">
                  <b>
                    <?php 
                      // require("../../components/utils.php");\
                      /** @note This is commented because
                       *  the Utils MUST ALWAYS BE DECLARED ON TOP OF THE PHP PAGE
                       */
                      echo "Signed-in as, ".Utils::getUserFullName_inSession();
                    ?>
                  </b>
                </span>
                <a class="dropdown-item" href="../../views/user/account.php"><i class="fa-solid fa-users-rectangle"></i> My Account</a>
                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#logoutPrompt">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </div>
            </div>
        </div>
    </div>
</nav>

<!-- Modal pop-up to ask user for logging-out -->
<div class="modal fade" id="logoutPrompt" tabindex="-1" role="dialog" aria-labelledby="logoutPromptLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutPromptLabel">Sign-out now?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        You are about to sign-out. Please, make sure all your works are saved!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="../../components/logout/logout_user.php" class="btn btn-danger">Sign-out</a>
      </div>
    </div>
  </div>
</div>