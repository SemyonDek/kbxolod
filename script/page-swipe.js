function pageSwipe(id) {
  let url = document.URL;
  if (url.indexOf("?") > -1) {
    url = url + "&pagenumber=" + id;
  } else {
    url = url + "?pagenumber=" + id;
  }

  window.location.replace(url);
}
