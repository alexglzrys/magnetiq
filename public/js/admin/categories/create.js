const formElement = document.getElementById('formCreateCategory');

formElement.addEventListener('submit', createCategory)

function createCategory(event) {
    event.preventDefault()
    event.stopPropagation()

    let data = new FormData(formElement)

    /*for (var pair of data.entries()) {
        console.log(pair[0]+ ', ' + pair[1]);
    }*/

    fetchData(`${BASE_URL}/admin/categories/store`, data).then(res => {
        removeValidationMessages()
        switch (res.code) {
            case 200:
                formElement.reset()
                break;
            case 400:
                break;
            case 406:
                for (const property in res.validation) {
                    const HTML = `<span class="message-error"><i class="fa fa-exclamation-circle"></i> ${res.validation[property]}</span>`
                    const formControl = document.querySelector(`*[name='${property}']`)

                    formControl.classList.add('is-invalid')
                    formControl.parentNode.insertAdjacentHTML('beforeend', HTML)
                }
                break;
        }
    }).catch(err => {
        console.log(err)
    }).finally(() => {

    })
}

async function fetchData(url, data) {
    const response = await fetch(url, {
        method: 'POST',
        body: data
    })
    return response.json()
}

function removeValidationMessages()
{
    const messages = document.querySelectorAll('.message-error')
    const controls = document.querySelectorAll('.is-invalid')
    for (const message of messages) {
        message.remove('message-error');
    }
    for (const control of controls) {
        control.classList.remove('is-invalid');
    }
}