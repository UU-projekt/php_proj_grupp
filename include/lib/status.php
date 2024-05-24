<?php
function setStatus($icon, $title, $description) {
    $_SESSION["status"] = [
        "icon" => $icon,
        "title" => $title,
        "description" => $description
    ];
};