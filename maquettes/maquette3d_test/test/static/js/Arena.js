/*Arena = function(game, engine) {

    // Appel des variables nécéssaires
    this.game = game;
    var scene = game.scene;
	
    // Création de notre lumière principale
    var light = new BABYLON.HemisphericLight("light1", new BABYLON.Vector3(0, 1, 0), scene);

    // Créons une sphère 
    var sphere = BABYLON.Mesh.CreateSphere("sphere1", 2, 2, scene);

    // Remontons le sur l'axe y de la moitié de sa hauteur
    //sphere.position.y = 1;

    // Ajoutons un sol pour situer la sphere dans l'espace
    //var ground = BABYLON.Mesh.CreateGround("ground1", 6, 6, 2, scene);
	
	//BABYLON.SceneLoader.ImportMesh("test2", "./assets/", "test2.babylon", scene, function (newMeshes, particleSystems) { 
	//	var test2 = newMeshes[0];  
	//	test2.scaling(1,1,1);
	//});
	
	//BABYLON.SceneLoader.Load("./assets/", "test2.babylon", engine, function (newScene) {
	//});
		//------------------------------------------------------------------------------------------------------------------------------
	//Formulaire
	// GUI
    var advancedTexture = BABYLON.GUI.AdvancedDynamicTexture.CreateFullscreenUI("UI");
    
    var input = new BABYLON.GUI.InputText();
	input.width = 0.2;
	input.maxWidth = 0.2;
	input.left = 600;
	input.top = 0;
	input.height = "40px";
	input.text = "longueur";
	input.color = "white";
	input.background = "green";
	advancedTexture.addControl(input);
    
    var input2 = new BABYLON.GUI.InputText();
	input2.width = 0.2;
	input2.maxWidth = 0.2;
	input2.left = 600;
	input2.top = 50;
	input2.height = "40px";
	input2.text = "largeur";
	input2.color = "white";
	input2.background = "green";
	advancedTexture.addControl(input2);
	
	var button1 = BABYLON.GUI.Button.CreateSimpleButton("but1", "Click Me");
    button1.width = "150px"
    button1.height = "40px";
    button1.color = "white";
    button1.cornerRadius = 20;
	button1.left = 600;
	button1.top = 100;
    button1.background = "green";
    button1.onPointerUpObservable.add(function() {
        alert("longueur : " + input.text + "\nlargueur : " + input2.text);
    });
    advancedTexture.addControl(button1); 
	
	// Création appart
	var lon = 11;
	var lar = 7;
	
	return scene;

};*/
Arena = function(game) {
    // Appel des variables nécéssaires
    this.game = game;
    var scene = game.scene;

    // Création de notre lumière principale
    var light = new BABYLON.HemisphericLight("light1", new BABYLON.Vector3(0, 10, 0), scene);
    var light2 = new BABYLON.HemisphericLight("light2", new BABYLON.Vector3(0, -1, 0), scene);
    light2.intensity = 0.8;

    // Material pour le sol
    var materialGround = new BABYLON.StandardMaterial("wallTexture", scene);
    materialGround.diffuseTexture = new BABYLON.Texture("assets/images/tile.jpg", scene);
    materialGround.diffuseTexture.uScale = 8.0;
    materialGround.diffuseTexture.vScale = 8.0;

    // Material pour les objets
    var materialWall = new BABYLON.StandardMaterial("groundTexture", scene);
    materialWall.diffuseTexture = new BABYLON.Texture("assets/images/tile.jpg", scene);

    var boxArena = BABYLON.Mesh.CreateBox("box1", 100, scene, false, BABYLON.Mesh.BACKSIDE);
    boxArena.material = materialGround;
    boxArena.position.y = 50 * 0.3;
    boxArena.scaling.y = 0.3;
    boxArena.scaling.z = 0.8;
    boxArena.scaling.x = 3.5;
	boxArena.checkCollisions = true;
	
	var testRamp = BABYLON.Mesh.CreateBox("ramp", 100, scene, false);
	testRamp.rotation.z = 0.5;
	testRamp.position.x = 5;
	testRamp.checkCollisions = true;

    var columns = [];
    var numberColumn = 6;
    var sizeArena = 100*boxArena.scaling.x -50;
    var ratio = ((100/numberColumn)/100) * sizeArena;
    for (var i = 0; i <= 1; i++) {
        if(numberColumn>0){
            columns[i] = [];
            let mainCylinder = BABYLON.Mesh.CreateCylinder("cyl0-"+i, 30, 5, 5, 20, 4, scene);
            mainCylinder.position = new BABYLON.Vector3(-sizeArena/2,30/2,-20 + (40 * i));
            mainCylinder.material = materialWall;
			mainCylinder.checkCollisions = true;
            columns[i].push(mainCylinder);

            if(numberColumn>1){
                for (let y = 1; y <= numberColumn - 1; y++) {
                    let newCylinder = columns[i][0].clone("cyl"+y+"-"+i);
                    newCylinder.position = new BABYLON.Vector3(-(sizeArena/2) + (ratio*y),30/2,columns[i][0].position.z);
					newCylinder.checkCollisions = true;
                    columns[i].push(newCylinder);
                }
            }
        }
    }
};