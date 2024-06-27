<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Absen</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        @media (min-width: 768px) {
            .radio-group {
                display: flex;
                flex-direction: row;
            }
            .radio-item {
                margin-right: 1rem;
            }
            .button-container {
                display: flex;
                justify-content: flex-end;
            }
        }
        @media (max-width: 767px) {
            .radio-group {
                display: flex;
                flex-direction: column;
            }
            .radio-item {
                margin-bottom: 1rem;
            }
            .button-container {
                display: flex;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container mx-auto p-4">
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-2xl font-semibold mb-4">Form Absen</h1>
            <img class="h-24 w-32 mb-10" src="{{ asset('img/sekneg.png') }}" alt="sekneg"> 
        </div>
        <form action="{{ route('absen.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">NIP</label>
                <select name="nip" id="nip" class="border rounded w-full py-2 px-3">
                    <option value="" selected disabled>Pilih Nomor Induk Pegawai</option>
                    @foreach($nips as $nip => $nama)
                        <option value="{{ $nama }}">{{ $nama }} - {{ $nip }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tanggal" class="block text-gray-700">Tanggal</label>
                <input type="date" id="tgl_masuk_disabled" class="border rounded w-full py-2 px-3" required disabled>
                <input type="hidden" name="tgl_masuk" id="tgl_masuk">
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Jam Absen</label>
                @if($isJamEnabled == 1)
                    <input type="time" name="jam_absen_manual" id="jam_absen_manual" class="border rounded w-full py-2 px-3" required>
                @else
                    <input type="time" name="jam_absen_manual" id="jam_absen_manual" class="border rounded w-full py-2 px-3" value="{{ \Carbon\Carbon::now()->format('H:i') }}" disabled>
                    <input type="hidden" name="jam_absen_manual" id="jam_absen_manual" value="{{ \Carbon\Carbon::now()->format('H:i') }}">
                @endif
            </div>
            <div class="mb-4">
                <label for="jenis_kehadiran" class="block text-gray-700">Jenis Kehadiran</label>
                <div class="radio-group">
                    <label class="radio-item">
                        <input type="radio" name="jenis_kehadiran" value="wfo" required> WFO (Kantor)
                    </label>
                    <label class="radio-item">
                        <input type="radio" name="jenis_kehadiran" value="fwa" required> FWA (Remote)
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <label for="status_kehadiran" class="block text-gray-700">Status Kehadiran</label>
                <div class="radio-group">
                    <label class="radio-item">
                        <input type="radio" name="status_kehadiran" value="masuk" required> Masuk Kantor
                    </label>
                    <label class="radio-item">
                        <input type="radio" name="status_kehadiran" value="pulang" required> Pulang Kantor
                    </label>
                </div>
            </div>
            <div class="mb-4 button-container">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#nip').selectize({
                create: false,
                sortField: 'text'
            });

            var today = new Date();
            var day = String(today.getDate()).padStart(2, '0');
            var month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            var year = today.getFullYear();
            var todayDate = year + '-' + month + '-' + day;
            $('#tgl_masuk_disabled').val(todayDate);
            $('#tgl_masuk').val(todayDate);

            // if($isJamEnabled != 1){
            //     var now = new Date();
            //     var hours = String(now.getHours()).padStart(2, '0');
            //     var minutes = String(now.getMinutes()).padStart(2, '0');
            //     var currentTime = hours + ':' + minutes;
            //     $('#jam_absen_manual').val(currentTime).prop('disabled', true);
            //     $('<input>').attr({
            //         type: 'hidden',
            //         name: 'jam_absen',
            //         value: currentTime
            //     }).appendTo('form');
            // }
        });
    </script>
</body>
</html>
