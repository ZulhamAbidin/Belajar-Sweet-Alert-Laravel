const btn = document.querySelector("button.mobile-menu-button");
const menu = document.querySelector(".mobile-menu");
const closeBtn = document.querySelector(".mobile-menu-close");

btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});

closeBtn.addEventListener("click", () => {
    menu.classList.add("hidden");
});




// const btnn = document.querySelector("button.tombol-buka-menu");
// const menuu = document.querySelector(".buka-menu");
// const closeBtnn = document.querySelector(".tutup-menu");

// btnn.addEventListener("click", () => {
//     menuu.classList.toggle("hidden");
// });

// closeBtnn.addEventListener("click", () => {
//     menu.classList.add("hidden");
// });
