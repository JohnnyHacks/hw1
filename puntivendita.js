
function onJsonSupermercato(json){
    const sezione = document.querySelector(".listaSupermercati");
    const prefazione = sezione.querySelector("h1");
    const prefazione2 = sezione.querySelector("h2");
    
    prefazione.textContent=prefazione.textContent+json.numeroSupermercati+" supermercati";
    prefazione2.textContent=prefazione2.textContent+json.nomeCatena;

    for(let i=0; i<json.numeroSupermercati;i++){
        const sezioneTesto = document.querySelector(".sezioneTesto");

        const sezioneSupermercato = document.createElement("div");
        sezioneSupermercato.classList.add("singoloSupermercato");
        const codiceSupermercato = document.createElement("div");
        codiceSupermercato.classList.add("hidden");
        codiceSupermercato.textContent=json[i].codice;
        const indirizzo = document.createElement("div");
        indirizzo.innerHTML="<b>Indirizzo:</b> "+json[i].indirizzo;
        const citta = document.createElement("div");
        citta.innerHTML="<b>Città:</b> "+json[i].città;
        const telefono = document.createElement("div");
        telefono.innerHTML="<b>Telefono:</b> "+json[i].telefono;
        const nReparti = document.createElement("div");
        nReparti.innerHTML="<b>Numero reparti:</b> "+json[i].numeroReparti;
        const tipReparti = document.createElement("div");
        tipReparti.classList.add("tipReparti");
        tipReparti.textContent = "I reparti presenti sono:"


        sezioneSupermercato.appendChild(codiceSupermercato);
        sezioneSupermercato.appendChild(indirizzo);
        sezioneSupermercato.appendChild(citta);
        sezioneSupermercato.appendChild(telefono);
        sezioneSupermercato.appendChild(nReparti);
        sezioneSupermercato.appendChild(tipReparti);
        sezioneTesto.appendChild(sezioneSupermercato);
    }
}

function onJsonReparto(json){
    const s= document.querySelectorAll(".singoloSupermercato");

    for(let j=0;j<json.length;j++){
        for(let y=0;y<s.length;y++){
            if(json[j].codiceSupermercato == s[y].querySelector(".hidden").textContent){
                const reparto = document.createElement("div");
                reparto.textContent=json[j].tipologiaReparto;

                s[y].appendChild(reparto);

            }
        }
    }
}

function onResponse(response){
    return response.json();
}
  
fetch("informazionisupermercato.php?q=supermercato").then(onResponse).then(onJsonSupermercato);

setTimeout(() => fetch("informazionisupermercato.php?q=reparto").then(onResponse).then(onJsonReparto), 100); 