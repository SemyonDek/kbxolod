let width = document.getElementsByClassName("hidden-block")[0].offsetWidth;
let count = document.getElementById("countpagesslider").value;
let slider = document.getElementById("slider");
let left_btn = document.getElementById("btn-slid-right");
let right_btn = document.getElementById("btn-slid-left");
let pageslider = 1;

function moveslider(n) {
  slider.style.left = "-" + (pageslider + n - 1) * width + "px";
}

left_btn.onclick = function () {
  if (pageslider < count) {
    moveslider(1);
    pageslider++;
  }
};
right_btn.onclick = function () {
  if (pageslider > 1) {
    moveslider(-1);
    pageslider--;
  }
};
