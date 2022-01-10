
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
  
 

  

  
  
          
  
// js item upload part

let httprequest  = new XMLHttpRequest();
httprequest.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest.readyState === 4 && httprequest.status === 200)
  {
    console.log(httprequest.responseText);
    const obj = JSON.parse(httprequest.responseText);
    console.log(obj);
    const rows = document.getElementById("table3");
    for(var i=0;i < obj.length; i++)
     {
      rows.innerHTML +=
        '<tbody> ' +
                    '<tr>' +
                    '<td>' +  obj[i].item_id  +  '</td>' +  
                    '<td>' + obj[i].amount + ' </td>' +
                  
                       
                       '</tr>' + 
                    '</tbody>'
  }
  }
};



httprequest.open("POST", "Stockmanagerproduct/Loadproducts" , true);

httprequest.send();


