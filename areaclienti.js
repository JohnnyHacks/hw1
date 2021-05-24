function onJson(json)
{
        const sezione = document.querySelector('#lista');

        for(let i=0; i<json.length;i++)
        {
                nome= json[i].nome;
                image = json[i].immagine;
                quantita = json[i].quantita;
                prezzo = json[i].prezzo;
                numero = json[i].numero;

                const h1 = document.createElement('h1');
                h1.textContent = nome;
                const h2 = document.createElement('h2');
                h2.textContent = "x"+numero;
                const icona = document.createElement('img');
                icona.src = 'img/remove.png';
                icona.classList.add('icona');
                const titolo = document.createElement('div');
                titolo.classList.add('titolo');
                const img = document.createElement('img');
                img.src = image;
                
                const dettagli = document.createElement('div');
                dettagli.classList.add('details');

                const pulsante = document.createElement('div');
                pulsante.textContent="Mostra dettagli";

                const desc = document.createElement('div');
                desc.classList.add('descrizione');
                desc.classList.add('hidden');
                const span1 = document.createElement('span');
                const span2 = document.createElement('span');
                span1.textContent=quantita;
                span2.textContent=prezzo +" euro";


                desc.appendChild(span1);
                desc.appendChild(span2);

                const oggetto = document.createElement('div');
                oggetto.classList.add('oggetto');

                sezione.appendChild(oggetto);
                titolo.appendChild(icona);
                titolo.appendChild(h1);
                titolo.appendChild(h2); 
                oggetto.appendChild(titolo);
                oggetto.appendChild(img);
                oggetto.appendChild(dettagli);
                dettagli.appendChild(pulsante);
                dettagli.appendChild(desc);

                dettagli.addEventListener('click', mostraDettagli);
                icona.addEventListener('click', rimuoviDalCarrello);
        }
}

function onResponse(response){
        return response.json();
}

fetch("mostracarrello.php").then(onResponse).then(onJson);

function mostraDettagli(e){

    flag = e.currentTarget.querySelector('.hidden');
    
    if(flag){
             e.currentTarget.querySelector('div .descrizione').classList.remove('hidden');
             e.currentTarget.querySelector('div').textContent="Nascondi dettagli";
    }
    else{
             e.currentTarget.querySelector('div .descrizione').classList.add('hidden');
             e.currentTarget.querySelector('div').textContent="Mostra dettagli";
    }
}

function aggiornaElementi(e)
{
        const nomiProdotti = document.querySelectorAll('.oggetto .titolo h1');
        const prodotti = document.querySelectorAll('.oggetto');

        for(let i=0; i<prodotti.length;i++){
                prodotti[i].classList.remove('hidden');
        }

        for(let i=0; i<prodotti.length;i++)
        {
                a=nomiProdotti[i].textContent.toLowerCase();
                b=e.target.value.toLowerCase();
                var count=0;
                if(a.includes(b)){
                        count++;
                }
                if(count == 0){
                        prodotti[i].classList.add('hidden');
                }
        }
}

const input = document.querySelector('input');

input.addEventListener('input', aggiornaElementi);


//Rimozione carrello

function onJsonRimozione(json){
    location.href='areaclienti.php';
    fetch("mostracarrello.php").then(onResponse).then(onJson);
}

function rimuoviDalCarrello(event){
    const nomeProdotto=event.currentTarget.parentNode.querySelector("h1").textContent;
    fetch("eliminaprodotto.php?&q="+nomeProdotto).then(onResponse).then(onJsonRimozione);
}