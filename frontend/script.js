
document.addEventListener('DOMContentLoaded', function () {
    console.log("DOM loaded - initializing interactions");

    // Form logic for the details Modal
    const interestForm = document.getElementById('interestForm');

    if (interestForm) {
        interestForm.addEventListener('submit', function (event) {
            // Prevent default form submission
            event.preventDefault();
            event.stopPropagation();

            if (!interestForm.checkValidity()) {
                interestForm.classList.add('was-validated');
            } else {
                const name = document.getElementById('nameInput').value;

                alert(`Thank you, ${name}! Your interest has been registered.`);

                // Close the modal
                const modalElement = document.getElementById('detailsModal');
                const modalInstance = bootstrap.Modal.getInstance(modalElement);
                if (modalInstance) {
                    modalInstance.hide();
                }

                // Reset form state
                interestForm.reset();
                interestForm.classList.remove('was-validated');
            }
        }, false);
    }
});

//function opens a modal when bottom button is clicked
function openDetailsModal() {
    const modalElement = document.getElementById('detailsModal');
    const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);
    modalInstance.show();
}
