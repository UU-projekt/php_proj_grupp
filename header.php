<?php 
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
                  <a href="news.php">Nyheter</a>
            </li>';

            include "drop-down-categories.php";

            echo '<li class="menu-item" id="loginbutton">
                  <a href="login.php">Logga in</a>
            </li>
      </ul>
</div>';
?>