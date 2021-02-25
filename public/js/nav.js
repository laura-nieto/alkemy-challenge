// DROP MENU

const buttonMenu = document.querySelector('.button-dropdown');
const dropdown = document.querySelector('.dropdown--content')

buttonMenu.addEventListener('click',()=>{
    if(dropdown.style.display==='none'){
        dropdown.style.display='block'
    } else {
        dropdown.style.display='none'
    } 
})

// BUTTON BUY

const buttonBuy = document.getElementById('button--buy');

const divBuy = document.querySelector('.div--buy');

const buttonNoBuy = document.querySelector('#buy-no');
const buttonYesBuy = document.querySelector('#buy-yes')

    buttonBuy.addEventListener('click',()=>{
        if(divBuy.style.display===''){
            divBuy.style.display='flex';
            buttonNoBuy.addEventListener('click',()=>{
                if(divBuy.style.display==='flex'){
                    divBuy.style.display='none';
                }
            })
        }
    });