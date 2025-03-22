// Esperar a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", () => {
    // Previsualización del logo
    const logoInput = document.getElementById("logo")
    const logoPreview = document.getElementById("logoPreview")
    const logoName = document.getElementById("logoName")
    let currentFile = null // Variable para mantener el archivo actual
  
    logoInput.addEventListener("change", (e) => {
      // Solo actualizar si hay archivos seleccionados
      if (e.target.files.length > 0) {
        currentFile = e.target.files[0]
        logoName.textContent = currentFile.name
  
        const reader = new FileReader()
        reader.onload = (e) => {
          logoPreview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-contain" />`
          logoPreview.classList.remove("hidden") // Mostrar el preview cuando hay archivo
        }
        reader.readAsDataURL(currentFile)
      }
      // Si no hay archivos seleccionados (el usuario canceló), no hacemos nada
      // y mantenemos el archivo y la vista previa anteriores
    })
  
    // Manejo del formulario
    const form = document.getElementById("convenioForm")
    const alertaExito = document.getElementById("alertaExito")
  
    form.addEventListener("submit", (e) => {
      e.preventDefault()
  
      // Aquí normalmente enviarías los datos a un servidor
      // Simulamos un envío exitoso después de 1 segundo
      setTimeout(() => {
        alertaExito.classList.remove("hidden")
  
        // Desplazamiento suave hacia la alerta
        alertaExito.scrollIntoView({ behavior: "smooth" })
  
        // Ocultar la alerta después de 5 segundos
        setTimeout(() => {
          alertaExito.classList.add("hidden")
        }, 5000)
  
        // Opcional: resetear el formulario
        form.reset()
        logoPreview.classList.add("hidden") // Ocultar el preview al resetear
        logoName.textContent = "Ningún archivo seleccionado"
        currentFile = null // Resetear también la variable que guarda el archivo
      }, 1000)
    })
  })
  
  