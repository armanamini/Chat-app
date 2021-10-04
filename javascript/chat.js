

const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button");
    const chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault();
}


sendBtn.onclick = () => {
    // AJAX HERE  //
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            inputField.value = "";
            scrollBottom()
        }
    }
    let formData = new FormData(form); // creat new object form Data //
    xhr.send(formData);
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollBottom();

            }
        }
    }
    let formData = new FormData(form); // creat new object form Data //
    xhr.send(formData);
},50)

function scrollBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}