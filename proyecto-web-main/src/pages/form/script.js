// Esperar a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", () => {
  // Referencias a elementos del DOM
  const logoInput = document.getElementById("logo");
  const logoPreview = document.getElementById("logoPreview");
  const logoName = document.getElementById("logoName");
  const step1 = document.getElementById("step1");
  const step2 = document.getElementById("step2");
  const step1Indicator = document.getElementById("step1Indicator");
  const step2Indicator = document.getElementById("step2Indicator");
  const continueBtn = document.getElementById("continueBtn");
  const backBtn = document.getElementById("backBtn");
  let currentFile = null;

  // Manejo de la vista previa del logo
  logoInput.addEventListener("change", (e) => {
    if (e.target.files.length > 0) {
      currentFile = e.target.files[0];
      logoName.textContent = currentFile.name;

      const reader = new FileReader();
      reader.onload = (e) => {
        logoPreview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-contain" />`;
        logoPreview.style.display = "flex";
      };
      reader.readAsDataURL(currentFile);
    }
  });


  document.getElementById('continueBtn').addEventListener('click', function() {
      const step1Fields = document.querySelectorAll('#step1 input[required], #step1 select[required]');
      let isValid = true;
      
      step1Fields.forEach(field => {
          if (!field.value) {
              isValid = false;
              field.classList.add('border-red-500');
          } else {
              field.classList.remove('border-red-500');
          }
      });
      
      if (isValid) {
          document.getElementById('step1').classList.add('hidden');
          document.getElementById('step2').classList.remove('hidden');
          document.getElementById('step2').classList.add('step-transition');
          
          document.getElementById('step1Indicator').classList.remove('active');
          document.getElementById('step1Indicator').classList.add('completed');
          document.getElementById('step2Indicator').classList.add('active');
      }
  });
  backBtn.addEventListener("click", () => {
    step2.classList.add("hidden");
    step1.classList.remove("hidden");
    step1.classList.add("step-transition");
    
    step2Indicator.classList.remove("active");
    step1Indicator.classList.add("active");
  });

  const form = document.getElementById("convenioForm");
  const alertaExito = document.getElementById("alertaExito");
  const barraProgreso = document.getElementById("barraProgreso");

  function mostrarAlerta() {
    alertaExito.classList.remove("hidden");
    
    alertaExito.offsetHeight;
    
    const alertaContainer = alertaExito.querySelector(".alerta");
    alertaContainer.classList.add("slide-down");

    barraProgreso.style.animation = "none";
    barraProgreso.offsetHeight; 
    barraProgreso.style.animation = "countdown 5s linear forwards";

    setTimeout(ocultarAlerta, 5000);
  }

  function ocultarAlerta() {
    const alertaContainer = alertaExito.querySelector(".alerta");

    alertaContainer.classList.remove("slide-down");
    alertaContainer.classList.add("fade-out");

    alertaContainer.addEventListener("animationend", function handleAnimationEnd(e) {
      if (e.animationName === "fadeOut") {
        alertaExito.classList.add("hidden");
        alertaContainer.classList.remove("fade-out");
        alertaContainer.removeEventListener("animationend", handleAnimationEnd);
      }
    });
  }

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    
    setTimeout(() => {
      mostrarAlerta();
      
      form.reset();
      logoPreview.style.display = "none";
      logoName.textContent = "Ningún archivo seleccionado";
      currentFile = null;
      
      // Volver al paso 1
      step2.classList.add("hidden");
      step1.classList.remove("hidden");
      step2Indicator.classList.remove("active");
      step1Indicator.classList.add("active");
    }, 1000);
  });
});

