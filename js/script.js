window.onload = function () {
  let btns = document.querySelectorAll(".btn");
  btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      let btnParent = e.target.parentElement;
      btnParent.classList.toggle("show");
      if (btnParent.classList.contains("show")) {
        btn.textContent = "Fermer la solution";
      } else {
        btn.textContent = "Afficher la solution";
      }
    });
  });
};
