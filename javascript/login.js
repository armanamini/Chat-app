const form = document.querySelector(".login form ");
const continueBtn = document.querySelector("form .button input");
const errorText = document.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    // AJAX HERE  //
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let data = xhr.response;
            if (data == "SUCCESS") {
                location.href = "./users.php";
            } else {
                errorText.textContent = data;
                errorText.style.display = "block";
            }
        }
    }
    let formData = new FormData(form); // creat new object form Data //
    xhr.send(formData);

}