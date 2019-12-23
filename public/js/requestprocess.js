function requestProcess(data,render = console.log(data)){
    if(!data.url) return 'URL is required';
    if(!data.method) data.method = 'get';
    if(!data.csrfToken) return 'CSRF TOKEN is missing';

    let defaultHeaders = {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'X-CSRF-Token': data.csrfToken,
    }

    fetch(data.url,{
        method: data.method,
        body: JSON.stringify(data),
        headers:  defaultHeaders
    }).then((response) => {
        return response.json();
    })
    .then(json => {
        if(!json.success) throw json;
        return render(json);
    }).catch(error => {
        render(error);
    });

}


















// class requestProcess {
//     constructor(data) {
//         this.url = data.url;

//         if (typeof this.url === 'undefined') {
//             throw "The `Url` parameter is required in Process Request.";
//         }

//         this.method = data.method;

//         if (typeof this.method  === 'undefined') {
//             this.method = 'get';
//         }

//         this.csrfToken = data.csrfToken;
//         this.body = JSON.stringify(data);
//         this.headers =  {
//             'Accept': 'application/json',
//             'Content-Type': 'application/json',
//             "X-CSRF-Token": this.csrfToken
//         } 
//        this.error = null;
//        this.getFetch(this.url, this.method, this.body, this.headers) 
//     }
//     getFetch(url, method, body, headers){
//         fetch(url,{ 
//             method: method,
//             body: body,
//             headers: headers
//         })
//         .then(response => {
//             console.log(response);
//         })
//         .catch(error => {
//             console.log(error) 
//         })
//     }
// }