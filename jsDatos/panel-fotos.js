AFRAME.registerComponent('panel-fotos', {
  init: function () {
    var buttonEls = document.querySelectorAll('#fotos-poster-button');

    // Instanciamos las entidades a las variables
    this.backgroundEl = document.querySelector('#fotos-close');
    this.next = document.querySelector('#next');
    this.previous = document.querySelector('#previous');

    // Arreglo de rutas de fotos
    this.fotos = ['imagenes/img1.jpg', 'imagenes/img2.jpg', 'imagenes/img3.jpg', 'imagenes/img4.jpg'];

    // Obtén la entidad de imagen
    this.imagenGaleria = document.getElementById('imagenGaleria');

    // Variable para realizar un seguimiento de la posición actual
    this.posicionActual = 0;

    // Asociamos los eventos
    for (var i = 0; i < buttonEls.length; ++i) {
      buttonEls[i].addEventListener('click', this.onMenuButtonClick.bind(this));
    }
// si le dan clic a alguno de los componentes nmandamos a lklamar a la funcion
    this.backgroundEl.addEventListener('click', this.onBackgroundClick.bind(this));
    this.next.addEventListener('click', this.cambiarFotoSiguiente.bind(this));
    this.previous.addEventListener('click', this.cambiarFotoAnterior.bind(this));

    // Establecer la primera imagen al inicio
    this.cambiarFoto(0);
  },
// funcion cuando presiona el poster
  onMenuButtonClick: function (evt) {
    // mostramos el boton cerrar
    this.backgroundEl.object3D.scale.set(1, 1, 1);
    // mostramos el boton next
    this.next.object3D.scale.set(1, 1, 1);
    // mostramos el panel
    this.el.object3D.scale.set(1, 1, 1);
    this.el.object3D.visible = true;
  },
// funcion cuando presionan el boton de cerrar
  onBackgroundClick: function (evt) {
    // minimizamos la escala de los componentes para que no se vean
    this.backgroundEl.object3D.scale.set(0.001, 0.001, 0.001);
    this.next.object3D.scale.set(0.001, 0.001, 0.001);
    this.previous.object3D.scale.set(0.001, 0.001, 0.001);
    this.el.object3D.scale.set(0.001, 0.001, 0.001);
    this.el.object3D.visible = false;
  },

  // Función para cambiar la foto
  cambiarFoto: function (posicion) {
    // Verifica que la posición esté dentro del rango del arreglo
    if (posicion >= 0 && posicion < this.fotos.length) {
      // Actualiza el atributo src con la nueva ruta de la foto
      this.imagenGaleria.setAttribute('src', this.fotos[posicion]);
      // Actualiza la posición actual
      this.posicionActual = posicion;
    } else {
      console.error('Posición de foto fuera de rango');
    }
  },

  // Función para cambiar a la foto siguiente
  cambiarFotoSiguiente: function () {
    // Incrementa la posición actual
    this.posicionActual++;

    // Llama a la función cambiarFoto con la nueva posición para actualizar la imagen.
    this.cambiarFoto(this.posicionActual);

    // Oculta el botón de "Siguiente" si no hay más fotos disponibles
    if (this.posicionActual < this.fotos.length - 1) {
      // mostramos el boton siguiente
      this.next.object3D.visible = true;
      this.next.object3D.scale.set(1, 1, 1);
    }else{
      // ocultamos el boton siguiente
      this.next.object3D.visible = false;
      this.next.object3D.scale.set(0.001, 0.001, 0.001);
    }

    // Muestra el botón de "Anterior" ya que ahora hay una foto anterior
    this.previous.object3D.visible = true;
    this.previous.object3D.scale.set(1, 1, 1);
  },
// Función para cambiar a la foto anterior
  cambiarFotoAnterior: function () {
    // Decrementa la posición actual
    this.posicionActual--;

    // Llama a la función cambiarFoto con la nueva posición para actualizar la imagen.
    this.cambiarFoto(this.posicionActual);

    // Oculta el botón de "Anterior" si no hay más fotos disponibles
    if (this.posicionActual > 0) {
      
      this.previous.object3D.visible = true;
      this.previous.object3D.scale.set(1, 1, 1);
    }else{
      this.previous.object3D.visible = false;
      this.previous.object3D.scale.set(0.001, 0.001, 0.001);
    }

    // Muestra el botón de "Siguiente" ya que ahora hay una foto siguiente
    this.next.object3D.visible = true;
    this.next.object3D.scale.set(1, 1, 1);
  }
});
