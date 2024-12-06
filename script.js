document.addEventListener("DOMContentLoaded", () => {
    const toggles = document.querySelectorAll(".faq-toggle");

    toggles.forEach(toggle => {
        toggle.addEventListener("click", () => {
            const answer = toggle.nextElementSibling;
            answer.style.display = answer.style.display === "block" ? "none" : "block";
        });
    });
});
