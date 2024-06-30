const pathName=window.location.pathname;
const links=document.querySelectorAll('a');
const list=document.getElementById("list");
links.forEach(link=>{
    if(link.href.includes(`${pathName}`)){
        list.classList.add('active')
    }
})