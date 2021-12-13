function openForm() {
  document.getElementById("popupForm").style.display = "block";
}
function closeForm() {
  document.getElementById("popupForm").style.display = "none";
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
  // console.log(obj);
//   for(var i = 0 ; i< obj.length ; i++)
//   {
//     obj[i].productid = obj[i].productid;
    
//     obj[i].brand = obj[i].brand;
//     // console.log(obj[i].brand);
//     obj[i].price = obj[i].price;
//     obj[i].genuine = obj[i].genuine;
//     obj[i].amount = obj[i].amount;
//   }
// }



const rows = document.getElementById("items");
// loaddata()

// function loaddata(){
//   const obj = JSON.parse(httprequest.responseText);
  for(var i=0;i < obj.length; i++)
   {
    rows.innerHTML +=
        '<div class="box-container" id="box-container"> ' +
        '<div class="box">' +
        '<div class="imagebox" id="imagebox">' +
   
        '</div> ' +
       
        '<p id="id"> ID:' +  obj[i].productid +  '</P>' + 
         
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


