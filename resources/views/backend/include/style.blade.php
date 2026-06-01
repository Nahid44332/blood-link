 <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        /* ইমেজের মতো নিখুঁত সফট শ্যাডো ইফেক্ট */
        .premium-shadow {
            box-shadow: 0 10px 35px -5px rgba(0, 0, 0, 0.03), 0 5px 15px -3px rgba(0, 0, 0, 0.02);
        }
        .sidebar-shadow {
            box-shadow: 4px 0 25px rgba(0, 0, 0, 0.015);
        }
        /* Mobile Sidebar Drawer Smooth Transition */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out, visibility 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }
        .mobile-sidebar-hidden {
            transform: translateX(-100%);
            visibility: hidden;
            opacity: 0;
        }
        .mobile-sidebar-visible {
            transform: translateX(0);
            visibility: visible;
            opacity: 1;
        }
        #mobile-overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }
        #mobile-overlay.overlay-visible {
            opacity: 1;
            visibility: visible;
        }
    </style>