// Get form and form elements
const form = document.querySelector('form');
const usernameInput = document.querySelector('input[name="username"]');
const passwordInput = document.querySelector('input[name="password"]');

// Get dashboard and color palette elements
const dashboard = document.querySelector('.dashboard');
const welcomeMessage = document.querySelector('.dashboard h2');
const logoutButton = document.querySelector('.dashboard .cta');
const colorBoxes = document.querySelectorAll('.color-box');

// Add event listener to form
form.addEventListener('submit', e => {
  e.preventDefault();

  // Check if form inputs are valid
  if (usernameInput.value === '' || passwordInput.value === '') {
    // Display error message if inputs are invalid
    const errorMessage = document.querySelector('.error-message');
    errorMessage.style.display = 'block';
    return;
  }

  // Hide login form and display dashboard
  form.style.display = 'none';
  dashboard.style.display = 'block';

  // Set welcome message with username
  welcomeMessage.textContent = `Welcome, ${usernameInput.value}!`;

  // Add event listener to logout button
  logoutButton.addEventListener('click', () => {
    // Reload the page to log out the user
    location.reload();
  });

  // Add event listeners to color boxes
  colorBoxes.forEach(colorBox => {
    colorBox.addEventListener('click', () => {
      // Change background color of dashboard to selected color
      dashboard.style.backgroundColor = colorBox.style.backgroundColor;
    });
  });
});
