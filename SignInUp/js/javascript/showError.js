const form = document.querySelector(".signup form"),
      signupBtn = form.querySelector(".button input"),
      errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault(); // đếm số lần bấm
}
var testemail = /^\w+@\w+\.com$/i;
signupBtn.onclick = () => {
    // Ajax
    let xhr = new XMLHttpRequest(); // create XML Object
    xhr.open("POST", "php/processSignUp.php", true );
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "successSignUp"){  
                    location.href = "../login.php";
                }
                else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form); // create new formData object
    xhr.send(formData);
}