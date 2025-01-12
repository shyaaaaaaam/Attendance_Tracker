function changeText() {
  var elem = document.getElementById("c").innerHTML;
  document.getElementById("c").innerHTML = Number(elem) + 1;
}

function chBackcolor() {
  if (document.body.style.backgroundColor == "white") {
    document.body.style.background = "black";
} else {
    document.body.style.background = "white";
}
}