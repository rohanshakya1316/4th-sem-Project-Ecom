const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");
const exitBtn = document.querySelector(".icon-close");

// For forget password
function message() {
  alert("Remember your password brother!");
}

function clearErrors() {
  errors = document.getElementsByClassName("error");
  for (let item of errors) {
    item.innerHTML = "";
  }
}

function setError(id, error) {
  document.getElementById(id).innerHTML = error;
}

// Form Validation for Registration Form

function validateForm() {
  let returnval = true;

  // Regular Expressions
  const usernameRegex = /^[A-Za-z0-9]{3,15}$/;
  const emailRegex =
    /^[A-Za-z0-9]+(?:[.%_+][A-Za-z0-9]+)*@[A-Za-z0-9]+\.[A-Za-z]{2,}$/;
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
  clearErrors();

  let username = document.forms["registerForm"]["username"].value;
  if (!usernameRegex.test(username)) {
    setError("user_error", "Username Invalid!");
    returnval = false;
  }

  if (username.length == 0) {
    setError("user_error", "Username cannot be empty!");
    returnval = false;
  }

  var email = document.forms["registerForm"]["email"].value;
  if (!emailRegex.test(email)) {
    setError("email_error", "Invalid Email! Enter valid email address.");
    returnval = false;
  }

  var password = document.forms["registerForm"]["password"].value;
  if (!passwordRegex.test(password)) {
    setError(
      "pass_error",
      "8 character uppercase lowercase & special characters!"
    );
    returnval = false;
  }

  var cpassword = document.forms["registerForm"]["cpassword"].value;
  if (cpassword !== password) {
    setError("cpass_error", "Password and Confirm password should match!");
    returnval = false;
  }

  let terms = document.forms["registerForm"]["terms"];
  if (!terms.checked) {
    setError("check_error", "*You must agree to the terms and conditions.");
    returnval = false;
  }

  return returnval;
}

registerLink.addEventListener("click", () => {
  wrapper.classList.add("active");
});

loginLink.addEventListener("click", () => {
  wrapper.classList.remove("active");
});

exitBtn.addEventListener("click", function (event) {
  const confirmExit = confirm("Are you sure you want to exit?");
  if (!confirmExit) {
    event.preventDefault(); // Prevents the logout if the user cancels
  }
});
