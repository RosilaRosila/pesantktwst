@extends('layout-pengunjung.dashboard-pesan_tiket')
@section('container')

<br>
<div class="container">

    <div class="card o-hidden border-0  my-4">
        <div class="card-body p-2">
            <!-- Nested Row within Card Body -->
            <div class="card " style=" margin-top: 50px;">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('/') }}images/logokp.png" class="logoimg mx-auto d-block" width="80" height="80" alt="" style="margin-top: 20px; margin-bottom:20px">
                        <h3 class="h3 text-gray-900 mb-4">Pesan Tiket Wisata</h3>
                    </div>
                    <hr>
                    <br>
                    <form action="{{ route('pesantiket.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="txtname" class="form-label">Masukan Nama Lengkap Anda (Enter your full name)</label>
                                    <input type="text" class="form-control form-control" id="txtname" placeholder="Nama Lengkap" name="name" value="{{ Auth::guard('pengunjung')->user()->name }}" readonly style="font-size: 12px;">
                                </div>
                                <div class="form-group">
                                    <label for="txtname" class="form-label">Masukan Nomor Hp (Enter your phone)</label>
                                    <input type="text" class="form-control form-control" id="txtname" placeholder="Masukan No Handphone" name="nohp" style="font-size: 12px;">
                                </div>
                                <div class="form-group">
                                    <label for="wisatawan" class="form-label">Masukan Jenis Wisatawan (Enter the type of tourist)</label>
                                    <select name="wisatawan" class="form-select" aria-label="Default select example" id="wisatawan" style="font-size: 12px;">
                                        <option value="" selected>Pilih wisatawan</option>
                                        @foreach($wisatawan as $value => $text)
                                        <option value="{{ $value }}">{{ $text }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="datatiketid" class="form-label">Pilih Tujuan Tempat Wisata (Select Tourist Destination)</label>
                                    <select name="datatiketid" class="form-select" aria-label="Default select example" id="datatiketid" style="font-size: 12px;">
                                        <option value="" selected> Pilih Tiket Tujuan Wisata </option>
                                        @foreach($datatiket as $dt)
                                        <option value="{{ $dt->id }}" data-harga="{{ $dt->harga }}">{{ $dt->namawst }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="txtqty" class="form-label">Harga Tiket perorang (Ticket Price per person)</label>
                                    <input type="text" class="form-control" id="hargatiket" placeholder="Harga Tiket" name="hargatiket" readonly style="font-size: 12px;">
                                </div>
                                <div class="form-group">
                                    <label for="txtqty" class="form-label">Masukan Jumlah Orang (Enter the number of people)</label>
                                    <input type="number" class="form-control" id="txtqty" placeholder="Jumlah Orang" name="qty" data-qty="" style="font-size: 12px;">
                                </div>
                            </div>
                            <div class="form-group mt-1">
                                <label for="totalharga" class="form-label">Total Pembayaran (Total Payment)</label>
                                <input type="text" class="form-control" id="totalharga" placeholder="Total Pembayaran" name="totalharga" readonly style="font-size: 12px;">
                            </div>
                            <div class=" form-group mt-1">
                                <label for="txttanggal" class="form-label">Masukan Tanggal Liburan/Kunjungan (Enter the date of your visit)</label>
                                <input type="date" name="tanggal" class="form-control" id="txttanggal" style="font-size: 12px;" min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="d-grid gap-1 mt-4">
                                <button type="submit" class="btn btn-primary">Pesan Tiket Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>

<script>
    // Fungsi untuk format Rupiah
    function formatRupiah(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang diinputkan adalah angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }
</script>

<script>
    // Fungsi untuk menghapus format Rupiah agar tersimpan sebagai angka di database
    function cleanRupiah(rupiah) {
        return rupiah.replace(/[^,\d]/g, '').replace(',', '.');
    }
</script>

<script>
    $('#datatiketid').on('change', function() {
        // ambil data dari elemen option yang dipilih
        const hargatiket = $('#datatiketid option:selected').data('harga');
        // tampilkan data ke element
        $('[name=hargatiket]').val(hargatiket);

    });

    var total = hargat + qty;
    $("#total").val(total);
</script>

<script>
    $('#txttanggal').datepicker({
        format: 'yyyy-mm-dd',
        startDate: new Date(), // Mencegah tanggal yang sudah lewat
        autoclose: true,
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const datatiketSelect = document.getElementById('datatiketid');
        const qtyInput = document.getElementById('txtqty');
        const hargatiketInput = document.getElementById('hargatiket');
        const totalPembayaranInput = document.getElementById('totalharga');

        // Function to calculate total payment
        function calculateTotal() {
            const hargaTiket = parseFloat(cleanRupiah(hargatiketInput.value)) || 0;
            const qty = parseInt(qtyInput.value) || 0;
            const totalPembayaran = hargaTiket * qty;
            totalPembayaranInput.value = formatRupiah(totalPembayaran, 'Rp '); // Format Rupiah
        }

        // Event listener for ticket selection change
        datatiketSelect.addEventListener('change', function() {
            const selectedOption = datatiketSelect.options[datatiketSelect.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            hargatiketInput.value = formatRupiah(harga, 'Rp '); // Format Rupiah
            calculateTotal(); // Recalculate total
        });

        // Event listener for quantity change
        qtyInput.addEventListener('input', function() {
            calculateTotal(); // Recalculate total when qty changes
        });

        // Before form submission, clean the Rupiah format
        document.querySelector('form').addEventListener('submit', function(event) {
            hargatiketInput.value = cleanRupiah(hargatiketInput.value); // Remove Rupiah format
            totalPembayaranInput.value = cleanRupiah(totalPembayaranInput.value); // Remove Rupiah format
        });
    });
</script>

<!-- <script>
    $('#package').on('change', function() {
        // ambil data dari elemen option yang dipilih
        const price = $('#package option:selected').data('price');
        const discount = $('#package option:selected').data('discount');

        // kalkulasi total harga
        const totalDiscount = (price * discount / 100)
        const total = price - totalDiscount;

        // tampilkan data ke element
        $('[name=price]').val(price);
        $('[name=discount]').val(totalDiscount);

        $('#total').text(`Rp ${total}`);
    });
</script> -->



@endsection