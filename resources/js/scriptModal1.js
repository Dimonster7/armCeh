let modal = document.getElementById("myModal");
let btn = document.getElementById("myBtn");

btn.onclick = function() {
  modal.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

let modal2 = document.getElementById("myModal2");
let btnStop = document.getElementById("btn_stop");
let close = document.getElementById("id_cancel")

btnStop.onclick = function() {
  modal2.style.display = "block";
}

close.onclick = function() {
  modal2.style.display = "none";
}

