import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let saveForm = document.forms.createEvent;
let searchForm = document.forms.searchEvent;
console.log(searchForm);

saveForm.onsubmit = function (e) {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4){
            if (xhr.status ===200){
                alert('appoint event success');
            }
        }
    }
    let method = this.method;

    xhr.open(method, url);
    let formData = new FormData(this);
    xhr.send(formData);
    e.preventDefault();
}

searchForm.onsubmit = function (e) {
    // let url = this.action;
    // console.log(url);
    // let oneVal = this.dateStart.value
    // console.log(oneVal);
    alert('hello')
    e.preventDefault();
}
