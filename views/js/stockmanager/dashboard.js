



































var month_names = ['January','February','March','April','May','June','July','August','September','October','November','December'];
d = new Date();
var n = month_names[d.getMonth()];
if(n=='January')
    var value_select1 = "1";
else if(n=='February')
    var value_select1 = "2";
else if(n=='March')
    var value_select1 = "3";
else if(n=='April')
    var value_select1 = "4";
else if(n=='May')
    var value_select1 = "5";
else if(n=='June')
    var value_select1 = "6";
else if(n=='July')
    var value_select1 = "7";
else if(n=='August')
    var value_select1 = "8";
else if(n=='September')
    var value_select1 = "9";
else if(n=='October')
    var value_select1 = "10";
else if(n=='November')
    var value_select1 = "11";
else if(n=='December')
    var value_select1 = "12";
else
    var value_select1 = "0";


    console.log(value_select1);
  
  
  
// // hhtp request

const httprequest5  = new XMLHttpRequest();
const countmonth = document.getElementById("box1");
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

                    '<p class="box-topic">' + 'Total Orders   '  + '<br>' +
                      + obj5[i].cou + '</p>'
                 
        }
  }
};

httprequest5.send();


// load sum
const httprequest6  = new XMLHttpRequest();
const summonth = document.getElementById("box2");
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
                    '<p class="box-topic">' + ' Total Payments  ' + '<br>' +
                      +  obj6[i].tot + '</p>'
        }
  }
};
httprequest6.send();

// load sum
const httprequest7  = new XMLHttpRequest();
const returnmonth = document.getElementById("box4");
httprequest7.open("POST", "Stockmanagersalesreport/returnsum/" + value_select1 , true);
httprequest7.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest7.readyState === 4 && httprequest7.status === 200)
  {
    console.log(httprequest7.responseText);
    const obj7 = JSON.parse(httprequest7.responseText);
        console.log(obj7);
        for(var i = 0 ; i< obj7.length ; i++)
        {
          returnmonth.innerHTML +=
                    '<p class="box-topic">' + 'Total Returns   '  + '<br>' +
                      + obj7[i].returnsum + '</p>'
        }
  }
};
httprequest7.send();


// load sum
const httprequest8  = new XMLHttpRequest();
const profit = document.getElementById("box3");
httprequest8.open("POST", "Stockmanagersalesreport/profit/" + value_select1 , true);
httprequest8.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest8.readyState === 4 && httprequest8.status === 200)
  {
    console.log(httprequest8.responseText);
          profit.innerHTML +=
                    '<p class="box-topic">' + 'Total Profit ' + '</br>' +
          httprequest8.responseText + '.00' + '</p>'
        
  }
};
httprequest8.send();



















// delivery company
const httprequest9  = new XMLHttpRequest();
const left = document.getElementById("table3");
httprequest9.open("POST", "Stockmanagerdashboardhome/deilverycompany" , true);
httprequest9.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest9.readyState === 4 && httprequest9.status === 200)
  {
    console.log(httprequest9.responseText);
    const obj9 = JSON.parse(httprequest9.responseText);
        console.log(obj9);
        for(var i = 0 ; i< obj9.length ; i++)
        {
          left.innerHTML +=
          `<tbody> 
                    <tr> 
                    <td>   ${obj9[i].name}   </td>
                    <td>   ${obj9[i].rating}   </td>  
                   
                 
                       </tr> 
                    </tbody>`

                    // <td><button class="btn" id = "myBtn" > <a href="Stockmanagerdashboardhomedelivery/showdelivery/${obj9[i].company_id}">  See More </a> </button>  </td>
        }
  }
};
httprequest9.send();


// delivery company
const httprequest10  = new XMLHttpRequest();
const right = document.getElementById("table4");
httprequest10.open("POST", "Stockmanagerdashboardhome/showitems" , true);
httprequest10.onreadystatechange = function()
{
  console.log("onreadystatechange");
  if( httprequest10.readyState === 4 && httprequest10.status === 200)
  {
    console.log(httprequest10.responseText);
    // const obj10 = JSON.parse(httprequest10.responseText);
    //     console.log(obj10);
    //     console.log("pavi");
        // for(var i = 0 ; i< obj9.length ; i++)
        // {
        //   left.innerHTML +=
        //   // '<tbody> ' +
        //   // '<tr>' +
        //   // '<td>' +  obj9[i].name +  '</td>' + 
        //   // '<td>' + obj9[i].rating + ' </td>' + 
        //   // // '<td>' + '<button class="btn">' + ' <a href="Stockmanagerdashboardhome/showdelivery/" '+ obj9[i].rating  +'> ' + ' See More '+'</a>'  + '</button>' + '</td>' +
        //   //    '</tr>' + 
        //   // '</tbody>'

        //   `<tbody> 
        //             <tr> 
        //             <td>   ${obj9[i].name}   </td>
        //             <td>   ${obj9[i].rating}   </td>  
        //             <td><button class="btn"> <a href="Stockmanagerdashboardhome/showdelivery/${obj9[i].company_id}">  See More </a> </button>  </td>
                 
        //                </tr> 
        //             </tbody>`
        // }
  }
};
httprequest10.send();


