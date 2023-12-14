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
 // Create an array of image URLs
 const imageUrls = [
  'http://localhost:81/motaphoto/wp-content/uploads/2023/11/Lets-dance-compressed-scaled.jpg',
  'http://localhost:81/motaphoto/wp-content/uploads/2023/11/photo-1669579987959-scaled.jpg',
  'http://localhost:81/motaphoto/wp-content/uploads/2023/11/unnamed-scaled.jpg',
];

// Set a variable to track the current image index
let currentImageIndex = 0;

// Function to update the main title image
function updateMainTitleImage() {
  const imageURL = imageUrls[currentImageIndex];
  const mainTitleImage = document.getElementById('main-title-image');
  mainTitleImage.src = imageURL;

  // Increment the current image index
  currentImageIndex++;
  if (currentImageIndex === imageUrls.length) {
    currentImageIndex = 0;
  }
}


jQuery(document).ready(function($) {
  // Remplace 'ID_DU_CHAMP' par l'ID réel de ton champ ref photo
  var champRefPhoto = $('#ref-photo-input');  
  var referenceDeLaPhotoValue = getReferenceDeLaPhoto();  
  console.log('Référence de la photo :', referenceDeLaPhotoValue);

  // Préremplis le champ avec la valeur récupérée du champ personnalisé ACF
  champRefPhoto.val(referenceDeLaPhotoValue);
  
  // Utilisation pour récupérer la valeur de la référence de la photo
  console.log('Référence de la photo (à l\'intérieur de jQuery.ready) :', referenceDeLaPhotoValue);
});

// Fonction pour récupérer la valeur de la référence de la photo depuis le champ personnalisé ACF
function getReferenceDeLaPhoto() {
  // Vérifie si ACF est défini (chargé sur la page)
  if (typeof acf !== 'undefined') {
    // Récupère la valeur du champ "reference_de_la_photo" du groupe ACF spécifié
    var field = getField('reference_de_la_photo', 'group_6567014f4dbda');
    console.log('Champ ACF :', field);

    if (field) {
      return field.val();
    }
  }

  // Retourne une valeur par défaut si ACF n'est pas défini ou si le champ n'est pas trouvé
  return 'Valeur_par_défaut';
}

