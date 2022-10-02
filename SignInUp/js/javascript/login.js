const form = document.querySelector(".login form"),
      loginBtn = form.querySelector(".button input"),
      errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault(); // đếm số lần bấm
}

loginBtn.onclick = () => {
    // Ajax
    let xhr = new XMLHttpRequest(); // create XML Object
    xhr.open("POST", "php/processLogin.php", true );
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data == "admin"){  
                    location.href = "../Admin/index.php";
                }
                if(data == "staff"){  
                    location.href = "../Staff/index.php";
                }
                if(data == "customer"){  
                    location.href = "../Customer/index_home.php";
                }
                if(data == "success"){  
                    location.href = "../Customer/index_home.php";
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