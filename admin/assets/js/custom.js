let deleteMenu = document.querySelectorAll(".delete-menu");
deleteMenu.forEach(function(btn){
    btn.addEventListener('click', function(e){
        e.preventDefault();

        let id = btn.getAttribute("data-id");
        let confirmed = confirm("Rostdan ham o'chirmoqchimisiz?");
        
        if(confirmed){
            window.location.href = "?acontroller=menu_delete&id=" + id;
        }
    });
});

let success_alert_menu = document.querySelector(".success-alert-menu");
    if(success_alert_menu){
        setTimeout(function(){
            success_alert_menu.style.display = "none";
        }, 2000);
    }

let deleteCategory = document.querySelectorAll(".delete-category");
deleteCategory.forEach(function(btn){
    btn.addEventListener('click', function(e){
        e.preventDefault();
        let id = btn.getAttribute("data-id-category");
        let confirmed = confirm("Rostdan ham o'chirmoqchimisiz?");
        if(confirmed){
            window.location.href = "?acontroller=category_delete&id=" + id;
        }
    });
});

let success_alert_category = document.querySelector(".success-alert-category");
    if(success_alert_category){
        setTimeout(function(){
            success_alert_category.style.display = "none";
        }, 2000);
    }