$(document).ready(function() {
    // sections.forEach(element2 => {
    //     console.log(element2);
    //     return element2;
    // });

    // for (let i = 0; i < sections.length; i++) {
    //     const element = sections[i];
    //     console.log(element);
    //     return element;
    // }

    var sections = document.querySelectorAll("section");
    var last_position_Y = 0;

    $(window).on("scroll", function() {

        setTimeout(function() {
            var numero_section = 0;
            var section_actuel = sections[numero_section];
            var position_Y = $(window).scrollTop();
            if (position_Y < last_position_Y) {
                // monte
                direction = 1;
            } else {
                // descend
                direction = 2;
            }

            last_position_Y = position_Y;
            if (direction == 1 && numero_section != 0) {
                numero_section = section_actuel.previousElementSibling.id;
                section_actuel = sections[numero_section]
            } else if (direction == 2) {
                numero_section = section_actuel.nextElementSibling.id;
                section_actuel = sections[numero_section]
            } else if (direction == 1 && numero_section == 0) {
                numero_section = 0;
                section_actuel = sections[numero_section]
            }
            console.log(numero_section);
        }, 1000)

    });

});