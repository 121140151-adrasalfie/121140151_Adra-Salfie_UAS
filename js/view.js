document.addEventListener("DOMContentLoaded", function () {
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/fetchdetail.php?id=" + id, true);
    xhr.onload = function () {
        var viewContainer = document.getElementById("view-container");
        viewContainer.innerHTML = xhr.responseText;

        customizeView();
    };
    xhr.send();
});

function customizeView() {
    var dataContainer = document.getElementById("data-container");
    var selectedData = dataContainer.innerHTML;
    
    var viewContainer = document.getElementById("view-container");
    viewContainer.innerHTML += selectedData;
}
