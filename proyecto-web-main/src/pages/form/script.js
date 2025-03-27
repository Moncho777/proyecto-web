// Esperar a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", () => {
 
  const logoInput = document.getElementById("logo")
  const logoPreview = document.getElementById("logoPreview")
  const logoName = document.getElementById("logoName")
  let currentFile = null 

  logoInput.addEventListener("change", (e) => {
   
    if (e.target.files.length > 0) {
      currentFile = e.target.files[0]
      logoName.textContent = currentFile.name

      const reader = new FileReader()
      reader.onload = (e) => {
        logoPreview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-contain" />`
        logoPreview.classList.remove("hidden") 
      }
      reader.readAsDataURL(currentFile)
    }
   
  })

  // Manejo del formulario
  const form = document.getElementById("convenioForm")
  const alertaExito = document.getElementById("alertaExito")
  const barraProgreso = document.getElementById("barraProgreso")


  function mostrarAlerta() {
 
    alertaExito.classList.remove("hidden")

   
    alertaExito.offsetHeight

   
    const alertaContainer = alertaExito.querySelector(".alerta")
    alertaContainer.classList.add("slide-down")


    barraProgreso.style.animation = "none"
    barraProgreso.offsetHeight 
    barraProgreso.style.animation = "countdown 5s linear forwards"

 
    setTimeout(ocultarAlerta, 5000)
  }

  function ocultarAlerta() {
    const alertaContainer = alertaExito.querySelector(".alerta")


    alertaContainer.classList.remove("slide-down")


    alertaContainer.classList.add("fade-out")


    alertaContainer.addEventListener("animationend", function handleAnimationEnd(e) {
   
      if (e.animationName === "fadeOut") {

        alertaExito.classList.add("hidden")


        alertaContainer.classList.remove("fade-out")


        alertaContainer.removeEventListener("animationend", handleAnimationEnd)
      }
    })
  }

  form.addEventListener("submit", (e) => {
    e.preventDefault()

    
    setTimeout(() => {
      
      mostrarAlerta()

     
      form.reset()
      logoPreview.classList.add("hidden")
      logoName.textContent = "Ningún archivo seleccionado"
      currentFile = null
    }, 1000)
  })
})

