// Click tog-nav
if (document.querySelector(".tog-nav")) {
    let togNav = document.querySelectorAll(".tog-nav"),
      app = document.querySelector(".app");
    togNav.forEach((tog) => {
      tog.addEventListener("click", function () {
        app.classList.toggle("colse-and-open");
      });
    });

    //close click body
  }

// Click tog-show
// if (document.querySelector(".tog-active")) {
//   let togglesShow = document.querySelectorAll(".tog-active");
//   togglesShow.forEach((e) => {
//     e.addEventListener("click", (evt) => {
//       let divActive = document.querySelector(e.getAttribute("data-active"));
//       divActive.classList.toggle("active");
//     });
//   });
// }

// pop-order
if (document.querySelector(".btn-pop-order")) {
  // Open Pop
  let btnsPopOrder = document.querySelectorAll(".btn-pop-order");
  btnsPopOrder.forEach((btn) => {
    btn.addEventListener("click", function () {
      document
        .querySelector("." + btn.dataset.popShow)
        .classList.add("pop-show");
      document.body.classList.add("overflow-hidden");
    });
  });
  // Close Pop
  let closePopOrder = document.querySelectorAll(".order-pop .close");
  closePopOrder.forEach((close) => {
    close.addEventListener("click", () => {
      close.closest(".order-pop").classList.remove("pop-show");
      document.body.classList.remove("overflow-hidden");
    });
  });
}


// Count TextArea
function countText() {
  let countArea = event.target
      .closest(".parent-form-add")
      .querySelector(":scope .count-area");
  let theTextArea = event.target;
  let areaMaxLength = event.target.getAttribute("maxlength");
  countArea.innerHTML = `${areaMaxLength} / ${theTextArea.value.length}`;
}
