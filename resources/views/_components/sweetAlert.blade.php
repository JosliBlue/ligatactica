<!-- imports for component -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite('resources/css/components/sweetAlert.css')

<!-- component -->
<script>
    Swal.fire({
        toast: true,
        title: '{{ $message }}',
        icon: '{{ $icon }}',
        position: 'bottom-end',
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 4500,
        timerProgressBar: true
    });
</script>
