const aggPreferiti= 'https://image.flaticon.com/icons/png/128/116/116286.png?ga=GA1.2.1746131912.1618099200';
const rimPreferiti= 'https://image.flaticon.com/icons/png/128/56/56786.png?ga=GA1.2.1623233742.1618704000';

function onResponse(response){
  return response.json();
}

fetch("piloti/caricamento").then(onResponse).then(onJSONPilota);
fetch("piloti/carica_pref").then(onResponse).then(caricaPreferiti);

function onJSONPilota(json){
    
    console.log(json);
    const sezPiloti= document.querySelector("#grid");
  
    for (let i in json){
      const divPilota= document.createElement("div");
      sezPiloti.appendChild(divPilota);  
      divPilota.classList.add('flex');
  
      const h1=document.createElement("h1");   
      const car=document.createElement("img");  
      const img=document.createElement("img");
      const span=document.createElement("span");
      const des=document.createElement("p");
      const info=document.createElement("strong");
      
      const index=json[i].id_pilota;
      divPilota.setAttribute("data-index",index);
      
      h1.textContent= json[i].nome;
      divPilota.appendChild(h1);      
      
      img.src= json[i].immagine;
      divPilota.appendChild(img);
      
      img.classList.add('image');
      car.src= aggPreferiti;
      divPilota.appendChild(car);
      car.classList.add('preferiti');
      
      info.textContent='Più informazioni';
      divPilota.appendChild(info);
      
      span.textContent= json[i].id_pilota;
			span.dataset.codice=json[i].id_pilota;
      divPilota.appendChild(span);
      span.classList.add('hidden');
      
      des.textContent= json[i].descrizione;
      divPilota.appendChild(des);
      des.classList.add('hidden');
  
    }
  
    const grid=document.querySelectorAll("#grid strong");
    for(let gr of grid){
      gr.addEventListener('click', mostra);
    }
  
    const preferito=document.querySelectorAll('.preferiti');
    for(let c of preferito){
      c.addEventListener('click', aggiungiPreferiti);
    }
  }
  
  function mostra (event){
    const dettagli = event.currentTarget.parentNode.querySelector('p');
    const text = event.currentTarget.parentNode.querySelector('strong');
    if(text.textContent=== 'Più informazioni'){
      text.textContent='Meno informazioni';
      dettagli.classList.remove('hidden');
    }else{
      dettagli.classList.add('hidden');
      text.textContent='Più informazioni';
    }
  }
  
  function caricaPreferiti(json){    
    console.log(json);  
    if(json.length!=0){
      const pref = document.querySelector("#favorite"); 
      pref.classList.remove('hidden');
    }else{
      const pref = document.querySelector("#favorite"); 
      pref.classList.add('hidden');
    }
    const sezPref= document.querySelector("#sezPreferiti");
    sezPref.innerHTML='';

  
    for (let i in json){      
      const divPref= document.createElement("div");
      sezPref.appendChild(divPref);  
      divPref.classList.add('flex');   

      const index=json[i].id_preferito;
      divPref.setAttribute("data-index",index);
      
      const h1=document.createElement("h1");
      h1.textContent= json[i].nome;
      divPref.appendChild(h1);

      const img=document.createElement("img");
      img.src= json[i].immagine;
      divPref.appendChild(img);
      img.classList.add('image');      

      const car=document.createElement("img");
      car.src= rimPreferiti;
      divPref.appendChild(car);
      car.classList.add('preferiti');

      const p=document.createElement("p");
      p.textContent= json[i].descrizione;
      divPref.appendChild(p);
      p.classList.add('hidden');

      const didascalia=document.createElement("strong");
      didascalia.textContent='Più informazioni';
      divPref.appendChild(didascalia);

      const span=document.createElement("span");
      span.textContent= json[i].id_preferito;
			span.dataset.codice=json[i].id_preferito;
      divPref.appendChild(span);
      span.classList.add('hidden');

      const grid=document.querySelectorAll("#sezPreferiti strong");
        for(let gr of grid){
          gr.addEventListener('click', mostra);
      }

      const preferito=document.querySelectorAll('.preferiti');
        for(let c of preferito){
          c.addEventListener('click', rimuoviPreferiti);
	    }

    }
  }

	function aggiungiPreferiti(event){        
		target=event.currentTarget;
		let code=target.parentNode.dataset.index;
    console.log(code);
		fetch('piloti/aggiungi_pref/'+ encodeURIComponent(code)).then(onResponse).then(caricaPreferiti);
	}

  function rimuoviPreferiti(event){        
		target=event.currentTarget;
		let code2=target.parentNode.dataset.index;
    console.log(code2);
		fetch('piloti/rimuovi_pref/'+ encodeURIComponent(code2)).then(onResponse).then(caricaPreferiti);
	}

	/*function addPrefJson(json){
    console.log(json);
		const sezPref= document.querySelector("#sezPreferiti");
    sezPref.innerHTML='';
		for (let i in json){
      const divPref= document.createElement("div");
      sezPref.appendChild(divPref);  
      divPref.classList.add('flex');
   
      
      const h1=document.createElement("h1");
      h1.textContent= json[i].nome;
      divPref.appendChild(h1);

      const img=document.createElement("img");
      img.src= json[i].immagine;
      divPref.appendChild(img);
      img.classList.add('image');      

      const car=document.createElement("img");
      car.src= rimPreferiti;
      divPref.appendChild(car);
      car.classList.add('preferiti');

      const p=document.createElement("p");
      p.textContent= json[i].descrizione;
      divPref.appendChild(p);
      p.classList.add('hidden');

      const didascalia=document.createElement("strong");
      didascalia.textContent='Più informazioni';
      divPref.appendChild(didascalia);

      const grid=document.querySelectorAll("#sezPreferiti strong");
        for(let gr of grid){
          gr.addEventListener('click', mostra);
      }

      const preferito=document.querySelectorAll('.preferiti');
        for(let c of preferito){
          c.addEventListener('click', rimuoviPreferiti);
	    }
    }
  }*/

  

