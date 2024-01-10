document.addEventListener('DOMContentLoaded', function () {
// Sélectionnez tous les éléments cliquables
const clickableElements = document.querySelectorAll('.clickable');

// Ajoutez un gestionnaire d'événements à chaque élément cliquable
clickableElements.forEach(function (element) {
element.addEventListener('click', function () {
    // Obtenez le parent content-item
    const contentItem = this.closest('.content-item');

    // Dupliquez le content-item
    const clonedItem = contentItem.cloneNode(true);

    // Vérifiez si le content-item est déjà dans la section Bien coup de cœur
    const isInFavorites = isItemInFavorites(clonedItem);

    if (!isInFavorites) {
        // Ajoutez le content-item cloné à la section Bien coup de cœur
        addToFavorites(clonedItem);
    } else {
        // Si le content-item est déjà dans la section, supprimez-le
        removeFromFavorites(clonedItem);
    }
});
});

function addToFavorites(item) {
const favorisContainer = document.querySelector('.favoris-section');
favorisContainer.appendChild(item);

// Ajoutez un gestionnaire pour supprimer l'élément au clic sur le cœur
const heartIcon = item.querySelector('.clickable');
heartIcon.addEventListener('click', function () {
    removeFromFavorites(item);
});
}

function removeFromFavorites(item) {
const favorisContainer = document.querySelector('.favoris-section');
favorisContainer.removeChild(item);
}

function isItemInFavorites(item) {
const favorisContainer = document.querySelector('.favoris-section');
const existingItems = favorisContainer.querySelectorAll('.content-item');

// Vérifiez si l'élément est déjà présent dans la section Bien coup de cœur
return Array.from(existingItems).some(function (existingItem) {
    return existingItem.isEqualNode(item);
});
}
});