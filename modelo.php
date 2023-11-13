<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Recorrido Virtual</title>
    <meta name="description" content="Laser input UI • A-Frame">
    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="js/link-controls.js"></script>
    <script src="js/oculus-thumbstick-controls.js"></script>
</head>

<body>
    <a-scene environment cursor="rayOrigin: mouse; fuse: false" raycaster="far: 100; objects: a-link, .raycastable" renderer="antialias: true" webxr="referenceSpaceType: local" background="color: #FFF">
        <a-entity id="rig">
            <a-camera id="camera" camera="active: true" look-controls zoom-controls="min:5; max: 100" fov="100" position="0 0 0">

            </a-camera>

            <a-entity oculus-touch-controls="hand: left"></a-entity>
            <a-entity oculus-touch-controls="hand: right" oculus-thumbstick-controls></a-entity>
            <!-- los laser -->
            <a-entity id="leftHand" link-controls="hand: left" raycaster="objects: [mixin='box']"></a-entity>
            <a-entity id="rightHand" laser-controls="hand: right" raycaster="objects: .raycastable" line="color: #118A7E"></a-entity>

        </a-entity>
        <a-entity position="2 -3 -8" gltf-model="modelos/RG008031_low.glb" scale="0.07 0.07 0.07"></a-entity>
        <a-plane position="3 1.6 -4" height="0.15" width="0.5" material="color: red">
            <a-text value="Entrar" align="center" position="0 0 0.01" color="white" scale="0.3 0.3 0.3"></a-text>
        </a-plane>

        <!-- Enlace invisible para hacer clic en el botón -->
        <a-link title="Visualizar Modelo" href="foto.php" position="3 1.6 -4" scale="0.3 0.1 1" visible="false">
        </a-link>

    </a-scene>




</body>

</html>