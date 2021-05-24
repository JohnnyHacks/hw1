function checkName(event){
    const input= event.currentTarget;

    if(input.value.length>0){
        input.parentNode.querySelector('span').classList.remove('errore');
    }
    else{
        input.parentNode.querySelector('span').classList.add('errore');
    }
}

function onJsonUsername(json) {
    if (json.esiste) {
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username span').classList.add('errore');
        
    } else {
        document.querySelector('.username span').classList.remove('errore');
    }

}

function onResponse(response) {
    return response.json();
}

function checkUsername(event) {
    const input = document.querySelector('.username input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        input.parentNode.querySelector('span').classList.add('errore');
    } else {
        fetch("check_username.php?q="+encodeURIComponent(input.value)).then(onResponse).then(onJsonUsername);
    }    
}

function onJsonEmail(json) {
 
    if (json.esiste) {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email span').classList.add('errore');
    } else {
        document.querySelector('.email span').classList.remove('errore');
    }
}

function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email span').classList.add('errore');

    } else {
        fetch("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(onResponse).then(onJsonEmail);
    }
}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (passwordInput.value.length >= 8) {
        document.querySelector('.password span').classList.remove('errore');
    } else {
        document.querySelector('.password span').classList.add('errore');
    }
}

document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkName);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);

if (document.querySelector('.errore') !== null) {
    document.querySelector('.name input').dispatchEvent(new Event('blur'));
    document.querySelector('.surname input').dispatchEvent(new Event('blur'));
    document.querySelector('.username input').dispatchEvent(new Event('blur'));
    document.querySelector('.email input').dispatchEvent(new Event('blur'));
    document.querySelector('.password input').dispatchEvent(new Event('blur'));
}
