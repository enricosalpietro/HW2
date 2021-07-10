const form=document.forms['commenta'];
if(form!=null){
form.addEventListener("submit", addCommento);
}

function onResponse(response){
    return response.json();
  }
  
fetch("gare/carica").then(onResponse).then(onJSONRace);
fetch('gare/fetch_commenti').then(onResponse).then(fetchCommentiJson);

function onJSONRace(json){
    
  console.log(json);
  const sezRace= document.querySelector("#gare");

  for (let i in json){

    const divRace= document.createElement("div");
    sezRace.appendChild(divRace);  
    divRace.classList.add('flex');
    
    const h1=document.createElement("h1"); 
    const img=document.createElement("img");
    const new_p=document.createElement("p");
    const span=document.createElement("span");
    const info=document.createElement("strong");
    const index=json[i].id_Race;
    divRace.setAttribute("data-index",index);
    h1.textContent= json[i].titolo;
    divRace.appendChild(h1);      
    img.src= json[i].immagine; 
    divRace.appendChild(img);  
    info.textContent='Sintesi';
    divRace.appendChild(info);
    new_p.textContent = json[i].descrizione;  
    divRace.appendChild(new_p);   
    new_p.classList.add('hidden');  
    
  } 

  const grid=document.querySelectorAll("#gare strong");
  for(let gr of grid){
    gr.addEventListener('click', mostra);
  }

} 

const grid=document.querySelectorAll("#race strong");
  for(let gr of grid){
    gr.addEventListener('click', mostra);
  }

function mostra (event){
  const dettagli = event.currentTarget.parentNode.querySelector('p');
  const text = event.currentTarget.parentNode.querySelector('strong');
  if(text.textContent=== 'Sintesi'){
    text.textContent='Mostra meno';
    dettagli.classList.remove('hidden');
  }else{
    dettagli.classList.add('hidden');
    text.textContent='Sintesi';
  }
}



function fetchCommentiJson(json){
  console.log(json);
  for(let i in json){
    
    const container=document.createElement("div");
    container.classList.add("commento");
    const username=document.createElement("h2");
    username.textContent=json[i].username;
    container.appendChild(username);
    const commento=document.createElement("p");
    commento.textContent=json[i].commento;
    container.appendChild(commento);
    document.querySelector(".commenti_content").appendChild(container);    
  }
}

function addCommento(event){
  event.preventDefault();
  fetch("gare/add_commento/"+ encodeURIComponent(form.commento.value)).then(onResponse).then(commentiJson);
}

function commentiJson(json){
  console.log(json);
  for(let i in json){
    
    const container=document.createElement("div");
    container.classList.add("commento");
    const username=document.createElement("h2");
    username.textContent=json[i].username;
    container.appendChild(username);
    const commento=document.createElement("p");
    commento.textContent=json[i].commento;
    container.appendChild(commento);
    document.querySelector(".commenti_content").appendChild(container);
    form.commento.value="";
  }
}