<nav class="navbar navbar-expand-lg bg-body-tertiary px-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">✒️ Inkdown</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../../views/user/home.php">Editor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../views/user/notes.php">Notes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../views/user/trash.php">Trash</a>
        </li>
        <li class="nav-item dropdown">
          <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-gear"></i>
            More
          </button>
          <ul class="dropdown-menu">
            <li class="dropdown-item disabled">
              <span><i class="fa-regular fa-user"></i>
                <b>
                  <?php echo Utils::getUserFullName_inSession(); ?>
                </b>
              </span>
            </li>
            <li><a class="dropdown-item" href="../../views/user/account.php">Account</a></li>
            <hr>
            <li><a class="dropdown-item" href="../../views/user/license.php">License</a></li>
            <li><a class="dropdown-item" href="../../views/user/terms.php">Terms</a></li>
            <li><a class="dropdown-item" href="../../views/user/privacy.php">Privacy</a></li>
            <li><a class="dropdown-item" href="../../views/user/conduct.php">Conduct</a></li>
            <hr>
            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#logoutPrompt">
              Logout
            </button>
          </ul>
        </li>
      </ul>
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