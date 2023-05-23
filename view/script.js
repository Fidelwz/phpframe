const { ChartJSNodeCanvas } = require('chartjs-node-canvas');



// Configura el tamaño y otras opciones para la imagen generada
const width = 600; // Ancho de la imagen
const height = 400; // Alto de la imagen

// Crea una nueva instancia de ChartJSNodeCanvas con el tamaño deseado
const chartJSNodeCanvas = new ChartJSNodeCanvas({ width, height });

// Configura los datos y las opciones de tu gráfico Chart.js
const data = {
  labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
  datasets: [
    {
      label: 'Ventas',
      data: [12, 19, 3, 5, 2],
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgba(75, 192, 192, 1)',
      borderWidth: 1,
    },
  ],
};

const options = {
  scales: {
    y: {
      beginAtZero: true,
    },
  },
};

// Genera la imagen del gráfico
async function generateImage() {
  const image = await chartJSNodeCanvas.renderToBuffer({
    type: 'png', // Tipo de imagen de salida (puede ser png, jpeg, etc.)
    data: data,
    options: options,
  });

  return image;
}

async function displayChartAsImage() {
  const image = await generateImage();

  // Obtén la referencia a la etiqueta <img> donde quieres mostrar el gráfico
  const imgElement = document.getElementById('chartImage');

  // Convierte la imagen generada en un objeto de URL
  const imageUrl = URL.createObjectURL(new Blob([image]));

  // Establece la imagen generada como la fuente de la etiqueta <img>
  imgElement.src = imageUrl;
}

displayChartAsImage();
console.log("holi")