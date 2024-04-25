function updMainCat() {
  let form = document.getElementById("upd-main-category-form");
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

  style_input_red = "red;";
  style_input_gray = "#ced4da;";

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

  var url = "../functions/category/mainupd.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    alert("Данные изменены");
  };
}
