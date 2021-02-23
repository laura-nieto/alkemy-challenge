const buttonMenu = document.querySelector('.button-dropdown');
const dropdown = document.querySelector('.dropdown--content')

buttonMenu.addEventListener('click',()=>{
    if(dropdown.style.display==='none'){
        dropdown.style.display='block'
    } else {
        dropdown.style.display='none'
    } 
})


