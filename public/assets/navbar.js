const btn = document.querySelector("button.mobile-menu-button");
const menu = document.querySelector(".mobile-menu");
const closeBtn = document.querySelector(".mobile-menu-close");

btn.addEventListener("click", () => {
  menu.classList.toggle("hidden");
});

closeBtn.addEventListener("click", () => {
  menu.classList.add("hidden");
});


 var typed = new Typed("#typed-text", {
   strings: ["Disnaker Kota Makassar Pengesahan Kartu AK1"],
   typeSpeed: 150,
   backSpeed: 20,
   loop: true,
 });