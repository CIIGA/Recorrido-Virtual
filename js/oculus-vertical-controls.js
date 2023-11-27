// Archivo: oculus-vertical-controls.js
AFRAME.registerComponent('oculus-vertical-controls', {
    schema: {
      acceleration: { default: 30 },
      rigSelector: { default: "#rig" },
      fly: { default: false },
      controllerOriented: { default: false },
      wsAxis: { default: 'z', oneOf: ['x', 'y', 'z'] },
      enabled: { default: true },
      wsEnabled: { default: true },
      wsInverted: { default: false }
    },
    init: function () {
      this.velocity = new THREE.Vector3(0, 0, 0);
      this.tsData = new THREE.Vector2(0, 0);
  
      this.thumbstickMoved = this.thumbstickMoved.bind(this);
      this.el.addEventListener('thumbstickmoved', this.thumbstickMoved);
    },
    update: function () {
      this.rigElement = document.querySelector(this.data.rigSelector);
    },
    tick: function (time, delta) {
      if (!this.el.sceneEl.is('vr-mode')) return;
  
      var data = this.data;
      var el = this.rigElement;
      var velocity = this.velocity;
  
      if (!velocity[data.wsAxis] && !this.tsData.length()) { return; }
  
      // Update velocity.
      delta = delta / 1000;
      this.updateVelocity(delta);
  
      if (!velocity[data.wsAxis]) { return; }
  
      // Get movement vector and translate position.
      el.object3D.position.add(this.getMovementVector(delta));
    },
    updateVelocity: function (delta) {
      var acceleration;
      var wsAxis;
      var wsSign;
      const CLAMP_VELOCITY = 0.00001;
  
      wsAxis = this.data.wsAxis;
  
      // If FPS too low, reset velocity.
      if (delta > 0.2) {
        this.velocity[wsAxis] = 0;
        return;
      }
  
      // Velocity Easing.
      this.velocity[wsAxis] = this.velocity[wsAxis] * Math.pow(1 / 1.1, delta * 60);
  
      // Clamp velocity easing.
      if (Math.abs(this.velocity[wsAxis]) < CLAMP_VELOCITY) { this.velocity[wsAxis] = 0; }
  
      if (!this.data.enabled) { return; }
  
      // Update velocity using thumbstick input.
      acceleration = this.data.acceleration;
      if (this.data.wsEnabled && this.tsData.y) {
        wsSign = this.data.wsInverted ? -1 : 1;
        this.velocity[wsAxis] += wsSign * acceleration * this.tsData.y * delta;
      }
    },
    getMovementVector: (function () {
      var directionVector = new THREE.Vector3(0, 0, 0);
  
      return function (delta) {
        directionVector.copy(this.velocity);
        directionVector.multiplyScalar(delta);
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
  