const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");

// Form Validation
const form = document.querySelectorAll(".form");
const username = document.querySelectorAll(".username");
const email = document.querySelectorAll(".email");
const password = document.querySelectorAll(".password");
const password2 = document.querySelector(".password2");

form.addEventListener('subimt', e => {
    e.preventDefault();  // it cancels the event.

    validationOfData();
});

registerLink.addEventListener("click", () => {
    wrapper.classList.add('active');
});

loginLink.addEventListener("click", () => {
    wrapper.classList.remove('active');
});

