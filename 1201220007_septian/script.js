document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formRegister');

    form.addEventListener('submit', function (event) {
        // Reset border color
        resetBorderColor();

        // Check if fields are empty
        const nama = document.getElementById('nama').value.trim();
        const telepon = document.getElementById('telepon').value.trim();
        const account = document.getElementById('account').value.trim();
        const password = document.getElementById('password').value.trim();

        if (!nama || !telepon || !account || !password) {
            // Set border color to red for empty fields
            highlightEmptyFields();

            // Prevent form submission
            event.preventDefault();

            // Show notification
            alert('Harap isi semua kolom!');
        }
    });

    function highlightEmptyFields() {
        const fields = ['nama', 'telepon', 'account', 'password'];

        fields.forEach(function (field) {
            const inputElement = document.getElementById(field);
            inputElement.style.borderColor = 'red';
        });
    }

    function resetBorderColor() {
        const fields = ['nama', 'telepon', 'account', 'password'];

        fields.forEach(function (field) {
            const inputElement = document.getElementById(field);
            inputElement.style.borderColor = '';
        });
    }
});
