let saveForm = document.forms.createEvent;


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
    let url = this.action;
    xhr.open(method, url);
    let formData = new FormData(this);
    xhr.send(formData);
    e.preventDefault();
}
