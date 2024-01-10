document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.carousel');
    const images = Array.from(carousel.querySelectorAll('img'));

    images.forEach((img, index) => {
      img.addEventListener('click', function () {
        createPopup(index);
      });
    });

    function createPopup(startIndex) {
      const popup = document.createElement('div');
      popup.classList.add('popup');

      const closeButton = document.createElement('span');
      closeButton.classList.add('close-button');
      closeButton.innerHTML = '&times;';
      closeButton.addEventListener('click', function () {
        document.body.removeChild(popup);
      });

      popup.appendChild(closeButton);

      const popupContent = document.createElement('div');
      popupContent.classList.add('popup-content');

      images.forEach((img, index) => {
        const clonedImg = img.cloneNode(true);
        clonedImg.addEventListener('click', function () {
          document.body.removeChild(popup);
        });
        popupContent.appendChild(clonedImg);

        if (index === startIndex) {
          clonedImg.classList.add('active');
        }
      });

      popup.appendChild(popupContent);
      document.body.appendChild(popup);
    }
  });