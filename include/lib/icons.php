<?php
$icons = [
    "default"   => "M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 2c3.691 0 6.915 2.016 8.647 5h-17.294c1.732-2.984 4.956-5 8.647-5zm0 20c-5.514 0-10-4.486-10-10 0-1.045.163-2.052.461-3h1.859c.606 1.518 1.929 3 3.986 3 2.477 0 2.153-2.31 3.694-2.31s1.218 2.31 3.695 2.31c2.055 0 3.379-1.482 3.984-3h1.86c.298.948.461 1.955.461 3 0 5.514-4.486 10-10 10zm5.508-8.059l.492.493c-1.127 1.72-3.199 3.566-5.999 3.566-2.801 0-4.874-1.846-6.001-3.566l.492-.493c1.513 1.195 3.174 1.931 5.509 1.931 2.333 0 3.994-.736 5.507-1.931z",
    "error"     => "M16.971 0h-9.942l-7.029 7.029v9.941l7.029 7.03h9.941l7.03-7.029v-9.942l-7.029-7.029zm-1.402 16.945l-3.554-3.521-3.518 3.568-1.418-1.418 3.507-3.566-3.586-3.472 1.418-1.417 3.581 3.458 3.539-3.583 1.431 1.431-3.535 3.568 3.566 3.522-1.431 1.43z",
    "warning"   => "M16.971 0h-9.942l-7.029 7.029v9.941l7.029 7.03h9.941l7.03-7.029v-9.942l-7.029-7.029zm-4.971 19.25c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25zm.55-4.748c-.029.283-.266.498-.55.498s-.521-.215-.55-.498l-.801-8.01c-.08-.8.55-1.492 1.351-1.492s1.431.692 1.351 1.493l-.801 8.009z",
    "upload"    => "M12 5c3.453 0 5.891 2.797 5.567 6.78 1.745-.046 4.433.751 4.433 3.72 0 1.93-1.57 3.5-3.5 3.5h-13c-1.93 0-3.5-1.57-3.5-3.5 0-2.797 2.479-3.833 4.433-3.72-.167-4.218 2.208-6.78 5.567-6.78zm0-2c-4.006 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408-.212-3.951-3.473-7.092-7.479-7.092zm4 10h-3v4h-2v-4h-3l4-4 4 4z"
];

function resolveIcon($iconName) {
    global $icons;

    if(isset($icons[$iconName])) {
        return $icons[$iconName];
    } else {
        return $icons["default"];
    };
};

function getIconElement($iconName) {
    echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"" . resolveIcon($iconName) .  "\"/></svg>";
}