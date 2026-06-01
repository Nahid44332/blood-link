<!-- মোবাইল সাইডবার টগল জাভাস্ক্রিপ্ট -->
    <script>
        function toggleMobileSidebar() {
            const overlay = document.getElementById('mobile-overlay');
            const drawer = document.getElementById('mobile-sidebar-drawer');
            
            overlay.classList.toggle('overlay-visible');
            drawer.classList.toggle('mobile-sidebar-hidden');
            drawer.classList.toggle('mobile-sidebar-visible');
            
            // মোবাইল সাইডবার খোলার সময় পেজ স্ক্রলিং বন্ধ করা
            if (drawer.classList.contains('mobile-sidebar-visible')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
        
        // চার্টগুলোর জন্য জাভাস্ক্রিপ্ট লজিক
        // ডোনাট চার্ট (Blood Group Distribution - নিখুঁত ইমেজের কালার কম্বিনেশন)
        const ctxGroup = document.getElementById('bloodGroupChart').getContext('2d');
        new Chart(ctxGroup, {
            type: 'doughnut',
            data: {
                labels: ['A+', 'A-', 'B+', 'O+', 'Others'],
                datasets: [{
                    data: [34, 14, 18, 12, 22],
                    backgroundColor: ['#E53935', '#F87171', '#00A896', '#028090', '#94A3B8'],
                    borderWidth: 3,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                cutout: '72%'
            }
        });

        // বার চার্ট (Blood Stocks - লাল এবং পিলড বর্ডার)
        const ctxStock = document.getElementById('bloodStockChart').getContext('2d');
        new Chart(ctxStock, {
            type: 'bar',
            data: {
                labels: ['A+', 'B+', 'O+', 'AB+'],
                datasets: [{
                    label: 'Bags',
                    data: [78, 42, 60, 25],
                    backgroundColor: '#E53935',
                    borderRadius: 8,
                    barThickness: 28
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: '#F1F5F9' },
                        ticks: { color: '#94A3B8', font: { size: 10 } }
                    },
                    x: { 
                        grid: { display: false },
                        ticks: { color: '#64748B', font: { size: 11, weight: '600' } }
                    }
                }
            }
        });
    </script>