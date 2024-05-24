<?php if(isset($_SESSION["status"])): ?>
<div class="infobox infobox-<?= $_SESSION["status"]["icon"] ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="<?= resolveIcon($_SESSION["status"]["icon"]); ?>"/></svg>
    <div class="text">
        <h1><?= $_SESSION["status"]["title"] ?></h1>
        <p><?= $_SESSION["status"]["description"] ?></p>
    </div>
</div>

<?php
    unset($_SESSION["status"]);
?>

<?php endif ?>