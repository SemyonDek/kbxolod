let count = document.getElementById("countpagesslider").value;
let slider = document.getElementById("slider");
let left_btn = document.getElementById("btn-slid-bottom");
let right_btn = document.getElementById("btn-slid-top");
let pageslider = 1;

function moveslider(n) {
  slider.style.top = "-" + (pageslider + n - 1) * 135 + "px";
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

let mainPhoto = document.getElementById("main-photo");
let imgList = document.getElementsByClassName("item-img");

var swipePhoto = function (e) {
  mainPhoto.src = e.currentTarget.src;
};

for (var i = 0; i < imgList.length; i++) {
  imgList[i].addEventListener("click", swipePhoto, false);
}
