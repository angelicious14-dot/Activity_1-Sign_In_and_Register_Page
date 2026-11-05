
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

registerForm.onsubmit = function(e) {
    e.preventDefault();

    const fields = registerForm.querySelectorAll("input");

    const fullname = fields[0].value;
    const email = fields[1].value;
    const username = fields[2].value;
    const password = fields[3].value;
    const confirmPassword = fields[4].value;

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
    }

    const account = {
        fullname,
        email,
        username,
        password
    };

    localStorage.setItem("account", JSON.stringify(account));

    alert("Registration Successful!");

    registerForm.reset();
    document.getElementById("showLogin").click();
};

loginForm.onsubmit = function(e) {
    e.preventDefault();

    const username = loginForm.querySelectorAll("input")[0].value;
    const password = loginForm.querySelectorAll("input")[1].value;

    const account = JSON.parse(localStorage.getItem("account"));

    if (account &&
        account.username === username &&
        account.password === password) {

        alert("Welcome, " + account.fullname + "!");

    } else {
        alert("Account not found or incorrect credentials!");
    }
};
  
