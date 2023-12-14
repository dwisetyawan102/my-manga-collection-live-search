let keyword = document.getElementById('keyword');
let searchButton = document.getElementById('search-button');
let container = document.getElementById('container');

keyword.addEventListener('keyup', function () {
  let xhr = new XMLHttpRequest();
  
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  }

  xhr.open('GET', 'ajax/manga.php?keyword=' + keyword.value, true);
  xhr.send();
});