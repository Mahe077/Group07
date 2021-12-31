// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}






















//   load  delivery data

const httprequest  = new XMLHttpRequest();
const rows = document.getElementById("table");
console.log("pavi");
httprequest.open("POST", "Stockmanagerdelivery/Displaydelivery" , true);
httprequest.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest.readyState === 4 && httprequest.status === 200)
  {
    console.log(httprequest.responseText);
    
        const obj = JSON.parse(httprequest.responseText);
        console.log(obj);
        for(var i = 0 ; i< obj.length ; i++)
        {
          rows.innerHTML +=
                    '<tbody> ' +
                    '<tr>' +
                    '<td>' +  obj[i].order_id  +  '</td>' +  
                    '<td>' + obj[i].delivery_date + ' </td>' +
                    '<td>' + obj[i].address + ' </td>' +
                    '<td>' + obj[i].company_name + '</td>' +
                   
                       
                       '</tr>' + 
                    '</tbody>'
        }
  }

};
httprequest.send();


