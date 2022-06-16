let searchForm = document.forms.searchEvent;

searchForm.onsubmit = function (e) {

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4){
            if (xhr.status ===200){
                let jsonEvents = xhr.responseText;
                let events = JSON.parse(jsonEvents);
                const contentDiv = document.getElementById('content');
                contentDiv.innerHTML = '';

                console.log(events)
                for (let key in events){

                    contentDiv.innerHTML += `
                    <form class="iterable" name="iterable" method="post" action="">
                        <label>Data:
                            <input type="date" name="date" value="${events[key].date}">
                        </label>
                        <label>Start at:
                            <input type="time" name="start" value="${events[key].start_at}">
                        </label>
                        <label>Finish at:
                            <input type="time" name="finish" value="${events[key].finish_at}">
                        </label>
                        <label>Title:
                            <input type="text" name="title" value="${events[key].title}">
                        </label>
                        <label>Description:
                            <input type="text" name="description" value="${events[key].description}">
                        </label>
                        <input type="hidden" name="id" value="${events[key].id}">
                        <button class="create-btn" name="create-btn" type="button" class="btn btn-info"><i class="fa fa-plus"></i> Update event</button>
                        <button class="delete-btn" name="delete-btn" type="button" class="btn btn-info"><i class="fa fa-trash"></i> Delete event</button>
                    </form>`;

                }

            }else {
                alert('Some problem with request');
                console.error('request of all articles are failed with status' + xhr.status+' '+xhr.statusText)
            }
        }
    }
    let method = this.method;
    let first = this.dateStart.value;
    let second = this.dateFinish.value;

    xhr.open(method, `http://first-calendar.local/api/calendar/?first=${first}&second=${second}`);

    xhr.send();
    e.preventDefault();
}
