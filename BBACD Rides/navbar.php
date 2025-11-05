<?php
    // Detect current page for highlighting
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-sm" style="background-color: black;">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if($current_page == 'Home.php'){echo 'active';} ?>" 
           href="Home.php" 
           style="color: <?php echo ($current_page == 'Home.php') ? '#FFD700' : 'white'; ?>;
                  font-weight: <?php echo ($current_page == 'Home.php') ? 'bold' : 'normal'; ?>;">
          Home
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($current_page == 'Vehicles.php'){echo 'active';} ?>" 
           href="Vehicles.php" 
           style="color: <?php echo ($current_page == 'Vehicles.php') ? '#FFD700' : 'white'; ?>;
                  font-weight: <?php echo ($current_page == 'Vehicles.php') ? 'bold' : 'normal'; ?>;">
          Vehicles
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($current_page == 'Rent.php'){echo 'active';} ?>" 
           href="Rent.php" 
           style="color: <?php echo ($current_page == 'Rent.php') ? '#FFD700' : 'white'; ?>;
                  font-weight: <?php echo ($current_page == 'Rent.php') ? 'bold' : 'normal'; ?>;">
          Rent
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($current_page == 'Contact.php'){echo 'active';} ?>" 
           href="Contact.php" 
           style="color: <?php echo ($current_page == 'Contact.php') ? '#FFD700' : 'white'; ?>;
                  font-weight: <?php echo ($current_page == 'Contact.php') ? 'bold' : 'normal'; ?>;">
          Contact
        </a>
      </li>
    </ul>
  </div>
</nav>
