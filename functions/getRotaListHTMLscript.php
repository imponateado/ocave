var url = `${baseUrl}/ocave/backend/getRotaList.php`;
fetch(url)
.then(res => {
  if (!res.ok) {
    throw new Error('Network response was not ok');
  }
  return res.json();
})
.then(data => {
  let options = '';
  data.forEach(item => {
    options += `<option value="${item.IDROTA}">${item.CODINTERNO} - ${item.DESCRICAO} - ${item.IDROTA}</option>`;
    document.getElementById('rotas').innerHTML = options;
  })
})