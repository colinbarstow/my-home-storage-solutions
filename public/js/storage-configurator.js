import LinearDimension from './LinearDimension.js';
import * as THREE from './three.js-master/build/three.module.js';
import {GLTFLoader} from './three.js-master/examples/jsm/loaders/GLTFLoader.js'
import {OrbitControls} from './three.js-master/examples/jsm/controls/OrbitControls.js';
import {DragControls} from './three.js-master/examples/jsm/controls/DragControls.js';


const canvas = document.getElementById('canvas-3d');
const scene = new THREE.Scene();
const loader = new GLTFLoader();
const boundingBox = new THREE.Box3()
const textureLoader = new THREE.TextureLoader();

let pmremGenerator, orbitControls, dragControls;
let contextMenu = document.getElementById('context-menu');
let contextMenuFinishButton = document.getElementById('contextMenuFinishButton');
let resetCameraButton = document.getElementById('resetCameraButton');
let contextMenuCloseButton = document.getElementById('contextMenuCloseButton');
let modelUrl

let baseColour, normalMap, heightMap, roughnessMap, ambientOcclusionMap;

let minimumWidth, minimumHeight, minimumDepth, maximumWidth, maximumHeight, maximumDepth;
let partitionCount = 0;

minusWidth.addEventListener('click', decreaseWidth);
plusWidth.addEventListener('click', increaseWidth);
minusHeight.addEventListener('click', decreaseHeight);
plusHeight.addEventListener('click', increaseHeight);
minusDepth.addEventListener('click', decreaseDepth);
plusDepth.addEventListener('click', increaseDepth);


const floor = new THREE.Mesh(new THREE.BoxBufferGeometry(),
    new THREE.MeshPhongMaterial({
        color: 0xbfd1e5,
        transparent: true,
        opacity:0.3
    })
);


scene.background = new THREE.Color(0xffffff);

const sizes = {
    width: window.innerWidth,
    height: window.innerHeight,
}

const camera = new THREE.PerspectiveCamera(50, sizes.width/sizes.height,0.1,100)
scene.add(camera)

const renderer = new THREE.WebGLRenderer({canvas:canvas})

renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(sizes.width, sizes.height)
renderer.shadowMap.enabled = true;
renderer.toneMapping = THREE.ACESFilmicToneMapping;
renderer.toneMappingExposure = 1;
renderer.outputEncoding = THREE.sRGBEncoding;
// renderer.setClearColor( 0xffffff, 1 );

pmremGenerator = new THREE.PMREMGenerator(renderer);
pmremGenerator.compileEquirectangularShader();

camera.position.set(0,0.7,4)

const hemLight = new THREE.AmbientLight(0xffffff,0.60);
scene.add(hemLight);


const light = new THREE.DirectionalLight(0xffffff,1)
light.position.set(-2,2,-8)
scene.add(light)
light.castShadow = true;
light.shadow.mapSize.width = 2048;
light.shadow.mapSize.height = 2048;
light.shadow.camera.left = -70;
light.shadow.camera.right = 70;
light.shadow.camera.top = 70;
light.shadow.camera.bottom = -70;

// get the direction of the camera
const direction = new THREE.Vector3();
camera.getWorldDirection(direction);

orbitControls = new OrbitControls( camera, renderer.domElement );
orbitControls.enableZoom = false;
orbitControls.enablePan = false;
orbitControls.minPolarAngle = Math.PI/3; // radians
orbitControls.maxPolarAngle = Math.PI/2; // radians
orbitControls.minAzimuthAngle = - Math.PI / 4; // radians
orbitControls.maxAzimuthAngle = Math.PI / 4; // radians
camera.getWorldPosition(orbitControls.target);
orbitControls.target.addScaledVector(direction, 5);
orbitControls.saveState()
orbitControls.update();

floor.position.set(0,-0.1,0)
floor.scale.set(3,0.1,3)
floor.castShadow = true;
floor.receiveShadow = true;
scene.add(floor);

floor.userData.ground = true;


function resetCamera() {
    orbitControls.reset()
}

function removeCurrentModelAndLoadNewModel(modelUrl){
    if(canSwitchModelTypes()){
        destroyCurrentModel()
        loadModel(modelUrl);
    }
}

function canSwitchModelTypes()
{
    return true;
}

function destroyCurrentModel()
{
    let selectedObject = scene.getObjectByName('current_model');
    scene.remove( selectedObject );
}


let leftPanel;
let leftPanelPosition;
let leftPanelScale;

let rightPanel;
let rightPanelPosition;
let rightPanelScale;

let topPanel
let topPanelPosition;
let topPanelScale;

let floorPanel;
let floorPanelPosition;
let floorPanelScale;

let frontKickPanel;
let frontKickPanelPosition;
let frontKickPanelScale;

let backKickPanel;
let backKickPanelPosition;
let backKickPanelScale;

let partition;
let partition2;
let partition3;
let partitionYPosition;

let topDoorRail;
let bottomDoorRail;
let twoSlidingDoorLeft;
let twoSlidingDoorRight;

let innerWidth;
let innerWidthConverted;
let outerWidth;
let outerWidthConverted;

let innerHeight;
let innerHeightConverted;
let outerHeight;
let outerHeightConverted;

let depth;
let depthConverted;

