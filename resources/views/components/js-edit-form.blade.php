<script>
    function previewImage(event, querySelector) {
        const input = event.target;
        const imgPreview = document.querySelector(querySelector);
        const viewCaratula = document.querySelector('.viewCaratula');

        if (!input.files.length) {
            imgPreview.src = "";
            viewCaratula.classList.add('hidden');
            return;
        }

        const file = input.files[0];
        const objectURL = URL.createObjectURL(file);
        viewCaratula.classList.remove('hidden');
        imgPreview.src = objectURL;
    }

    document.getElementById('tipo_informe').addEventListener('change', function() {
        const tipoInfo = this.value;
        const cajaCarrera = document.getElementById('cajaCarrera');
        const cajaModulo = document.getElementById('cajaModulo');
        const modulo = document.getElementById('modulo');
        const carrera = document.getElementById('carrera');

        modulo.selectedIndex = 0;
        modulo.disabled = true;

        carrera.selectedIndex = 0;

        if (tipoInfo === '1') {
            cajaCarrera.classList.remove('hidden');
            cajaModulo.classList.remove('hidden');
        } else if (tipoInfo === '3' || tipoInfo == '4') {
            cajaCarrera.classList.remove('hidden');
            cajaModulo.classList.add('hidden');
        } else {
            cajaCarrera.classList.add('hidden');
            cajaModulo.classList.add('hidden');
        }
    });

    document.getElementById('carrera').addEventListener('change', function() {
        const carrera = this.value; // Almacena el valor de la opción seleccionada en carrera
        const modulo = document.getElementById('modulo');
        const ivOption = modulo.querySelector('option[value="IV"]');

        modulo.selectedIndex = 0;

        if (carrera === '7' || carrera === '8') {
            ivOption.classList.remove('hidden');
            modulo.disabled = false;
        } else {
            ivOption.classList.add('hidden');
            modulo.disabled = false;
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        let tipo = "{{ $id->tipo_informe_id }}";
        let carrera = "{{ $id->carrera_id }}";
        let modulo = "{{ $id->modulo }}";

        const catModu = document.getElementById('modulo');
        const ivOption = catModu.querySelector('option[value="IV"]');
        const cajaCarrera = document.getElementById('cajaCarrera');
        const cajaModulo = document.getElementById('cajaModulo');

        if (tipo === '1') {
            cajaCarrera.classList.remove('hidden');
            cajaModulo.classList.remove('hidden');
            cajaModulo.classList.remove('disabled');

        } else if (tipo === '3' || tipo === '4') {
            cajaCarrera.classList.remove('hidden');
            cajaModulo.classList.add('hidden');
        } else {
            cajaCarrera.classList.add('hidden');
            cajaModulo.classList.add('hidden');
        }
    });


    document.addEventListener("DOMContentLoaded", function() {
        const autoresExistentes = @json($autores);
        const dniOculto = document.getElementById('dni-oculto');
        const autoresContainer = document.getElementById('autores-container');

        let dniList = autoresExistentes.map(autor => autor.dni);

        function renderAutores() {
            autoresContainer.innerHTML = '';
            dniList.forEach(dni => {
                const autor = autoresExistentes.find(autor => autor.dni === dni);
                if (autor) {
                    const autorItem = document.createElement('div');
                    autorItem.className = 'flex items-center justify-between border-b';
                    autorItem.innerHTML = `
           <span>${autor.nombre} ${autor.apellidos}</span>
           <button type="button" class="eliminar text-white bg-red-700 rounded-lg p-2 hover:bg-red-800 hover:shadow-lg" data-dni="${dni}">
               <i class="fa-solid fa-trash"></i>
           </button>
       `;
                    autoresContainer.appendChild(autorItem);
                }
            });
            dniOculto.value = dniList.join('\n');
        }

        renderAutores();

        document.getElementById('buscar').addEventListener('click', function(event) {
            event.preventDefault();
            const dni = document.getElementById('dni').value.trim();

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
            });

            if (!dni) {
                Toast.fire({
                    icon: "warning",
                    text: "Por favor, ingrese un DNI.",
                });
                document.getElementById("dni").focus();

                return;
            }

            if (dniList.includes(dni)) {
                Toast.fire({
                    icon: "warning",
                    text: "Este DNI ya ha sido agregado.",
                });
                document.getElementById('dni').value = '';
                document.getElementById('dni').focus();
                return;
            }

            fetch(`/informes/buscar-dni?dni=${dni}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        autoresExistentes.push({
                            nombre: data.nombres,
                            apellidos: data.apellidos,
                            dni: dni
                        });
                        dniList.push(dni);
                        renderAutores();
                        document.getElementById('dni').value = '';
                        document.getElementById('dni').focus();
                    }
                })
                .catch((error) => {
                    Toast.fire({
                        icon: "error",
                        text: "DNI no encontrado. Ingrese otro, porfavor.",
                    });
                    document.getElementById("dni").value = "";
                    document.getElementById("dni").focus();
                });

        });

        autoresContainer.addEventListener('click', function(event) {
            const eliminarButton = event.target.closest('.eliminar');

            if (eliminarButton) {
                const dniToRemove = eliminarButton.getAttribute('data-dni');
                dniList = dniList.filter(dni => dni !== dniToRemove);
                autoresExistentes.splice(
                    autoresExistentes.findIndex(autor => autor.dni === dniToRemove), 1
                );
                renderAutores();
            }
        });
    });

    document.getElementById('pdf').addEventListener('change', function() {
        const verPdfButton = document.getElementById('ver-pdf');
        if (this.files.length > 0) {
            verPdfButton.classList.add('hidden'); // Oculta el botón "Ver PDF"
        } else {
            verPdfButton.classList.remove('hidden'); // Muestra el botón si no hay archivos
        }
    });
</script>
