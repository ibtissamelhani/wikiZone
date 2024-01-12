
const form = document.getElementById("loginForm");
const email = document.getElementById("email");
const password = document.getElementById("password");

form.addEventListener("submit", function (e) {
  const emailErr = document.querySelector(".email_error");
  const passwordErr = document.querySelector(".password_error");
  const emailRegex = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;

  let valide = true;

  emailErr.style.display = "none";
  passwordErr.style.display = "none";

  if (!emailRegex.test(email.value) || email.value.length == 0) {
    valide = false;
    emailErr.style.display = "block";
  }

  if (password.value.length < 8 ) {
    valide = false;
    passwordErr.style.display = "block";
  }

  if (!valide) {
    e.preventDefault();
  }
});
