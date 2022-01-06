function productload() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "Owner_quotation_Model/Displayquotation");
    xhr.onload = function () {
    let notifi = document.querySelector(".notifi");
    var search = JSON.parse(this.response);
    var_dump(search);
    notifi.innerHTML = "";
    if (search !== null) {
        for (let s of search) {
        notifi.innerHTML += `<div class="notifi-details">
        <div class="name"><b>Name :</b> ${s.name} </div>
        <div class="amount">  ${s.amount} <br></div><br>
        <div class="part">  ${s.part_number} <br></div><br>
        <div class="brand">  ${s.brand}<br> </div><br>
        <div class="date">  ${s.recieved_date} </div><br>
        </div>
        <div class="respond">
                                            
            <a href="respond-quot.php?opr=accept&id="class='btn-ac'>Accept</a>
            <a href="respond-quot.php?opr=reject&id="class='btn-rj'>Reject</a>
        </div>`;
        }
    }
    loadItemOptions(search);

    };
    xhr.send();
    return false;
}