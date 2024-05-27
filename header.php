<?php 
$btn = '<li class="menu-item" id="loginbutton"> <a href="login.php">Logga in</a>  </li>';

if(isset($_SESSION["user"])) {
      // Dålig praxis att ha logga ut som en GET då vissa browsers kör prefetch men idc
      $btn = '<li class="menu-item" id="loginbutton"> <a href="logout.php">Logga Ut</a>  </li>';
}

echo 
'<div class="header">
      <a href="index.php">
      <div id="logotext">
            <h2>LILLA <br>VARDAGSRUMMET</h2>
      </div>
      </a>

      <ul id="header-menu">
            <li class="menu-item">
                  <a href="createad.php">Skapa annons</a>
            </li>
            <li class="menu-item">
                  <a href="anslag.php">Anslag</a>
            </li>';

            include "drop-down-categories.php";

            echo $btn . '
      </ul>
</div>';
?>