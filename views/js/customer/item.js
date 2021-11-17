// function item_render(id) {
// 	console.log("Hello" + id);
// 	var data = new FormData();
//   	data.append("search", id);
// 	var xhr = new XMLHttpRequest();
// 	xhr.open("POST", "Product/searchAll");
// 	xhr.onload = function () {
// 		let item_area = document.querySelector(".row");

// 		var i = JSON.parse(this.response);

// 		item_area.innerHTML =
// 			`<div class="image">
// 				<img src="${i.image_path}" alt = "product image">
// 			</div>`;
// 	}
// 	xhr.send(data);
//  	return false;
// }
