function display1() {
  document.getElementById("detail-container1").style.display = "block";
  document.getElementById("detail-container2").style.display = "none";
  document.getElementById("detail-container3").style.display = "none";
  document.getElementById("detail-container4").style.display = "none";
}
function display2() {
  document.getElementById("detail-container1").style.display = "none";
  document.getElementById("detail-container2").style.display = "block";
  document.getElementById("detail-container3").style.display = "none";
  document.getElementById("detail-container4").style.display = "none";
}
function display3() {
  document.getElementById("detail-container1").style.display = "none";
  document.getElementById("detail-container2").style.display = "none";
  document.getElementById("detail-container3").style.display = "block";
  document.getElementById("detail-container4").style.display = "none";
}
function display4() {
  document.getElementById("detail-container1").style.display = "none";
  document.getElementById("detail-container2").style.display = "none";
  document.getElementById("detail-container3").style.display = "none";
  document.getElementById("detail-container4").style.display = "block";
}

let httprequest1  = new XMLHttpRequest();
const rows = document.getElementById("detail-container1");
const rows2 = document.getElementById("detail-container2");
const rows3 = document.getElementById("detail-container3");
const rows4 = document.getElementById("detail-container4");
httprequest1.open("POST", "Stockmanagerteam/show" , true);
httprequest1.onreadystatechange = function()
{

  console.log("onreadystatechange");
  if( httprequest1.readyState === 4 && httprequest1.status === 200)
  {
    console.log(httprequest1.responseText);
    const obj = JSON.parse(httprequest1.responseText);
    console.log(obj);
      rows.innerHTML +=
          
         
          '<div class="box">' +
          '<p id="id"> ID:' +  obj[0].id+  '</P>' + 
          '<div class="image1">' + 
          '<img  src="' + obj[0].image_path  + '" alt="">' +
           '</div>' +
          // '<p id="image">' + obj[i].image_path + '</p>' +
          // '<img id="imagebox" id="imagebox" src="' + obj[i].image_path  + '" alt="">' +
          '<p id="brand"> First Name:' + obj[0].fname + ' </P>' +
          '<p id="price"> Last Name:' + obj[0].lname + ' </P>' +
          '<p id="genuine"> Location:' + obj[0].location + '</P>' +
          '<p id="amount"> Date Of Appointed:'  + obj[0].date_of_appointed + '</P>' +
             
              
          '</div>'
  // }






  rows2.innerHTML +=
          
         
  '<div class="box">' +
  '<p id="id"> ID:' +  obj[1].id+  '</P>' + 
  '<div class="image1">' + 
          '<img  src="' + obj[1].image_path  + '" alt="">' +
           '</div>' +
  // '<p id="image">' + obj[i].image_path + '</p>' +
  // '<img id="imagebox" id="imagebox" src="' + obj[i].image_path  + '" alt="">' +
  '<p id="brand"> First Name:' + obj[1].fname + ' </P>' +
  '<p id="price"> Last Name:' + obj[1].lname + ' </P>' +
  '<p id="genuine"> Location:' + obj[1].location + '</P>' +
  '<p id="amount"> Date Of Appointed:'  + obj[1].date_of_appointed + '</P>' +
     
      
  '</div>'




  rows3.innerHTML +=
          
         
  '<div class="box">' +
  '<p id="id"> ID:' +  obj[2].id+  '</P>' + 
  '<div class="image1">' + 
          '<img  src="' + obj[2].image_path  + '" alt="">' +
           '</div>' +
  // '<p id="image">' + obj[i].image_path + '</p>' +
  // '<img id="imagebox" id="imagebox" src="' + obj[i].image_path  + '" alt="">' +
  '<p id="brand"> First Name:' + obj[2].fname + ' </P>' +
  '<p id="price"> Last Name:' + obj[2].lname + ' </P>' +
  '<p id="genuine"> Location:' + obj[2].location + '</P>' +
  '<p id="amount"> Date Of Appointed:'  + obj[2].date_of_appointed + '</P>' +
     
      
  '</div>'


  rows4.innerHTML +=
          
         
  '<div class="box">' +
  '<p id="id"> ID:' +  obj[3].id+  '</P>' + 
  '<div class="image1">' + 
          '<img  src="' + obj[3].image_path  + '" alt="">' +
           '</div>' +
  // '<p id="image">' + obj[i].image_path + '</p>' +
  // '<img id="imagebox" id="imagebox" src="' + obj[i].image_path  + '" alt="">' +
  '<p id="brand"> First Name:' + obj[3].fname + ' </P>' +
  '<p id="price"> Last Name:' + obj[3].lname + ' </P>' +
  '<p id="genuine"> Location:' + obj[3].location + '</P>' +
  '<p id="amount"> Date Of Appointed:'  + obj[3].date_of_appointed + '</P>' +
     
      
  '</div>'
  }

};


httprequest1.send();












