let submit_form = document.getElementById("submit_form");

let rem1 = document.getElementById("rem1");

let input = document.querySelector(".pass");


// password_form.value = "";

// /// tcheque form 

// submit_form.addEventListener("submit", (event) => {
//   event.preventDefault(); // Empêche l'envoi automatique du formulaire

//   if (!rem1.checked) {
//     email_form.value = "";
//     password_form.value = "";
//     console.log("form detected successfully");
//   }
// });

// // end check
// console.log(rem1.value);

let eyes = document.getElementById("eyes");

console.log("before");
eyes.addEventListener("click", () => {
  if (input.type == "password") {
    input.type = "text";
    eyes.classList.remove("fa-eye");
    console.log("clicked text");
  } else {
    input.type = "password";
    eyes.classList.add("fa-eye");
    console.log("clicked password");
  }
});
console.log("after");

document.getElementById("btn_sign_up").addEventListener("click", function () {
  document.getElementById("form_register").style.display = "block";
});

document.getElementById("form_h1").addEventListener("click", function () {
  document.getElementById("form_register").style.display = "none";
});

let email_form = document.getElementById("email_form");
let password_form = document.getElementById("password_form");


function checkInputs() {
  // Supprimer ancien message si existe
  let oldMsg = document.querySelector(".message-box");
  if (oldMsg) oldMsg.remove();

  // Créer un nouveau message
  let messageBox = document.createElement("div");
  messageBox.className = "message-box";
  messageBox.style.cssText = `
        width: 100%;
        padding: 6px 3px;
        margin-top: 6px;
        text-align: center;
        font-family: monospace;
    `;

  if (email_form.value !== "" && password_form.value !== "") {
    messageBox.style.backgroundColor = "green";
    messageBox.style.color = "white";
    messageBox.innerHTML = "✅ Tous les champs sont remplis avec succès";
  } else {
    messageBox.style.backgroundColor = "red";
    messageBox.style.color = "white";
    messageBox.innerHTML = "❌ Tous les champs ne sont pas encore remplis";
  }

  submit_form.append(messageBox);
}

// Écoute les deux champs
// email_form.addEventListener("keyup", checkInputs());
// password_form.addEventListener("keyup", checkInputs());

// function checkInputs(){

// }



