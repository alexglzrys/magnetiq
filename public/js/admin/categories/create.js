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
        console.log(res)
        formElement.reset()
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