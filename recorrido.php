<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Recorrido Virtual</title>
    <meta name="description" content="Laser input UI • A-Frame">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="js/paneles.js"></script>
    <script src="js/aframe-tooltip-component.js"></script>
    <script src="jsDatos/link-controls.js"></script>
    <script src="js/oculus-xz-controls.js"></script>
    <script src="js/oculus-y-controls.js"></script>
    <script src="https://cdn.rawgit.com/donmccurdy/aframe-extras/v6.0.0/dist/aframe-extras.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.0/examples/js/utils/WorkerPool.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.0/examples/js/loaders/KTX2Loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aframe-loader-3dtiles-component/dist/aframe-loader-3dtiles-component.min.js">
    </script>
</head>

<body>
    <!-- fog="type: linear; color: #FFF; near: 0; far: 1000" -->
    <a-scene environment cursor="rayOrigin: mouse; fuse: false"  raycaster="far: 10; objects: a-link, .raycastable" renderer="antialias: true" webxr="optionalFeatures: hand-tracking, oculus-hand-tracking, oculus-hand-tracking-low-level, hand-tracking-gestures" background="color: #87CEEB">

        <a-entity id="rig" rotation="0 140 0" position="-100 70 -800">
            <a-camera id="camera" camera="active: true" wasd-controls="acceleration: 1000" position-controls="minY: -50; maxY: 500; sensitivity: 2.0" position="0 1.6 0" rotation="0 0 0">

         
    
            </a-camera>


            <!-- para navegar con los joystick -->
            <a-entity oculus-touch-controls="hand: left" oculus-xz-controls></a-entity>
            <a-entity oculus-touch-controls="hand: right" oculus-y-controls></a-entity>
            <!-- los laser -->
            <a-entity id="leftHand" link-controls="hand: left" raycaster="objects: [mixin='box']" line="color: #118A7E"></a-entity>
            <a-entity id="rightHand" laser-controls="hand: right" raycaster="objects: .raycastable" line="color: #118A7E"></a-entity>
            <!-- panel RG008031 position="0 1.6 -6"-->
            <a-entity position="0 1.6 -6" panel-rg008031 visible="false" scale="0.001 0.001 0.001" geometry="primitive: plane; width: 3; height: 3.6" material="color: #333333; shader: flat; transparent: false">
                <!-- imagen -->
                <a-entity geometry="primitive: plane; width: 3; height: 1.62" material="src: #p-img-RG008031; shader: flat; transparent: true" position="0 0.99 0.01">
                </a-entity>
                <!--titulo-->
                <a-entity position="-1.36 -0.2 0.01" text="shader: msdf; anchor: left; width: 4; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Cuenta: RG008031">
                </a-entity>
                <!--descripcion-->
                <a-entity position="-1.36 -0.4 0.01" text="baseline: top; shader: msdf; anchor: left; width: 2.9; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Propietario: VILLA ACOSTA JUAN CARLOS \n 
                  Direccion: C.  PASEO CENTENARIO #9580, RIO TIJUANA, TIJUANA, B.C; align: justify;"></a-entity>

                <a-plane position="1 -1.64 0.01" height="0.3" width="1" material="color: #73C1FA">
                    <a-text value="Entrar" align="center" position="0 0 0.014" color="white" scale="0.6 0.6 0.6"></a-text>
                </a-plane>

                <!-- icono para quitar el panel -->
                <!-- la clase raycastable es para que se pueda presionar -->
                <a-plane id="close-rg008031" position="1.3 1.7 0.02" height="0.2" width="0.4" scale="0.1 0 1" material="color: red" class="raycastable">
                    <a-text value="X" align="center" position="0 0 0.025" color="white" scale="1 1 1"></a-text>
                </a-plane>

                <!-- Enlace invisible para hacer clic en el botón -->
                <a-link id="link-rg008031" title="Foto 360" href="foto.php?cuenta=RG008031" position="1 -1.64 0.009" scale="0.8 0.2 2" visible="false">
                </a-link>
            </a-entity>
            <!-- panel datos RG022014-->
            <a-entity position="0 1.6 -6" panel-rg022014 visible="false" scale="0.001 0.001 0.001" geometry="primitive: plane; width: 3; height: 3.6" material="color: #333333; shader: flat; transparent: false">
                <!-- imagen -->
                <a-entity geometry="primitive: plane; width: 3; height: 1.62" material="src: #p-img-RG022014; shader: flat; transparent: true" position="0 0.99 0.01">
                </a-entity>
                <!--titulo-->
                <a-entity position="-1.36 -0.2 0.01" text="shader: msdf; anchor: left; width: 4; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Cuenta: RG022014">
                </a-entity>
                <!--descripcion-->
                <a-entity position="-1.36 -0.4 0.01" text="baseline: top; shader: msdf; anchor: left; width: 2.9; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Propietario: REYNALDO MORA JOSE \n 
                  Direccion: C.  P.º DEL CENTENARIO 10310, LA MESA, TIJUANA, B.C; align: justify;"></a-entity>

                <a-plane position="1 -1.64 0.01" height="0.3" width="1" material="color: #73C1FA">
                    <a-text value="Entrar" align="center" position="0 0 0.014" color="white" scale="0.6 0.6 0.6"></a-text>
                </a-plane>

                <!-- icono para quitar el panel -->
                <!-- la clase raycastable es para que se pueda presionar -->
                <a-plane id="close-rg022014" position="1.3 1.7 0.02" height="0.2" width="0.4" scale="0.1 0 1" material="color: red" class="raycastable">
                    <a-text value="X" align="center" position="0 0 0.025" color="white" scale="1 1 1"></a-text>
                </a-plane>

                <!-- Enlace invisible para hacer clic en el botón -->
                <a-link id="link-rg022014" title="Foto 360" href="foto.php?cuenta=RG022014" position="1 -1.64 0.009" scale="0.8 0.2 2" visible="false">
                </a-link>
            </a-entity>
            <!-- panel datos RG021010-->
            <a-entity position="0 1.6 -6" panel-rg021010 visible="false" scale="0.001 0.001 0.001" geometry="primitive: plane; width: 3; height: 3.6" material="color: #333333; shader: flat; transparent: false">
                <!-- imagen -->
                <a-entity geometry="primitive: plane; width: 3; height: 1.62" material="src: #p-img-RG021010; shader: flat; transparent: true" position="0 0.99 0.01">
                </a-entity>
                <!--titulo-->
                <a-entity position="-1.36 -0.2 0.01" text="shader: msdf; anchor: left; width: 4; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Cuenta: RG021010">
                </a-entity>
                <!--descripcion-->
                <a-entity position="-1.36 -0.4 0.01" text="baseline: top; shader: msdf; anchor: left; width: 2.9; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Propietario: SALAZAR VARELA JUAN AMADO \n 
                  Direccion: C.  Fray Servando Teresa de Mier 1351-204, Zona Urbana Rio Tijuana, TIJUANA B.C; align: justify;"></a-entity>

                <a-plane position="1 -1.64 0.01" height="0.3" width="1" material="color: #73C1FA">
                    <a-text value="Entrar" align="center" position="0 0 0.014" color="white" scale="0.6 0.6 0.6"></a-text>
                </a-plane>

                <!-- icono para quitar el panel -->
                <!-- la clase raycastable es para que se pueda presionar -->
                <a-plane id="close-rg021010" position="1.3 1.7 0.02" height="0.2" width="0.4" scale="0.1 0 1" material="color: red" class="raycastable">
                    <a-text value="X" align="center" position="0 0 0.025" color="white" scale="1 1 1"></a-text>
                </a-plane>

                <!-- Enlace invisible para hacer clic en el botón -->
                <a-link id="link-rg021010" title="Foto 360" href="foto.php?cuenta=RG021010" position="1 -1.64 0.009" scale="0.8 0.2 2" visible="false">
                </a-link>
            </a-entity>
            <!-- panel datos RG521005-->
            <a-entity position="0 1.6 -6" panel-rg521005 visible="false" scale="0.001 0.001 0.001" geometry="primitive: plane; width: 3; height: 3.6" material="color: #333333; shader: flat; transparent: false">
                <!-- imagen -->
                <a-entity geometry="primitive: plane; width: 3; height: 1.62" material="src: #p-img-RG521005; shader: flat; transparent: true" position="0 0.99 0.01">
                </a-entity>
                <!--titulo-->
                <a-entity position="-1.36 -0.2 0.01" text="shader: msdf; anchor: left; width: 4; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Cuenta: RG521005">
                </a-entity>
                <!--descripcion-->
                <a-entity position="-1.36 -0.4 0.01" text="baseline: top; shader: msdf; anchor: left; width: 2.9; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Propietario: GUILLEN ALEJANDRO Y COP \n 
                  Direccion: C.  Blvd. Padre Kino 4300, Defensores de Baja California, TIJUANA B.C; align: justify;"></a-entity>

                <a-plane position="1 -1.64 0.01" height="0.3" width="1" material="color: #73C1FA">
                    <a-text value="Entrar" align="center" position="0 0 0.014" color="white" scale="0.6 0.6 0.6"></a-text>
                </a-plane>

                <!-- icono para quitar el panel -->
                <!-- la clase raycastable es para que se pueda presionar -->
                <a-plane id="close-rg521005" position="1.3 1.7 0.02" height="0.2" width="0.4" scale="0.1 0 1" material="color: red" class="raycastable">
                    <a-text value="X" align="center" position="0 0 0.025" color="white" scale="1 1 1"></a-text>
                </a-plane>

                <!-- Enlace invisible para hacer clic en el botón -->
                <a-link id="link-rg521005" title="Foto 360" href="foto.php?cuenta=RG521005" position="1 -1.64 0.009" scale="0.8 0.2 2" visible="false">
                </a-link>
            </a-entity>


        </a-entity>

        <a-entity id="freeman-tiles" position="2700 7530 5700" rotation="-90 180 0" scale="1 1 1" loader-3dtiles="
            url: https://assets.ion.cesium.com/us-east-1/2271430/tileset.json?v=2;
            maximumSSE: 16;
            cesiumIONToken:eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI2MWM0MmE0ZC01NGRhLTQyNGEtYjhkNC02NDczMTg1YTU5Y2MiLCJpZCI6MTY0OTQxLCJpYXQiOjE2OTYwMTI2NTd9.2RgcBxTvGwfwWgWRQm6gGg4B9-uVVNlBRh0M6N-SzY8;
        ">
        </a-entity>


        <a-assets>
            <a-mixin id="p-poster" geometry="primitive: plane; width: 20; height: 20" material="color: white; shader: flat; transparent: true; opacity: 1" animation__scale="property: scale; to: 1.2 1.2 1.2; dur: 200; startEvents: mouseenter" animation__scale_reverse="property: scale; to: 1 1 1; dur: 200; startEvents: mouseleave" position="0 0 0.005"></a-mixin>

            <img id="p-img-RG008031" src="fotosPanel/RG008031.png" crossorigin="anonymous" />
            <img id="p-img-RG022014" src="fotosPanel/RG022014.png" crossorigin="anonymous" />
            <img id="p-img-RG021010" src="fotosPanel/RG021010.png" crossorigin="anonymous" />
            <img id="p-img-RG521005" src="fotosPanel/RG521005.png" crossorigin="anonymous" />
        </a-assets>


        <!-- RG008031 -->
        <a-entity position="100 -3 -180">
            <a-image id="button-rg008031" src="iconos/marcador.webp" mixin="p-poster" class="raycastable "></a-image>
        </a-entity>
        <!-- RG022014 -->
        <a-entity position="-675 10 -760" rotation="0 -25 0">
            <a-image id="button-rg022014" src="iconos/marcador.webp" mixin="p-poster" class="raycastable "></a-image>
        </a-entity>
        <!-- RG021010 -->
        <a-entity position="-620 15 -585" rotation="0 -20 0">
            <a-image id="button-rg021010" src="iconos/marcador.webp" mixin="p-poster" class="raycastable "></a-image>
        </a-entity>
        <!-- RG521005 -->
        <a-entity position="-700 -10 -535" rotation="0 -20 0">
            <a-image id="button-rg521005" src="iconos/marcador.webp" mixin="p-poster" class="raycastable "></a-image>
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


</body>

</html>