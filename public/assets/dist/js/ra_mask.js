document.addEventListener('DOMContentLoaded', function () {
    const raInput = document.getElementById('ra');

    if (raInput) {
        raInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');

            if (value.length > 8) {
                value = value.slice(0, 9);
                value = value.replace(/^(\d{8})(\d)/, '$1-$2');
            }

            e.target.value = value;
        });
    }
});