let draggableObjects = [];

function convertNumber(number)
{
    return Number((number).toFixed(3))
}

function defineMeasurements()
{
    innerWidth = convertNumber(rightPanelPosition.x-leftPanelPosition.x);
    innerWidthConverted = innerWidth*1000; //converted to mms

    outerWidth = convertNumber(convertNumber(leftPanelScale.x*2)+convertNumber(leftPanelScale.x*2)+innerWidth);
    outerWidthConverted = outerWidth*1000; //converted to mms

    outerHeight = convertNumber(leftPanelScale.y*2);
    outerHeightConverted = outerHeight*1000; //converted to mms

    innerHeight = convertNumber(partition.scale.y*2);
    innerHeightConverted = innerHeight*1000; //converted to mms

    depth = convertNumber(leftPanelScale.z*2);
    depthConverted = depth*1000;
}

for (let a = 0; a < unitStyleSelectors.length; a++) {
    unitStyleSelectors[a].addEventListener('click', ajaxRequest, false);
}

function ajaxRequest()
{
    let modelId = this.dataset.id;

    let httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
        alert('Giving up :( Cannot create an XMLHTTP instance');
        return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('GET', 'load-unit-style/' + modelId);
    httpRequest.send();

    function alertContents() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                loadModel(JSON.parse(httpRequest.responseText));
            } else {
                alert('There has been an issue.');
            }
        }
    }
}

let loadedModel;

//Load the selected model and define the outer panels of its structure.
function loadModel(model)
{
    destroyCurrentModel();
    loadedModel = model.data;
    baseColour = textureLoader.load('../textures/bc.jpg');
    normalMap = textureLoader.load('../textures/n.jpg');
    heightMap = textureLoader.load('../textures/h.png');
    roughnessMap = textureLoader.load('../textures/r.jpg');
    ambientOcclusionMap = textureLoader.load('../textures/ao.jpg');

    loader.load(loadedModel.model, function (glb) {

        minimumWidth = loadedModel.minimum_width;
        maximumWidth = loadedModel.maximum_width;
        minimumHeight = loadedModel.minimum_height;
        maximumHeight = loadedModel.maximum_height;
        minimumDepth = loadedModel.minimum_depth;
        maximumDepth = loadedModel.maximum_depth;

        const root = glb.scene;

        root.name = 'current_model'

        boundingBox.setFromObject(root);

        root.traverse( function ( child ) {
            if( child.name === "leftPanel" ){
                leftPanel = child;
                leftPanel.userData.draggable = true;
                leftPanelPosition = child.position;
                leftPanelScale = child.scale;
                draggableObjects.push(leftPanel);
                leftPanel.userData.dimension = true;
                leftPanel.userData.width = true;
                leftPanel.userData.limit = {
                    min: new THREE.Vector3(convertNumber(-Math.abs(((maximumWidth/2)-(6))/1000)), leftPanel.position.y, leftPanel.position.z),
                    max: new THREE.Vector3(convertNumber(-Math.abs(((minimumWidth/2)-(6))/1000)), leftPanel.position.y, leftPanel.position.z)
                };
                applyMaterial(leftPanel);
            }

            if( child.name === "rightPanel" ){
                rightPanel = child;
                rightPanel.userData.draggable = true;
                rightPanelPosition = child.position;
                rightPanelScale = child.scale;
                draggableObjects.push(rightPanel);
                rightPanel.userData.dimension = true;
                rightPanel.userData.width = true;
                rightPanel.userData.limit = {
                    min: new THREE.Vector3(convertNumber(Math.abs(((minimumWidth/2)-(6))/1000)), rightPanel.position.y, rightPanel.position.z),
                    max: new THREE.Vector3(convertNumber(Math.abs(((maximumWidth/2)-(6))/1000)), rightPanel.position.y, rightPanel.position.z)
                };
                applyMaterial(rightPanel);
            }

            if( child.name === "topPanel" ){
                topPanel = child;
                topPanel.userData.draggable = true;
                topPanelPosition = child.position;
                topPanelScale = child.scale;
                draggableObjects.push(topPanel);
                topPanel.userData.dimension = true;
                topPanel.userData.height = true;
                topPanel.userData.limit = {
                    min: new THREE.Vector3(topPanel.position.x, convertNumber(Math.abs(minimumHeight/1000)), topPanel.position.z),
                    max: new THREE.Vector3(topPanel.position.x, convertNumber(Math.abs(maximumHeight/1000)), topPanel.position.z)
                };
                applyMaterial(topPanel);
            }

            if( child.name === "floorPanel" ){
                floorPanel = child;
                floorPanel.userData.draggable = true;
                floorPanelPosition = child.position;
                floorPanelScale = child.scale;
                applyMaterial(floorPanel);
            }

            if( child.name === "frontKickPanel" ){
                frontKickPanel = child;
                frontKickPanel.userData.draggable = true;
                frontKickPanelPosition = child.position;
                frontKickPanelScale = child.scale;
                applyMaterial(frontKickPanel);
            }

            if( child.name === "backKickPanel" ){
                backKickPanel = child;
                backKickPanel.userData.draggable = true;
                backKickPanelPosition = child.position;
                backKickPanelScale = child.scale;
                applyMaterial(backKickPanel);
            }

            if(loadedModel.can_have_partitions){
                if( child.name === "partition" ){
                    partition = child;
                    partition.visible = false;
                    partition.userData.break_point = loadedModel.partition_rules[0].break_point;
                    applyMaterial(partition);
                    draggableObjects.push(partition);
                    for(let b = 2; b <= loadedModel.maximum_partitions; b++){
                        if(b === 2){
                            clonePartition2Object(loadedModel.partition_rules[b-1].break_point)
                            root.add(partition2);
                        } else if(b === 3){
                            clonePartition3Object(loadedModel.partition_rules[b-1].break_point)
                            root.add(partition3);
                        }
                    }
                }
            }


            if( child.name === "topDoorRail" ){
                topDoorRail = child;
                draggableObjects.push(topDoorRail);
                topDoorRail.visible = false;
            }

            if( child.name === "bottomDoorRail" ){
                bottomDoorRail = child;
                draggableObjects.push(bottomDoorRail);
                bottomDoorRail.visible = false;
            }

            if( child.name === "twoSlidingDoorLeft" ){
                twoSlidingDoorLeft = child;
                draggableObjects.push(twoSlidingDoorLeft);
                twoSlidingDoorLeft.visible = false;
            }

            if( child.name === "twoSlidingDoorRight" ){
                twoSlidingDoorRight = child;
                draggableObjects.push(twoSlidingDoorRight);
                twoSlidingDoorRight.visible = false;
            }
        });


        defineMeasurements();

        updateWidthInputValue()
        updateDepthInputValue()
        updateHeightInputValue()



        scene.add(root)


    }, function (xhr) {

    }, function (error) {
        console.log(error)
    })
}

