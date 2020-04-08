function requestProcess(data, render = function (data) { console.log(data); }) {

    if (!data.url) throw new Error('URL is required');

    if (!data.csrfToken) throw new Error('CSRF TOKEN is missing');

    data.method = data.method || 'GET';
    let defaultHeaders = {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'X-CSRF-Token': data.csrfToken,
    }
    // console.log(data);
    fetch(data.url,{
        method: data.method,
        body: (data.method == 'GET') ? null : JSON.stringify(data),
        headers:  defaultHeaders
    }).then((response) => {
        return response.json();
    })
    .then(json => {
        if(!json.success) throw json;
        return render(json);
    }).catch(error => {
        return render(error);
    });
}
