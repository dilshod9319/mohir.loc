// Delete buttonlar
let deleteBtns = document.querySelectorAll(".delete-btn");
deleteBtns.forEach(function (btn) {
    btn.addEventListener('click', function(e){
        e.preventDefault();
        let id = btn.getAttribute('data-id');
        let confirmed = confirm("Rostdan ham o'chirmoqchimisiz?");
        if(confirmed){
            window.location.href = "?acontroller=menu_delete&id=" + id;
        }
    });
});

// Success alertni yashirish
let success_alert = document.querySelector(".success_alert");
if(success_alert){
    setTimeout(function(){
        success_alert.style.display = "none";
    }, 2000);
}