function clonePartition2Object(breakPoint)
{
    partition2 = partition.clone();
    partition2.name = 'partition2';
    partition2.userData.break_point = breakPoint;
    partition2.visible = false;
    draggableObjects.push(partition2);
    applyMaterial(partition2);
}

function clonePartition3Object(breakPoint)
{
    partition3 = partition.clone();
    partition3.name = 'partition2';
    partition3.userData.break_point = breakPoint;
    partition3.visible = false;
    draggableObjects.push(partition3);
    applyMaterial(partition3);
}

function applyMaterial(object)
{
    object.material = new THREE.MeshStandardMaterial(
        {
            map: baseColour,
            normalMap: normalMap,
            // displacementMap: heightMap,
            // displacementScale: 0.5,
            roughnessMap: roughnessMap,
            roughness: 0.5,
            aoMap: ambientOcclusionMap

        }
    )
    object.geometry.attributes.uv2 = object.geometry.attributes.uv;
    object.castShadow = true;
    object.receiveShadow = true;
}

let draggingObject;
let draggingObjectStartMaterial;
let draggingObjectZ;
let draggingObjectY;
let draggingObjectX;
let sliderValue = document.getElementById('sliderValue');
let sliderInput = document.getElementById('sliderInput');
let initialXPosition;

//refactored
dragControls = new DragControls(draggableObjects, camera, renderer.domElement);

dragControls.addEventListener( 'dragstart', function ( event ) {
    orbitControls.enabled = false;
    draggingObject              = scene.getObjectByName(event.object.name);
    draggingObjectZ             = draggingObject.position.z;
    draggingObjectY             = draggingObject.position.y;
    draggingObjectX             = draggingObject.position.x;
    initialXPosition            = draggingObject.position.x;
    draggingObjectStartMaterial = draggingObject.material.color.getHex()
    event.object.material.color.setHex(0x000000);

    //
    // //todo move this into its own script
    // footer.style.display = 'block';
    // positionSlider.style.display = 'block';
    // sliderValue.innerText = Math.round(draggingObject.position.x*1000, 0);
});

dragControls.addEventListener ( 'drag', function( event ){

    event.object.position.z = draggingObjectZ;

    if(draggingObject.userData.component){
        event.object.position.x = draggingObjectX;
    } else {
        if(draggingObject.userData.dimension){
            if(draggingObject.userData.width) {
                event.object.position.y = draggingObjectY;
                partitionYPosition = partition.position.y;
                if (draggingObject.position.x <= draggingObject.userData.limit.min.x) {
                    event.object.position.x = draggingObjectX = draggingObject.userData.limit.min.x;

                    errorBlock.style.display = 'block';
                    errorBlock.innerText = 'Position limit reached';
                } else {

                    errorBlock.style.display = 'none';
                    errorBlock.innerText = '';
                }

                if (draggingObject.position.x >= draggingObject.userData.limit.max.x) {
                    draggingObjectX = draggingObject.userData.limit.max.x;
                    event.object.position.x = draggingObjectX;
                    //show the error block with message
                    errorBlock.style.display = 'block';
                    errorBlock.innerText = 'Position limit reached';
                } else {
                    //hide the error box and clear the message
                    errorBlock.style.display = 'none';
                    errorBlock.innerText = '';
                }
                showFooter();
            } else {
                event.object.position.x = draggingObjectX;
                if (draggingObject.position.y <= draggingObject.userData.limit.min.y) {
                    outerHeight = event.object.position.y = draggingObjectY = Number((draggingObject.userData.limit.min.y).toFixed(3));
                    //show the error block with message
                    errorBlock.style.display = 'block';
                    errorBlock.innerText = 'Position limit reached';
                } else {
                    outerHeight = Number((event.object.position.y).toFixed(3));
                    errorBlock.style.display = 'none';
                    errorBlock.innerText = '';
                }

                if (draggingObject.position.y >= draggingObject.userData.limit.max.y) {
                    outerHeight = event.object.position.y = draggingObjectY = Number((draggingObject.userData.limit.max.y).toFixed(3));
                    //show the error block with message
                    errorBlock.style.display = 'block';
                    errorBlock.innerText = 'Position limit reached';
                } else {
                    outerHeight = Number((event.object.position.y).toFixed(3));
                    errorBlock.style.display = 'none';
                    errorBlock.innerText = '';
                }

                partitionYPosition = partition.position.y;


            }

            updateModelScaleFromDragEvent(event.object)

        } else {

            event.object.position.y = draggingObjectY;

            if(draggingObject.position.x < draggingObject.userData.limit.min.x){
                draggingObjectX = draggingObject.userData.limit.min.x;
                event.object.position.x = draggingObjectX;
            }

            if(draggingObject.position.x > draggingObject.userData.limit.max.x){
                draggingObjectX = draggingObject.userData.limit.max.x;
                event.object.position.x = draggingObjectX;
            }

            sliderValue.innerText = Math.round(draggingObject.position.x*1000, 0);

            updateComponentSpaceDetectors();

        }
    }


})

