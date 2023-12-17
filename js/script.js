document.addEventListener("DOMContentLoaded", function () {
    updateTable();

    document.getElementById("kpopForm").addEventListener("submit", function (event) {
        event.preventDefault(); 
        if (validateForm()) {
            submitForm();
        }
    });
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            while (cookie.charAt(0) == ' ') cookie = cookie.substring(1, cookie.length);
            if (cookie.indexOf(nameEQ) == 0) return cookie.substring(nameEQ.length, cookie.length);
        }
        return null;
    }

    function eraseCookie(name) {
        document.cookie = name + '=; Max-Age=-99999999;';
    }

    function saveToLocalStorage(key, value) {
        localStorage.setItem(key, value);
    }

    function getFromLocalStorage(key) {
        return localStorage.getItem(key);
    }

    function removeFromLocalStorage(key) {
        localStorage.removeItem(key);
    }

    setCookie("exampleCookie", "cookieValue", 7); 
    var cookieValue = getCookie("exampleCookie"); 

    saveToLocalStorage("exampleLocalStorage", "localStorageValue");
    var localStorageValue = getFromLocalStorage("exampleLocalStorage"); 

    document.getElementById("photo").addEventListener("change", function () {
        validateFile();
    });
});

function validateForm() {
    var name = document.getElementById("name").value;
    var dob = document.getElementById("dob").value;
    var about = document.getElementById("about").value;
    var genre = document.getElementById("genre").value;
    var band = document.getElementById("band").value;
    var photo = document.getElementById("photo").value;

    if (name === "" || dob === "" || about === "" || genre === "" || band === "" || photo === "") {
        alert("Semua kolom harus diisi!");
        return false;
    }


    return true;
}

function validateFile() {
    var fileInput = document.getElementById("photo");
    var photo = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(photo)) {
        alert("File foto harus memiliki ekstensi .jpg, .jpeg, atau .png");
        fileInput.value = ''; 
        return false;
    }


    return true;
}

function submitForm() {
    var formData = new FormData(document.getElementById("kpopForm"));

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/submit.php", true);
    xhr.onload = function () {
        updateTable();
        console.log(xhr.responseText);
    };
    xhr.send(formData);
}

function updateTable() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/fetch.php", true);
    xhr.onload = function () {
        document.getElementById("data-table").innerHTML = xhr.responseText;
        attachEditDeleteEvents(); 
    };
    xhr.send();
}

function attachEditDeleteEvents() {
    var editButtons = document.querySelectorAll(".edit-button");
    var deleteButtons = document.querySelectorAll(".delete-button");

    editButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var rowId = this.dataset.rowid;
            console.log("Edit button clicked for row ID: " + rowId);
        });
    });

    deleteButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var rowId = this.dataset.rowid;
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                deleteData(rowId);
            }
        });
    });
}

function deleteData(rowId) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/delete.php?id=" + rowId, true);
    xhr.onload = function () {
        updateTable();
        console.log(xhr.responseText);
    };
    xhr.send();
}
function resetForm() {
    document.getElementById("kpopForm").reset();
    document.getElementById("photo-preview").src = ""; 
}

document.getElementById("photo").addEventListener("change", function () {
    validateFile();
    previewPhoto();
});

function previewPhoto() {
    var fileInput = document.getElementById("photo");
    var photoPreview = document.getElementById("photo-preview");

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            photoPreview.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
