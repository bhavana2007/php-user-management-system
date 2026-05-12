let isRegister = false;

// Show Register
function showRegister() {

    isRegister = true;

    document.getElementById("title").innerText = "Register";

    document.getElementById("name").style.display = "block";

    document.getElementById("confirmPassword").style.display = "block";

    document.getElementById("submitBtn").innerText = "Register";

    document.getElementById("form").action = "register.php";
}

// Show Login
function showLogin() {

    isRegister = false;

    document.getElementById("title").innerText = "Login";

    document.getElementById("name").style.display = "none";

    document.getElementById("confirmPassword").style.display = "none";

    document.getElementById("submitBtn").innerText = "Login";

    document.getElementById("form").action = "login.php";
}

// Password Validation
document.getElementById("form").addEventListener("submit", function(e) {

    let password =
        document.getElementById("password").value;

    let confirmPassword =
        document.getElementById("confirmPassword").value;

    if(isRegister){

        // Password Match
        if(password !== confirmPassword){

            alert("Passwords do not match!");

            e.preventDefault();

            return;
        }

        // Password Rules
        let passwordPattern =
            /^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W]).{8,}$/;

        if(!passwordPattern.test(password)){

            alert(
                "Password must contain:\n\n" +
                "• Minimum 8 characters\n" +
                "• One uppercase letter\n" +
                "• One number\n" +
                "• One special character"
            );

            e.preventDefault();

            return;
        }
    }

});

// Toggle Password
function togglePassword() {

    let pass = document.getElementById("password");

    let icon = document.querySelector(".eye-icon");

    if(pass.type === "password"){

        pass.type = "text";

        icon.classList.remove("fa-eye");

        icon.classList.add("fa-eye-slash");

    } else {

        pass.type = "password";

        icon.classList.remove("fa-eye-slash");

        icon.classList.add("fa-eye");
    }
}