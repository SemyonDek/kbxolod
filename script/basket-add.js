function addBasket(prodid) {
  let formData = new FormData();
  formData.append("prodid", prodid);

  var url = "functions/basket/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("count-basket").innerHTML =
      xhr.response.getElementById("count-basket").innerHTML;
  };
}
