<!DOCTYPE html>
<html>
  <head>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
  </head>
  <body>
  <a-scene environment="preset: forest"></a-scene>

  <a-camera id="camera" camera="active: true" wasd-controls="acceleration: 1000" position-controls="minY: -50; maxY: 500; sensitivity: 2.0" position="0 1.6 0" rotation="0 0 0">

<a-text value="Hello VR"
        width="4"
        id="score"
        color="black"
        font="mozillavr"
        position="0 -.5 -1"
        anchor="center"
        align="center"
        look-at="#camera"> <!-- Agregamos el componente look-at -->
</a-text>

</a-camera>
    

      <!-- Otros elementos de la escena -->

    </a-scene>
  </body>
</html>
