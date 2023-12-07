/* global AFRAME */
AFRAME.registerComponent('panel-rg022014', {
  init: function () {
    var buttonEls = document.querySelectorAll('#button-rg022014');

    //instanciamos las entidades a las variables
    this.movieImageEl;
    //this.movieTitleEl = document.querySelector('#movieTitle');
    //this.movieDescriptionEl = document.querySelector('#movieDescription');

    

    this.onMenuButtonClick = this.onMenuButtonClick.bind(this);
    this.onBackgroundClick = this.onBackgroundClick.bind(this);
    // seleccionamos el boton de cerrar
    this.backgroundEl = document.querySelector('#close-rg022014');
    for (var i = 0; i < buttonEls.length; ++i) {
      buttonEls[i].addEventListener('click', this.onMenuButtonClick);
    }
    this.backgroundEl.addEventListener('click', this.onBackgroundClick);
    this.el.object3D.renderOrder = 9999999;
    this.el.object3D.depthTest = false;
   
  },

  onMenuButtonClick: function (evt) {
  //   AFRAME.registerComponent('panel-rg022014', {
  //     init: function () {
  // this.el.object3D.visible = false;
  //     }
  // });

    this.backgroundEl.object3D.scale.set(1, 1, 1);

    this.el.object3D.scale.set(1, 1, 1);
    if (AFRAME.utils.device.isMobile()) { this.el.object3D.scale.set(1.4, 1.4, 1.4); }
    this.el.object3D.visible = true;

    
  },

  onBackgroundClick: function (evt) {
    this.el.object3D.visible = false;
  }
});
