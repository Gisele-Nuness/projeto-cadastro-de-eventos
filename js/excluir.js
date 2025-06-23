
// Script para verificar formulários de exclusão e mostrar alerta SweetAlert2 de confirmação

document.addEventListener('DOMContentLoaded', () => {
  // Seleciona todos os formulários com a classe .form-excluir
  const formsExcluir = document.querySelectorAll('.form-excluir');

  formsExcluir.forEach(form => {
    form.addEventListener('submit', function(event) {
      event.preventDefault(); // Para o envio automático do form

      // Usa SweetAlert2 para pedir confirmação
      Swal.fire({
        title: 'Confirma exclusão?',
        text: "Tem certeza que deseja excluir este evento? Esta ação não pode ser desfeita.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF0000',
        cancelButtonColor: '#FF1493',
        confirmButtonText: 'Sim, excluir!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          // Se confirmar, envia o formulário
          form.submit();
        }
      });
    });
  });
});
