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
    
    // Login Modal Functionality
    const loginDesktopBtn = document.getElementById('loginDesktopBtn');
    const loginMobileBtn = document.getElementById('loginMobileBtn');
    const loginModalOverlay = document.getElementById('loginModalOverlay');
    const closeLoginModal = document.getElementById('closeLoginModal');
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const loginForm = document.getElementById('loginForm');
    
    // Open login modal from desktop nav
    loginDesktopBtn.addEventListener('click', function(e) {
        e.preventDefault();
        loginModalOverlay.classList.add('active');
        document.body.style.overflow = 'hidden'; 
    });
    
   
    loginMobileBtn.addEventListener('click', function(e) {
        e.preventDefault();
        loginModalOverlay.classList.add('active');
        menuPanel.classList.remove('active'); 
        menuBtn.classList.remove('active'); 
        menuIcon.src = 'assets/images/logo/menu-svgrepo-com.svg'; 
        document.body.style.overflow = 'hidden'; 
    });
    
    // Close login modal
    closeLoginModal.addEventListener('click', function() {
        loginModalOverlay.classList.remove('active');
        document.body.style.overflow = ''; 
    });
    
    
    loginModalOverlay.addEventListener('click', function(e) {
        if (e.target === loginModalOverlay) {
            loginModalOverlay.classList.remove('active');
            document.body.style.overflow = ''; 
        }
    });
    
    // Toggle password visibility
    togglePassword.addEventListener('click', function() {
        const iconContainer = this.querySelector('svg');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            iconContainer.innerHTML = `
                <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                <line x1="2" x2="22" y1="2" y2="22"></line>
            `;
        } else {
            passwordInput.type = 'password';
            iconContainer.innerHTML = `
                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            `;
        }
    });
    
    
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value;
        const password = passwordInput.value;
       
        
       
        console.log('Login attempt:', { email, password, remember });
        
        
        alert('Login successful (demo)');
        
       
        loginModalOverlay.classList.remove('active');
        document.body.style.overflow = ''; 
    });
});