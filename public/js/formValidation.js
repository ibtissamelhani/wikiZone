
  const form = document.getElementById("registrationForm");
  const firstName = document.getElementById("first_name");
  const lastName = document.getElementById("last_name");
  const email = document.getElementById("email");
  const password = document.getElementById("password");
  const repeat_password = document.getElementById("repeat_password");

  form.addEventListener("submit", function (e) {
    const firstNameErr = document.querySelector(".first_name_error");
    const lastNameErr = document.querySelector(".last_name_error");
    const emailErr = document.querySelector(".email_error");
    const passwordErr = document.querySelector(".password_error");
    const emailRegex = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;
    const nameRegex = /^[A-Za-z\s]+$/;

    let valide = true;

    firstNameErr.style.display = "none";
    lastNameErr.style.display = "none";
    emailErr.style.display = "none";
    passwordErr.style.display = "none";

    if (!nameRegex.test(firstName.value) || firstName.value.length == 0) {
      valide = false;
      firstNameErr.style.display = "block";
    }
    if (!nameRegex.test(lastName.value) || lastName.value.length == 0) {
      valide = false;
      lastNameErr.style.display = "block";
    }
    if (!emailRegex.test(email.value) || email.value.length == 0) {
      valide = false;
      emailErr.style.display = "block";
    }

    if (password.value.length < 8 || repeat_password.value.length < 8) {
      valide = false;
      passwordErr.style.display = "block";
    }

    if (repeat_password.value !== password.value) {
      valide = false;
      passwordErr.style.display = "block";
    }

    if (!valide) {
      e.preventDefault();
    }
  });
