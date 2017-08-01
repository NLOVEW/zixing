<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,hight=device-hight,minimum-scale=1.0,maximum-scale=1.0,ser-scalable=none"/>
<title>welcome</title>

<style type="text/css">
body { margin: 0; padding: 0; position: relative; background-image: url('/Public/Images/welcome/xh.jpg'); background-position: center;  width: 100%; height: 100%; background-size: 100% 100%; }
</style>
</head>
<body id="body" onLoad="init()">
<script type="text/javascript" src="/Public/Js/welcome_ThreeCanvas.js"></script>
<script type="text/javascript" src="/Public/Js/welcome_Snow.js"></script>
<script type="text/javascript">
	var SCREEN_WIDTH = window.innerWidth;//
	var SCREEN_HEIGHT = window.innerHeight;
	var container;
	var particle;//粒子

	var camera;
	var scene;
	var renderer;

	var starSnow = 1;

	var particles = []; 

	var particleImage = new Image();
	//THREE.ImageUtils.loadTexture( "img/ParticleSmoke.png" );
	particleImage.src = '/Public/Images/welcome/ParticleSmoke.png';
	

	function init() {
		//alert("message3");
		container = document.createElement('div');//container：画布实例;
		document.body.appendChild(container);

		camera = new THREE.PerspectiveCamera( 60, SCREEN_WIDTH / SCREEN_HEIGHT, 1, 10000 );
		camera.position.z = 1000;
		//camera.position.y = 50;

		scene = new THREE.Scene();
		scene.add(camera);
			
		renderer = new THREE.CanvasRenderer();
		renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
		var material = new THREE.ParticleBasicMaterial( { map: new THREE.Texture(particleImage) } );

		for (var i = 0; i < 500; i++) {

			particle = new Particle3D( material);
			particle.position.x = Math.random() * 2000-1000;
			
			particle.position.z = Math.random() * 2000-1000;
			particle.position.y = Math.random() * 2000-1000;
			particle.scale.x = particle.scale.y =  1;
			scene.add( particle );
			
			particles.push(particle); 
		}

		container.appendChild( renderer.domElement );
		document.addEventListener( 'touchstart', onDocumentTouchStart, false );
		document.addEventListener( 'touchmove', onDocumentTouchMove, false );
		document.addEventListener( 'touchend', onDocumentTouchEnd, false );
		
		setInterval( loop, 1000 / 60 );
		
	}

	var touchStartX;
	var touchFlag = 0;//储存当前是否滑动的状态;
	var touchSensitive = 80;//检测滑动的灵敏度;
	function onDocumentTouchStart( event ) {

		if ( event.touches.length == 1 ) {

			event.preventDefault();//取消默认关联动作;
			touchStartX = 0;
			touchStartX = event.touches[ 0 ].pageX ;
		}
	}


	function onDocumentTouchMove( event ) {

		if ( event.touches.length == 1 ) {
			event.preventDefault();
			var direction = event.touches[ 0 ].pageX - touchStartX;
			if (Math.abs(direction) > touchSensitive) {
				if (direction>0) {touchFlag = 1;}
				else if (direction<0) {touchFlag = -1;};
			}	
		}
	}

	function onDocumentTouchEnd (event) {

		var direction = event.changedTouches[ 0 ].pageX - touchStartX;

		changeAndBack(touchFlag);
	}


	function changeAndBack (touchFlag) {
		var speedX = 25*touchFlag;
		touchFlag = 0;
		for (var i = 0; i < particles.length; i++) {
			particles[i].velocity=new THREE.Vector3(speedX,-10,0);
		}
		var timeOut = setTimeout(";", 800);
		clearTimeout(timeOut);

		var clearI = setInterval(function () {
			if (touchFlag) {
				clearInterval(clearI);
				return;
			};
			speedX*=0.8;

			if (Math.abs(speedX)<=1.5) {
				speedX=0;
				clearInterval(clearI);
			};
			
			for (var i = 0; i < particles.length; i++) {
				particles[i].velocity=new THREE.Vector3(speedX,-10,0);
			}
		},100);


	}


	function loop() {
		for(var i = 0; i<particles.length; i++){
			var particle = particles[i]; 
			particle.updatePhysics(); 

			with(particle.position)
			{
				if((y<-1000)&&starSnow) {y+=2000;}

				if(x>1000) x-=2000; 
				else if(x<-1000) x+=2000;
				if(z>1000) z-=2000; 
				else if(z<-1000) z+=2000;
			}			
		}

		camera.lookAt(scene.position); 

		renderer.render( scene, camera );
	}
</script>
</body>
</html>