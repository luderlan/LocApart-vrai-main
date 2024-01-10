document.addEventListener('DOMContentLoaded', function () {
    var heartIcons = document.querySelectorAll('.fa-heart');

    heartIcons.forEach(function (icon) {
        icon.addEventListener('click', function () {
            var idBien = this.getAttribute('data-id-bien');

            // Envoyer la requête AJAX pour mettre à jour les favoris
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'votre_script_php.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                // Réagir à la réponse du serveur si nécessaire
                console.log(xhr.responseText);
            };
            xhr.send('id_bien=' + idBien);
        });
    });
});
