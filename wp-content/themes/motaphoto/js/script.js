window.addEventListener('DOMContentLoaded', function(event)  {
  const menuItem = document.getElementById('menu-item-128');
  const photoContactButton = document.getElementById('photo-contact-button');
  const modal = document.getElementById('modal-contact');

  menuItem.addEventListener('click', function(event)  {
    event.preventDefault();
    event.stopPropagation();  // Empêche la propagation du clic vers le parent (la fenêtre)
    modal.style.display = 'block';
  });

  photoContactButton.addEventListener('click', function(event)  {
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
  }}

  
  (function($) {
    let page = 2; // Initialisez la variable de page
    let per_page = 2; // Définissez le nombre de photos à charger par lot
  
    function load_more_photos() {
      $.ajax({
        url: ajax_object.ajaxurl,
        type: 'POST',
        data: {
          action: 'load_more_photos',
          page: page,
          per_page: per_page,
        },
        success: function(response) {
          try {
            // Tentez de parser la réponse JSON
            var photos = JSON.parse(response);
  
            // Incrémentez la page pour la prochaine requête
            page++;
  
            // Vérifiez s'il y a des photos à ajouter
            if (photos.length > 0) {
              // Ajoutez les photos au conteneur
              $('.photo-more-thumbnails').append(photos);
            } else {
              // Cachez le bouton s'il n'y a pas de photos supplémentaires
              $('#load-more-btn').hide();
            }
          } catch (e) {
            // Log l'erreur de parsing et éventuellement affichez un message à l'utilisateur
            console.error("Erreur lors du parsing JSON : ", e);
          }
        },
        error: function(xhr, status, error) {
          // Log l'erreur AJAX et éventuellement affichez un message à l'utilisateur
          console.error("Erreur AJAX : ", status, error);
        },
      });
    }
  
    // Liez l'événement de clic au bouton
    $('#load-more-btn').click(function() {
      load_more_photos();
    });
  
  })(jQuery);
  