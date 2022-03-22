function UpdateNotificationIcon() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/G7/Group07/Notification/displayNotificationCount");
    xhr.onload = function () {
      document.querySelector(".fa-bell-span").innerHTML = this.response;
    };
    xhr.send();
    return;
  }
  
UpdateNotificationIcon();