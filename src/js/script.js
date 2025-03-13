document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.getElementById('menuBtn');
    const menuPanel = document.getElementById('menuPanel');
    const menuIcon = menuBtn.querySelector('img');
    
    menuBtn.addEventListener('click', function() {
        menuPanel.classList.toggle('active');
        menuBtn.classList.toggle('active');
        
        if (menuPanel.classList.contains('active')) {
            menuIcon.src = 'assets/images/logo/close-svgrepo-com.svg';
        } else {
            menuIcon.src = 'assets/images/logo/menu-svgrepo-com.svg';
        }
    });
});