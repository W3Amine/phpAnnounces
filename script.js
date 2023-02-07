


console.log("sffsdf");


const xhttp = new XMLHttpRequest();

function deleteAnnonce(id) {
  document.getElementById("deleteBtn").href = "delete.php?annonceId=" + id;

  document
    .getElementById("deleteBtn")
    .setAttribute("href", "delete.php?annonceId=" + id);
  console.log(id);
}

dataEdite = [];

function editAnnonce(id) { 
  document.getElementById("hiddenId").value = id;

  document.getElementById("hiddenId").setAttribute("value", id);
  console.log(id);

  xhttp.open("GET", "detailJson.php?pageId=" + id, true);
  xhttp.send();

  // Define a callback function
  xhttp.onload = function () {
    console.log(xhttp.response);
    if (this.readyState == 4 && this.status == 200) {
    dataEdite = JSON.parse(this.response);
    console.log(dataEdite);

      document.getElementById("announce-Title").value = dataEdite.title;
      document.getElementById("announce-price").value = dataEdite.price;
      document.getElementById("announce-image").value = dataEdite.image;
      document.getElementById("announce-space").value = dataEdite.surface;
      document.getElementById("category").value = dataEdite.type;
      document.getElementById("announce-local").value = dataEdite.adress;
      document.getElementById("announce-date").value = dataEdite.publishDate;
      document.getElementById("announce-desc").value = dataEdite.description;
      
    }
};

console.log(dataEdite);
}
