document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("solutionModal");
    const openButton = document.getElementById("showModalButton");
    const closeButton = document.getElementById("closeModalButton");

    openButton.addEventListener("click", () => modal.showModal());
    closeButton.addEventListener("click", () => modal.close());
});