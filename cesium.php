<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Recorrido Virtual</title>
    <meta name="description" content="Laser input UI • A-Frame">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="js/aframe-tooltip-component.js"></script>
    <script src="js/oculus-thumbstick-controls.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.0/examples/js/utils/WorkerPool.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.0/examples/js/loaders/KTX2Loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aframe-loader-3dtiles-component/dist/aframe-loader-3dtiles-component.min.js">
    </script>
</head>

<body>
    <a-scene environment cursor="rayOrigin: mouse; fuse: false" raycaster="far: 10000; objects: a-link, .raycastable" renderer="antialias: true" webxr="referenceSpaceType: local">
        <a-entity id="rig">
            <a-camera id="camera" camera="active: true" look-controls zoom-controls="min:5; max: 100" fov="100" position="0 0 0">

            </a-camera>
            <!-- <a-entity id="camera" camera="active: true" look-controls zoom-controls="min:5; max: 140" fov="100" position="0 0 0"></a-entity>     -->

            <!-- para navegar con los joystick -->
            <a-entity oculus-touch-controls="hand: left"></a-entity>
            <a-entity oculus-touch-controls="hand: right" oculus-thumbstick-controls></a-entity>
            <!-- los laser -->
            <a-entity id="leftHand" link-controls="hand: left" raycaster="objects: [mixin='box']"></a-entity>
            <a-entity id="rightHand" laser-controls="hand: right" raycaster="objects: .raycastable" line="color: #118A7E"></a-entity>
            

        </a-entity>

        <a-entity id="freeman-tiles" position="2700 7530 5700" rotation="-90 180 0" scale="1 1 1" loader-3dtiles="
            url: https://assets.ion.cesium.com/us-east-1/2271430/tileset.json?v=2;
            maximumSSE: 16;
            distanceScale: 2;
            cesiumIONToken:eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI2MWM0MmE0ZC01NGRhLTQyNGEtYjhkNC02NDczMTg1YTU5Y2MiLCJpZCI6MTY0OTQxLCJpYXQiOjE2OTYwMTI2NTd9.2RgcBxTvGwfwWgWRQm6gGg4B9-uVVNlBRh0M6N-SzY8;
        ">
        </a-entity>
        
</a-entity>
        


    </a-scene>
    


</body>

</html>