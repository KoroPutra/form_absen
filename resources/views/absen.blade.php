<!-- resources/views/absen/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Absen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Form Absen</h1>
        <form action="{{route('absen.submit')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">NIP</label>
                <select name="nip" id="nip" class="border rounded w-full py-2 px-3">
                    <option value="" selected disabled>Pilih Nomor Induk Pegawai</option>
                    @foreach($nips as $nip)
                        <option value="{{ $nip }}">{{ $nip }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tanggal" class="block text-gray-700">Tanggal</label>
                <input type="date" name="tgl_masuk" id="tgl_masuk" class="border rounded w-full py-2 px-3" required>
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Jam Absen</label>
                <input type="time" name="jam_absen_manual" id="jam_absen_manual" class="border rounded w-full py-2 px-3" required>
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Jenis Kehadiran</label>
                <select name="jenis_kehadiran" id="jenis_kehadiran"  class="border rounded w-full py-2 px-3">
                    <option value="" selected disabled>Pilih Jenis Kehadiran</option>
                    <option value="wfo">WFO (Kantor)</option>
                    <option value="fwa">FWA (Remote)</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Status Kehadiran</label>
                <select name="status_kehadiran" id="status_kehadiran"  class="border rounded w-full py-2 px-3">
                    <option value="" selected disabled>Pilih Status Kehadiran</option>
                    <option value="masuk">Masuk Kantor</option>
                    <option value="pulang">Pulang Kantor</option>
                </select>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
