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
  
  
    const form = document.getElementById("convenioForm")
    const alertaExito = document.getElementById("alertaExito")
  
    form.addEventListener("submit", (e) => {
      e.preventDefault()
  
      
      setTimeout(() => {
        alertaExito.classList.remove("hidden")
  
       
        alertaExito.scrollIntoView({ behavior: "smooth" })
  
     
        setTimeout(() => {
          alertaExito.classList.add("hidden")
        }, 5000)
  
       
        form.reset()
        logoPreview.classList.add("hidden") 
        logoName.textContent = "Ningún archivo seleccionado"
        currentFile = null 
      }, 1000)
    })
  })
  
  
