let navbar = document.querySelector(".navbar");

document.querySelector("#menu-btn").onclick = () => {
  navbar.classList.toggle("active");
  cartItem.classList.remove("active");
  profile.classList.remove("active");
};

let searchForm = document.querySelector(".search-form");

let cartItem = document.querySelector(".cart-items-container");

document.querySelector("#cart-btn").onclick = () => {
  cartItem.classList.toggle("active");
  navbar.classList.remove("active");
  profile.classList.remove("active");
};

let profile = document.querySelector(".profile-container");

document.querySelector("#profile-btn").onclick = () => {
  profile.classList.toggle("active");
  navbar.classList.remove("active");
  cartItem.classList.remove("active");
};

window.onscroll = () => {
  navbar.classList.remove("active");
  cartItem.classList.remove("active");
  profile.classList.remove("active");
};


var localhost = "http://localhost/G7/Group07/";
function DisplayNotification() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/G7/Group07/Notification/displayNotificationCount");
  xhr.onload = function () {
    document.querySelector(".fa-bell-span").innerHTML = this.response;
  };
  xhr.send();
  return;
}

DisplayNotification();