dragControls.addEventListener( 'dragend', function ( event ) {
    orbitControls.enabled = true;
    event.object.material.color.setHex(draggingObjectStartMaterial);
    footer.style.display = 'none';
});

function updateModelScaleFromDragEvent(object) {
    let panelsNewXPosition
    let panelsNewYPosition;

    if(object.name === 'leftPanel' || object.name === 'rightPanel') {
        panelsNewXPosition = Number(((rightPanelPosition.x + leftPanelPosition.x) / 2).toFixed(3));
        panelsNewYPosition = topPanelPosition.y
    } else {
        panelsNewYPosition = object.position.y;
        panelsNewXPosition = Number(((rightPanelPosition.x + leftPanelPosition.x) / 2).toFixed(3));
    }

    innerWidth = Number((rightPanelPosition.x-leftPanelPosition.x).toFixed(3)); //to 3 decimal places.
    innerWidthConverted = innerWidth*1000; //converted to mms

    leftPanelScale.y = rightPanelScale.y = outerHeight/2;

    let ls = Number(leftPanelScale.y.toFixed(3));
    let fs = Number(floorPanelScale.y.toFixed(3));
    let ts = Number(topPanelScale.y.toFixed(3));
    let fks = Number(frontKickPanelScale.y.toFixed(3));

    if(loadedModel.can_have_partitions){
        let partitionYScale = Number((ls-(fs-ts)-fks).toFixed(3))
        partitionYPosition = Number(((outerHeight/2)+(frontKickPanelScale.y)).toFixed(3));

        if(partition.visible){
            partition.scale.y =  partitionYScale
            partition.position.y = partitionYPosition
        }

        if(loadedModel.maximum_partitions > 1){
            if(partition2.visible){
                partition2.scale.y = partitionYScale;
                partition2.position.y = partitionYPosition
            }
        }


        if(loadedModel.maximum_partitions > 2){
            if(partition3.visible){
                partition3.scale.y = partitionYScale;
                partition3.position.y = partitionYPosition
            }
        }
    }


    topPanelScale.x = innerWidth/2;
    floorPanelScale.x = innerWidth/2;
    frontKickPanelScale.x = innerWidth/2;
    // backKickPanelScale.x = innerWidth/2;

    topPanelPosition.x = panelsNewXPosition
    topPanelPosition.y = panelsNewYPosition;
    floorPanelPosition.x = panelsNewXPosition
    frontKickPanelPosition.x = panelsNewXPosition


    leftPanelPosition.y = Number(outerHeight/2)
    rightPanelPosition.y = Number(outerHeight/2)

    outerWidth = Number((Number((leftPanelScale.x*2).toFixed(3))+Number((leftPanelScale.x*2).toFixed(3))+innerWidth).toFixed(3));
    outerWidthConverted = outerWidth*1000; //converted to mms

    outerHeight = Number(leftPanelScale.y*2).toFixed(3);
    outerHeightConverted = outerHeight*1000; //converted to mms

    depth = Number(leftPanelScale.z*2).toFixed(3);
    depthConverted = depth*1000;

    updateWidthInputValue()
    updateDepthInputValue()
    updateHeightInputValue()
    showPartitions()
}

