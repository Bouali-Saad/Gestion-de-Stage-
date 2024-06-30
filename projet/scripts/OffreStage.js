const annonces = document.querySelector('.annoces')
const cardTemplate = document.getElementById('card-template')
const detailEntreprise=document.querySelector('[detail-entreprise-name]')
// const detailTitle=document.querySelector('[detail-title]')
// const detailVille=document.querySelector('[detail-ville]')
// const detailDuree=document.querySelector('[detail-duree]')
for (let i = 0; i < 10; i++) {
    annonces.append(cardTemplate.content.cloneNode(true))
}

fetch("/data/OffreStageData.json")
    .then(res => res.json())
    .then(posts => {
      annonces.innerHTML = ''
      posts.forEach(post => {
        const div = cardTemplate.content.cloneNode(true)
        div.querySelector('[title]').textContent = post.title
        div.querySelector('[duree]').textContent = post.duree
        div.querySelector('[entreprise-name]').textContent = post.entreprise
        div.querySelector('[ville]').textContent = post.entreprise
        annonces.append(div)
        // detailDesc.textContent =post.description
        // detailDuree.textContent =post.duree
        // detailEntreprise.textContent =post.entreprise
        // detailTitle.textContent =post.title
      })
    })
// const open=document.getElementById('open')  
// const close=document.getElementById('close')  

// open.addEventListener('click' , ()=>{
//     displayed.classList.add("open")
// })
// close.addEventListener('click' , ()=>{
//     displayed.classList.remove("open")
// })