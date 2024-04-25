function addComm(prodid) {
  let comm = document.getElementById("comm-text");

  prov = true;
  if (comm.value == "") {
    prov = false;
  }

  if (!prov) {
    alert("Введите комментарий");
  } else {
    let formData = new FormData();
    formData.append("comm", comm.value);
    formData.append("prodid", prodid);

    var url = "functions/reviews/add.php";

    let xhr = new XMLHttpRequest();

    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      console.log(xhr.response);
      alert("Комментарий отправлен на одобрение");
    };
  }
}
