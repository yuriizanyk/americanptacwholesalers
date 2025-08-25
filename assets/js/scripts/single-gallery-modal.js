document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById("image-modal");
    if (!modal) return;
    const modalImg = document.getElementById("modal-image");
    if (!modalImg) return;
    const closeBtn = document.querySelector(".wcl-image-modal__close");
    if (!closeBtn) return;

    if (modal) {
        modal.classList.remove("active");
        modalImg.src = "";
    }

    document.querySelectorAll(".wcl-single__product-image img").forEach(img => {
        if (!img) return;
        img.addEventListener("click", () => {
            modal.classList.add("active");
            modalImg.src = img.src;
        });
    });

    closeBtn.addEventListener("click", () => {
        closeModal();
    });

    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            closeModal();
        }
    });

    function closeModal() {
        modal.classList.remove("active");
        modalImg.src = "";
    }
});