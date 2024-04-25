function updOrder(idorder) {
  let formData = new FormData();
  formData.append("idorder", idorder);

  var url = "../functions/order/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Заказ оформлен");
    document.getElementById("orders-table").innerHTML =
      xhr.response.getElementById("orders-table").innerHTML;
  };
}

function delOrder(idorder) {
  let formData = new FormData();
  formData.append("idorder", idorder);

  var url = "../functions/order/del.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Заказ отменен");
    document.getElementById("orders-table").innerHTML =
      xhr.response.getElementById("orders-table").innerHTML;
  };
}
