let searchForm = document.forms.searchEvent;
console.log(searchForm);

searchForm.onsubmit = function (e) {
    let url = this.action;
    console.log(url);
    let firstVal = this.dateStart.value
    let secondVal = this.dateFinish.value
    console.log(firstVal);
    console.log(secondVal);
    alert('hello')
    e.preventDefault();
}
