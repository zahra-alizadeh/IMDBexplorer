
function validatePassword() {
    var password = document.getElementById("password").value,
        confirm_password = document.getElementById("repeatPassword").value;
    if (password != confirm_password) {
        repeatPassword.setCustomValidity("رمز صحیح نمی باشد.");
    } else {
        repeatPassword.setCustomValidity('');
    }
    password.onchange = validatePassword;
    repeatPassword.onkeyup = validatePassword;
}


function validatenewPassword() {
    var password = document.getElementById("newPassword").value,
        confirm_password = document.getElementById("repeatNewPassword").value;
    if (password != confirm_password) {
        repeatNewPassword.setCustomValidity("رمز صحیح نمی باشد.");
    } else {
        repeatNewPassword.setCustomValidity('');
    }
    newPassword.onchange = validatePassword;
    repeatNewPassword.onkeyup = validatePassword;
}