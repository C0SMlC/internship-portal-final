'use strict';

const profileExpander = document.querySelector('.profile');
const mainProfile = document.querySelector('.main');
let isVisible = false;

profileExpander.addEventListener('click', () => {
  if (!isVisible) {
    isVisible = true;
    mainProfile.style.display = 'block';
    mainProfile.style.opacity = '0';
    profileExpander.style.opacity = '0';
    profileExpander.style.transform = 'scale(0)';
    profileExpander.style.backgroundImage =
      'url("https://api.iconify.design/material-symbols/close.svg")';

    setTimeout(() => {
      mainProfile.style.opacity = '1';
      profileExpander.style.opacity = '1';
      profileExpander.style.transform = 'scale(1)';
    }, 250); // Delay of 10 milliseconds before changing the opacity
  } else {
    mainProfile.style.opacity = '0';
    profileExpander.style.opacity = '0';
    profileExpander.style.transform = 'scale(0)';
    profileExpander.style.backgroundImage = 'url("demo.png")';

    setTimeout(() => {
      mainProfile.style.display = 'none';
      mainProfile.style.opacity = '1';
      profileExpander.style.opacity = '1';
      profileExpander.style.transform = 'scale(1)';
    }, 250); // Wait for the animation to complete before hiding the element

    isVisible = false;
  }
});

function openForm() {
  document.getElementById('editProfileForm').classList.remove('d-none');
}

function closeForm() {
  document.getElementById('editProfileForm').classList.add('d-none');
}
