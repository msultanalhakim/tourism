function notificationRegister(){
    document.getElementById("register-notification").style.display = "none";
    window.location.assign("register.php");
}

function notificationLogin(){
    document.getElementById("login-notification").style.display = "none";
    window.location.assign("login.php");
}

function userProfile(){
    document.getElementById("user-profile").style.display = "block";
    document.getElementById("change-password").style.display = "none";
    document.getElementById("insert-homestay").style.display = "none";
    document.getElementById("insert-transportasi").style.display = "none";
    document.getElementById("sidebarProfile").classList.add("active");
    document.getElementById("sidebarPassword").classList.remove("active");
    document.getElementById("sidebarHomestay").classList.remove("active");
    document.getElementById("sidebarTransportasi").classList.remove("active");
}

function changePassword(){
    document.getElementById("user-profile").style.display = "none";
    document.getElementById("change-password").style.display = "block";
    document.getElementById("insert-homestay").style.display = "none";
    document.getElementById("insert-transportasi").style.display = "none";
    document.getElementById("sidebarPassword").classList.add("active");
    document.getElementById("sidebarHomestay").classList.remove("active");
    document.getElementById("sidebarTransportasi").classList.remove("active");
}

function insertHomestay(){
    document.getElementById("user-profile").style.display = "none";
    document.getElementById("change-password").style.display = "none";
    document.getElementById("insert-homestay").style.display = "block";
    document.getElementById("insert-transportasi").style.display = "none";
    document.getElementById("sidebarProfile").classList.remove("active");
    document.getElementById("sidebarPassword").classList.remove("active");
    document.getElementById("sidebarHomestay").classList.add("active");
    document.getElementById("sidebarTransportasi").classList.remove("active");
}

function insertTransportasi(){
    document.getElementById("user-profile").style.display = "none";
    document.getElementById("change-password").style.display = "none";
    document.getElementById("insert-homestay").style.display = "none";
    document.getElementById("insert-transportasi").style.display = "block";
    document.getElementById("sidebarProfile").classList.remove("active");
    document.getElementById("sidebarPassword").classList.remove("active");
    document.getElementById("sidebarHomestay").classList.remove("active");
    document.getElementById("sidebarTransportasi").classList.add("active");
}





window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
        let myDropdown = document.getElementById("myDropdown");
        if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
        }
    }
  }
