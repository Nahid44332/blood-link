<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BloodLink Bangladesh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   @include('backend.include.style')
</head>
<body class="bg-[#F8FAFC] text-[#1E293B] antialiased">

    <div class="min-h-screen flex flex-col lg:flex-row">
        
        @include('backend.include.sidebar')

        <!-- ================= MAIN CONTENT AREA ================= -->
        <main class="flex-1 flex flex-col min-w-0 overflow-y-auto">
            
            <!-- টপ হেডার বার (রেসপন্সিভ এবং মডার্ন) -->
          @include('backend.include.header')

          @yield('content')
             
        </main>
    </div>

    @include('backend.include.script')
    @stack('script')
</body>
</html>