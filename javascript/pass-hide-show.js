'use strict'


const pswrdFiels = document.querySelector(".form  input[type='password']");
const toggleBtn = document.querySelector(".form .field  i");

toggleBtn.onclick = () => {
    if (pswrdFiels.value != "") {
        if (pswrdFiels.type == "password") {
            pswrdFiels.type = "text";
            toggleBtn.classList.add("active");
        } else {
            pswrdFiels.type = "password";
            toggleBtn.classList.remove("active");

        }
    }

}