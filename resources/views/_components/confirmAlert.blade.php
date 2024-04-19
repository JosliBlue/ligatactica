<!-- imports for component -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite('resources/css/components/confirmAlert.css')

<!-- component -->
<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
            popup: "dark-mode"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: "¿Estás seguro de cambiar tu contraseña?",
        text: "Una vez cambiada, no podrás revertir esta acción.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, cambiar contraseña",
        cancelButtonText: "Cancelar",
        reverseButtons: true
    }).then((result) => {
        // Si se confirma, redirige al usuario a la acción del formulario
        if (result.isConfirmed) {
            // Redirige al usuario a la acción del formulario
            document.getElementById('passwordForm').submit();
        }
    });
</script>
