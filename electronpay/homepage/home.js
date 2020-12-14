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