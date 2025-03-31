<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Convenio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="formulario.css">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 relative">
    <div class="absolute inset-0 z-0">
        <img src="/proyecto-web/proyecto-web-main/assets/images/logo/imagenes/chapala01-2.webp" alt="Chapala" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 backdrop-blur-sm"></div>
    </div>
    
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-2xl relative z-10">
        <div class="flex items-center justify-center mb-4">
            <img src="/proyecto-web/proyecto-web-main/assets/images/logo/favicon.png" alt="Logo" class="h-20 w-auto">
            <div class="ml-3 text-sm leading-tight" style="color: #32129A;">
                <p class="font-bold">Tecnologico</p>
                <p class="font-bold">Superior</p>
                <p class="font-bold">de Jalisco</p>
            </div>
        </div>
        
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Registro de Convenio</h1>
        <p class="text-center text-gray-600 mb-8">Completa el formulario para registrar su convenio</p>
        
        <!-- Indicador de pasos -->
        <div class="flex justify-between mb-6">
            <div class="step-indicator active" id="step1Indicator">
                <span class="font-medium">Paso 1: Información básica</span>
            </div>
            <div class="step-indicator" id="step2Indicator">
                <span class="font-medium">Paso 2: Información adicional</span>
            </div>
        </div>
        
        <!-- Alerta de éxito (oculta por defecto) -->
        <div id="alertaExito" class="alerta-container hidden">
            <div class="alerta">
                <div class="alerta-contenido">
                    <svg class="alerta-icono" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <p>¡El convenio se ha registrado correctamente!</p>
                </div>
                <!-- Barra de progreso -->
                <div id="barraProgreso" class="barra-progreso countdown-bar"></div>
            </div>
        </div>
        
        <form action="guardarConvenio.php" id="convenioForm" class="space-y-6" method="POST" enctype="multipart/form-data">
            <!-- Paso 1: Información básica -->
            <div id="step1" class="space-y-6">
                <!-- Nombre de la empresa -->
                <div>
                    <label for="empresa" class="block text-sm font-medium text-gray-700 mb-1">Nombre de la empresa</label>
                    <input type="text" id="empresa" name="empresa" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
                </div>

                <!-- Tipo de convenio -->
                <div>
                    <label for="tipoConvenio" class="block text-sm font-medium text-gray-700 mb-1">Tipo de convenio</label>
                    <select id="tipoConvenio" name="tipoConvenio" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="servicioSocial">Servicio Social</option>
                        <option value="practicas">Prácticas</option>
                    </select>
                </div>

                <div>
                    <label for="vencimiento" class="block text-sm font-medium text-gray-700 mb-1">Fecha de vencimiento</label>
                    <input type="date" id="vencimiento" name="vencimiento" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
                </div>

                <!-- Persona de contacto -->
                <div>
                    <label for="contacto" class="block text-sm font-medium text-gray-700 mb-1">Persona de contacto</label>
                    <input type="text" id="contacto" name="contacto" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none"
                        pattern="[0-9]+" title="Por favor ingrese solo números" 
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>

                <!-- Correo electrónico -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
                </div>

                <!-- Botón de continuar -->
                <div class="pt-4 flex justify-center">
                    <button type="button" id="continueBtn"
                        class="group font-medium tracking-wide select-none text-base relative inline-flex items-center justify-center cursor-pointer h-12 border-2 border-solid py-0 px-6 rounded-md overflow-hidden z-10 transition-all duration-300 ease-in-out outline-0 btn-primary text-white hover:text-blue-500 focus:text-blue-500">
                        <strong class="font-medium">Continuar</strong>
                        <span class='absolute bg-white bottom-0 w-0 left-1/2 h-full -translate-x-1/2 transition-all ease-in-out duration-300 group-hover:w-[105%] -z-[1] group-focus:w-[105%]'></span>
                    </button>
                </div>
            </div>

            <!-- Paso 2: Información adicional (oculto inicialmente) -->
            <div id="step2" class="space-y-6 hidden">
                <!-- Logo de la empresa -->
                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo de la empresa <span class="text-red-500">*</span></label>
                    <div class="flex items-center space-x-4">
                        <div class="flex-1">
                            <label class="flex flex-col items-center px-4 py-2 bg-white rounded-md border cursor-pointer hover:bg-blue-50 file-input-label">
                                <span class="text-sm">Seleccionar archivo</span>
                                <input type="file" id="logo" name="logo" accept="image/*" class="hidden" required>
                            </label>
                        </div>
                        <div id="logoPreview" class="w-16 h-16 border border-gray-300 rounded-md items-center justify-center bg-gray-100" style="display: none;">
                            <span class="text-gray-400 text-xs text-center">Vista previa</span>
                        </div>
                    </div>
                    <p id="logoName" class="mt-1 text-xs text-gray-500">Ningún archivo seleccionado</p>
                </div>

                <!-- Redes sociales -->
                <div>
                    <h3 class="text-lg font-medium text-gray-800 mb-3">Redes sociales (Opcional)</h3>
                    
                    <!-- Sitio web -->
                    <div class="mb-3">
                        <label for="website" class="block text-sm font-medium text-gray-700 mb-1">Sitio web</label>
                        <div class="flex items-center">
                            <span class="mr-2 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9h18" />
                                </svg>
                            </span>
                            <input type="url" id="website" name="website" placeholder="https://www.ejemplo.com"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
                        </div>
                    </div>
                    
                    <!-- Facebook -->
                    <div class="mb-3">
                        <label for="facebook" class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                        <div class="flex items-center">
                            <span class="mr-2 text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                </svg>
                            </span>
                            <input type="url" id="facebook" name="facebook" placeholder="https://www.facebook.com/ejemplo"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
                        </div>
                    </div>
                    
                    <!-- YouTube -->
                    <div class="mb-3">
                        <label for="youtube" class="block text-sm font-medium text-gray-700 mb-1">YouTube</label>
                        <div class="flex items-center">
                            <span class="mr-2 text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                                </svg>
                            </span>
                            <input type="url" id="youtube" name="youtube" placeholder="https://www.youtube.com/ejemplo"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
                        </div>
                    </div>
                    
                    <!-- X (Twitter) -->
                    <div>
                        <label for="twitter" class="block text-sm font-medium text-gray-700 mb-1">X (Twitter)</label>
                        <div class="flex items-center">
                            <span class="mr-2 text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                </svg>
                            </span>
                            <input type="url" id="twitter" name="twitter" placeholder="https://x.com/ejemplo"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
                        </div>
                    </div>
                </div>
                
                <!-- Botones de navegación -->
                <div class="pt-4 flex justify-between">
                    <button type="button" id="backBtn"
                        class="group font-medium tracking-wide select-none text-base relative inline-flex items-center justify-center cursor-pointer h-12 border-2 border-solid py-0 px-6 rounded-md overflow-hidden z-10 transition-all duration-300 ease-in-out outline-0 bg-white text-gray-500 border-gray-300 hover:bg-gray-50">
                        <strong class="font-medium">Volver</strong>
                    </button>
                    <button type="submit" 
                        class="group font-medium tracking-wide select-none text-base relative inline-flex items-center justify-center cursor-pointer h-12 border-2 border-solid py-0 px-6 rounded-md overflow-hidden z-10 transition-all duration-300 ease-in-out outline-0 btn-primary text-white hover:text-blue-500 focus:text-blue-500">
                        <strong class="font-medium">Registrar Convenio</strong>
                        <span class='absolute bg-white bottom-0 w-0 left-1/2 h-full -translate-x-1/2 transition-all ease-in-out duration-300 group-hover:w-[105%] -z-[1] group-focus:w-[105%]'></span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>