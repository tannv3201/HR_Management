const passWord = document.querySelector(".form input[type='password']"),
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = ()=>{
    if(passWord.type == "password")
    {
        passWord.type = "text";
        toggleBtn.classList.add("active")
    }
    else
    {
        passWord.type = "password";
        toggleBtn.classList.remove("active")
    }
}