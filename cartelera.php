<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cartelera A-Frame</title>
  <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
</head>
<body>
  <a-scene>
    <!-- Plano para la cartelera -->
    <a-plane color="#333" width="3" height="1.5" position="0 2 -5"></a-plane>

    <!-- Texto "Cuenta: 123456" -->
    <a-entity
      text="value: Cuenta: 123456; color: white; align: center; wrapCount: 15; width: 3;"
      position="-1.5 2.5 -5"
    ></a-entity>

    <!-- Texto "Decarodo" -->
    <a-entity
      text="value: Decarodo; color: white; align: center; wrapCount: 15; width: 3;"
      position="-1.5 2 -5"
    ></a-entity>

    <!-- Luces y cámara -->
    <a-light type="ambient" color="#888"></a-light>
    <a-light type="directional" position="-5 5 5" target="#ground" intensity="0.5"></a-light>
    <a-camera position="0 2 0"></a-camera>

    <!-- Suelo -->
    <a-plane id="ground" color="#7BC8A4" rotation="-90 0 0" width="30" height="30"></a-plane>
  </a-scene>
</body>
</html>
