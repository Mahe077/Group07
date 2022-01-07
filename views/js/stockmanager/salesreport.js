
console.log("pavi");
function select_year(){
    console.log("pavi");
    value_select = document.getElementById("ddlViewBy").value;
    console.log(value_select);

// load count
const httprequest1  = new XMLHttpRequest();
const count = document.getElementById("card-count");
httprequest1.open("POST", "Stockmanagersalesreport/count/" + value_select , true);
httprequest1.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest1.readyState === 4 && httprequest1.status === 200)
  {
    console.log(httprequest1.responseText);
    const obj1 = JSON.parse(httprequest1.responseText);
        console.log(obj1);
        for(var i = 0 ; i< obj1.length ; i++)
        {
          count.innerHTML +=
                    '<p>' + 'sum of the total orders are ' + '</p>'
                      + obj1[i].cou
        }
  }
};
httprequest1.send();




// load sum
const httprequest2  = new XMLHttpRequest();
const sum = document.getElementById("card-sum");
httprequest2.open("POST", "Stockmanagersalesreport/sum/" + value_select , true);
httprequest2.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest2.readyState === 4 && httprequest2.status === 200)
  {
    console.log(httprequest2.responseText);
    const obj2 = JSON.parse(httprequest2.responseText);
        console.log(obj2);
        for(var i = 0 ; i< obj2.length ; i++)
        {
          sum.innerHTML +=
                    '<p>' + 'sum of the total orders are ' + '</p>'
                      + obj2[i].tot
        }
  }
};
httprequest2.send();


// load profit
const httprequest4  = new XMLHttpRequest();
const profit = document.getElementById("card-profit");
httprequest4.open("POST", "Stockmanagersalesreport/profit/" + value_select , true);
httprequest4.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest4.readyState === 4 && httprequest4.status === 200)
  {
    console.log(httprequest4.responseText);
    
        
          profit.innerHTML +=
                    '<p>' + 'profit of the total orders are ' + '</p>' +
          httprequest4.responseText
        
  }
};
httprequest4.send();






// load table
const httprequest7  = new XMLHttpRequest();
const rows3 = document.getElementById("table1");
httprequest7.open("POST", "Stockmanagersalesreport/reportyear/" + value_select , true);
httprequest7.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest7.readyState === 4 && httprequest7.status === 200)
  {  
    console.log(httprequest7.responseText);
        const obj = JSON.parse(httprequest7.responseText);
        console.log(obj);
        for(var i = 0 ; i< obj.length ; i++)
        {
          rows3.innerHTML +=
                    '<tbody> ' +
                    '<tr>' +
                    '<td>' +  obj[i].order_id +  '</td>' + 
                    '<td>' + obj[i].user_id + ' </td>' + 
                    '<td>' + obj[i].order_date + ' </td>' +
                    '<td>' + obj[i].total_payment + '</td>' +  
                       '</tr>' + 
                    '</tbody>'
        }
  }
};
httprequest7.send();
}










































































































function select_month()
{
    console.log("sanda");
    value_select1 = document.getElementById("ddlViewBy1").value;
    console.log(value_select1);
// hhtp request
// load count
const httprequest5  = new XMLHttpRequest();
const countmonth = document.getElementById("card-count");
httprequest5.open("POST", "Stockmanagersalesreport/count/" + value_select1 , true);
httprequest5.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest5.readyState === 4 && httprequest5.status === 200)
  {
    console.log(httprequest5.responseText);
    const obj5 = JSON.parse(httprequest5.responseText);
        console.log(obj5);
        for(var i = 0 ; i< obj5.length ; i++)
        {
          countmonth.innerHTML +=
                    '<p>' + 'sum of the total orders are ' + '</p>'
                      + obj5[i].cou
        }
  }
};
httprequest5.send();


// load sum
const httprequest6  = new XMLHttpRequest();
const summonth = document.getElementById("card-sum");
httprequest6.open("POST", "Stockmanagersalesreport/sum/" + value_select1 , true);
httprequest6.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest6.readyState === 4 && httprequest6.status === 200)
  {
    console.log(httprequest6.responseText);
    const obj6 = JSON.parse(httprequest6.responseText);
        console.log(obj6);
        for(var i = 0 ; i< obj6.length ; i++)
        {
          summonth.innerHTML +=
                    '<p>' + 'sum of the total orders are ' + '</p>'
                      + obj6[i].tot
        }
  }
};
httprequest6.send();




const httprequest3  = new XMLHttpRequest();
const rows4 = document.getElementById("table1");
httprequest3.open("POST", "Stockmanagersalesreport/reportmonth/"+ value_select1 , true);
httprequest3.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest3.readyState === 4 && httprequest3.status === 200)
  {
    console.log(httprequest3.responseText);
    const obj3 = JSON.parse(httprequest3.responseText);
    console.log(obj3);
    for(var i = 0 ; i< obj3.length ; i++)
    {
      rows4.innerHTML +=
                '<tbody> ' +
                '<tr>' +
                '<td>' +  obj3[i].order_id +  '</td>' + 
                '<td>' + obj3[i].user_id + ' </td>' + 
                '<td>' + obj3[i].order_date + ' </td>' + 
                '<td>' + obj3[i].total_payment + '</td>' +   
                   '</tr>' + 
                '</tbody>'
    }
  }
}
  httprequest3.send();
}


