// --------------------------------------------------------------------------------------------------------
// RG022014
AFRAME.registerComponent('panel-rg022014', {
  init: function () {
    var buttonEls = document.querySelectorAll('#button-rg022014');
    this.backgroundEl = document.querySelector('#close-rg022014');
    this.link = document.querySelector('#link-rg022014');
   

    this.onMenuButtonClick = this.onMenuButtonClick.bind(this);
    this.onBackgroundClick = this.onBackgroundClick.bind(this);

    for (var i = 0; i < buttonEls.length; ++i) {
      buttonEls[i].addEventListener('click', this.onMenuButtonClick);
    }

    this.backgroundEl.addEventListener('click', this.onBackgroundClick);
  },

  onMenuButtonClick: function () {
    // Llamada a la función onBackgroundClick del otro componente
    var panelRg008031 = document.querySelector('[panel-rg008031]');
    if (panelRg008031) {
      panelRg008031.components['panel-rg008031'].onBackgroundClick();
    }
    var panelRg021010 = document.querySelector('[panel-rg021010]');
    if (panelRg021010) {
      panelRg021010.components['panel-rg021010'].onBackgroundClick();
    }
    var panelRg521005 = document.querySelector('[panel-rg521005]');
    if (panelRg521005) {
      panelRg521005.components['panel-rg521005'].onBackgroundClick();
    }
    this.backgroundEl.object3D.visible = true;
    this.backgroundEl.object3D.scale.set(1, 1, 1);

    this.link.setAttribute('scale', { x: 0.6, y: 0.2, z: 2 });

    
   

    this.el.object3D.scale.set(1, 1, 1);
    if (AFRAME.utils.device.isMobile()) { this.el.object3D.scale.set(1.4, 1.4, 1.4); }
    this.el.object3D.visible = true;
  },

  onBackgroundClick: function () {
    this.link.setAttribute('scale', { x: 0.00001, y: 0.00001, z: 0.00001 });
    this.el.object3D.visible = false;
    this.backgroundEl.object3D.visible = false;
    this.backgroundEl.object3D.scale.set(0.001, 0.001, 0.001);

    
  }
});

