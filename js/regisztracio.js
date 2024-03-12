const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    // Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "backend/regisztracio.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if (data == "success") {
                    location.href = "index.php"
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }

    // Adatok ellenőrzése a konzolra kiírása
    let formData = new FormData(form);
    for (let pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
    }

    xhr.send(formData);
}
