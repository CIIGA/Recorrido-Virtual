AFRAME.registerComponent('oculus-y-controls', {
  schema: {
      acceleration: { default: 10 },
      rigSelector: { default: "#rig" },
      enabled: { default: true },
      udAxis: { default: 'y', oneOf: ['x', 'y', 'z'] },
      udEnabled: { default: true },
      udInverted: { default: true },
  },
  init: function () {
      this.easing = 1.1;
      this.velocity = new THREE.Vector3(0, 0, 0);
      this.tsData = new THREE.Vector2(0, 0);
      this.el.object3D.rotation.set(0, Math.PI, 0);

      this.thumbstickMoved = this.thumbstickMoved.bind(this)
      this.el.addEventListener('thumbstickmoved', this.thumbstickMoved);
  },
  update: function () {
      this.rigElement = document.querySelector(this.data.rigSelector)
  },
  tick: function (time, delta) {
      if (!this.el.sceneEl.is('vr-mode')) return;
      var data = this.data;
      var el = this.rigElement
      var velocity = this.velocity;

      if (!velocity[data.udAxis] && !this.tsData.length()) {
          return;
      }

      delta = delta / 1000;
      this.updateVelocity(delta);

      if (!velocity[data.udAxis]) {
          return;
      }

      el.object3D.position.add(this.getMovementVector(delta));
  },
  updateVelocity: function (delta) {
      var acceleration;
      var udAxis;
      var udSign;
      var data = this.data;
      var velocity = this.velocity;
      const CLAMP_VELOCITY = 0.00001;

      udAxis = data.udAxis;

      if (delta > 0.2) {
          velocity[udAxis] = 0;
          return;
      }

      var scaledEasing = Math.pow(1 / this.easing, delta * 60);

      if (velocity[udAxis] !== 0) {
          velocity[udAxis] = velocity[udAxis] * scaledEasing;
      }

      if (Math.abs(velocity[udAxis]) < CLAMP_VELOCITY) { velocity[udAxis] = 0; }

      if (!data.enabled) { return; }

      acceleration = data.acceleration;

      if (data.udEnabled) {
          udSign = data.udInverted ? -1 : 1;
          velocity[udAxis] += udSign * acceleration * this.tsData.y * delta;
      }
  },
  getMovementVector: (function () {
      var directionVector = new THREE.Vector3(0, 0, 0);
      var rotationEuler = new THREE.Euler(0, 0, 0, 'YXZ');

      return function (delta) {
          var rotation = this.el.sceneEl.camera.el.object3D.rotation
          var velocity = this.velocity;
          var xRotation;

          directionVector.copy(velocity);
          directionVector.multiplyScalar(delta);

          if (!rotation) { return directionVector; }
          xRotation = 0; // No x-axis rotation for up-down movement

          rotationEuler.set(xRotation, rotation.y, 0);
          directionVector.applyEuler(rotationEuler);
          return directionVector;
      };
  })(),
  thumbstickMoved: function (evt) {
      this.tsData.set(evt.detail.x, evt.detail.y);
  },
  remove: function () {
      this.el.removeEventListener('thumbstickmoved', this.thumbstickMoved);
  }
});
