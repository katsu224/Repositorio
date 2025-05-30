function previewImage(event, querySelector) {
    const input = event.target;
    const imgPreview = document.querySelector(querySelector);
    const viewCaratula = document.querySelector(".viewCaratula");

    if (!input.files.length) {
        imgPreview.src = "";
        viewCaratula.classList.add("hidden");
        return;
    }

    const file = input.files[0];
    const objectURL = URL.createObjectURL(file);
    viewCaratula.classList.remove("hidden");
    imgPreview.src = objectURL;
}

document.getElementById("tipo_informe").addEventListener("change", function () {
    const tipoInfo = this.value;
    const cajaCarrera = document.getElementById("cajaCarrera");
    const cajaModulo = document.getElementById("cajaModulo");
    const modulo = document.getElementById("modulo");
    const carrera = document.getElementById("carrera");

    modulo.selectedIndex = 0;
    modulo.disabled = true;

    carrera.selectedIndex = 0;

    if (tipoInfo === "1") {
        cajaCarrera.classList.remove("hidden");
        cajaModulo.classList.remove("hidden");
    } else if (tipoInfo === "3" || tipoInfo == "4") {
        cajaCarrera.classList.remove("hidden");
        cajaModulo.classList.add("hidden");
    } else {
        cajaCarrera.classList.add("hidden");
        cajaModulo.classList.add("hidden");
    }
});

document.getElementById("carrera").addEventListener("change", function () {
    const carrera = this.value; // Almacena el valor de la opción seleccionada en carrera
    const modulo = document.getElementById("modulo");
    const ivOption = modulo.querySelector('option[value="IV"]');

    modulo.selectedIndex = 0;

    if (carrera === "7" || carrera === "8") {
        ivOption.classList.remove("hidden");
        modulo.disabled = false;
    } else {
        ivOption.classList.add("hidden");
        modulo.disabled = false;
    }
});

const dniOculto = document.getElementById("dni-oculto");
let dniList = []; // Inicializar un array para almacenar todos los DNI
const autoresContainer = document.getElementById("autores-container");

document.getElementById("buscar").addEventListener("click", function (event) {
    event.preventDefault();
    const dni = document.getElementById("dni").value.trim();

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

        document.getElementById("dni").value = "";
        document.getElementById("dni").focus();
        return; // No agregar ni buscar de nuevo
    }

    fetch(`/informes/buscar-dni?dni=${dni}`)
        .then((response) => response.json())
        .then((data) => {
            if (data.error) {
                Toast.fire({
                    icon: "error",
                    title: data.error,
                });
                document.getElementById("dni").value = "";
                document.getElementById("dni").focus();
                return; // No agregar ni buscar de nuevo
            } else {
                // Crear un nuevo elemento para el autor
                const autorItem = document.createElement("div");
                autorItem.className =
                    "flex items-center justify-between border-b gap-5"; // Estilo para el elemento del autor
                autorItem.innerHTML = `
                   <span>${data.nombres} ${data.apellidos}</span>
                   <button type="button" class="eliminar text-white bg-red-700 rounded-lg p-2 hover:bg-red-800 hover:shadow-lg" data-dni="${dni}">
                       <i class="fa-solid fa-trash"></i>
                   </button>
               `;

                // Añadir el nuevo autor al contenedor
                autoresContainer.appendChild(autorItem);

                // Almacenar el DNI en el array
                dniList.push(dni);
                // Actualizar el textarea con todos los DNI, separados por saltos de línea
                dniOculto.value = dniList.join("\n");

                // Limpiar el campo DNI después de añadir
                document.getElementById("dni").value = "";
                document.getElementById("dni").focus();
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

// Delegar el evento de eliminación
autoresContainer.addEventListener("click", function (event) {
    if (event.target.classList.contains("eliminar")) {
        const dniToRemove = event.target.getAttribute("data-dni");
        const autorItem = event.target.parentElement; // Elemento del autor a eliminar

        // Eliminar el autor del contenedor
        autoresContainer.removeChild(autorItem);

        // Filtrar el DNI eliminado de la lista
        dniList = dniList.filter((dni) => dni !== dniToRemove);
        // Actualizar el textarea con todos los DNI, separados por saltos de línea
        dniOculto.value = dniList.join("\n");
    }
});
