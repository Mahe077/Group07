{var localhost ="http://localhost/G7/Group07/";
function index_loader() {
  rating_loader();
}

function rating_loader() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "Index/rating_loader");
  xhr.onload = function () {
    let swiper_wrapper = document.querySelector("#review-slider_wrapper");
    var rate = JSON.parse(this.response);
    // console.log(rate);
    swiper_wrapper.innerHTML = " ";
    if (rate !== null) {
      for (let s of rate) {
        swiper_wrapper.innerHTML += `
        <div class="swiper-slide review-slide" id =>
            <div class="box">
                <img src="${localhost}${s.image_path}" alt="User-image"></img>
                <h3>${s.fname} ${s.lname}</h3>
                <p>${s.description}</p>
                <div class="stars">
                  <i class="fas fa-star" checked></i>
                  <i class="fas fa-star" checked></i>
                  <i class="fas fa-star" checked></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
            </div>
        </div>`;
        // console.log(Math.ceil(s.rating))
      }
    }
  };
  xhr.send();
  return false;
}
}
