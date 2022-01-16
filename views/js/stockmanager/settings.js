

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


const httprequest1  = new XMLHttpRequest();
const rows = document.getElementById("card-count");
httprequest1.open("POST", "Stockmanagersettings/lastadded" , true);
httprequest1.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest1.readyState === 4 && httprequest1.status === 200)
  {
    console.log(httprequest1.responseText);
    console.log("pavi");
        const obj = JSON.parse(httprequest1.responseText);
        console.log(obj);
        for(var i = 0 ; i< obj.length ; i++)
        {
          rows.innerHTML +=
        `<p> ID :  ${obj[i].id} </p>
        <img  id="imagebox" src="${obj[i].image_path}" alt="">
        <p> Brand : ${obj[i].brand} </p>
        <p> Color : ${obj[i].color} </p>
        <p> Description : ${obj[i].description} </p> `
        
       }
 
  }

};
httprequest1.send();

const httprequest2  = new XMLHttpRequest();
const rows1 = document.getElementById("card-sum");
httprequest2.open("POST", "Stockmanagersettings/lastsold" , true);
httprequest2.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest2.readyState === 4 && httprequest2.status === 200)
  {
    console.log(httprequest2.responseText);
    console.log("pavi");
        const obj1 = JSON.parse(httprequest2.responseText);
        console.log(obj1);
        for(var i = 0 ; i< obj1.length ; i++)
        {
          rows1.innerHTML +=
        `<p> ID :  ${obj1[i].id} </p>
        <img  id="imagebox" src="${obj1[i].image_path}" alt="">
        <p> Brand : ${obj1[i].brand} </p>
        <p> Color : ${obj1[i].color} </p>
        <p> Description : ${obj1[i].description} </p> `
        
       }
 
  }

};
httprequest2.send();









const httprequest3  = new XMLHttpRequest();
const rows2 = document.getElementById("card-profit");
httprequest3.open("POST", "Stockmanagersettings/moststocked" , true);
httprequest3.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest3.readyState === 4 && httprequest3.status === 200)
  {
    console.log(httprequest3.responseText);
        const obj2 = JSON.parse(httprequest3.responseText);
        console.log(obj2);
        for(var i = 0 ; i< obj2.length ; i++)
        {
          rows2.innerHTML +=
        `<p> ID :  ${obj2[i].id} </p>
        <img  id="imagebox" src="${obj2[i].image_path}" alt="">
        <p> Brand : ${obj2[i].brand} </p>
        <p> Color : ${obj2[i].color} </p>
        <p> Description : ${obj2[i].description} </p> `
        
       }
 
  }

};
httprequest3.send();