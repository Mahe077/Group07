let container = document.querySelector(".floating-container");
let container_close = document.querySelector(".remove-alert");

if (container_close != null) {
  container_close.addEventListener("click", () => {
    container.classList.add("active");
  });
}
