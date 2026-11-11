const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");
const formTitle = document.getElementById("formTitle");

document.getElementById("showRegister").onclick = function(e) {
    e.preventDefault();

    loginForm.classList.add("hidden");
    registerForm.classList.remove("hidden");

    formTitle.textContent = "Register";
};

document.getElementById("showLogin").onclick = function(e) {
    e.preventDefault();

    registerForm.classList.add("hidden");
    loginForm.classList.remove("hidden");

    formTitle.textContent = "Sign In";
};

registerForm.addEventListener("submit", function(e) {
    const password = registerForm.querySelector(
        '[name="password"]'
    ).value;

    const confirmPassword = registerForm.querySelector(
        '[name="confirm_password"]'
    ).value;

    if (password !== confirmPassword) {
        e.preventDefault();
        alert("Passwords do not match!");
    }
});
