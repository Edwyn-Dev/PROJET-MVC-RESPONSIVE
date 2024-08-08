// Add an event listener for when the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Get the hamburger element by its ID
    const hamburger = document.getElementById("hamburger");
    // Get the menu container element
    const menu = document.querySelector(".menu-container");

    // Add a click event listener to the hamburger element
    hamburger.addEventListener("click", function() {
        // Toggle the "active" class on the menu container
        menu.classList.toggle("active");
    });
});
