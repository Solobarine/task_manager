import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    // Create Product
    const btn = document.getElementById("new_project_btn");
    const form = document.getElementById("create_project_form");
    const closeBtn = document.getElementById("close_project_btn");

    if (btn && form) {
        btn.addEventListener("click", () => {
            form.classList.toggle("hidden");
            form.classList.toggle("grid");
        });
    }

    if (form && closeBtn) {
        closeBtn.addEventListener("click", () => {
            form.classList.remove("grid");
            form.classList.add("hidden");
        });
    }
});
