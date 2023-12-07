/* global AFRAME */

AFRAME.registerComponent('panel-rg022014', {
  init: function () {
    var buttonEls = document.querySelectorAll('#button-RG022014');

    // Instanciamos las entidades a las variables
    this.backgroundEl = document.querySelector('#close');
    this.panel008031El = document.querySelector('[panel-rg008031]');

    this.onMenuButtonClick = this.onMenuButtonClick.bind(this);
    this.onBackgroundClick = this.onBackgroundClick.bind(this);

    for (var i = 0; i < buttonEls.length; ++i) {
      buttonEls[i].addEventListener('click', this.onMenuButtonClick);
    }
    this.backgroundEl.addEventListener('click', this.onBackgroundClick);
    this.el.object3D.renderOrder = 9999999;
    this.el.object3D.depthTest = false;
  },

  onMenuButtonClick: function (evt) {
    // Ocultar el panel-rg008031 si está abierto
    if (this.panel008031El) {
      this.panel008031El.setAttribute('visible', false);
    }

    // Mostrar el panel actual
    this.backgroundEl.object3D.scale.set(1, 1, 1);
    if (AFRAME.utils.device.isMobile()) { 
      this.el.object3D.scale.set(1.4, 1.4, 1.4);
    }
    this.el.object3D.visible = true;
  },

  onBackgroundClick: function (evt) {
    this.el.object3D.visible = false;
  }
});
