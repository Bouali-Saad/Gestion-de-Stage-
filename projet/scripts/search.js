const search=document.getElementById("bare");
const sb=document.getElementById("sb");
const annonce=document.querySelectorAll(".annonce");
let offers=[]
sb.addEventListener("click" , ()=>{
    const value=search.target.value;
    offers.forEach(offer=>{
        const visible=offer.nom.includes(value) || offer.ville.includes(value) || offer.nom.includes(value)
        offer.element.classList.toggle("hide" , !visible)
    })
})

fetch("../../data/OffreStageData.json").then((res)=>{
    res.json();
}).then(data=>{
    offers=data.map(offer=>{
        annonces.innerHTML = ''
        offers.forEach(offer => {
        const div = cardTemplate.content.cloneNode(true)
        div.querySelector('[title]').textContent = offer.titre
        div.querySelector('[duree]').textContent = offer.duration
        div.querySelector('[entreprise-name]').textContent = offer.nom_complet
        div.querySelector('[ville]').textContent = offer.ville
        annonces.append(div)
        return {nom:offer.nom_complet , ville:offer.ville , duration:offer.duration}
    })
})