function showPartitions(){

    if(loadedModel.can_have_partitions){

        if(innerWidthConverted > partition.userData.break_point){

            partition.visible = true;

            partition.position.set(topPanelPosition.x, partition.position.y, partition.position.z)

            partition.userData.limit = {
                min: new THREE.Vector3((leftPanelPosition.x+(innerWidth/3)), partition.position.y, partition.position.z),
                max: new THREE.Vector3((leftPanelPosition.x+((innerWidth/3)*2)), partition.position.y, partition.position.z)
            };

            if(loadedModel.maximum_partitions > 1){
                if(outerWidthConverted > partition2.userData.break_point){

                    let gapsBetweenSegments = innerWidth/3

                    partition.position.set((leftPanelPosition.x+gapsBetweenSegments),partitionYPosition, partition.position.z)

                    partition.userData.limit = {
                        min: new THREE.Vector3((leftPanelPosition.x+(innerWidth/4)), partition.position.y, partition.position.z),
                        max: new THREE.Vector3((leftPanelPosition.x+((innerWidth/4)*2)), partition.position.y, partition.position.z)
                    };

                    partition2.visible = true

                    partition2.position.set((leftPanelPosition.x+(gapsBetweenSegments*2)),partitionYPosition, partition.position.z)

                    partition2.userData.limit = {
                        min: new THREE.Vector3((leftPanelPosition.x+((innerWidth/4)*2)), partition.position.z),
                        max: new THREE.Vector3((leftPanelPosition.x+((innerWidth/4)*3)), partition.position.y, partition.position.z)
                    };

                    if(loadedModel.maximum_partitions > 2) {
                        if (outerWidthConverted > partition3.userData.break_point) {
                            let gapsBetweenSegments = innerWidth / 4
                            partition.position.set((leftPanelPosition.x + gapsBetweenSegments), partitionYPosition, partition.position.z)
                            partition.userData.limit = {
                                min: new THREE.Vector3((leftPanelPosition.x + (innerWidth / 5)), partition.position.y, partition.position.z),
                                max: new THREE.Vector3((leftPanelPosition.x + ((innerWidth / 5) * 2)), partition.position.y, partition.position.z)
                            };

                            partition2.position.set((leftPanelPosition.x + (gapsBetweenSegments * 2)), partitionYPosition, partition.position.z)
                            partition2.userData.limit = {
                                min: new THREE.Vector3((leftPanelPosition.x + ((innerWidth / 5) * 2)), partition.position.y, partition.position.z),
                                max: new THREE.Vector3((leftPanelPosition.x + ((innerWidth / 5) * 3)), partition.position.y, partition.position.z)
                            };

                            partition3.visible = true
                            partition3.position.set((leftPanelPosition.x + (gapsBetweenSegments * 3)), partitionYPosition, partition.position.z)
                            partition3.userData.limit = {
                                min: new THREE.Vector3((leftPanelPosition.x + ((innerWidth / 5) * 3)), partition.position.y, partition.position.z),
                                max: new THREE.Vector3((leftPanelPosition.x + ((innerWidth / 5) * 4)), partition.position.y, partition.position.z)
                            };
                        } else {
                            partition3.visible = false
                        }
                    }
                } else {
                    partition2.visible = false
                }
            }
        } else {
            partition.visible = false;
        }

        updatePartitionCounterElement()
        updateComponentSpaceDetectors();
    }
}

const boundingBoxOne = new THREE.Mesh(new THREE.BoxBufferGeometry(),
    new THREE.MeshPhongMaterial({color: 0xFF0000, transparent: true, opacity:0.1}))

const boundingBoxTwo = new THREE.Mesh(new THREE.BoxBufferGeometry(),
    new THREE.MeshPhongMaterial({color: 0x00FF00, transparent: true, opacity:0.1}))

const boundingBoxThree = new THREE.Mesh(new THREE.BoxBufferGeometry(),
    new THREE.MeshPhongMaterial({color: 0x0000FF, transparent: true, opacity:0.1}))

const boundingBoxFour = new THREE.Mesh(new THREE.BoxBufferGeometry(),
    new THREE.MeshPhongMaterial({color: 0xf9c834, transparent: true, opacity:0.1}))

let pw;
let iwwp;
let gw;
let bb1X;
let bb1XPos;
let bb2X;
let bb2XPos;
let bb3X;
let bb3XPos;
let bb4X;
let bb4XPos;

