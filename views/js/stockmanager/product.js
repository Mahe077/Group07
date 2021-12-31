
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
    const rows = document.getElementById("items");
    for(var i=0;i < obj.length; i++)
     {
      rows.innerHTML +=
          
         
          '<div class="box">' +
          '<p id="id"> ID:' +  obj[i].productId+  '</P>' + 
          '<img id="imagebox" id="imagebox" src="' + obj[i].image_path  + '" alt="">' +
          '<p id="brand"> Brand:' + obj[i].brand + ' </P>' +
          '<p id="price"> Price:' + obj[i].price + ' </P>' +
          '<p id="genuine"> Genuine:' + obj[i].genuine + '</P>' +
          '<p id="amount"> Amount:'  + obj[i].amount + '</P>' +
             
              
          '</div>'
  }
  }
};


httprequest.open("POST", "Stockmanagerproduct/Loadproducts" , true);

httprequest.send();


