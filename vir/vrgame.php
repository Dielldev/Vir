<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://aframe.io/releases/0.5.0/aframe.min.js"></script>
<script src="https://cdn.rawgit.com/donmccurdy/aframe-extras/v1.16.0/dist/aframe-extras.min.js"></script>

<script>
  AFRAME.registerComponent('change-color-on-hover', {
    schema: {
      color: {default: 'red'}
    },
    init: function () {
      var data = this.data;
      var el = this.el;
      var defaultColor = el.getAttribute('material').color;
      el.addEventListener('mouseenter', function () {
        el.setAttribute('color', data.color);
      });
      el.addEventListener('mouseleave', function () {
        el.setAttribute('color', defaultColor);
      });
    }
  });

  AFRAME.registerComponent('collison-check', {
    schema: {
      el: {
        type: 'selector'
      },
      radius: {
        default: 0
      },
      otherRadius: {
        default: 0
      },
      score:{
        type: 'int',
        default: 0
      },
      colliding:{
        default: false
      }
    },
    tick: function () {
      var el1 = this.el;
      var el2 = this.data.el;
      var dist = el1.object3D.getWorldPosition().distanceTo(el2.object3D.getWorldPosition());
      var entity = document.querySelector('#score');
      if (dist < this.data.radius + this.data.otherRadius) {
        if (!this.data.colliding){
          this.data.score++;
          this.data.colliding = true;
          entity.emit('updateScore');
          AFRAME.utils.entity.setComponentProperty(entity, 'text.value', "score \n" + this.data.score);
        }
      } else {
        this.data.colliding = false;
      }
    }
  });
</script>
</head>

<body>
    <a href="index.php" style=" color:green; text-decoration:none;">go back</a>
  <a-scene>


    <a-entity id="duck1" position= "1 0 -3">
      <a-box color="#fdfd96" scale = "0.1 0.1 .1"> </a-box>
      <a-animation attribute="rotation" to="0 -360 0" repeat="indefinite" fill="both" easing="linear" dur="30000" > </a-animation>
      <a-box color="#fdfd96" scale = "0.1 0.1 .1"  position="0 0 1">
        <a-animation attribute="rotation" to="0 360 0"  easing="linear" dur="4000" begin="mouseenter" > </a-animation>
        <a-box color="#fdfd96" position="20 0 -10" change-color-on-hover="color: white" scale = "2 3 3" collison-check="el: #otherduck; radius: 0.15; other-radius: 0.15;"> </a-box>
      </a-box>
    </a-entity>

    <a-entity id="duck2" position= "-1.2 0 -3.3">
      <a-box color="#ca96fd" scale = "0.1 0.1 .1"> </a-box>
      <a-animation attribute="rotation" to="0 360 0" repeat="indefinite" fill="both" easing="linear" dur="40000" > </a-animation>
      <a-box color="#ca96fd" scale = "0.1 0.1 .1"  position="0 0 1">
        <a-animation attribute="rotation" to="0 360 0"  easing="linear" fill="both" dur="4000" begin="mouseenter" > </a-animation>
        <a-box id="otherduck" color="#ca96fd" position="0 0 -15" change-color-on-hover="color: white" scale = "3 3 2"></a-box>
      </a-box>
    </a-entity>

    <a-entity id="sign" position="2.5 1 -3.5" rotation="0 -30 0" text="width: 4; align: center; color: black; value: Make the ducks meet">
      <a-animation attribute="rotation" to="0 -390 0"  easing="linear" dur="2000" begin="mouseenter" > </a-animation>
      <a-box color="#fed6fa" position ="0 0 -0.05" scale="1.8 0.6 0.1"> </a-box>
      <a-box color="#fed6fa" position ="0 -0.7 -0.05" scale="0.1 1 0.1"> </a-box>
    </a-entity>

    <a-entity id="score" position="-2.5 1 -2" rotation="0 45 0" text="width: 4; align: center; color: black; value: Score \n 000">
      <a-animation attribute="rotation" to="0 405 0"  easing="linear" fill="both" dur="800" begin="updateScore" > </a-animation>
      <a-box color="#fed6fa" position ="0 0 -0.05" scale="0.8 0.6 0.1"> </a-box>
      <a-box color="#fed6fa" position ="0 -0.7 -0.05" scale="0.1 1 0.1"> </a-box>
    </a-entity>
     


    <a-plane id="ground" position="0 -0.1 0" rotation="-90 0 0" width="60" height="60" color="#7BC8A4"></a-plane>

    <a-entity id="pond" position ="0 0 -5">
      <a-ocean scale="1.5 1.2 0.2" material="color: #000000" density="20" opacity="0.8" speed="0.1"></a-ocean>
      <a-box position = "0 0 -6" scale="15 0.6 1" material="color: #ccccc7"></a-box>
      <a-box position = "0 0 6" scale="15 0.6 1" material="color: #ccccc7"></a-box>
      <a-box position = "7.85 -0.16 0" scale="1 0.6 13" rotation= " 0 0 -22" material="color: #ccccc7"></a-box>
      <a-box position = "-7.85 -0.16 0" scale="1 0.6 13" rotation= " 0 0 22" material="color: #ccccc7"></a-box>
    </a-entity>

    <a-camera position="0 0.2 1.3"><a-cursor></a-cursor></a-camera>

    <a-sky id="background" src="#skyTexture" theta-length="91" radius="30"></a-sky>

    <a-entity light="type: ambient; color: #FFF; intensity: 0.6"></a-entity>
    <a-entity light="type: directional; color: #FFF; intensity: 0.8" position="-0.5 5 4"></a-entity>


  </a-scene>
  <a href="index.php" style="color:white;">Back</a>
</body>
</html>