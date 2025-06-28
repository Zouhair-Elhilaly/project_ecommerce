let link1 = document.querySelector("#link1");
let link2 = document.querySelector("#link2");
let setting = document.querySelector("#setting");

link1.addEventListener('click' , () => {
    link1.classList.toggle("active");
});

link2
  .addEventListener("click", () => {
    link2.classList.toggle("active");
  });

  setting
    .addEventListener("click", () => {
        setting.style.cssText = `
          padding: 10px 70px;
        `;
        setting.classList.toggle("active");
    });