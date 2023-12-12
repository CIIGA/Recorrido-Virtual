
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Recorrido Virtual</title>
    <meta name="description" content="Laser input UI • A-Frame">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="js/aframe-tooltip-component.js"></script>
    <script src="js/oculus-xz-controls.js"></script>
    <script src="js/oculus-y-controls.js"></script>
    <script src="https://cesium.com/downloads/cesiumjs/releases/1.87/Build/Cesium/Cesium.js"></script>
    <script src="https://cdn.rawgit.com/donmccurdy/aframe-extras/v6.0.0/dist/aframe-extras.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.0/examples/js/utils/WorkerPool.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.0/examples/js/loaders/KTX2Loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aframe-loader-3dtiles-component/dist/aframe-loader-3dtiles-component.min.js">
    </script>
</head>

<body>
    <!-- fog="type: linear; color: #FFF; near: 0; far: 1000" -->
    <a-scene environment cursor="rayOrigin: mouse; fuse: false" raycaster="far: 10; objects: a-link, .raycastable" renderer="antialias: true" webxr="optionalFeatures: hand-tracking, oculus-hand-tracking, oculus-hand-tracking-low-level, hand-tracking-gestures" background="color: #87CEEB">

        <a-entity id="rig" rotation="0 0 0" position="7000 0 -7000">
            <a-camera id="camera" camera="active: true" wasd-controls="acceleration: 1000" position-controls="minY: -50; maxY: 1500; sensitivity: 2.0" position="0 1.6 0" rotation="0 0 0">



            </a-camera>


            <!-- para navegar con los joystick -->
            <a-entity oculus-touch-controls="hand: left" oculus-xz-controls></a-entity>
            <a-entity oculus-touch-controls="hand: right" oculus-y-controls></a-entity>
            <!-- los laser -->
            <a-entity id="leftHand" link-controls="hand: left" raycaster="objects: [mixin='box']" line="color: #118A7E"></a-entity>
            <a-entity id="rightHand" laser-controls="hand: right" raycaster="objects: .raycastable" line="color: #118A7E"></a-entity>
         
        </a-entity>

        <a-entity id="freeman-tiles" position="0 0 0" rotation="-90 180 0" scale="1 1 1" loader-3dtiles="
            url: https://assets.ion.cesium.com/us-east-1/2388963/tileset.json?v=2;
            maximumSSE: 16;
            cesiumIONToken:eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI1ZjdmM2Y1NC1kMTY2LTQxZjUtYjFlNy1mNTQzODFiNzA1N2IiLCJpZCI6MTY0OTQxLCJpYXQiOjE3MDI0MTQzMDN9.FQs0KVMuR7VA1df-CHc29QWTXLvYcEpSxiPXqNgsWxM;
        ">
        </a-entity>
        <a-assets>
            <a-mixin id="p-poster" geometry="primitive: plane; width: 20; height: 20" material="color: white; shader: flat; transparent: true; opacity: 1" animation__scale="property: scale; to: 1.2 1.2 1.2; dur: 200; startEvents: mouseenter" animation__scale_reverse="property: scale; to: 1 1 1; dur: 200; startEvents: mouseleave" position="0 0 0.005"></a-mixin>

        </a-assets>
        <!-- RG008031 -->
        <a-entity position="100 -3 -180">
            <a-image id="button-rg008031" src="iconos/marcador.webp" mixin="p-poster" class="raycastable "></a-image>
        </a-entity>
      


    </a-scene>
    <script>
        AFRAME.registerComponent('position-controls', {
            schema: {
                minY: {
                    type: "number",
                    default: -50
                },
                maxY: {
                    type: "number",
                    default: 500
                },
                sensitivity: {
                    type: "number",
                    default: 2.0
                }
            },
            init: function() {
                let self = this;
                let sceneEl = document.querySelector("a-scene");
                self.camera = sceneEl.querySelector("#camera");
                console.log('minY: ', self.data.minY);
                console.log('maxY: ', self.data.maxY);
                window.addEventListener("wheel", event => {
                    let amount = Math.sign(event.deltaY) * self.data.sensitivity;
                    let currentPosition = self.camera.getAttribute('position');
                    let newPositionY = currentPosition.y + amount;

                    // Clamp the new position to the specified range
                    if (newPositionY < self.data.minY) {
                        newPositionY = self.data.minY;
                    }
                    if (newPositionY > self.data.maxY) {
                        newPositionY = self.data.maxY;
                    }

                    // console.log('new position Y: ', newPositionY);

                    // Update the camera position
                    self.camera.setAttribute('position', {
                        x: currentPosition.x,
                        y: newPositionY,
                        z: currentPosition.z
                    });
                });
            }
        });
    </script>
    <script>
AFRAME.registerComponent('add-image-at-coordinates', {
    init: function () {
        // Coordenadas geográficas del lugar deseado (ejemplo)
        var latitude = 32.5367512615558;
        var longitude = -117.02405829890539;
        

        // Convertir coordenadas a posición 3D (utilizando Cesium)
        var cartesianCoordinates = Cesium.Cartesian3.fromDegrees(longitude, latitude);
        var position = new AFRAME.THREE.Vector3(cartesianCoordinates.x, cartesianCoordinates.y, cartesianCoordinates.z);

        // Crear elemento a-image en la posición calculada
        var imageElement = document.createElement('a-image');
        imageElement.setAttribute('src', 'iconos/marcador.webp'); // Cambia esto por la ruta de tu imagen
        imageElement.setAttribute('position', position);

        // Añadir el elemento a la escena
        this.el.appendChild(imageElement);
    }
});

// Llama al componente para agregar la imagen en el inicio de la escena
document.querySelector('a-scene').addEventListener('loaded', function () {
    document.querySelector('a-scene').components['add-image-at-coordinates'].init();
});
</script>


</body>

</html>