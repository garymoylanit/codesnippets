jQuery(window).scroll(function(){
    var url = window.location.href; 
    if (jQuery(this).scrollTop() > 200 && url === "bbc.co.uk") {
        element = document.querySelector(".category-inside");
        element.classList.remove("open");
    }
    else {
        
        if (jQuery(this).scrollTop() === 0 && url === "bbc.co.uk") {
            element = document.querySelector(".category-inside");
            element.classList.add("open");
        }
    }
});
