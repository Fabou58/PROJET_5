Player = function(game, canvas) {

    // La scène du jeu
    this.scene = game.scene;

    // Initialisation de la caméra
    this._initCamera(this.scene, canvas);
};


Player.prototype = {

    _initCamera : function(scene, canvas) {
		// On crée la caméra
        this.camera = new BABYLON.ArcRotateCamera("ArcRotateCamera", 1, 0.8, 10, new BABYLON.Vector3(0, 0, 0), scene);

        // On demande à la caméra de regarder au point zéro de la scène
        this.camera.setTarget(BABYLON.Vector3.Zero());

        // On affecte le mouvement de la caméra au canvas
        this.camera.attachControl(canvas, true);
    }
};

Arena = function(game, engine) {

    // Appel des variables nécéssaires
    this.game = game;
    var scene = game.scene;
	
	  // Add lights to the scene
    var light1 = new BABYLON.HemisphericLight("light1", new BABYLON.Vector3(1, 1, 0), scene);
    var light2 = new BABYLON.PointLight("light2", new BABYLON.Vector3(0, 1, -1), scene);

    // Add and manipulate meshes in the scene
    var box = BABYLON.MeshBuilder.CreateBox("box", {height: 1, width: 0.75, depth: 0.25}, scene);


	return scene;
};

Game = function(canvasId) {

    // Canvas et engine défini ici
    var canvas = document.getElementById(canvasId);
    var engine = new BABYLON.Engine(canvas, true);
    var _this = this;

    // On initie la scène avec une fonction associé à l'objet Game
    this.scene = this._initScene(engine);
	var _player = new Player(_this, canvas);
	var _arena = new Arena(_this, engine);

    // Permet au jeu de tourner
    engine.runRenderLoop(function () {_this.scene.render();});

    // Ajuste la vue 3D si la fenetre est agrandi ou diminué
    window.addEventListener("resize", function (){ if (engine){ engine.resize(); } },false);
};



Game.prototype = {

    // Prototype d'initialisation de la scène
    _initScene : function(engine) {

        var scene = new BABYLON.Scene(engine);
        scene.clearColor=new BABYLON.Color3(0.9,0.9,0.9);
        return scene;
    }
};

// Page entièrement chargé, on lance le jeu
document.addEventListener("DOMContentLoaded", function () {

    new Game('renderCanvas');
	
}, false);