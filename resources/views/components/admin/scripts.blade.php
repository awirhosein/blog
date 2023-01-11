<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

<script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.api_key') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    $('select.select2').select2({
        theme: 'bootstrap4',
    });
</script>

@include('sweetalert::alert')

@vite('resources/js/admin.js')
