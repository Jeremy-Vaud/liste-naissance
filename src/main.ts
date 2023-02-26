const listBtn = Array.prototype.slice.call(document.getElementsByClassName("btn")) as HTMLButtonElement[]
const modal = document.getElementById("modal") as HTMLElement
const form = document.getElementById("modal-form") as HTMLFormElement
const closeBtn = document.getElementById("modal-close") as HTMLElement
const successMsg = document.getElementById("modal-success") as HTMLElement
const errorMsg = document.getElementById("modal-error") as HTMLElement
const bgModal = document.getElementById("bg-modal") as HTMLElement
const inputId = document.getElementById("item-id") as HTMLInputElement
const inputName = document.getElementById("name") as HTMLInputElement

listBtn.forEach(btn => {
    btn.addEventListener("click", () => {
        modal.classList.remove("hidden")
        bgModal.classList.remove("hidden")
        inputId.value = btn.id
    })
});

bgModal.addEventListener("click", closeModal)
closeBtn.addEventListener("click", closeModal)

form.addEventListener("submit", (e) => {
    e.preventDefault()
    const formData = new FormData(form)
    fetch("buy.php", {
        method: "POST",
        body: formData
    })
        .then((response) => {
            if (!response.ok) {
                throw Error(response.statusText);
            }
            return response.json()
        })
        .then((data) => {
            if(data.Error) {
                throw Error(data.Error) 
            }
            if(!data.Success) {
                throw Error("Not Success") 
            }
            showSuccess()
        })
        .catch((error) => {
            console.error("Error:", error)
            showError()
        });
})

function showSuccess(): void {
    const btn = document.getElementById(inputId.value)
    btn.classList.add("hidden")
    console.log(btn.parentElement.children[0])
    btn.parentElement.children[0].classList.remove("hidden")
    form.classList.add("hidden")
    successMsg.classList.remove("hidden")
}

function showError(): void {
    form.classList.add("hidden")
    errorMsg.classList.remove("hidden")  
}

function closeModal(): void {
    modal.classList.add("hidden")
    bgModal.classList.add("hidden")
    form.classList.remove("hidden")
    successMsg.classList.add("hidden")
    errorMsg.classList.add("hidden") 
    inputId.value = ""
    inputName.value = ""
}