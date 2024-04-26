<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style scoped>
    .colored-toast {
        font-size: 20px;
        color: white;

    }

    .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
    }

    .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
    }

    .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
    }

    .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
    }

    .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
    }
</style>

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
        timerProgressBar: false
    });
</script>
