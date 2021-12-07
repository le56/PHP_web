<script>
    const toastMessage = ({text,status}) => {
    Toastify({
        text,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: status ? "#198754" : "#dc3545",
        },
    }).showToast();
};
</script>