<?php include_once'../connect/connect.php';
const inputGmail = document.querySelector(".sign-up-main-input-gmail");
const inputPassword = document.querySelector(".sign-up-main-input-password");
const btnLogin = document.querySelector(".sign-up-main-submit");


btnLogin.addEventListener("click", (e) => {
  e.preventDefault();
  if (inputGmail.value === "" || inputPassword.value === "") {
    alert("vui lòng không để trống");
  } else {
    const user = JSON.parse(localStorage.getItem(inputGmail.value));
    if (
      user.gmail === inputGmail.value &&
      user.password === inputPassword.value
    ) {
      alert("Đăng Nhập Thành Công");
      window.location.href = "index.php";
    } else {
      alert("Đăng Nhập Thất Bại");
    }
  }
});
?>