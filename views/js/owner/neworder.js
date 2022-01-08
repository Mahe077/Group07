// var httprequest  = new XMLHttpRequest();

// httprequest.open("POST", "New_orders/Displayorder" , true);
// const rows = document.getElementById("data");
// httprequest.send();
// httprequest.onreadystatechange = function()
// {
//   if( httprequest.readyState == 4 && httprequest.status == 200)
//   {
//         var obj = JSON.parse(httprequest.responseText);
//         var html = "";
//         for(var i = 0 ; i< obj.length ; i++)
//         {
//           // var order_id = obj[i].order_id;
//           // var delivery_date = obj[i].delivery_date;
//           // var address = obj[i].address;
//           // var company_name = obj[i].company_name;
//           // html+= "<tr>";
//           // html+= "<td>" + order_id + "<td>";
//           // html+= "<tr>";

//           rows.innerHTML +=
//                     '<tbody> ' +
//                     '<tr>' +
//                     '<td>' +  obj[i].order_id  +  '</td>' +  
//                     '<td>' + obj[i].delivery_date + ' </td>' +
//                     '<td>' + obj[i].address + ' </td>' +
//                     '<td>' + obj[i].company_name + '</td>' +
                   
                       
//                        '</tr>' + 
//                     '</tbody>'
//         }
//   }

// }
