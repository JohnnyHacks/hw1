
//Sezione ricetta random
function onJson(json){
   const sezione_testo= document.querySelector('#testo');
   const risultato=json.meals[0];

   const video= document.querySelector('#video');

   link = risultato.strYoutube;
   link =link.replace("watch?v=", "embed/");
   video.childNodes[1].src = link;

   const nome=risultato.strMeal;
   const titolo1= document.createElement('h1');
   titolo1.textContent=nome + " - Preparazione:";

   const desc=risultato.strInstructions;
   const descrizione=document.createElement('div');
   descrizione.textContent=desc;

   const preparazione=document.createElement('div');
   preparazione.classList.add('preparazione');
   preparazione.appendChild(titolo1);
   preparazione.appendChild(descrizione);
   preparazione.appendChild(video);

   const ingredienti=document.createElement('div');
   ingredienti.classList.add('ingredienti');
   const nomi_ingredienti=document.createElement('div');
   nomi_ingredienti.classList.add('nomi_ingredienti');


   const titolo2=document.createElement('h1');
   titolo2.textContent="Gli ingredienti sono:"
   ingredienti.appendChild(titolo2);
   ingredienti.appendChild(nomi_ingredienti);

   for(let i=1; i<=20;i++){
      indice1="strIngredient"+i;
      indice2="strMeasure"+i;
      if(risultato[indice1]!=null && risultato[indice1]!=""){
         const testo=document.createElement('span');
         testo.textContent=risultato[indice1]+ " " +risultato[indice2];
         nomi_ingredienti.appendChild(testo);
      }
   }

   sezione_testo.appendChild(preparazione);
   sezione_testo.appendChild(ingredienti);
}

function onResponse(response){
   return response.json();
}

type = "ricetta_random";
fetch("cerca_contenuto.php?type="+type).then(onResponse).then(onJson);


//Sezione valori nutrizionali

function onJson2(json){
   sezione_prodotto=document.querySelector('#prodotto-scelto');
   sezione_prodotto.innerHTML="";

   const testo_prodotto = document.createElement('div');
   testo_prodotto.classList.add('testo_prodotto');
   testo_prodotto.textContent="Il prodotto selezionato ha: ";

   let valori= document.createElement('span');
   valori.textContent=json.calories +" calorie";
   testo_prodotto.appendChild(valori);
  
   valori= document.createElement('span');
   valori.textContent=json.totalWeight +"g di peso";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.CA.quantity+"% di Calcio";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.CHOCDF.quantity+"% di Carboidrati";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.CHOLE.quantity+"% di Colesterolo";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.FAT.quantity+"% di Grassi";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.FE.quantity+"% di Ferro";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.FIBTG.quantity+"% di Fibre";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.K.quantity+"% di Potassio";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.MG.quantity+"% di Magnesio";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.NA.quantity+"% di Sodio";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.P.quantity+"% di Fosforo";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.PROCNT.quantity+"% di Proteine";
   testo_prodotto.appendChild(valori);

   valori=document.createElement('span');
   valori.textContent=json.totalDaily.ZN.quantity+"% di Zinco";
   testo_prodotto.appendChild(valori);
   
   sezione_prodotto.appendChild(testo_prodotto);
}

function onResponse2(response) {
   return response.json();
 }

function search(event)
{
  event.preventDefault();
  type="valori_nutrizionali";
  const prodotto_input = document.querySelector('#prodotto');
  const prodotto_value = encodeURIComponent(prodotto_input.value);
 
  fetch("cerca_contenuto.php?type="+type+"&q="+prodotto_value).then(onResponse2).then(onJson2);
}

const form = document.querySelector('form');
form.addEventListener('submit', search)