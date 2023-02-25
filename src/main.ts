const listBtn = Array.prototype.slice.call(document.getElementsByClassName("btn")) as HTMLButtonElement[]
const modal = document.getElementById("modal") as HTMLFormElement
const bgModal = document.getElementById("bg-modal") as HTMLElement
const inputId = document.getElementById("item-id") as HTMLInputElement

listBtn.forEach(btn => {
    btn.addEventListener("click", () => {
        modal.classList.remove("hidden")
        bgModal.classList.remove("hidden")
        inputId.value = btn.id
    })
});

bgModal.addEventListener("click", () => {
    modal.classList.add("hidden")
    bgModal.classList.add("hidden")
})

modal.addEventListener("submit", (e) => {
    e.preventDefault()
    const formData = new FormData(modal)
    fetch("buy.php", {
        method: "POST",
        body: formData
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Success:", data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
})