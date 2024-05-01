let return_home=document.getElementById('home_option');

return_home.addEventListener('click',function () {
    window.location.href = "/mystore";
});

// function togglePopup() {
//     const overlay = document.getElementById('popupOverlay');
//     overlay.classList.toggle('show');
// }

// function openForm() {
//     document.getElementById("myForm").style.display = "block";
// }

// function closeForm() {
//     document.getElementById("myForm").style.display = "none";
// }

const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const openModalBtn = document.querySelector(".btn-open");
const closeModalBtn = document.querySelector(".btn-close");
const createBtn = document.querySelector(".create_category_btn");
const pop_body = document.querySelector(".pop_body");

const openModal = function () {
    modal.classList.remove("hidden");
    pop_body.classList.remove("hidden");
    overlay.classList.remove("hidden");
};

openModalBtn.addEventListener("click", openModal);

const closeModal = function () {
    modal.classList.add("hidden");
    pop_body.classList.add("hidden");
    overlay.classList.add("hidden");
};

closeModalBtn.addEventListener("click", closeModal);
createBtn.addEventListener("click", closeModal);

document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && !modal.classList.contains("hidden")) {
        modalClose();
    }
});

var go_create_product=document.getElementById('go_create_product');
go_create_product.addEventListener('click',function () {
    window.location.href = "/seller_create_products";
});

// let delete_product=document.getElementById('delete_product');


// function delete_product(product_id){
//     window.location.href = "/store_delete_product/"+product_id;
// }