function updateComponentSpaceDetectors()
{

    pw = Number((partition.scale.x*2).toFixed(3));

    if(loadedModel.maximum_partitions > 2) {
        if (partition3.visible) {

            if (Math.sign(partition.position.x) === -1) {
                bb1X = Math.abs(Number((leftPanelPosition.x - (partition.position.x - 0.006)).toFixed(3)));
            } else {
                bb1X = Number((partition.position.x + (leftPanelPosition.x - 0.006)).toFixed(3));
            }
            bb1XPos = leftPanelPosition.x + ((bb1X / 2) + 0.003)

            if (Math.sign(partition2.position.x) === -1) {
                bb2X = Math.abs(Number((partition.position.x - (partition2.position.x - 0.006)).toFixed(3)));
            } else {
                if (Math.sign(partition.position.x) === -1) {
                    bb2X = Math.abs(Number((partition.position.x - (partition2.position.x - 0.006)).toFixed(3)));
                } else {
                    bb2X = Math.abs(Number((partition2.position.x - (partition.position.x - 0.006)).toFixed(3)));
                }
            }
            bb2XPos = partition.position.x + ((bb2X / 2) + 0.003)

            if (Math.sign(partition3.position.x) === -1) {
                bb3X = Math.abs(Number((partition2.position.x - (partition3.position.x - 0.006)).toFixed(3)));
            } else {
                if (Math.sign(partition2.position.x) === -1) {
                    bb3X = Math.abs(Number((partition2.position.x - (partition3.position.x - 0.006)).toFixed(3)));
                } else {
                    bb3X = Math.abs(Number((partition3.position.x - (partition2.position.x - 0.006)).toFixed(3)));
                }
            }
            bb3XPos = partition2.position.x + ((bb3X / 2) + 0.003)

            bb4X = Math.abs(Number((rightPanelPosition.x - (partition3.position.x - 0.006)).toFixed(3)));
            bb4XPos = partition3.position.x + ((bb4X / 2) + 0.003)

            boundingBoxOne.scale.set(bb1X, partition.scale.y * 2, partition.scale.z * 2);
            boundingBoxOne.position.set(bb1XPos, partitionYPosition, 0);
            scene.add(boundingBoxOne);
            boundingBoxOne.visible = true;

            boundingBoxTwo.scale.set(bb2X, partition.scale.y * 2, partition.scale.z * 2);
            boundingBoxTwo.position.set(bb2XPos, partitionYPosition, 0);
            scene.add(boundingBoxTwo);
            boundingBoxTwo.visible = true;

            boundingBoxThree.scale.set(bb3X, partition.scale.y * 2, partition.scale.z * 2);
            boundingBoxThree.position.set(bb3XPos, partitionYPosition, 0);
            scene.add(boundingBoxThree);
            boundingBoxThree.visible = true;

            boundingBoxFour.scale.set(bb4X, partition.scale.y * 2, partition.scale.z * 2);
            boundingBoxFour.position.set(bb4XPos, partitionYPosition, 0);
            scene.add(boundingBoxFour);
            boundingBoxFour.visible = true;

        }
    }

    if(loadedModel.maximum_partitions > 1) {

        if (checkIfPartitionExists(partition3) && partition2.visible) {

            if (Math.sign(partition.position.x) === -1) {
                bb1X = Math.abs(Number((leftPanelPosition.x - (partition.position.x - 0.006)).toFixed(3)));
            } else {
                bb1X = Number((partition.position.x + (leftPanelPosition.x - 0.006)).toFixed(3));
            }
            bb1XPos = leftPanelPosition.x + ((bb1X / 2) + 0.003)

            if (Math.sign(partition2.position.x) === -1) {
                bb2X = Math.abs(Number((partition.position.x - (partition2.position.x - 0.006)).toFixed(3)));
            } else {
                if (Math.sign(partition.position.x) === -1) {
                    bb2X = Math.abs(Number((partition.position.x - (partition2.position.x - 0.006)).toFixed(3)));
                } else {
                    bb2X = Math.abs(Number((partition2.position.x - (partition.position.x - 0.006)).toFixed(3)));
                }
            }
            bb2XPos = partition.position.x + ((bb2X / 2) + 0.003)

            if (Math.sign(partition2.position.x) === -1) {
                bb3X = Math.abs(Number((rightPanelPosition.x + (partition2.position.x - 0.006)).toFixed(3)));
            } else {
                bb3X = Math.abs(Number((rightPanelPosition.x - (partition2.position.x - 0.006)).toFixed(3)));
            }
            bb3XPos = partition2.position.x + ((bb3X / 2) + 0.003)

            boundingBoxOne.scale.set(bb1X, partition.scale.y * 2, partition.scale.z * 2);
            boundingBoxOne.position.set(bb1XPos, partitionYPosition, 0);
            scene.add(boundingBoxOne);
            boundingBoxOne.visible = true;

            boundingBoxTwo.scale.set(bb2X, partition.scale.y * 2, partition.scale.z * 2);
            boundingBoxTwo.position.set(bb2XPos, partitionYPosition, 0);
            scene.add(boundingBoxTwo);
            boundingBoxTwo.visible = true;

            boundingBoxThree.scale.set(bb3X, partition.scale.y * 2, partition.scale.z * 2);
            boundingBoxThree.position.set(bb3XPos, partitionYPosition, 0);
            scene.add(boundingBoxThree);
            boundingBoxThree.visible = true;

            boundingBoxFour.visible = false;

        }

    }

    if(checkIfPartitionExists(partition3) && checkIfPartitionExists(partition2) && partition.visible){

        if(Math.sign(partition.position.x) === -1){
            bb1X = Math.abs(convertNumber((leftPanelPosition.x-(partition.position.x-0.006))));
            bb2X = Math.abs(convertNumber((rightPanelPosition.x-(partition.position.x-0.006))));
        } else {
            bb1X = Math.abs(convertNumber(((leftPanelPosition.x-0.006)-partition.position.x)));
            bb2X = Math.abs(convertNumber((rightPanelPosition.x-(partition.position.x-0.006))));
        }
        bb1XPos = leftPanelPosition.x+((bb1X/2)+0.003)
        bb2XPos = partition.position.x+((bb2X/2)+0.003)

        boundingBoxOne.scale.set(bb1X, partition.scale.y*2, partition.scale.z*2);
        boundingBoxOne.position.set(bb1XPos, partitionYPosition,0);
        scene.add(boundingBoxOne);
        boundingBoxOne.visible = true;

        boundingBoxTwo.scale.set(bb2X, partition.scale.y*2, partition.scale.z*2);
        boundingBoxTwo.position.set(bb2XPos, partitionYPosition,0);
        scene.add(boundingBoxTwo);
        boundingBoxTwo.visible = true;

        boundingBoxThree.visible = false;

        boundingBoxFour.visible = false;
    }

    if(checkIfPartitionExists(partition3) && checkIfPartitionExists(partition2) && checkIfPartitionExists(partition))
    {
        boundingBoxOne.visible = false;
        boundingBoxTwo.visible = false;
        boundingBoxThree.visible = false;
        boundingBoxFour.visible = false;
    }

}


