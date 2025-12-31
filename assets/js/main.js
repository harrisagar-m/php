// Platform - Main JavaScript File

document.addEventListener('DOMContentLoaded', function() {
    console.log('Platform website loaded');
    
    // Language selector functionality
    const langLinks = document.querySelectorAll('.lang-selector a');
    langLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Language switching is handled server-side via PHP
            // This is a placeholder for any client-side language functionality
        });
    });
    
    // Add any additional JavaScript functionality here
});

