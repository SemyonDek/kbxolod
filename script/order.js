function upd_val(idbasket, value, prodid) {
  let input = document.getElementById("value_prod" + idbasket);
  let text = document.getElementById("text_value_prod" + idbasket);

  let cout = Number(input.value);

  if (cout + value >= 1) {
    input.value = cout + value;
    text.innerHTML = cout + value;
  }

  let formData = new FormData();

  let valuebasket = document.getElementById("value_prod" + idbasket).value;

  formData.append("idbasket", idbasket);
  formData.append("prodid", prodid);
  formData.append("valuebasket", valuebasket);

  var url = "functions/basket/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);

  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("basket-amount-price").innerHTML =
      xhr.response.getElementById("basket-amount-price").innerHTML;
  };
}

function delBasket(idbasket) {
  let formData = new FormData();
  formData.append("idbasket", idbasket);

  var url = "functions/basket/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    if (xhr.response.getElementById("basket-prov").innerHTML == "") {
      window.location.replace("index.php");
    }
    document.getElementById("basket-table-tbody").innerHTML =
      xhr.response.getElementById("basket-table-tbody").innerHTML;
    document.getElementById("count-basket").innerHTML =
      xhr.response.getElementById("count-basket").innerHTML;
  };
}

function addOrder() {
  let form = document.getElementById("order-form");
  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;

      return {
        name,
        value,
      };
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: #ced4da;";

  prov = true;

  data.forEach((element) => {
    if (
      element["value"] == "" &&
      !element["name"].startsWith("file_user") &&
      !element["name"].startsWith("com_user")
    ) {
      prov = false;
      document.getElementById(element["name"]).style = style_input_red;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "functions/order/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Заказ оформлен");
    window.location.replace("index.php");
  };
}
