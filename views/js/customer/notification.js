function DisplayNotification() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/G7/Group07/Notification/displayNotification");
  xhr.onload = function () {
    msg = JSON.parse(this.response);
    notification_body = document.querySelector(".notification-body");
    notification_body.innerHTML = '';
    for (let index = 0; index < msg.length; index++) {
      // console.log(msg[index]);
      notification_body.innerHTML +=
        `<section class="notification-area">
          <h2>Hello</h2>
          <h3 class="date">${msg[index][4]}</h3>
          <p>${msg[index][9]}</p>
          <h4 class="time">${msg[index][5]}</h4>
        </section>
        ${msg[index][10] != null ?
                  `<section class="notification-area-reply">
                    <h2>Hi,</h2>
                    <h3 class="date">${msg[index][6]}</h3>
                    <p>${msg[index][10]}</p>
                    <a class="btn" onclick="deliveryInfo()">Reply</a>
                    <h4 class="time">${msg[index][7]}</h4>
                </section>`
        :''}`
      }
  };
  xhr.send();
  return;
}
DisplayNotification();