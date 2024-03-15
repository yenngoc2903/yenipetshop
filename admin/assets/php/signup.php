<?php include_once'../connect/connect.php';
  const inputGmailRegister = document.querySelector(".sign-up-main-input-gmail");
  const inputPasswordRegister = document.querySelector(".sign-up-main-input-password");
  const inputRePasswordRegister = document.querySelector(".sign-up-main-input-repassword");
  const btnRegister = document.querySelector(".sign-up-main-submit");
  
  btnRegister.addEventListener("click", (e) => {
    e.preventDefault();
    if (
      inputPasswordRegister.value === "" ||
      inputRePasswordRegister.value === "" ||
      inputGmailRegister.value === "" 
    ) {
      alert("Vui lòng không để trống!");
    } else {
      if (
      inputPasswordRegister.value !== inputRePasswordRegister.value
      ) {
        alert("Xác nhận mật khẩu không đúng! Vui lòng nhập lại");
      } else {
      const user = {
        gmail: inputGmailRegister.value,
        password: inputPasswordRegister.value,
      };
      let json = JSON.stringify(user);
      localStorage.setItem(inputGmailRegister.value, json);
      alert("Đăng ký thành công");
      window.location.href = "login.php";
    }}
  })
  
  ?>