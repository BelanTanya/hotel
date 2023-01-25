
    const like = document.querySelectorAll('.like')
    const basketId = document.querySelectorAll('.basket')
    const requestAction = 'aja'
    const basketAction = 'basket'
    for(i = 0; i < like.length; i++){
        const exampleAttr = like[i].getAttribute('value');
        const mylikef = like[i];
    like[i].addEventListener("click", function(e) {
        const body = exampleAttr
        const mylike = mylikef
        mylike.classList.toggle('active_h');
        sendRequest('POST', requestAction, body)
        .then(data => console.log(data))
        .catch(err => console.log(err))
    })
}
for(i = 0; i < basketId.length; i++){
    const basketAttr = basketId[i].getAttribute('value');
    basketId[i].addEventListener("click", function(e) {
    const basketBody = basketAttr
    sendRequest('POST', basketAction, basketBody)
    .then(data => console.log(data))
    .catch(err => console.log(err))
})
}

sendRequest('GET', basketAction)
    .then(data => console.log(data))
    .catch(err => console.log(err))

function sendRequest(method, url, body = null){
    const headers = {
        'X-Requested-With': 'XMLHttpRequest',
        'content-type': 'application/x-www-form-urlencoded'
    }

    return fetch(url, {
        method: method,
        body: JSON.stringify(body),
        headers : headers
    }).then(response => {
        if(response.ok){
            return  response.text();
        }
        return response.json().then(error =>  {
            const e = new Error('Ошибка')
            e.data = error
            throw e
        })
    })
}
