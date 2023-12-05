<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Recorrido Virtual</title>
    <meta name="description" content="Laser input UI • A-Frame">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="js/infoRecorrido.js"></script>
    <script src="js/aframe-tooltip-component.js"></script>
    <!-- <script src="camera-position.js"></script> -->
    <script src="js/link-controls.js"></script>
    <script src="js/oculus-xz-controls.js"></script>
    <script src="js/oculus-y-controls.js"></script>
    <script src="https://cdn.rawgit.com/donmccurdy/aframe-extras/v6.0.0/dist/aframe-extras.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.0/examples/js/utils/WorkerPool.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.0/examples/js/loaders/KTX2Loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aframe-loader-3dtiles-component/dist/aframe-loader-3dtiles-component.min.js">
    </script>
</head>

<body>
    <a-scene environment cursor="rayOrigin: mouse; fuse: false" raycaster="far: 10; objects: a-link, .raycastable" renderer="antialias: true" webxr="optionalFeatures: hand-tracking, oculus-hand-tracking, oculus-hand-tracking-low-level, hand-tracking-gestures">
        <a-entity id="rig">
        <a-camera id="camera" camera="active: true" wasd-controls="acceleration: 200" position-controls="minY: -50; maxY: 500; sensitivity: 2.0" position="0 80 0" rotation="0 180 0"></a-camera>
            
            <!-- para navegar con los joystick -->
            <a-entity oculus-touch-controls="hand: left" oculus-y-controls></a-entity>
            <a-entity oculus-touch-controls="hand: right" oculus-xz-controls></a-entity>
            <!-- los laser -->
            <a-entity id="leftHand" link-controls="hand: left" raycaster="objects: [mixin='box']" line="color: #118A7E"></a-entity>
            <a-entity id="rightHand" laser-controls="hand: right" raycaster="objects: .raycastable" line="color: #118A7E"></a-entity>



        </a-entity>

        <a-entity id="freeman-tiles" position="2700 7530 5700" rotation="-90 180 0" scale="1 1 1" loader-3dtiles="
            url: https://assets.ion.cesium.com/us-east-1/2271430/tileset.json?v=2;
            maximumSSE: 16;
            cesiumIONToken:eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI2MWM0MmE0ZC01NGRhLTQyNGEtYjhkNC02NDczMTg1YTU5Y2MiLCJpZCI6MTY0OTQxLCJpYXQiOjE2OTYwMTI2NTd9.2RgcBxTvGwfwWgWRQm6gGg4B9-uVVNlBRh0M6N-SzY8;
        ">
        </a-entity>
        <!-- panel datos -->
        <a-entity position="75 5 -110" panel-datos visible="false" scale="0.001 0.001 0.001" geometry="primitive: plane; width: 6; height: 7.2" material="color: #333333; shader: flat; transparent: false">
            <!-- imagen -->
            <a-entity geometry="primitive: plane; width: 6; height: 3.24" material="src: #pf-image-img; shader: flat; transparent: true" position="0 1.98 0.002">
            </a-entity>
            <!--titulo-->
            <a-entity position="-2.72 -0.4 0" text="shader: msdf; anchor: left; width: 8; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Cuenta: PT058047">
            </a-entity>
            <!--descripcion-->
            <a-entity position="-2.72 -0.8 0" text="baseline: top; shader: msdf; anchor: left; width: 6+-; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Propietario: CERPA BRISEÑO JOSE \n 
                  Direccion: C. DE LA GRIETA 710 , colonia PLAYAS DE TIJUANA SECCION JARDINES, cp , PLAYAS DE TIJUANA, Edo. México; align: justify;"></a-entity>

            <a-plane position="2 -3.28 0.001" height="0.6" width="2" material="color: #73C1FA">
                <a-text value="Entrar" align="center" position="0 0 0.01" color="white" scale="1.2 1.2 1.2"></a-text>
            </a-plane>

            <!-- icono para quitar el panel -->
            <!-- la clase raycastable es para que se pueda presionar -->
            <a-plane id="datos-close" position="2.6 3.4 0.01" height="0.4" width="0.8" scale="0.1 0 1" material="color: red" class="raycastable">
                <a-text value="X" align="center" position="0 0 0.01" color="white" scale="2 2 2"></a-text>
            </a-plane>

            <!-- Enlace invisible para hacer clic en el botón -->
            <a-link href="foto.php" position="2 -3.28 0.01" scale="1.2 0.4 4" visible="false">
            </a-link>
        </a-entity>

        <a-assets>
        <a-mixin id="p-poster" geometry="primitive: plane; width: 5; height: 5" material="color: white; shader: flat; transparent: true; opacity: 1" animation__scale="property: scale; to: 1.2 1.2 1.2; dur: 200; startEvents: mouseenter" animation__scale_reverse="property: scale; to: 1 1 1; dur: 200; startEvents: mouseleave" position="0 0 0.005"></a-mixin>
            <img id="datos-img-poster" src="iconos/datos.png" crossorigin="anonymous" />
            <img id="pf-image-img" src="https://cdn.glitch.global/2d43572b-d2e6-41dc-97c2-96f9f5e4e528/edificios.png?v=1698187124889" crossorigin="anonymous" />

        </a-assets>



        <a-entity position="100 -3 -180">
            <a-entity id="datos-poster-button">
                <a-image id="datos-poster-button" src="iconos/marcador.png" mixin="p-poster" class="raycastable "></a-image>
                <!-- <a-entity obj-model="obj: url(modelos_assets/Oval_Loc_OBJ_Format.obj); mtl: url(modelos_assets/Oval_Loc_OBJ_Format.mtl)" rotation="0 0 0" animation="property: rotation; to: 0 405 0; dur: 10000; easing: linear; loop: true" mixin="p-poster" class="raycastable"></a-entity> -->
            </a-entity>
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

                    console.log('new position Y: ', newPositionY);

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


</body>

</html>