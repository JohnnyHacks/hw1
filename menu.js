function mostraMenu(event){
    links = document.querySelector("#linksMenu");
    links.classList.remove('hidden');
    document.body.classList.add('no-scroll');
}

function chiudiMenu(event){
    document.body.classList.remove('no-scroll');
    links = document.querySelector("#linksMenu");
    links.classList.add('hidden');
}

const xButton = document.querySelector("#X");
xButton.addEventListener('click', chiudiMenu);

const menuButton = document.querySelector("#menu");
menuButton.addEventListener('click', mostraMenu);

