<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-0">
      <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo URLROOT; ?>/posts">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo URLROOT; ?>/pages/contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo URLROOT; ?>/pages/tables">Tables</a>
          </li>
          
          
        </ul>

        <ul class="navbar-nav ml-auto">
        <!-- Verifico si existe una session o no, asi se si mostrar login o logout -->
        <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item">
                <a href="<?php echo URLROOT; ?>/users/profile/<?php echo $_SESSION['user_id']; ?>" class="nav-link">Welcome <?php echo $_SESSION['user_name'];  ?></a>
              </li>
          <li class="nav-item">
                <a href="<?php echo URLROOT; ?>/users/logout" class="nav-link">Logout <i class="fas fa-sign-out-alt"></i>

</a>
              </li>

        <?php else : ?>
            <li class="nav-item">
              <a href="<?php echo URLROOT; ?>/users/register" class="nav-link">Register</a>
            </li>

             <li class="nav-item">
              <a href="<?php echo URLROOT; ?>/users/login" class="nav-link">Login <i class="fas fa-sign-in-alt"></i>

</a>
            </li>

        <?php endif ?>    
        <!-- FIN verificacion login-logout -->
          </ul>
        
      </div>

      </div>
    </nav>