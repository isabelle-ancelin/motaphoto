window.addEventListener('DOMContentLoaded', function(event)  {
  const menuItem = document.getElementById('menu-item-128');
  const modal = document.getElementById('modal-contact');

  menuItem.addEventListener('click', function(event)  {
    event.preventDefault();
    event.stopPropagation();  // Empêche la propagation du clic vers le parent (la fenêtre)
    modal.style.display = 'block';
  });

  window.addEventListener('click', function(event) {
    // Si le clic n'est pas à l'intérieur de l'élément modal, masquer la modale
    if (event.target !== modal && !modal.contains(event.target)) {
      modal.style.display = 'none';
    }
  });
});

