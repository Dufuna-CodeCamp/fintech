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
    console.log(listContainerHeight);
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
       e.preventDefault();
  } 
  else if (!inputFieldValue.match(regEx)){
      setCheckFailAction(inputField, message2);
       e.preventDefault();
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
  validateField(emailField, emailRegEx, "* Email cannot be blank", "* Email is invalid");
  validateField(passwordField, passwordRegEx, "* Password cannot be blank", "* Password cannnot contain blah blah blah");
})

// Delete Modal
var modal = document.getElementById("deleteModal");
var delete_btns = document.getElementsByClassName("deleteButton");
var btn = delete_btns[0];
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
  span.onclick = function() {
    modal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}

//Receipts Filter
function searchReceipts() {
  var input, filter, table, tr, td, i, j;
  input = document.getElementById("filter");
  filter = input.value.toUpperCase();
  table = document.getElementById("receipts-list");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
    td = tr[i].getElementsByTagName("td");
    for (j = 0; j < td.length; j++) {
      cell = tr[i].getElementsByTagName("td")[j];
      if (cell) {
        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            break;
        } 
      } 
    }  
  } 
}

//Receipt Calculations
function Multiply() {
  console.log("I am here");
  new_receipt = document.getElementsByClassName("add-receipt-items");
  tr = new_receipt[0].getElementsByTagName("tr");
  console.log(tr);
  var subtotal_fields = document.getElementsByClassName("subtotal");
  console.log(subtotal_fields);
  for(i = 1; i < tr.length; i++) { 
    for(j = 0; j < subtotal_fields.length; j++) {
    td = tr[i].getElementsByTagName("td");
    console.log(td);
    console.log(td[1].innerHTML.value);
    subtotal_fields[j].value = td[1].value * td[2].value;
    }
  }
}