function checkIfPartitionExists(o)
{
    if(typeof o === 'undefined') return true;
    return o.visible === false
}



function updatePartitionCounterElement() {
    partitionCount = 0;

    if (partition.visible) {
        partitionCount += 1
    }
    if(loadedModel.maximum_partitions > 1){
        if (partition2.visible) {
            partitionCount += 1
        }
    }
    if(loadedModel.maximum_partitions > 2){
        if(partition3.visible){
            partitionCount+=1
        }
    }

    partitionsInput.value = partitionCount;
}


function closeContextMenu() {
    contextMenu.style.display = 'none';
}

function showContextMenu() {
    contextMenu.style.display = 'block';
}

let railButton, singleDrawerButton, doubleDrawerButton;

railButton = document.getElementById('railButton');
singleDrawerButton = document.getElementById('singleDrawerButton');
doubleDrawerButton = document.getElementById('doubleDrawerButton');

railButton.addEventListener('click', addRailToModel);
singleDrawerButton.addEventListener('click', addSingleDrawerToModel);
// doubleDrawerButton.addEventListener('click', addDoubleDrawerToModel);

let rail;
let singleDrawer, drawerTopPanel, drawerFloorPanel, drawerLeftPanel, drawerRightPanel, drawerDrawer, drawerDrawer2, drawerDrawer3, drawerDrawer4, drawerDrawer5;

function addSingleDrawerToModel()
{
    loader.load('../models/wardrobe/components/drawer.glb', function (glb) {

        const loadedSingleDrawer = glb.scene;

        loadedSingleDrawer.traverse( function ( child ) {
            if (child.name === "drawerTopPanel") {
                drawerTopPanel = child;
                drawerTopPanel.scale.set(Number((drawerTopPanel.scale.x).toFixed(3)), Number((drawerTopPanel.scale.y).toFixed(3)), Number((drawerTopPanel.scale.z).toFixed(3)));
            }
            if (child.name === "drawerFloorPanel") {
                drawerFloorPanel = child;
            }
            if (child.name === "drawerLeftPanel") {
                drawerLeftPanel = child;
            }
            if (child.name === "drawerRightPanel") {
                drawerRightPanel = child;
            }
        });

        drawerTopPanel.scale.set(boundingBoxOne.scale.x-0.012, 0.006, partition.scale.z);
        drawerFloorPanel.scale.setX(boundingBoxOne.scale.x-0.012, 0.006, partition.scale.z);
        drawerLeftPanel.scale.set(0.006, 0.350, partition.scale.z)
        drawerRightPanel.scale.set(0.006, 0.350, partition.scale.z)
        drawerTopPanel.position.set(boundingBoxOne.position.x, floorPanelPosition.y+drawerLeftPanel.scale.y, partition.scale.z);
        drawerFloorPanel.position.set(boundingBoxOne.position.x, floorPanelPosition.y+0.006, partition.scale.z);
        drawerLeftPanel.position.set(leftPanelPosition.x+0.006, floorPanelPosition.y+((drawerLeftPanel.scale.y/2)+0.003), partition.position.z)
        drawerRightPanel.position.set(partition.position.x-0.006, floorPanelPosition.y+((drawerLeftPanel.scale.y/2)+0.003), partition.position.z)

        loadedSingleDrawer.scale.set(boundingBoxOne.scale.x, 0.350, partition.scale.z);

        scene.add(loadedSingleDrawer);
        loadedSingleDrawer.position.set(boundingBoxOne.position.x, boundingBoxOne.position.y, boundingBoxOne.position.z);

    }, function (xhr) {

    }, function (error) {
        console.log(error)
    })
}

function addRailToModel()
{
    loader.load('../models/wardrobe/components/rail.glb', function (glb) {

        const loadedRail = glb.scene;

        console.log(loadedRail);

        // loadedRail.traverse( function ( child ) {
        //     if (child.name === "rail") {
        //         rail = child;
        //         rail.userData.draggable = true;
        //         draggableObjects.push(rail);
        //         rail.userData.dimension = false;
        //         rail.userData.component = true;
        //     }
        // });
        //
        // scene.add(loadedRail);
        //
        // rail.scale.set(boundingBoxOne.scale.x,rail.scale.y,rail.scale.z);
        // rail.position.set(leftPanelPosition.x+(gw/2),partitionYPosition,0);
        //
        // console.log(rail);

    }, function (xhr) {

    }, function (error) {
        console.log(error)
    })
}

function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
    animate();
}

function animate(){
    requestAnimationFrame(animate)
    renderer.render(scene,camera);
}


function decreaseWidth()
{
    let newOuterWidthConverted = outerWidthConverted-10;
    let newInnerWidthConverted = innerWidthConverted-10;

    if(newOuterWidthConverted < minimumWidth){
        showError('You have reached the minimum width')
    } else {
        hideError()
        outerWidthConverted = newOuterWidthConverted/2
        outerWidth = Number((outerWidthConverted/1000).toFixed(3));
        innerWidthConverted = newInnerWidthConverted/2
        innerWidth = Number((innerWidthConverted/1000).toFixed(3));
        leftPanelPosition.x = leftPanelPosition.x+0.010;
        rightPanelPosition.x = rightPanelPosition.x-0.010;
        updateWidthInputValue()
        updateModelScaleFromDragEvent(leftPanel);
    }
}

