// const signUpButton = document.getElementById("signUp");
// const signInButton = document.getElementById("signIn");
// const container = document.getElementById("container");

// signUpButton.addEventListener("click", () => {
//     container.classList.add("right-panel-active");
// });

// signInButton.addEventListener("click", () => {
//     container.classList.remove("right-panel-active");
// });

const togglePassword = (toggle) => {
    const passwordInput = document.querySelector(toggle.getAttribute("toggle"));
    const eyeIcon = toggle.querySelector("i");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
};

document.querySelectorAll(".toggle-password").forEach((toggle) => {
    toggle.addEventListener("click", function () {
        togglePassword(this);
    });
});
