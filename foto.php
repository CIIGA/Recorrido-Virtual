<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Recorrido Virtual</title>
    <meta name="description" content="Laser input UI • A-Frame">
    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="jsDatos/panel-fotos.js"></script>
    <script src="jsDatos/panel-datos.js"></script>
    <script src="jsDatos/panel-fichap.js"></script>
    <script src="jsDatos/panel-pagos.js"></script>
    <script src="jsDatos/panel-modelo.js"></script>
    <script src="jsDatos/link-controls.js"></script>

    </script>
</head>

<body>
    <a-scene environment cursor="rayOrigin: mouse; fuse: false" raycaster="far: 10000; objects: a-link, .raycastable" renderer="antialias: true" webxr="referenceSpaceType: local">

        <a-camera id="camera" camera="active: true" look-controls zoom-controls="min:5; max: 100" fov="100" position="0 0 0">
        </a-camera>
        <!-- los laser -->
        <a-entity id="leftHand" link-controls="hand: left" raycaster="objects: [mixin='box']"></a-entity>
        <a-entity id="rightHand" laser-controls="hand: right" raycaster="objects: .raycastable" line="color: #000000"></a-entity>


        <!-- panel ficha -->
        <a-entity position="3 0.4 1" rotation="0 -80 0" panel-fichap visible="false" scale="0.001 0.001 0.001" geometry="primitive: plane; width: 1.5; height: 1.8" material="color: #333333; shader: flat; transparent: false">
            <!-- imagen -->
            <a-entity geometry="primitive: plane; width: 1.5; height: 1.8" material="src: #ficha-pdf-img; shader: flat; transparent: true" position="0 0 0.002">
            </a-entity>
            <!-- icono para quitar el panel -->
            <!-- la clase raycastable es para que se pueda presionar -->
            <a-plane id="fichap-close" position="0.65 0.85 0.01" height="0.1" width="0.2" scale="0.1 0 1" material="color: red" class="raycastable">
                <a-text value="X" align="center" position="0 0 0.01" color="white" scale="0.5 0.5 0.5"></a-text>
            </a-plane>

        </a-entity>
        <!-- panel fotos -->
        <a-entity position="2 0 -1.5" rotation="0 -40 0" panel-fotos visible="false" scale="0.001 0.001 0.001" geometry="primitive: plane; width: 1.5; height: 1" material="color: #333333; shader: flat; opacity: 0">

            <a-plane id="fotos-close" position="0.65 0.85 0.01" height="0.1" width="0.2" scale="0.1 0 1" material="color: red" class="raycastable">
                <a-text value="X" align="center" position="0 0 0.01" color="white" scale="0.5 0.5 0.5"></a-text>
            </a-plane>
            <a-plane id="next" position="0.4 -0.1 0.01" height="0.1" width="0.5" scale="0.1 0 1" material="color: #73C1FA" class="raycastable">
                <a-text value="Siguiente" align="center" position="0 0 0.01" color="black" scale="0.3 0.3 0.3"></a-text>
            </a-plane>
            <a-plane id="previous" position="-0.4 -0.1 0.01" height="0.1" width="0.5" scale="0.1 0 1" material="color: #73C1FA" class="raycastable">
                <a-text value="Anterior" align="center" position="0 0 0.01" color="black" scale="0.3 0.3 0.3"></a-text>
            </a-plane>
            

            <a-entity id="galeria" position="0 0.45 0.001">
                <!-- Agrega tus fotos aquí -->
                <a-image id="imagenGaleria" rotation="0 0 0" scale="1 1 1"  width="1.5" height="0.9"></a-image>
            </a-entity>

           

        </a-entity>
        <!-- panel datos -->
        <a-entity position="0 0.4 -2" panel-datos visible="false" scale="0.001 0.001 0.001" geometry="primitive: plane; width: 1.5; height: 1.8" material="color: #333333; shader: flat; transparent: false">
            <!-- imagen -->
            <a-entity geometry="primitive: plane; width: 1.5; height: 0.81" material="src: #pf-image-img; shader: flat; transparent: true" position="0 0.495 0.002">
            </a-entity>
            <!--titulo-->
            <a-entity position="-0.68 -0.1 0" text="shader: msdf; anchor: left; width: 1.5; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Cuenta: PT058047">
            </a-entity>
            <!--descripcion-->
            <a-entity position="-0.68 -0.2 0" text="baseline: top; shader: msdf; anchor: left; font: https://cdn.aframe.io/examples/ui/Viga-Regular.json; color: white; value: Propietario: CERPA BRISEÑO JOSE \n 
                  Direccion: C. DE LA GRIETA 710 , colonia PLAYAS DE TIJUANA SECCION JARDINES, cp , PLAYAS DE TIJUANA, Edo. México; align: justify;"></a-entity>

           
            <!-- icono para quitar el panel -->
            <!-- la clase raycastable es para que se pueda presionar -->
            <a-plane id="datos-close" position="0.65 0.85 0.01" height="0.1" width="0.2" scale="0.1 0 1" material="color: red" class="raycastable">
                <a-text value="X" align="center" position="0 0 0.01" color="white" scale="0.5 0.5 0.5"></a-text>
            </a-plane>

            
        </a-entity>
        <!-- panel pagos -->
        <a-entity position="-2.1 0.4 -1.5" rotation="0 30 0" panel-pagos visible="false" scale="0.001 0.001 0.001" geometry="primitive: plane; width: 2.8; height: 1.8" material="color: #333333; shader: flat; transparent: false">
        <a-entity geometry="primitive: plane; width: 2.8; height: 1.5" material="src: #image-pagos; shader: flat; transparent: true" position="0 0 0.002">
            </a-entity>
        <!-- tabla pagos  -->
            <!-- <a-entity position="-0.4 0.6 0.002"> -->
                <!-- Fila 1 -->
                <!-- <a-entity position="-0.05 0 0"> -->
                    <!-- <a-plane color="gray" width="1" height="0.1"></a-plane> -->
                    <!-- Ajusta el ancho y la posición en Y según tus necesidades -->
                    <!-- <a-text value="Referencia" position="-0.45 0 0.05" scale="0.3 0.3 0.3"></a-text> -->
                    <!-- <a-text value="Recibo" position="-0.1 0 0.05" scale="0.3 0.3 0.3"></a-text> -->
                    <!-- <a-text value="Descripcion" position="0.25 0 0.05" scale="0.3 0.3 0.3"></a-text> -->
                    <!-- <a-text value="Total" position="0.60 0 0.05" scale="0.3 0.3 0.3"></a-text> -->
                    <!-- <a-text value="Fecha Pago" position="0.95 0 0.05" scale="0.3 0.3 0.3"></a-text> -->
                <!-- </a-entity> -->
                <!-- Fila 2 -->
                <!-- <a-entity position="-0.05 -0.1 0"> -->
                    <!-- <a-plane color="gray" width="1" height="0.1"></a-plane> -->
                    <!-- Ajusta el ancho y la posición en Y según tus necesidades -->
                    <!-- <a-text value="Referencia" position="-0.45 0 0.05" scale="0.3 0.3 0.3"></a-text> -->
                    <!-- <a-text value="Recibo" position="-0.1 0 0.05" scale="0.3 0.3 0.3"></a-text> -->
                    <!-- <a-text value="Descripcion" position="0.25 0 0.05" scale="0.3 0.3 0.3"></a-text> -->
                    <!-- <a-text value="Total" position="0.60 0 0.05" scale="0.3 0.3 0.3"></a-text> -->
                    <!-- <a-text value="Fecha Pago" position="0.95 0 0.05" scale="0.3 0.3 0.3"></a-text> -->
                <!-- </a-entity> -->
            <!-- </a-entity> -->
            <!-- icono para quitar el panel -->
            <!-- la clase raycastable es para que se pueda presionar -->
            <a-plane id="pagos-close" position="1.3 0.85 0.01" height="0.1" width="0.2" scale="0.1 0 1" material="color: red" class="raycastable">
                <a-text value="X" align="center" position="0 0 0.01" color="white" scale="0.5 0.5 0.5"></a-text>
            </a-plane>

        </a-entity>
        <!-- panel modelo -->
        <a-entity position="-3 0.4 1" rotation="0 80 0" panel-modelo visible="false" scale="0.001 0.001 0.001" geometry="primitive: plane; width: 1.5; height: 1.8" material="color: #333333; shader: flat; opacity: 0">

            <!-- Modelo 3D GLB -->
            <a-entity position="0 -0.3 0" gltf-model="modelos/RG008031_low.glb" scale="0.007 0.007 0.007" animation="property: rotation; to: 90 360 0; loop: true; dur: 9000;"></a-entity>

            <a-plane id="modelo-close" position="0.65 0.85 0.01" height="0.1" width="0.2" scale="0.1 0 1" material="color: red" class="raycastable">
                <a-text value="X" align="center" position="0 0 0.01" color="white" scale="0.5 0.5 0.5"></a-text>
            </a-plane>
            <a-plane position="0.5 -0.82 0.001" height="0.15" width="0.5" material="color: #73C1FA">
                <a-text value="Visualizar" align="center" position="0 0 0.01" color="white" scale="0.3 0.3 0.3"></a-text>
            </a-plane>

            <!-- Enlace invisible para hacer clic en el botón -->
            <a-link title="Visualizar Modelo" href="modelo.php" position="0.5 -0.82 0.01" scale="0.3 0.1 1" visible="false">
            </a-link>
        </a-entity>




        <!-- foto 360 -->
        <a-sky src="fotos360/new_city.jpg" rotation="0 200 0"></a-sky>
        <a-plane id="siguiente" position="0.65 0.7 0.01" height="0.1" width="0.2" scale="0.1 0 1" material="color: red" class="raycastable">
                <a-text value="X" align="center" position="0 0 0.01" color="white" scale="0.5 0.5 0.5"></a-text>
            </a-plane>
        <!-- assets son los recursos multimedia que se usaran -->
        <a-assets>
            <!-- esta es la imagen para el panel fotos -->
            <img id="pf-image-img" src="fotos/edificios.png" crossorigin="anonymous" />
            <!-- imagenes docs -->
            <img id="ficha-pdf-img" src="docs/fichap.png" crossorigin="anonymous" />
            <img id="image-pagos" src="docs/pagos.png" crossorigin="anonymous" />
            <!-- imagen del poster de fotos -->
            <img id="fotos-img-poster" src="iconos/fotos.png" crossorigin="anonymous" />
            <img id="fichap-img-poster" src="iconos/fichaPredial.png" crossorigin="anonymous" />
            <img id="pagos-img-poster" src="iconos/pagos.png" crossorigin="anonymous" />
            <img id="datos-img-poster" src="iconos/datos.png" crossorigin="anonymous" />
            <img id="modelo-img-poster" src="iconos/modelo.png" crossorigin="anonymous" />
            <img id="drone" src="iconos/drone.png" crossorigin="anonymous" />
            <!-- En A-Frame, un a-mixin es un componente que define un conjunto
                de propiedades y atributos que se pueden reutilizar en múltiples entidades en tu escena.
                Los mixins son una característica poderosa para la reutilización y la organización del código en A-Frame. -->
            <a-mixin id="p-poster" geometry="primitive: plane; width: 0.4; height: 0.4" material="color: white; shader: flat; transparent: true; opacity: 1" animation__scale="property: scale; to: 1.2 1.2 1.2; dur: 200; startEvents: mouseenter" animation__scale_reverse="property: scale; to: 1 1 1; dur: 200; startEvents: mouseleave" position="0 0 0.005"></a-mixin>
            <a-mixin id="p-drone" geometry="primitive: plane; width: 0.7; height: 0.7" material="color: white; shader: flat; transparent: true; opacity: 1" animation__scale="property: scale; to: 1.2 1.2 1.2; dur: 200; startEvents: mouseenter" animation__scale_reverse="property: scale; to: 1 1 1; dur: 200; startEvents: mouseleave" position="0 0 0.005"></a-mixin>

        </a-assets>
        <a-entity position="0 0 0">
            <!-- poster ficha evidencia predial -->
            <a-entity id="fichap-poster-button" position="3 -1 1" rotation="0 -80 0" mixin="p-poster" material="src: #fichap-img-poster" class="raycastable menu-button">
                <a-entity position="0 -0.3 0">
                    <!-- Texto con letra negra -->
                    <a-text value="Ficha Evidencia\nPredial" align="center" color="black" position="0 0 0.01" scale="0.5 0.5 0.5"></a-text>
                </a-entity>
            </a-entity>
            <!-- poster fotos -->
            <a-entity id="fotos-poster-button" position="2 -1 -1.5" rotation="0 -40 0" mixin="p-poster" material="src: #fotos-img-poster" class="raycastable menu-button">
                <a-entity position="0 -0.3 0">
                    <!-- Texto con letra negra -->
                    <a-text value="Fotos" align="center" color="black" position="0 0 0.01" scale="0.5 0.5 0.5"></a-text>
                </a-entity>
            </a-entity>
            <!-- Poster datos -->
            <a-entity id="datos-poster-button" position="0 -1 -2" mixin="p-poster" material="src: #datos-img-poster" class="raycastable ">
                <a-entity position="0 -0.3 0">
                    <!-- Texto con letra negra -->
                    <a-text value="Datos" align="center" color="black" position="0 0 0.01" scale="0.5 0.5 0.5"></a-text>
                </a-entity>
            </a-entity>
            <!-- poster pagos -->
            <a-entity id="pagos-poster-button" position="-2 -1 -1.5" rotation="0 30 0" mixin="p-poster" material="src: #pagos-img-poster" class="raycastable menu-button">
                <a-entity position="0 -0.3 0">
                    <!-- Texto con letra negra -->
                    <a-text value="Pagos" align="center" color="black" position="0 0 0.01" scale="0.5 0.5 0.5"></a-text>
                </a-entity>
            </a-entity>
            <!-- poster modelo -->
            <a-entity id="modelo-poster-button" position="-3 -1 1" rotation="0 80 0" mixin="p-poster" material="src: #modelo-img-poster" class="raycastable menu-button">
                <a-entity position="0 -0.3 0">
                    <!-- Texto con letra negra -->
                    <a-text value="Modelo 3D" align="center" color="black" position="0 0 0.01" scale="0.5 0.5 0.5"></a-text>
                </a-entity>
            </a-entity>
            <a-entity  position="0 2 -2" mixin="p-drone" material="src: #drone" class="raycastable" event-set__click="_target: #link; visible: true">
                 <a-entity position="0 -0.4 0">
                    <!-- Texto con letra negra -->
                    <a-text value="Recorrido Virtual" align="center" color="black" position="0 0 0.01" scale="0.5 0.5 0.5"></a-text>
                </a-entity>
            </a-entity>
        </a-entity>
        <!-- Enlace invisible para hacer clic en el botón -->
        <a-link id="link" href="recorrido.php" position="0 2 -2" scale="0.4 0.3 1" visible="false">
            </a-link>


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