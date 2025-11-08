<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRUD System')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-VvDrTMpK6Vxzv0WqDeD4VvTzEvV0KQt0Fzjzv2Dk0Lc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

<header class="bg-white text-gray-800 shadow-md">
    <nav class="container mx-auto flex justify-between items-center p-4">
        <a href="{{ route('bank_accounts.index') }}" class="text-2xl font-semibold flex items-center gap-2 hover:text-blue-600">
            <i data-lucide="layers"></i> <span>Interfaces de Usuario</span>
        </a>
        <ul class="flex gap-6 text-sm font-medium">
            <li><a href="{{ route('bank_accounts.index') }}" class="hover:text-blue-600">Banco</a></li>
            <li><a href="{{ route('kids_profiles.index') }}" class="hover:text-blue-600">Kids</a></li>
            <li><a href="{{ route('social_posts.index') }}" class="hover:text-blue-600">Red Social</a></li>
            <li><a href="{{ route('engineering_projects.index') }}" class="hover:text-blue-600">Ingeniería</a></li>
            <li><a href="{{ route('medical_appointments.index') }}" class="hover:text-blue-600">Salud</a></li>
        </ul>
        <a href="#" class="text-2xl font-semibold flex items-center gap-2">
            <img src="https://cdn.pixabay.com/photo/2015/09/09/19/56/office-932926_960_720.jpg" class="w-10 h-10 rounded-full">
        </a>
    </nav>
</header>

<main class="flex-1 container mx-auto px-4 py-6">
    @yield('content')
</main>

<footer class="bg-white text-gray-800 text-center py-3 mt-10">
    <p class="text-sm">&copy; {{ date('Y') }} - Proyecto de Mauro Poloni - Arquitectura y Diseño de Interfaces</p>
</footer>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();

    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(form => {
      form.addEventListener('submit', function (event) {
        event.preventDefault();

        Swal.fire({
          title: '¿Delete this item?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel',
          reverseButtons: true,
          focusCancel: true
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  });
</script>

@stack('scripts')

@if(session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        timer: 2000,
        showConfirmButton: false
      });
    </script>
@endif

@if(session('error'))
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
      });
    </script>
@endif

</body>
</html>
