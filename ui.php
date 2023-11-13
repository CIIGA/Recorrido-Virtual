<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Recorrido Virtual</title>
    <meta name="description" content="Laser input UI • A-Frame">
    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="js/highlight.js"></script>
    <script src="js/info-panel.js"></script>
    <script src="js/aframe-tooltip-component.js"></script>
    <!-- <script src="camera-position.js"></script> -->
    <script src="js/link-controls.js"></script>
    <script src="js/oculus-thumbstick-controls.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.0/examples/js/utils/WorkerPool.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.0/examples/js/loaders/KTX2Loader.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/aframe-loader-3dtiles-component/dist/aframe-loader-3dtiles-component.min.js">
    </script>
</head>

<body>
    <a-scene environment cursor="rayOrigin: mouse; fuse: false" raycaster="far: 10000; objects: a-link, .raycastable"
        renderer="antialias: true" webxr="referenceSpaceType: local">
        <a-entity id="rig">
            <a-camera id="camera" camera="active: true" look-controls zoom-controls="min:5; max: 100" fov="100"
                position="0 0 0">

            </a-camera>
            <!-- <a-entity id="camera" camera="active: true" look-controls zoom-controls="min:5; max: 140" fov="100" position="0 0 0"></a-entity>     -->

            <!-- para navegar con los joystick -->
            <a-entity oculus-touch-controls="hand: left"></a-entity>
            <a-entity oculus-touch-controls="hand: right" oculus-thumbstick-controls></a-entity>
            <!-- los laser -->
            <a-entity id="leftHand" link-controls="hand: left" raycaster="objects: [mixin='box']"></a-entity>
            <a-entity id="rightHand" laser-controls="hand: right" raycaster="objects: .raycastable"
                line="color: #118A7E"></a-entity>
            <!-- panel -->
            <a-entity id="infoPanel" position="0 0.4 -3" info-panel visible="false" scale="0.001 0.001 0.001"
                geometry="primitive: plane; width: 1.5; height: 1.8"
                material="color: #333333; shader: flat; transparent: false" class="raycastable">
                <!-- imagen -->
                <a-entity id="kazetachinuMovieImage" mixin="movieImage" material="src: #kazetachinu" visible="false">
                </a-entity>
                <!--titulo-->
                <a-entity id="movieTitle" position="-0.68 -0.1 0"
                    text="shader: msdf; anchor: left; width: 1.5; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Cuenta: PT058047">
                </a-entity>
                <!--descripcion-->
                <a-entity id="movieDescription" position="-0.68 -0.2 0"
                    text="baseline: top; shader: msdf; anchor: left; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Propietario: CERPA BRISEÑO JOSE \n 
                  Direccion: C. DE LA GRIETA 710 , colonia PLAYAS DE TIJUANA SECCION JARDINES, cp , PLAYAS DE TIJUANA, Edo. México; align: justify;"></a-entity>

                <a-plane position="0.5 -0.82 0.001" height="0.15" width="0.5" material="color: white">
                    <a-text value="Ver Foto" align="center" position="0 0 0.01" color="black" scale="0.3 0.3 0.3"></a-text>
                </a-plane>
              
              <!-- icono para quitar el panel -->
              <a-plane id="background" position="0.65 0.85 0.01" height="0.1" width="0.2" scale="0.1 0 1" material="color: red" class="raycastable">
                    <a-text value="X" align="center" position="0 0 0.01" color="white" scale="0.5 0.5 0.5"></a-text>
                </a-plane>

                <!-- Enlace invisible para hacer clic en el botón -->
                <a-link href="foto.php?cuenta=PT058047" position="0.5 -0.82 0.01" scale="0.3 0.1 1" visible="false">
                </a-link>
            </a-entity>





            <a-entity position="0 1.6 0" camera
                look-controls="magicWindowTrackingEnabled: false; touchEnabled: false; mouseEnabled: false">
                <a-entity id="fadeBackground" geometry="primitive: sphere; radius: 0"
                    material="color: black; side: back; shader: flat; transparent: true; opacity: 0.6" visible="false">
                </a-entity>
            </a-entity>

        </a-entity>

        <a-entity id="freeman-tiles" position="2700 7530 5700" rotation="-90 180 0" scale="1 1 1" loader-3dtiles="
            url: https://assets.ion.cesium.com/us-east-1/2271430/tileset.json?v=2;
            maximumSSE: 48;
            cameraEl: #camera;
            cesiumIONToken:eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI2MWM0MmE0ZC01NGRhLTQyNGEtYjhkNC02NDczMTg1YTU5Y2MiLCJpZCI6MTY0OTQxLCJpYXQiOjE2OTYwMTI2NTd9.2RgcBxTvGwfwWgWRQm6gGg4B9-uVVNlBRh0M6N-SzY8;
        ">
        </a-entity>
        <a-assets>

            <img id="kazetachinu"
                src="https://cdn.glitch.global/2d43572b-d2e6-41dc-97c2-96f9f5e4e528/edificios.png?v=1698187124889"
                crossorigin="anonymous" />
            <img id="kazetachinuPoster" src="https://cdn.aframe.io/examples/ui/kazetachinuPoster.jpg"
                crossorigin="anonymous" />


            <a-mixin id="frame" geometry="primitive: plane; width: 0.8; height: 2"
                material="color: white; shader: flat; transparent: true; opacity: 0"
                animation__scale="property: scale; to: 1.2 1.2 1.2; dur: 200; startEvents: mouseenter"
                animation__scale_reverse="property: scale; to: 1 1 1; dur: 200; startEvents: mouseleave"></a-mixin>

            <a-mixin id="movieImage" geometry="primitive: plane; width: 1.5; height: 0.81"
                material="src: #ponyo; shader: flat; transparent: true" position="0 0.495 0.002"></a-mixin>
        </a-assets>





        <a-entity id="ui" position="0 0 0">
            <!-- Poster menu -->
            <a-entity id="menu" highlight>


                <a-entity id="kazetachinuButton" position="0 -3 -4" mixin="frame" class="raycastable menu-button">
                    <!-- Marcador de ubicación -->
                    <a-entity geometry="primitive: cone; height: 2; radiusBottom: 0.4; radiusTop: 0;"
                        material="color: red" rotation="180 0 0"></a-entity>

                </a-entity>
            </a-entity>


        </a-entity>
        <a-assets>
            <img id="thumbEgypt" crossOrigin="anonymous" src="">
        </a-assets>

    </a-scene>
    <script>
    AFRAME.registerComponent('zoom-controls', {
        schema: {
            min: {
                type: "number",
                default: 5
            },
            max: {
                type: "number",
                default: 120
            }
        },
        init: function() {
            let self = this;
            let sceneEl = document.querySelector("a-scene");
            self.camera = sceneEl.querySelector("#camera");
            console.log('min: ', self.data.min);
            console.log('max: ', self.data.max);
            window.addEventListener("wheel", event => {
                let amount = Math.sign(event.deltaY) * 5;
                let fov = Number(self.camera.getAttribute('camera').fov);
                let adjust = amount + fov;
                if (adjust < self.data.min) {
                    adjust = self.data.min;
                }
                if (adjust > self.data.max) {
                    adjust = self.data.max;
                }
                console.log('zoom: ', adjust);
                self.camera.setAttribute('camera', 'fov', adjust);
            });
        }
    });
    </script>


</body>

</html>