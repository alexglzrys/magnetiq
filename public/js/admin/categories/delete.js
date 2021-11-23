const btnElements = document.querySelectorAll('.btnDeleteCategory');

for (let button of btnElements) {
    button.addEventListener('click', deleteCategory)
}

function deleteCategory(event) {
    event.preventDefault()
    event.stopPropagation()

    fetchData(`${BASE_URL}/admin/categories/destroy/${ID}`, null).then(res => {
        console.log(res)
        document.getElementById(`category-${ID}`).remove()
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