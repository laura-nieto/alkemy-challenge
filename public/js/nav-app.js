// DROP MENU

const buttonMenu = document.querySelector('.button-dropdown');
const dropdown = document.querySelector('.dropdown--content')

if (buttonMenu) {
    buttonMenu.addEventListener('click', () => {
        if (dropdown.style.display === 'none') {
            dropdown.style.display = 'block'
        } else {
            dropdown.style.display = 'none'
        }
    })
}

// BUTTON BUY

const divBuy = document.querySelector('.div--buy');
const buttonBuy = document.getElementById('button--buy');

if (buttonBuy) {
    buttonBuy.addEventListener('click', () => {
        if (divBuy.style.display === '' || divBuy.style.display === 'none') {
            divBuy.style.display = 'flex';
        }
    });
}

// BUY

const form = document.querySelector('#form--buy');

const user = document.querySelector("#user_id");
const app = document.querySelector('#app_id');

const divError = document.querySelector('.div--messageError');
const messageFront = document.querySelector('.h4--messageError');

if (form) {

    document.addEventListener('submit', async e => {
        e.preventDefault();

        const options = {
            method: 'POST',
            headers: {
                "content-type": "application/json",
            },
            data: JSON.stringify({
                "user_id": user.value,
                "app_id": app.value
            })
        }

        try {

            res = await axios("http://localhost:8000/api/buy", options);

            window.location.href = '/';

        } catch (error) {
            let message = 'Error ' + error.response.status + ": " + error.response.statusText || "Ocurrió un error";
            console.log(message);

            divError.style.display = 'flex'
            messageFront.innerHTML = `Ups, ocurrió un error <br> ${message}`;
        }
    })
}
