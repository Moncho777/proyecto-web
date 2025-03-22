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
  const barraProgreso = document.getElementById("barraProgreso")

  // Función para mostrar la alerta
  function mostrarAlerta() {
    // Mostrar el contenedor de la alerta
    alertaExito.classList.remove("hidden")

    // Forzar un reflow para asegurar que la transición funcione
    alertaExito.offsetHeight

    // Agregar la clase de animación para deslizar desde arriba
    const alertaContainer = alertaExito.querySelector(".alerta")
    alertaContainer.classList.add("slide-down")

    // Reiniciar la animación de la barra de progreso
    barraProgreso.style.animation = "none"
    barraProgreso.offsetHeight // Trigger reflow
    barraProgreso.style.animation = "countdown 5s linear forwards"

    // Configurar el temporizador para ocultar la alerta
    setTimeout(ocultarAlerta, 5000)
  }

  // Función para ocultar la alerta con una animación suave
  function ocultarAlerta() {
    const alertaContainer = alertaExito.querySelector(".alerta")

    // Eliminar la clase de entrada y agregar la clase de salida
    alertaContainer.classList.remove("slide-down")

    // Aplicar la clase de desvanecimiento
    alertaContainer.classList.add("fade-out")

    // Escuchar el final de la animación para ocultar completamente
    alertaContainer.addEventListener("animationend", function handleAnimationEnd(e) {
      // Solo actuar si es la animación de fadeOut la que terminó
      if (e.animationName === "fadeOut") {
        // Ocultar completamente después de la animación
        alertaExito.classList.add("hidden")

        // Limpiar las clases para la próxima vez
        alertaContainer.classList.remove("fade-out")

        // Eliminar este event listener
        alertaContainer.removeEventListener("animationend", handleAnimationEnd)
      }
    })
  }

  form.addEventListener("submit", (e) => {
    e.preventDefault()

    // Aquí normalmente enviarías los datos a un servidor
    // Simulamos un envío exitoso después de 1 segundo
    setTimeout(() => {
      // Mostrar la alerta con animación
      mostrarAlerta()

      // Resetear el formulario
      form.reset()
      logoPreview.classList.add("hidden")
      logoName.textContent = "Ningún archivo seleccionado"
      currentFile = null
    }, 1000)
  })
})

