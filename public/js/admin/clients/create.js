const formElement = document.getElementById('formCreateClient');

formElement.addEventListener('submit', createCategory)

function createCategory(event) {
    event.preventDefault()
    event.stopPropagation()

    let data = new FormData(formElement)

    /*for (var pair of data.entries()) {
        console.log(pair[0]+ ', ' + pair[1]);
    }*/

    fetchData(`${BASE_URL}/admin/clients/store`, data).then(res => {
        removeValidationMessages()
        switch (res.code) {
            case 200:
                Swal.fire("Proceso terminado", res.message, "success");
                formElement.reset()
                break;
            case 400:
                Swal.fire("Lo sentimos", res.message, "error");
                break;
            case 406:
                Swal.fire("Error de validación", res.message, "error");
                for (const property in res.validation) {
                    const HTML = `<span class="message-error"><i class="fa fa-exclamation-circle"></i> ${res.validation[property]}</span>`
                    let formControl = null
                    if (property === 'categories.*') {
                       formControl = document.querySelector('*[name="categories[]"]')
                    } else if (property === 'networks.*') {
                        formControl = document.querySelector('*[name="networks[]"]')
                    } else {
                        formControl = document.querySelector(`*[name='${property}']`)
                    }
                    formControl.classList.add('is-invalid')
                    formControl.parentNode.insertAdjacentHTML('beforeend', HTML)
                }
                break;
            case 500:
                Swal.fire("Error", res.message, "error");
                break;
        }
    }).catch(err => {
        console.log(err)
        Swal.fire("Error", err.message, "error");
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