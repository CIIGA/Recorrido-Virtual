<?php
$cuenta=$_GET['cuenta'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Modelo 3D</title>
    <meta name="description" content="Laser input UI • A-Frame">
    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="jsDatos/link-controls.js"></script>
    <script src="js/oculus-xz-controls_modelo.js"></script>
    <script src="js/oculus-y-controls_modelo.js"></script>
</head>

<body>
    <a-scene environment cursor="rayOrigin: mouse; fuse: false" raycaster="far: 100; objects: a-link, .raycastable" renderer="antialias: true" webxr="referenceSpaceType: local" background="color: #87CEEB">
        <a-entity id="rig">
            <a-camera id="camera" camera="active: true" look-controls zoom-controls="min:5; max: 100" fov="100" position="0 0 0">

            </a-camera>

            <!-- para navegar con los joystick -->
            <a-entity oculus-touch-controls="hand: left" oculus-xz-controls></a-entity>
            <a-entity oculus-touch-controls="hand: right" oculus-y-controls></a-entity>
            <!-- los laser -->
            <a-entity id="leftHand" link-controls="hand: left" raycaster="objects: [mixin='box']"></a-entity>
            <a-entity id="rightHand" laser-controls="hand: right" raycaster="objects: .raycastable" line="color: #118A7E"></a-entity>

        </a-entity>
        <?php if ($cuenta=='RG008031') { ?>
            <a-entity position="2 -3 -8" gltf-model="modelos/<?php echo $cuenta ?>.glb" scale="0.07 0.07 0.07"></a-entity>
        <?php } else { ?>
            <a-entity position="2 -3 -8" gltf-model="modelos/<?php echo $cuenta ?>.glb" scale="2 2 2"></a-entity>
        <?php } ?>
        <a-plane position="3 1.6 -4" height="0.3" width="1.5" material="color: #73C1FA">
            <a-text value="Foto 360" align="center" position="0 0 0.01" color="white" scale="0.6 0.6 0.6"></a-text>
        </a-plane>

        <!-- Enlace invisible para hacer clic en el botón -->
        <a-link title="Foto 360" href="foto.php?cuenta=<?php echo $cuenta ?>" position="3 1.6 -4" scale="0.6 0.2 1" visible="false">
        </a-link>

    </a-scene>




</body>

</html>