<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Absen</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.0/sweetalert2.all.min.js" integrity="sha512-3VXeZhhm1/owfuUI+kWBQBjUOZXOEc97aUMwHS9zxA71HxhVaKMxYXX5BzE5mHiN5wxhWTTZWLoSO5MmcrcunQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white max-w-md rounded-lg overflow-hidden shadow-lg">
  <div class="bg-teal-100 border-t-4 border-teal-500 rounded-t text-teal-900 px-4 py-3" role="alert">
    <div class="flex">
      <div class="py-1">
        <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
        </svg>
      </div>
      <div>
        <p class="font-bold">DATA BERHASIL DISIMPAN !!</p>
      </div>
    </div>
  </div>
  <div class="flex justify-center mt-2 mb-4">
  <button onclick="window.location.href='{{ url('/absen') }}'" class="bg-green-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded" type="button">
  Kembali
</button>

  </div>
</div>
<script>
 const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Absen telah tersimpan !!"
});
</script>
</body>
</html>
