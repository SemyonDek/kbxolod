function delProd(prodid) {
  let formData = new FormData();
  formData.append("prodid", prodid);
  if (document.getElementById("search") !== null) {
    let search = document.getElementById("search").value;
    formData.append("search", search);
  }

  var url = "../functions/products/del.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Товар удален");
    document.getElementById("product-list-block").innerHTML =
      xhr.response.getElementById("product-list-block").innerHTML;
  };
}
