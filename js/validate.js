function validatePassword() {
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;
    let error = "";

    if (password.length < 8) {
        error = "Password must be at least 8 characters long.";
    } else if (!/[A-Z]/.test(password)) {
        error = "Password must contain at least one uppercase letter.";
    } else if (!/[a-z]/.test(password)) {
        error = "Password must contain at least one lowercase letter.";
    } else if (!/[0-9]/.test(password)) {
        error = "Password must contain at least one number.";
    } else if (!/[@$!%*?&]/.test(password)) {
        error = "Password must contain at least one special character (@, $, !, %, *, ?, &).";
    } else if (password !== confirmPassword) {
        error = "Passwords do not match.";
    }

    document.getElementById("passwordError").innerText = error;
    return error === ""; // true if valid
}

function emailValidation() {
    let email = document.getElementById("email").value;
    let error = "";
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        error = "Please enter a valid email address.";
    }

    document.getElementById("emailError").innerText = error;
    return error === "";
}

function userNameValidation() {
    let username = document.getElementById("username").value;
    let error = "";

    if (username.length < 5 || username.length > 15) {
        error = "Username must be between 5 and 15 characters.";
    } else if (!/^[a-zA-Z0-9]+$/.test(username)) {
        error = "Username can only contain letters and numbers.";
    }

    document.getElementById("usernameError").innerText = error;
    return error === "";
}

function validateForm() {
    let validUsername = userNameValidation();
    let validPassword = validatePassword();
    let validEmail = emailValidation();

    return validUsername && validPassword && validEmail; // only submit if all true
}
