function show () {
    var passwd = document.getElementById('passwd');
    var icon = document.querySelector('.fa');
    if (passwd.type === "password") {
        passwd.type = "text";
        eye.style.color = "#0072ff";
    }
    else {
        passwd.type = "password";
        eye.style.color = "grey";
        eye2.style.color = "grey";
    }
}