const navToggleBtn = document.querySelector(".nav-toggler");
const listContainer = document.querySelector(".menu-nav");
const navList = document.querySelector(".menu-nav__list");
const year = document.querySelector("#year");
const emailField = document.querySelector("#email");
const passwordField = document.querySelector("#password");
const formField = document.querySelector(".login-form");
const emailRegEx = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
const passwordRegEx = /^([a-zA-Z0-9@*#]{8,15})$/;

/******* THIS AUTOMATICALLY UPDATES THE YEAR IN THE FOOTER EVERY NEW YEAR *******/
year.innerHTML = new Date().getFullYear();

/******* THIS TAKES CARE OF NAVLIST AND LISTCONTAINER HEIGHT CONTROL ON TOGGLE  *******/
navToggleBtn.addEventListener("click", function(){
    const listContainerHeight = listContainer.getBoundingClientRect().height;
    const navListHeight = navList.getBoundingClientRect().height +70;
    if(listContainerHeight <= 40){
        listContainer.style.height = `${navListHeight}px`;
    } else {
        listContainer.style.height = 0;
    }
})

/******* THIS TAKES CARE OF THE SIGNUP PAGE FORM VALIDATION  *******/

function validateField(inputField, regEx, message1, message2) {
  let inputFieldValue = inputField.value;
 
  if(inputFieldValue === ""){
      setCheckFailAction(inputField, message1);
  } 
  else if (!inputFieldValue.match(regEx)){
      setCheckFailAction(inputField, message2);
  } 
  else {
      setCheckPassAction(inputField, "");
  }
}

function setCheckFailAction(inputField, message){
  inputField.classList.add("input-fail-indicator");
  inputField.classList.remove("input-pass-indicator");
  inputField.nextElementSibling.textContent = message;
  inputField.nextElementSibling.style.color = "white";
}

function setCheckPassAction(inputField, message){
  inputField.classList.add("input-pass-indicator");
  inputField.classList.remove("input-fail-indicator");
  inputField.nextElementSibling.textContent = message;
  inputField.nextElementSibling.style.color = "green";
}

formField.addEventListener("submit", e => {
  e.preventDefault();
  validateField(emailField, emailRegEx, "* Email cannot be blank", "* Email is invalid");
  validateField(passwordField, passwordRegEx, "* Password cannot be blank", "* Password cannnot contain blah blah blah");
})
