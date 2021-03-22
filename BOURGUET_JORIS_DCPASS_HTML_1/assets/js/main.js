var derniere_position_de_scroll_connue = 0;
window.addEventListener('scroll', function(e) {
    derniere_position_de_scroll_connue = window.scrollY;
    var scrollTop = document.querySelector('#scrollTop')
    console.log(derniere_position_de_scroll_connue);
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
