<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BloodLink Bangladesh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* ব্যাকগ্রাউন্ডে গ্রেস্কেল ইন্টারিয়র ছবি এবং দুই পাশে স্মুথ ফেড ইফেক্ট */
        .exact-grayscale-bg {
            position: relative;
            min-height: 100vh;
        }
        .exact-grayscale-bg::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: -1;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.85) 60%, rgba(255,255,255,1) 95%), 
                        url('https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1400&q=80');
            background-size: cover;
            background-position: center;
            filter: grayscale(100%) contrast(92%);
        }

        /* স্ক্রিনশটের মতো ভাসমান গোল্লাগুলোর চারপাশের নরম ওভাল রিং ইফেক্ট */
        .outer-oval-ring {
            padding: 8px 12px;
            background: rgba(239, 68, 68, 0.04);
            border: 1px solid rgba(239, 68, 68, 0.15);
            border-radius: 2rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            backdrop-filter: blur(2px);
        }
        .inner-white-circle {
            background: #ffffff;
            border-radius: 50%;
            width: 46px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-700">

    <div class="exact-grayscale-bg flex flex-col justify-between items-center p-4">
        
        <!-- মেইন কন্টেন্ট এরিয়া (কার্ড এবং দুই পাশের এলিমেন্ট) -->
        <div class="flex-1 w-full max-w-7xl mx-auto flex items-center justify-center px-4 relative my-10">
            
            <!-- ================= বাম পাশের নিখুঁত এলিমেন্টস (Left Floating Items) ================= -->
            <div class="hidden lg:block absolute left-4 xl:left-16 w-96 h-[500px] z-0 pointer-events-none">
                
                <!-- বামে মাঝের রক্তের ফোঁটা (ওভাল রিং সহ) -->
                <div class="absolute bottom-28 left-16 outer-oval-ring">
                    <div class="inner-white-circle">
                        <i class="fas fa-droplet text-red-500 text-base"></i>
                    </div>
                </div>

                <!-- বামে নিচে ছোট লাভ সার্কেল -->
                <div class="absolute bottom-4 right-10 outer-oval-ring" style="padding: 6px 10px;">
                    <div class="inner-white-circle" style="width: 38px; height: 38px;">
                        <i class="fas fa-heart text-red-500 text-xs"></i>
                    </div>
                </div>

                <!-- বামে উপরে হালকা লাভ সার্কেল -->
                <div class="absolute top-16 right-4 outer-oval-ring" style="padding: 6px 10px;">
                    <div class="inner-white-circle" style="width: 38px; height: 38px;">
                        <i class="fas fa-heart text-red-400 text-xs"></i>
                    </div>
                </div>

                <!-- স্ক্রিনশটের ছোট ছোট ক্ষুদ্র লাল ড্রপস এবং নোড ডট -->
                <div class="absolute top-20 left-28 text-red-400/40"><i class="fas fa-droplet text-[10px]"></i></div>
                <div class="absolute bottom-40 left-12 text-red-400/40"><i class="fas fa-droplet text-[10px]"></i></div>
                <div class="absolute top-1/2 right-12 w-2 h-2 bg-teal-500/80 rounded-full"></div>
            </div>


            <!-- ================= মূল লগইন কার্ড (Center Login Card) ================= -->
            <div class="bg-white rounded-[2.5rem] shadow-[0_25px_60px_-15px_rgba(0,0,0,0.12)] w-full max-w-[435px] overflow-hidden border border-gray-100 z-10 mx-auto">
                
                <!-- লাল টপ বার -->
                <div class="bg-[#E53935] pt-9 pb-7 px-8 text-center flex flex-col items-center justify-center">
                    <div class="bg-white text-[#E53935] p-3 rounded-full flex items-center justify-center w-14 h-14 shadow-sm mb-3">
                        <i class="fas fa-heart text-2xl"></i>
                    </div>
                    <div class="text-white">
                        <h2 class="text-xl font-black tracking-wide leading-none">BloodLink</h2>
                        <p class="text-[10px] font-bold tracking-widest uppercase opacity-90 mt-1">Bangladesh</p>
                    </div>
                </div>

                <!-- কার্ডের ভেতরের মেইন বডি -->
                <div class="p-8 md:p-9 text-center">
                    <h3 class="text-2xl font-black text-gray-800 tracking-tight">Welcome Back!</h3>
                    <p class="text-gray-400 text-xs mt-1.5 mb-8 font-medium">Log in to access your donor dashboard or find a donor.</p>

                    <form action="{{ route('login') }}" method="POST" class="space-y-4">
                        @csrf
                        <!-- ইমেইল/ফোন -->
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-gray-400">
                                <i class="far fa-envelope text-sm"></i>
                            </span>
                            <input type="text" name="email" required placeholder="Email or Phone Number" 
                                class="w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none text-sm text-gray-700 bg-white placeholder-gray-400/70" required>
                        </div>

                        <!-- পাসওয়ার্ড -->
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-gray-400">
                                <i class="fas fa-lock text-sm"></i>
                            </span>
                            <input type="password" id="passwordField" name="password" required placeholder="Password" 
                                class="w-full pl-11 pr-16 py-3.5 border border-gray-200 rounded-xl focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none text-sm text-gray-700 bg-white placeholder-gray-400/70" required>
                            <button type="button" onclick="togglePassword()" class="absolute right-4 text-xs font-bold text-gray-400 hover:text-gray-600 transition flex items-center gap-1">
                                <i id="passwordIcon" class="far fa-eye"></i> Show
                            </button>
                        </div>

                        <!-- চেকবক্স ও ফরগট লিঙ্ক -->
                        <div class="flex justify-between items-center pt-1 text-xs">
                            <label class="flex items-center text-gray-400 font-semibold cursor-pointer select-none">
                                <input type="checkbox" name="remember" class="w-4 h-4 border-gray-300 rounded accent-red-600 mr-2 cursor-pointer">
                                Remember Me
                            </label>
                            <a href="#" class="text-gray-400 hover:text-red-500 font-semibold transition">Forgot Password?</a>
                        </div>

                        <!-- লগইন বাটন -->
                        <button type="submit" class="w-full bg-[#E53935] text-white py-3.5 rounded-xl font-bold text-sm hover:bg-[#D32F2F] transition shadow-sm mt-2">
                            Log In
                        </button>
                    </form>

                    <div class="mt-6 text-xs font-semibold text-gray-400 border-t border-gray-100 pt-6">
                        Don't have an account? <a href="#" class="text-[#E53935] font-bold hover:underline ml-0.5">Become a Donor</a>
                    </div>
                </div>
            </div>


            <!-- ================= ডান পাশের নিখুঁত এলিমেন্টস (Right Floating Items) ================= -->
            <div class="hidden lg:block absolute right-4 xl:right-16 w-96 h-[500px] z-0 pointer-events-none">
                
                <!-- ডানে উপরের রক্তের ফোঁটা (ওভাল রিং সহ) -->
                <div class="absolute top-12 left-10 outer-oval-ring">
                    <div class="inner-white-circle">
                        <i class="fas fa-droplet text-red-500 text-base"></i>
                    </div>
                </div>

                <!-- ডানে মাঝের লোহিত রক্তকণিকা/RBC (ওভাল রিং সহ) -->
                <div class="absolute top-1/3 right-4 outer-oval-ring">
                    <div class="inner-white-circle">
                        <i class="fas fa-circle-nodes text-red-500 text-lg"></i>
                    </div>
                </div>

                <!-- ডানে নিচের অণুচক্রিকা বা ছোট সেল -->
                <div class="absolute bottom-16 left-24 outer-oval-ring" style="padding: 6px 10px;">
                    <div class="inner-white-circle" style="width: 38px; height: 38px;">
                        <i class="fas fa-cubes text-red-400 text-xs"></i>
                    </div>
                </div>

                <!-- ডানে ভাসমান সূক্ষ্ম ড্রপস ও ব্যাকগ্রাউন্ড ডট -->
                <div class="absolute top-28 right-24 text-red-400/40"><i class="fas fa-droplet text-[10px]"></i></div>
                <div class="absolute bottom-24 right-16 text-red-400/40"><i class="fas fa-droplet text-[10px]"></i></div>
            </div>

        </div>

        <!-- ফুটার অংশ -->
        <footer class="w-full text-center py-4 text-[11px] text-gray-400 font-semibold flex justify-center gap-4 z-10">
            <a href="#" class="hover:text-gray-600 transition">Privacy Policy</a>
            <span>|</span>
            <a href="#" class="hover:text-gray-600 transition">Terms of Service</a>
            <span>|</span>
            <span>&copy; 2026 BloodLink Bangladesh</span>
        </footer>

    </div>

    <!-- পাসওয়ার্ড শো/হাইড স্ক্রিপ্ট -->
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('passwordField');
            const passwordIcon = document.getElementById('passwordIcon');
            const buttonText = passwordIcon.parentElement;
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.replace('far', 'fas');
                passwordIcon.classList.replace('fa-eye', 'fa-eye-slash');
                buttonText.innerHTML = '<i id="passwordIcon" class="fas fa-eye-slash"></i> Hide';
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.replace('fas', 'far');
                passwordIcon.classList.replace('fa-eye-slash', 'fa-eye');
                buttonText.innerHTML = '<i id="passwordIcon" class="far fa-eye"></i> Show';
            }
        }
    </script>
</body>
</html>