// --------------------------------------------------------------------------------------------------------
// RG008031
AFRAME.registerComponent('panel-rg008031', {
  init: function () {
    var buttonEls = document.querySelectorAll('#button-rg008031');
    this.backgroundEl = document.querySelector('#close-rg008031');
    this.link = document.querySelector('#link-rg008031');

    this.onMenuButtonClick = this.onMenuButtonClick.bind(this);
    this.onBackgroundClick = this.onBackgroundClick.bind(this);

    for (var i = 0; i < buttonEls.length; ++i) {
      buttonEls[i].addEventListener('click', this.onMenuButtonClick);
    }

    this.backgroundEl.addEventListener('click', this.onBackgroundClick);
  },

  onMenuButtonClick: function () {
    // Llamada a la función onBackgroundClick del otro componente
    var panelRg022014 = document.querySelector('[panel-rg022014]');
    if (panelRg022014) {
      panelRg022014.components['panel-rg022014'].onBackgroundClick();
    }
    var panelRg021010 = document.querySelector('[panel-rg021010]');
    if (panelRg021010) {
      panelRg021010.components['panel-rg021010'].onBackgroundClick();
    }
    var panelRg521005 = document.querySelector('[panel-rg521005]');
    if (panelRg521005) {
      panelRg521005.components['panel-rg521005'].onBackgroundClick();
    }
    this.backgroundEl.object3D.visible = true;
    this.backgroundEl.object3D.scale.set(1, 1, 1);
    this.link.setAttribute('scale', { x: 0.6, y: 0.2, z: 2 });

    this.el.object3D.scale.set(1, 1, 1);
    if (AFRAME.utils.device.isMobile()) { this.el.object3D.scale.set(1.4, 1.4, 1.4); }
    this.el.object3D.visible = true;
  },

  onBackgroundClick: function () {
    
    this.link.setAttribute('scale', { x: 0.00001, y: 0.00001, z: 0.00001 });
    this.backgroundEl.object3D.visible = false;
    this.backgroundEl.object3D.scale.set(0.001, 0.001, 0.001);
    this.el.object3D.visible = false;
  }
});
// -----------------------------------------------------------------------------------------------------
// RG021010
AFRAME.registerComponent('panel-rg021010', {
  init: function () {
    var buttonEls = document.querySelectorAll('#button-rg021010');
    this.backgroundEl = document.querySelector('#close-rg021010');
    this.link = document.querySelector('#link-rg021010');

    this.onMenuButtonClick = this.onMenuButtonClick.bind(this);
    this.onBackgroundClick = this.onBackgroundClick.bind(this);

    for (var i = 0; i < buttonEls.length; ++i) {
      buttonEls[i].addEventListener('click', this.onMenuButtonClick);
    }

    this.backgroundEl.addEventListener('click', this.onBackgroundClick);
  },

  onMenuButtonClick: function () {
    // Llamada a la función onBackgroundClick del otro componente
    var panelRg022014 = document.querySelector('[panel-rg022014]');
    if (panelRg022014) {
      panelRg022014.components['panel-rg022014'].onBackgroundClick();
    }
    var panelRg008031 = document.querySelector('[panel-rg008031]');
    if (panelRg008031) {
      panelRg008031.components['panel-rg008031'].onBackgroundClick();
    }
    var panelRg521005 = document.querySelector('[panel-rg521005]');
    if (panelRg521005) {
      panelRg521005.components['panel-rg521005'].onBackgroundClick();
    }
    this.backgroundEl.object3D.visible = true;
    this.backgroundEl.object3D.scale.set(1, 1, 1);
    this.link.setAttribute('scale', { x: 0.6, y: 0.2, z: 2 });

    this.el.object3D.scale.set(1, 1, 1);
    if (AFRAME.utils.device.isMobile()) { this.el.object3D.scale.set(1.4, 1.4, 1.4); }
    this.el.object3D.visible = true;
  },

  onBackgroundClick: function () {
    
    this.link.setAttribute('scale', { x: 0.00001, y: 0.00001, z: 0.00001 });
    this.backgroundEl.object3D.visible = false;
    this.backgroundEl.object3D.scale.set(0.001, 0.001, 0.001);
    this.el.object3D.visible = false;
  }
});
// -----------------------------------------------------------------------------------
// RG521005
AFRAME.registerComponent('panel-rg521005', {
  init: function () {
    var buttonEls = document.querySelectorAll('#button-rg521005');
    this.backgroundEl = document.querySelector('#close-rg521005');
    this.link = document.querySelector('#link-rg521005');

    this.onMenuButtonClick = this.onMenuButtonClick.bind(this);
    this.onBackgroundClick = this.onBackgroundClick.bind(this);

    for (var i = 0; i < buttonEls.length; ++i) {
      buttonEls[i].addEventListener('click', this.onMenuButtonClick);
    }

    this.backgroundEl.addEventListener('click', this.onBackgroundClick);
  },

  onMenuButtonClick: function () {
    // Llamada a la función onBackgroundClick del otro componente
    var panelRg022014 = document.querySelector('[panel-rg022014]');
    if (panelRg022014) {
      panelRg022014.components['panel-rg022014'].onBackgroundClick();
    }
    var panelRg008031 = document.querySelector('[panel-rg008031]');
    if (panelRg008031) {
      panelRg008031.components['panel-rg008031'].onBackgroundClick();
    }
    var panelRg021010 = document.querySelector('[panel-rg021010]');
    if (panelRg021010) {
      panelRg021010.components['panel-rg021010'].onBackgroundClick();
    }
    this.backgroundEl.object3D.visible = true;
    this.backgroundEl.object3D.scale.set(1, 1, 1);
    this.link.setAttribute('scale', { x: 0.6, y: 0.2, z: 2 });

    this.el.object3D.scale.set(1, 1, 1);
    if (AFRAME.utils.device.isMobile()) { this.el.object3D.scale.set(1.4, 1.4, 1.4); }
    this.el.object3D.visible = true;
  },

  onBackgroundClick: function () {
    
    this.link.setAttribute('scale', { x: 0.00001, y: 0.00001, z: 0.00001 });
    this.backgroundEl.object3D.visible = false;
    this.backgroundEl.object3D.scale.set(0.001, 0.001, 0.001);
    this.el.object3D.visible = false;
  }
});