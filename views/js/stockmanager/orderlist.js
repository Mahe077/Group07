function display1() {
  document.getElementById("container1").style.display = "block";
  document.getElementById("container2").style.display = "none";
  document.getElementById("container3").style.display = "none";
  document.getElementById("container4").style.display = "none";
  document.getElementById("container5").style.display = "none";
}
function display2() {
  document.getElementById("container1").style.display = "none";
  document.getElementById("container2").style.display = "block";
  document.getElementById("container3").style.display = "none";
  document.getElementById("container4").style.display = "none";
  document.getElementById("container5").style.display = "none";
}
function display3() {
  document.getElementById("container1").style.display = "none";
  document.getElementById("container2").style.display = "none";
  document.getElementById("container3").style.display = "block";
  document.getElementById("container4").style.display = "none";
  document.getElementById("container5").style.display = "none";
}
function display4() {
  document.getElementById("container1").style.display = "none";
  document.getElementById("container2").style.display = "none";
  document.getElementById("container3").style.display = "none";
  document.getElementById("container4").style.display = "block";
  document.getElementById("container5").style.display = "none";
}




//   load  new order data

const httprequest1  = new XMLHttpRequest();
const rows = document.getElementById("table");
httprequest1.open("POST", "Stockmanagerorderlist/Neworder" , true);
httprequest1.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest1.readyState === 4 && httprequest1.status === 200)
  {
    console.log(httprequest1.responseText);
        const obj = JSON.parse(httprequest1.responseText);
        console.log(obj);
        for(var i = 0 ; i< obj.length ; i++)
        {
          rows.innerHTML +=
                    '<tbody> ' +
                    '<tr>' +
                    '<td>' +  obj[i].order_ID +  '</td>' +  
                   '<td>' + obj[i].order_date + ' </td>' +
                   '<td>' + obj[i].payment + ' </td>' +
                   '<td>' + obj[i].total_payment + '</td>' +
                   '<td>'  + obj[i].approximate_d_date + '</td>' +
                       
                       '</tr>' + 
                    '</tbody>'
       }
 
  }

};
httprequest1.send();



// load pending data

const httprequest2  = new XMLHttpRequest();
const rows1 = document.getElementById("table1");
httprequest2.open("POST", "Stockmanagerorderlist/Pendingorder" , true);
httprequest2.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest2.readyState === 4 && httprequest2.status === 200)
  {
    console.log(httprequest2.responseText);
    const obj1 = JSON.parse(httprequest2.responseText);
        console.log(obj1);
        for(var i = 0 ; i< obj1.length ; i++)
        {
          rows1.innerHTML +=
                    '<tbody> ' +
                    '<tr>' +
                    '<td>' +  obj1[i].order_ID  +  '</td>' +  
                    '<td>' + obj1[i].order_date + ' </td>' +
                    '<td>' + obj1[i].payment + ' </td>' +
                    '<td>' + obj1[i].total_payment + '</td>' +
                       
                       '</tr>' + 
                    '</tbody>'
        }
  }

};
httprequest2.send();




 // load cancel data

const httprequest3  = new XMLHttpRequest();
const rows2 = document.getElementById("table2");
httprequest3.open("POST", "Stockmanagerorderlist/Cancelorder" , true);
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
                    '<tbody> ' +
                    '<tr>' +
                    '<td>' +  obj2[i].order_ID  +  '</td>' +  
                    '<td>' + obj2[i].order_date + ' </td>' +
                    '<td>' + obj2[i].approximate_d_date + ' </td>' +
                    '<td>' + obj2[i].total_payment + '</td>' +
                    
                       
                       '</tr>' + 
                    '</tbody>'
        }
  }

};
httprequest3.send();




// load return data

const httprequest4  = new XMLHttpRequest();
const rows3 = document.getElementById("table3");
httprequest4.open("POST", "Stockmanagerorderlist/Returnorder" , true);
httprequest4.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest4.readyState === 4 && httprequest4.status === 200)
  {
    console.log(httprequest4.responseText);
        const obj = JSON.parse(httprequest4.responseText);
        console.log(obj);
        for(var i = 0 ; i< obj.length ; i++)
        {
          rows3.innerHTML +=
                    '<tbody> ' +
                    '<tr>' +
                    '<td>' +  obj[i].order_ID  +  '</td>' +  
                    '<td>' + obj[i].order_date + ' </td>' +
                    '<td>' + obj[i].payment + ' </td>' +
                    '<td>' + obj[i].total_payment + '</td>' +
                    '<td>' + obj[i].approximate_d_date + '</td>' +
                   
                       
                       '</tr>' + 
                    '</tbody>'
        }
  }

};
httprequest4.send();





     






  