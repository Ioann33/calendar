let searchForm = document.forms.searchEvent;

async function deleteEvent(id){

    const res = await fetch(`http://first-calendar.local/api/calendar/${id}`,{
        method: 'DELETE',
        headers: {
            'Content-Type' : 'application/json',
        }
    });
    const data = await res.json();
    if (data){
        document.getElementById(`event${id}`).remove()
    }

}


function eventsToHtml(events){
    const contentDiv = document.getElementById('content');

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
                        <button onclick="deleteEvent(${events[key].id})" class="delete-btn" name="delete-btn" type="button" class="btn btn-info"><i class="fa fa-trash"></i> Delete event</button>
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

                // const contentDiv = document.getElementById('content');
                // contentDiv.innerHTML = '';
                //
                //
                // for (let key in events){
                //
                //     contentDiv.innerHTML += `
                //     <form class="iterable" id="${events[key].id}" method="post" action="">
                //         <label>Data:
                //             <input type="date" name="date" value="${events[key].date}">
                //         </label>
                //         <label>Start at:
                //             <input type="time" name="start" value="${events[key].start_at}">
                //         </label>
                //         <label>Finish at:
                //             <input type="time" name="finish" value="${events[key].finish_at}">
                //         </label>
                //         <label>Title:
                //             <input type="text" name="title" value="${events[key].title}">
                //         </label>
                //         <label>Description:
                //             <input type="text" name="description" value="${events[key].description}">
                //         </label>
                //         <input type="hidden" name="id" value="${events[key].id}">
                //         <a href="#${events[key].id}" class="update-btn">Update</a>
                //
                //         <input type="submit" class="delete-btn" value="delete">
                //     </form>`;
                // }

                // let upDataBtn = document.getElementById();
                // console.log(upDataBtn);
                // upDataBtn.onsubmit = function (e) {
                //     alert('hello');
                //     e.preventDefault()
                // }
                // contentDiv.innerHTML +=`<script src="http://first-calendar.local/js/update.js"></script>`;
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

    // async function getAllEvents(){
    //     const res =await fetch(`http://first-calendar.local/api/calendar/?first=${first}&second=${second}`);
    //     const events = await res.json();
    // }


    // fetch(`http://first-calendar.local/api/calendar/?first=${first}&second=${second}`)
    //     .then(response => response.json())
    //     .then(json => json);
    // console.log(allEvents)

    e.preventDefault();
}

