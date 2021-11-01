function loadItemOptions(product_items){
	let carts = document.querySelectorAll(".btn-cart");
	// console.log(carts);

	for (let i = 0; i < carts.length ; i+=1 ) {
		carts[i].addEventListener('click',()=>{
			cartNumbers(product_items[i],i);
			// console.log(i);
		})	

	}
}

function removeItem(){
	let removebtns = document.querySelectorAll("#remove-btn");
	let productInCart = localStorage.getItem('productInCart');
	productInCart = JSON.parse(productInCart);
	// console.log(removebtns);

	for (let i = 0; i <removebtns.length ; i+=1 ) {
		removebtns[i].addEventListener('click',()=>{
			// console.log(productInCart[i+1]);
			// localStorage.removeItem(productInCart[i+1]);
			removebtns[i].parentElement.style.display = 'none';
			// console.log(i);
		})	
	}
	// console.log("i am here");
}


function cartNumbers(product_item,i){
	let productNumbers = localStorage.getItem('cartNumbers');
	productNumbers = parseInt(productNumbers);

	if (productNumbers) {
		localStorage.setItem('cartNumbers',productNumbers + 1);
	} else {
		localStorage.setItem('cartNumbers',1);
	}
	
	setItems(product_item,i);
}

function onloadCart(){
	let cartItems = localStorage.getItem('productInCart');
	let cart_container = document.querySelector(".cart-body");
	cartItems = JSON.parse(cartItems);
	
	if (cartItems != null) {
		// console.log(cartItems);
		for(var i in cartItems){
				// console.log(cartItems[i]);
			cart_container.innerHTML += `
			<div class="cart-item">
	            <span class="fas fa-times" id="remove-btn"></span>
	            <img src="${cartItems[i].image_path}" alt="">
	            <div class="content">
	                <h3>${cartItems[i].name}</h3>
	                <div class="price">Rs ${cartItems[i].price * cartItems[i].InCart}/-</div>
	            </div>
	            
       		</div>	`;
       		// console.log((cartItems[i].InCart));
		}
	}
	removeItem();
}

function setItems(product_item,i){
	let cart_container = document.querySelector(".cart-body");
	let cartItems = localStorage.getItem('productInCart');
	cartItems = JSON.parse(cartItems);

	if (cartItems != null) {
		// console.log(cartItems[i]);
		if(cartItems[i] == undefined ){
			cartItems = {
				...cartItems,
				[i]:product_item
			}
			product_item.InCart = 1;
			cart_container.innerHTML += `
			<div class="cart-item">
	            <span class="fas fa-times" id="remove-btn"></span>
	            <img src="${product_item.image_path}" alt="">
	            <div class="content">
	                <h3>${product_item.name}</h3>
	                <div class="price">Rs ${product_item.price}/-</div>
	            </div>
       		</div>	`;
		}
		else{
			cartItems[i].InCart += 1;
		}
		// console.log("my cart items are ", cartItems);
	}else{
		product_item.InCart = 1;
		cartItems ={
			[i]:product_item
		}
		cart_container.innerHTML += `
			<div class="cart-item">
	            <span class="fas fa-times" id="remove-btn"></span>
	            <img src="${product_item.image_path}" alt="">
	            <div class="content">
	                <h3>${product_item.name}</h3>
	                <div class="price">Rs ${product_item.price}/-</div>
	            </div>
       		</div>	`;
	}
	removeItem();
	localStorage.setItem("productInCart",JSON.stringify(cartItems));
}

onloadCart();
