const inputImagem = document.getElementById('inputImagem');
const previewNovaImagem = document.getElementById('previewNovaImagem');

inputImagem.addEventListener('change', function() {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      previewNovaImagem.src = e.target.result;
      previewNovaImagem.style.display = 'block';
    }
    reader.readAsDataURL(file);
  } else {
    previewNovaImagem.src = '';
    previewNovaImagem.style.display = 'none';
  }
});
