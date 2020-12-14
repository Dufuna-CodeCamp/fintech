
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

//Add New Row for REceipt Items
function addRow() {
  var table = document.getElementsByClassName(".add-receipt-items");
  var row = table[0].insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  cell1.innerHTML = '<td><input type="text" name="jname"></td>';
  cell2.innerHTML = '<td><input style="width: 100%;" type="number" name="jprice"></td>';
  cell3.innerHTML = '<td><input style="width: 100%;" type="number" name="jqty"></td>';
  cell4.innerHTML = '<td><input style="width: 100%;" type="number" name="itotal" class="subtotal"></td>';
}

//DELETES A RECEIPT FROM TABLE/LIST OF RECEIPTS ON CLICK OF DELETE BUTTON
const row = document.querySelectorAll("tbody tr");
row.forEach(rowItem => {
    const deleteRowBtn = rowItem.querySelector(".deleteButton");
    deleteRowBtn.addEventListener("click", () => {
      const shouldDelete = prompt("Are you sure you want to delete this item? type 'YES' to delete");
      if (shouldDelete === "yes" || shouldDelete === "YES" || shouldDelete === "Yes"){
        rowItem.remove();
      }
    })
})