function dodajAktywne(elem) {
    var a = document.getElementsByTagName('a')
    for (i = 0; i < a.length; i++) {
        a[i].classList.remove('active');
    }
    elem.classList.add('active');
}

// var derniere_position_de_scroll_connue = 0;
// window.addEventListener('scroll', function(e) {
//     derniere_position_de_scroll_connue = window.scrollY;
//     // console.log(derniere_position_de_scroll_connue);
//     var menu = $("#menuNav");
//     if (derniere_position_de_scroll_connue > 200) {
//         menu.addClass("sticky");
//     } else {
//         menu.removeClass("sticky");
//     }
// });

var derniere_position_de_scroll_connue = 0;
window.addEventListener('scroll', function(e) {
    derniere_position_de_scroll_connue = window.scrollY;
    var header = $("#headerNav");
    // console.log(derniere_position_de_scroll_connue);
    setTimeout(function() {
        if (derniere_position_de_scroll_connue > window.scrollY) {
            header.addClass('sticky')
        } else if (derniere_position_de_scroll_connue < window.scrollY) {
            header.removeClass('sticky')
        }
    }, 20);

    if (derniere_position_de_scroll_connue > 200) {
        scrollTop.style.display = "block";
    } else {
        scrollTop.style.display = "none";
    }
});

function scrollToTop() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
