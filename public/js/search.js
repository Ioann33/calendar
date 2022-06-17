let searchForm = document.forms.searchEvent;

// async function getAllEvents(){
//     let first = searchForm.dateStart.value;
//     let second = searchForm.dateFinish.value;
//     const res =await fetch(`http://first-calendar.local/api/calendar/?first=${first}&second=${second}`);
//     const events = await res.json();
//     eventsToHtml(events);
// }

async function deleteEvent(id){

    const res = await fetch(`http://first-calendar.local/api/calendar/${id}`,{
        method: 'DELETE',
        headers: {
            'Content-Type' : 'application/json',
        }
    });
    const data = await res;
    if (data){
        document.getElementById(`event${id}`).remove()
    }

}

async function updateEvent(id) {

    let values = document.querySelectorAll(`#event${id} input`);
    let resArr = [
        values[0].value,
        values[1].value,
        values[2].value,
        values[3].value,
        values[4].value
    ];


    const res = await fetch(`http://first-calendar.local/api/calendar/${id}`,{
        method: 'PATCH',
        headers: {
            'Content-Type' : 'application/json'
        },
        body: JSON.stringify(resArr),
    });

    const data = await res;
    // if (data){
    //     searchForm.onsubmit();
    // }



}


function eventsToHtml(events){
    const contentDiv = document.getElementById('content');
    contentDiv.innerHTML = '';
    for (let key in events){
        contentDiv.insertAdjacentHTML('beforeend',`
                        <div id="event${events[key].id}">
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
                        <button onclick="updateEvent(${events[key].id})" class="update-btn" name="create-btn" type="button" class="btn btn-info"><i class="fa fa-plus"></i> Update </button>
                        <button onclick="deleteEvent(${events[key].id})" class="delete-btn" name="delete-btn" type="button" class="btn btn-info"><i class="fa fa-trash"></i> Delete </button>
                        </div>
                    `);
    }
}


searchForm.onsubmit = function (e) {

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4){
            if (xhr.status ===200){
                let jsonEvents = xhr.responseText;
                let events = JSON.parse(jsonEvents);
                eventsToHtml(events);
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

