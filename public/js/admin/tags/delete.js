const btnElements = document.querySelectorAll('.btnDeleteTag');

for (let button of btnElements) {
    button.addEventListener('click', deleteCategory)
}

function deleteCategory(event) {
    event.preventDefault()
    event.stopPropagation()

    const ID = this.dataset.id

    fetchData(`${BASE_URL}/admin/tags/destroy/${ID}`, null).then(res => {
        switch (res.code) {
            case 200:
                Swal.fire("Proceso terminado", res.message, "success");
                document.getElementById(`tag-${ID}`).remove()
                break;
            case 400:
                Swal.fire("Lo sentimos", res.message, "error");
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