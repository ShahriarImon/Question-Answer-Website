const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = ()=>{
    e.preventDefault();
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insert_post.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

// setInterval(() =>{
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "get_post.php", true);
//     xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//             let data = xhr.response;
//             chatBox.innerHTML = data;
//             chatBox.value = "";
//           }
//       }
//     }
//     let formData = new FormData(form);
//     xhr.send(formData);
//   }, 500);