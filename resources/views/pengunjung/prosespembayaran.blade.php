<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<form id="payment-form" method="post" action="{{ route('pembayaran_complete', $pesan->kode_transaksi) }}">
    @csrf
    <input type="hidden" name="payment_response" id="payment-response">
</form>

<script type="text/javascript">
    snap.pay("{{ $snapToken }}", {
        onSuccess: function(result) {
            document.getElementById('payment-response').value = JSON.stringify(result);
            document.getElementById('payment-form').submit();
        }
    });
</script>