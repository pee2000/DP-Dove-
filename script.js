document.addEventListener('DOMContentLoaded', () => {
    let points = 0;
    const coin = document.getElementById('coin');
    const pointsDisplay = document.getElementById('points');
    const earnBtn = document.getElementById('earnBtn');
    const socialBtns = document.getElementById('socialBtns');

    // Hide social buttons initially
    socialBtns.style.display = 'none';

    // Function to handle coin click and generate points
    coin.addEventListener('click', () => {
        points += 1; // Add 1 point per click
        pointsDisplay.innerText = points; // Update points on the screen
    });

    // Reveal social buttons when Earn button is clicked
    earnBtn.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent page from refreshing
        socialBtns.style.display = 'block'; // Reveal social buttons
    });
});
