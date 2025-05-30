@if (session('success') || session('info') || session('error'))
    <script>
        const iconType =
            "{{ session('success') ? 'success' : (session('info') ? 'info' : (session('error') ? 'error' : '')) }}";
        const messageText = "{{ session('success') ?? (session('info') ?? session('error')) }}";

        if (iconType) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 5000, // Display time set to 5 seconds
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: iconType,
                text: messageText
            });
        }
    </script>
@endif
