// btn-inp-check
if (document.querySelector(".btn-inp-check .inp")) {
    let inputsCheck = document.querySelectorAll(".btn-inp-check .inp");
    inputsCheck.forEach(inp => {
        inp.addEventListener("input", () => {
            if (inp.checked == true) {
                inp.closest(".btn-inp-check").classList.add("check");
            } else {
                inp.closest(".btn-inp-check").classList.remove("check");
            }
        })
    })
}

if (document.querySelector(".onboard-swiper")) {
    const swiperElement = document.querySelector(".onboard-swiper");
    const swiper = new Swiper(swiperElement, {
        slidesPerView: 1,
        centeredSlides: true,
        allowTouchMove: false,
        keyboard: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
        },
    });
}

// make modal Bootstrap popup show without click
if (document.querySelector("#popup_show")) {
    let myModal = new bootstrap.Modal(document.getElementById("popup_show"));
    myModal.show();
}

// initialize bootstrap tooltips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

//   splash loader
if (document.querySelector(".splash-loader")) {
    const splashLoader = document.querySelector(".splash-loader");
    window.addEventListener("load", () => {
        setTimeout(() => {
            document.body.style.overflow = "auto";
            splashLoader.classList.add('splash-loader-remove')
        }, 300)
    })
}

if (document.querySelector('.code-inp')) {
    const codeInputs = document.querySelectorAll('.code-inp');
    window.addEventListener('load', () => codeInputs[0].focus());
    for (let i = 0; i < codeInputs.length - 1; i++) {
        codeInputs[i].addEventListener("keyup", (e) => e.target.nextElementSibling.focus());
    }
}


if (document.querySelector('.notification-btn')) {
    const notificationBtn = document.querySelector('.notification-btn');
    const notificationHolder = document.querySelector('.notification-holder');
    notificationBtn.addEventListener("click", () => notificationHolder.classList.toggle("show-list"));
    document.addEventListener("click", (e) => {
        if (!e.target.parentElement.classList.contains('notification-btn')) {
            notificationHolder.classList.remove("show-list")
        } else {
            notificationHolder.addEventListener("click", (e) => e.stopPropagation())
        }
    })
}


if (document.querySelector(".category-box")) {
    const categoryBoxs = document.querySelectorAll(".category-box");
    categoryBoxs.forEach(Box => Box.addEventListener("click", (e) => {
        console.log(e.target.parentElement);
        categoryBoxs.forEach(Box => Box.classList.remove("active"));
        e.target.parentElement.classList.add("active")
    }));
}

var swiper = new Swiper(".categories-swiper", {
    slidesPerView: 3.5,
    spaceBetween: 15,
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
    },
});
var swiper = new Swiper(".filters-swiper", {
    slidesPerView: 4.25,
    spaceBetween: 10,
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
    },
});
var swiper = new Swiper(".offer-swiper", {
    slidesPerView: 1.25,
    spaceBetween: 15,
});
var swiper = new Swiper(".product-Swiper", {
    effect: "cube",
    grabCursor: true,
    cubeEffect: {
        shadow: false,
        slideShadows: false,
        shadowOffset: 20,
        shadowScale: 0.94,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
