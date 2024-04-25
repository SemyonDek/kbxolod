function addPhoto() {
  let form = document.getElementById("add-photo-form");
  let file = document.getElementById("file_photo");
  let prodid = document.getElementById("prodid").value;
  if (file.value == "") {
    alert("Выберите файл");
  } else {
    let formData = new FormData(form);
    formData.append("prodid", prodid);

    var url = "../functions/products/addPhoto.php";

    let xhr = new XMLHttpRequest();

    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      document.getElementById("file_photo").value = null;
      document.getElementById("PhotoBlock").innerHTML =
        xhr.response.getElementById("PhotoBlock").innerHTML;
    };
  }
}

function delPhoto(idPhoto) {
  let formData = new FormData();
  formData.append("idPhoto", idPhoto);

  var url = "../functions/products/delPhoto.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    // alert('Фотография удалена');
    document.getElementById("PhotoBlock").innerHTML =
      xhr.response.getElementById("PhotoBlock").innerHTML;
  };
}

function updProd() {
  let form = document.getElementById("add-prod-form");

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

  style_input_red = "red";
  style_input_gray = "#ced4da";

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      document.getElementById(element["name"]).style.borderColor =
        style_input_red;
    } else {
      document.getElementById(element["name"]).style.borderColor =
        style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/products/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";
  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    // console.log(xhr.response);
    alert("Товар изменен");
  };
}
