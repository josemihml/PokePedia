// Guardamos en variales los elementos que vamos a usar
const fileInput = document.getElementById('form-input_file'),
dropZone = document.getElementById('drop-zone'),
form = document.getElementById('form');

// CONDICIÓN PARA COMPROBAR LA EXISTENCIA DE VARIABLES

// Esto sustituye al funcionamiento del botón tradicional
dropZone.addEventListener('click', () => fileInput.click());

// Este evento nos controla cuando hemos selecionado algo
fileInput.addEventListener('change', (e) => {
// Con esto podemos ver los elementos que hemos seleccionado
console.log(fileInput.files);
});

// Animamos el paso por encima de la zona
dropZone.addEventListener('dragover', (e) => {
e.preventDefault();
dropZone.classList.add('drop-zone_active')
});

// Desaninamos la salida del paso por encima de la zona
dropZone.addEventListener('dragleave', (e) => {
e.preventDefault();
dropZone.classList.remove('drop-zone_active')
});

// Aquí recogemos los elementos seleccionados
// También le pasamos los elementos seleccionados al botón tradicional
// para que el funcionamiento sea el mismo
dropZone.addEventListener('drop', (e) => {
e.preventDefault();
dropZone.classList.remove('drop-zone_active')
// Con esta instrucción le pasamos los valores
fileInput.files = e.dataTransfer.files;

// Con esto podemos ver los elementos que hemos seleccionado
console.log(fileInput.files);
});

// No dejamos subir los archivos si no hay archivo
form.addEventListener('submit', (e) => {
if (fileInput.files.length == 0) {
e.preventDefault();
}
});