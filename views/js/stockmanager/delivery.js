//   load  delivery data

const httprequest  = new XMLHttpRequest();
const rows = document.getElementById("table");
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
                    '<td>' +  obj[i].order_ID  +  '</td>' +  
                    '<td>' + obj[i].approximate_delivery_date + ' </td>' +
                    '<td>' + obj[i].address + ' </td>' +
                    '<td>' + obj[i].delivery_company + '</td>' +
                    
                       
                       '</tr>' + 
                    '</tbody>'
        }
  }

};
httprequest.send();

