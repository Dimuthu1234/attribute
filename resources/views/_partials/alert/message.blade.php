@if(session()->has('alert_message'))
	@push ('scripts')
		<script>
            alertify.{{ session('alert_message.type') }}("{{ session('alert_message.message') }}");
		</script>
	@endpush
@endif