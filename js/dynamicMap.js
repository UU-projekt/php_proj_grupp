function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } 
}

/**
 * 
 * @param {GeolocationPosition} position 
 */
function showPosition(position) {
    const params = `fromLat=${encodeURIComponent(position.coords.latitude)}&fromLon=${encodeURIComponent(position.coords.longitude)}`
    window.location.href += window.location.href.includes("?") ? "&" + params : "?" + params
}

if(!window.location.href.includes("fromLon")) getLocation()
