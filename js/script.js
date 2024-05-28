
function UpdateCurrency() {
      var dropdown = document.getElementById("currency-dropdown");
      var selectedValue = dropdown.value;
      var url = new URL(window.location);
      url.searchParams.set("currency", selectedValue);
      location.replace(url);
      dropdown.value = selectedValue;
}

document.addEventListener("DOMContentLoaded", function() {
      var dropdown = document.getElementById("currency-dropdown");
      var urlParams = new URLSearchParams(window.location.search);
      var currentCurrency = urlParams.get("currency");
      
      if (currentCurrency) {
          dropdown.value = currentCurrency;
      }
  });