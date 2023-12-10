AFRAME.registerComponent('zoom-controls', {
    schema: {
      fovFactor: { default: 1.0 }
    },
    init: function () {
      this.el.sceneEl.addEventListener('thumbstickmoved', this.thumbstickMoved.bind(this));
    },
    thumbstickMoved: function (event) {
      var delta = event.detail.y;
      this.adjustZoom(delta);
    },
    adjustZoom: function (delta) {
      var camera = this.el.sceneEl.camera.el.components.camera.camera;
      camera.fov *= Math.pow(1.1, -delta * 100); // Ajusta el factor según tus necesidades
      camera.updateProjectionMatrix();
      console.log("Zoom Factor:", factor);
    }
  });
  