import "./bootstrap";
import Sortable from "sortablejs";

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

    // Project List Select Component
    const selectField = document.getElementById("project_list");

    if (selectField) {
        selectField.addEventListener("change", (e) => {
            window.location.href = `/?project=${e.target.value}`;
        });
    }

    // Create Task
    const taskBtn = document.getElementById("new_task_btn");
    const taskForm = document.getElementById("create_task_form");
    const closeTaskBtn = document.getElementById("close_task_btn");

    if (taskBtn && taskForm) {
        taskBtn.addEventListener("click", () => {
            taskForm.classList.toggle("hidden");
            taskForm.classList.toggle("grid");
        });
    }

    if (taskForm && closeBtn) {
        closeTaskBtn.addEventListener("click", () => {
            taskForm.classList.remove("grid");
            taskForm.classList.add("hidden");
        });
    }

    // Implement Task Sorting via Sortable
    const el = document.getElementById("sortable-task-list");

    Sortable.create(el, {
        animation: 150,
        onEnd: function () {
            let order = [];
            document.querySelectorAll(".task-item").forEach((item, index) => {
                order.push({
                    id: item.dataset.id,
                    priority: index + 1,
                });
            });

            fetch(el.dataset.sortUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]',
                    ).content,
                },
                body: JSON.stringify({ order }),
            });
        },
    });
});