function increaseWidth()
{
    let newOuterWidthConverted = outerWidthConverted+10;
    let newInnerWidthConverted = innerWidthConverted+10;

    if(newOuterWidthConverted > maximumWidth) {
        showError('You have reached the maximum width')
    } else {
        hideError()
        outerWidthConverted = newOuterWidthConverted/2
        outerWidth = Number((outerWidthConverted/1000).toFixed(3));
        innerWidthConverted = newInnerWidthConverted/2
        innerWidth = Number((innerWidthConverted/1000).toFixed(3));
        leftPanelPosition.x = leftPanelPosition.x-0.010;
        rightPanelPosition.x = rightPanelPosition.x+0.010;
        updateWidthInputValue()
        updateModelScaleFromDragEvent(leftPanel);
    }
}

function decreaseHeight()
{
    let newOuterHeightConverted = outerHeightConverted-10;
    let newInnerHeightConverted = innerHeightConverted-10;

    if(newOuterHeightConverted < minimumHeight) {
        showError('You have reached the minimum height')
    } else {
        hideError()
        let pos = topPanelPosition.y-0.020;
        outerHeight = Number((pos*2).toFixed(3));
        outerHeightConverted = (outerHeight/2)*1000;
        outerHeight = Number((outerHeightConverted/1000).toFixed(3));
        innerHeightConverted = newInnerHeightConverted/2
        innerHeight = Number((innerHeightConverted/1000).toFixed(3));
        topPanelPosition.y = topPanelPosition.y-0.020;
        updateHeightInputValue()
        updateModelScaleFromDragEvent(topPanel)
    }
}

function increaseHeight()
{
    let newOuterHeightConverted = outerHeightConverted+10;
    let newInnerHeightConverted = innerHeightConverted+10;

    if(newOuterHeightConverted > maximumHeight) {
        showError('You have reached the maximum height')
    } else {
        hideError()
        let pos = topPanelPosition.y+0.020;
        outerHeight = Number((pos*2).toFixed(3));
        outerHeightConverted = (outerHeight/2)*1000;
        outerHeight = Number((outerHeightConverted/1000).toFixed(3));
        innerHeightConverted = newInnerHeightConverted/2
        innerHeight = Number((innerHeightConverted/1000).toFixed(3));
        topPanelPosition.y = topPanelPosition.y+0.020;
        updateHeightInputValue()
        updateModelScaleFromDragEvent(topPanel)
    }
}

function decreaseDepth()
{
    let newDepth = depth -=10

    if(newDepth < minimumDepth){
        showError('You have reached the minimum depth')
    } else {
        hideError()
        depth = newDepth
        updateDepthInputValue()
        updateModelScale()
    }
}

function increaseDepth()
{
    let newDepth = depth +=10

    if(newDepth > maximumDepth) {
        showError('You have reached the maximum depth')
    } else {
        hideError()
        depth = newDepth
        updateDepthInputValue()
        updateModelScale()
    }
}

function showError(message)
{
    showFooter()
    errorBlock.style.display = 'flex';
    errorBlock.innerHTML = message;
}

function hideError()
{
    hideFooter()
    errorBlock.style.display = 'none';
    errorBlock.innerHTML = '';
}

function showFooter()
{
    footer.style.display = 'flex';
    positionSlider.style.display = 'block';
    sliderInput.min = minimumWidth;
    sliderInput.max = maximumWidth;
    document.getElementById('minimumWidthLabel').innerText = minimumWidth + ' mm';
    document.getElementById('maximumWidthLabel').innerText = maximumWidth + ' mm';
    sliderInput.value = outerWidthConverted;
    document.getElementById('sliderValueLabel').innerText = 'Unit Width ' + outerWidthConverted + ' mm';
}

function hideFooter()
{
    footer.style.display = 'none';
}

function updateWidthInputValue()
{
    widthInput.value = outerWidthConverted;
}

function updateDepthInputValue()
{
    depthInput.value = depthConverted;
}

function updateHeightInputValue()
{
    heightInput.value = outerHeightConverted;
}


contextMenuFinishButton.addEventListener('click',showContextMenu);
contextMenuCloseButton.addEventListener('click', closeContextMenu);
window.addEventListener('resize', onWindowResize, false);

// renderer.domElement.addEventListener('click', onClick, false);

resetCameraButton.addEventListener('click', resetCamera)

animate()

let SlidingDoor;

SlidingDoor = document.getElementById('SlidingDoor');
SlidingDoor.addEventListener('click', selectSlidingTwoDoor)

function selectSlidingTwoDoor()
{
    topDoorRail.visible         = true;
    topDoorRail.visible         = true;
    bottomDoorRail.visible      = true;
    twoSlidingDoorLeft.visible  = true;
    twoSlidingDoorRight.visible = true;
    bottomDoorRail.scale.x = innerWidth/2
    topDoorRail.scale.x = innerWidth/2
}
