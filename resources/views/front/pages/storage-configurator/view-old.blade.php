<!DOCTYPE html>
<html lang="en">
    @include('front.partials._head')

    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.min.css') }}">
    <style>
            #renderZone {
                display: block;
            }
            .image-hover:hover {
                border: 1px solid #000;
                cursor: pointer;
            }
            .progress-container{
                display:flex;
                justify-content: space-between;
                position:relative;
                margin-bottom: 30px;
                max-width:100%;
                width:1000px;
                height:50px;
            }
            .progress-container::before{
                content: "";
                background-color: #9d9d9d;
                position: absolute;
                top: 50%;
                left:0;
                transform: translateY(-50%);
                height:4px;
                width:100%;
                z-index: -1;
                transition: 0.4s ease;
            }
            .progress{
                background-color: #0BB7AF;
                position: absolute;
                top: 50%;
                left:0;
                transform: translateY(-50%);
                height:4px;
                width:0%;
                z-index: -1;
                transition: 0.4s ease;
            }
            .circle{
                background-color: #ffffff;
                color: #999;
                border-radius: 50%;
                width:50px;
                border: 3px solid #9d9d9d;
                display:flex;
                align-items: center;
                justify-content: center;
                transition: 0.4s ease;
            }
            .circle.active{
                border-color: #0BB7AF;
            }
        </style>
{{--    new--}}
    <style>
         .side-bar {
             position: fixed;
             top: 0px;
             right: 0;
             bottom: 0;
             width: 372px;
             padding: 10px;
             pointer-events: none;
             max-height: 100vh;
             overflow-y: overlay;
             overflow-x: hidden;
             transition: width 1s ease, background-color 1s ease, opacity 1s ease;
         }

         .side-bar > div {
             width: 100%;
             pointer-events: all;
         }

         .toolbar {
             min-width: 250px;
         }

         .accordion {
             background-color: var(--accordionBackground);
             color: var(--accordionColor);
             cursor: pointer;
             padding: 5px;
             width: 100%;
             text-align: left;
             border: none;
             outline: none;
             transition: 0.4s;
             margin-top: 6px;
         }

         .active, .accordion:hover {
             color: var(--accordionColorActive);
             background-color: var(--accordionBackgroundActive);
         }

         button {
             min-width: 100px;
         }

         .accordion.active + .accordion-panel {
             padding-top: 15px;
         }

         .accordion-panel {
             padding: 0 15px 0 15px;
             background-color: white;
             max-height: 0;
             overflow: hidden;
             transition: max-height 0.2s ease-out;
         }
    </style>
    <body class="home">
        @include('front.partials._loader')
        <div id="renderZone" style="width:100%; height:100vh;">
            <div class="side-bar">
                <div class="toolbar">
                    <button class="accordion active">Style</button>
                    <div class="accordion-panel">

                    </div>
                </div>
            </div>
        </div>
{{--            <div class="page-wrapper">--}}

{{--                <div class="page-content mb-10">--}}
{{--                        <div class="container">--}}
{{--                            <div class="row main-content-wrap gutter-lg">--}}
{{--                                --}}{{--                    <div class="col-lg-12" style="text-align: -webkit-center; margin-top: 20px">--}}
{{--                                --}}{{--                        <h4>Progress</h4>--}}
{{--                                --}}{{--                        <div class="progress-container">--}}
{{--                                --}}{{--                            <div class="progress" id="progress"></div>--}}
{{--                                --}}{{--                            <div class="circle active">1</div>--}}
{{--                                --}}{{--                            <div class="circle">2</div>--}}
{{--                                --}}{{--                            <div class="circle">3</div>--}}
{{--                                --}}{{--                            <div class="circle">4</div>--}}
{{--                                --}}{{--                            <div class="circle">5</div>--}}
{{--                                --}}{{--                            <div class="circle">6</div>--}}
{{--                                --}}{{--                        </div>--}}
{{--                                --}}{{--                        <p>You are using <span id="measurementsLabel">mms</span></p>--}}
{{--                                --}}{{--                    </div>--}}
{{--                                --}}{{--                    <aside class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">--}}
{{--                                --}}{{--                        <div id="step1">--}}
{{--                                --}}{{--                            <div class="card" style="padding: 20px">--}}
{{--                                --}}{{--                                <div class="card-header">--}}
{{--                                --}}{{--                                    <div class="card-title" style="text-transform: none">--}}
{{--                                --}}{{--                                        <h4 style="font-size: 16px">Step 1</h4>--}}
{{--                                --}}{{--                                        <p>Measurement unit</p>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-body">--}}
{{--                                --}}{{--                                    <p style="font-size:12px">Define the measurement unit you would like to use</p>--}}

{{--                                --}}{{--                                    <div class="btn-group btn-toggle" data-toggle="buttons" style="margin-bottom: 20px">--}}
{{--                                --}}{{--                                        <label class="btn btn-sm btn-primary active" id="mms_label">--}}
{{--                                --}}{{--                                            <input type="radio" name="options" value="mms"> mm's--}}
{{--                                --}}{{--                                        </label>--}}
{{--                                --}}{{--                                        <label class="btn btn-sm btn-default" id="cms_label">--}}
{{--                                --}}{{--                                            <input type="radio" name="options" value="cms" checked=""> cm's--}}
{{--                                --}}{{--                                        </label>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                            </div>--}}

{{--                                --}}{{--                            <div class="card" style="padding: 20px">--}}
{{--                                --}}{{--                                <div class="card-header">--}}
{{--                                --}}{{--                                    <div class="card-title" style="text-transform: none">--}}
{{--                                --}}{{--                                        <p>Finish</p>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-body">--}}
{{--                                --}}{{--                                    <p style="font-size:12px">Select the finish you would like to began with.</p>--}}

{{--                                --}}{{--                                    <div class="row">--}}
{{--                                --}}{{--                                        @foreach($materials as $material)--}}
{{--                                --}}{{--                                            <div class="col-lg-6">--}}
{{--                                --}}{{--                                                <img class="image-hover" onclick="selectBaseMaterial({{$material}})" src="{{ $material->colour_map }}">--}}
{{--                                --}}{{--                                                <p>{{ $material->title }}</p>--}}
{{--                                --}}{{--                                            </div>--}}
{{--                                --}}{{--                                        @endforeach--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-footer">--}}
{{--                                --}}{{--                                    <button id="step1ContinueButton" class="btn btn-sm btn-primary">Continue <i class="fa fa-arrow-right"></i> </button>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                            </div>--}}
{{--                                --}}{{--                        </div>--}}
{{--                                --}}{{--                        <div id="step2" style="display: none">--}}
{{--                                --}}{{--                            <div class="card" style="padding: 20px">--}}
{{--                                --}}{{--                                <div class="card-header">--}}
{{--                                --}}{{--                                    <div class="card-title" style="text-transform: none">--}}
{{--                                --}}{{--                                        <h4 style="font-size: 16px">Step 2</h4>--}}
{{--                                --}}{{--                                        <p>Unit measurements</p>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-body">--}}
{{--                                --}}{{--                                    <p>Please define the width and height of your storage unit</p>--}}
{{--                                --}}{{--                                    <div class="col-md-12 mb-4">--}}
{{--                                --}}{{--                                        <input class="form-control" id="widthInput" type="number" step="1" name="width" placeholder="Width">--}}
{{--                                --}}{{--                                        <p id="widthError" style="display: none; color:red">You have not set a width</p>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                    <div class="col-md-12 mb-4">--}}
{{--                                --}}{{--                                        <input class="form-control" id="heightInput" type="number" step="1" name="height" placeholder="Height">--}}
{{--                                --}}{{--                                        <p id="heightError" style="display: none; color:red">You have not set a height</p>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-footer">--}}
{{--                                --}}{{--                                    <button id="step2BackButton" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Back</button>--}}
{{--                                --}}{{--                                    <button id="step2ContinueButton" class="btn btn-sm btn-primary">Continue <i class="fa fa-arrow-right"></i></button>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                            </div>--}}
{{--                                --}}{{--                        </div>--}}
{{--                                --}}{{--                        <div id="step3" style="display: none">--}}
{{--                                --}}{{--                            <div class="card" style="padding: 20px">--}}
{{--                                --}}{{--                                <div class="card-header">--}}
{{--                                --}}{{--                                    <div class="card-title" style="text-transform: none">--}}
{{--                                --}}{{--                                        <h4 style="font-size: 16px">Step 3</h4>--}}
{{--                                --}}{{--                                        <p>Partitions</p>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-body">--}}
{{--                                --}}{{--                                    <p>Please define the number of partitions</p>--}}
{{--                                --}}{{--                                    <div class="col-md-12 mb-4">--}}
{{--                                --}}{{--                                        <select class="form-control" name="partitions" id="partitions" placeholder="Partitions">--}}
{{--                                --}}{{--                                            <option value="none" selected disabled>Select the number of partitions</option>--}}
{{--                                --}}{{--                                            <option value="1">1</option>--}}
{{--                                --}}{{--                                            <option value="2">2</option>--}}
{{--                                --}}{{--                                            <option value="3">3</option>--}}
{{--                                --}}{{--                                        </select>--}}
{{--                                --}}{{--                                        <p id="partitionError" style="display: none; color:red">You have not set your partitions</p>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-footer">--}}
{{--                                --}}{{--                                    <button id="step3BackButton" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Back</button>--}}
{{--                                --}}{{--                                    <button id="step3ContinueButton" class="btn btn-sm btn-primary">Continue <i class="fa fa-arrow-right"></i></button>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                            </div>--}}
{{--                                --}}{{--                        </div>--}}
{{--                                --}}{{--                        <div id="step4" style="display: none">--}}
{{--                                --}}{{--                            <div class="card" style="padding: 20px">--}}
{{--                                --}}{{--                                <div class="card-header">--}}
{{--                                --}}{{--                                    <div class="card-title" style="text-transform: none">--}}
{{--                                --}}{{--                                        <h4 style="font-size: 16px">Step 4</h4>--}}
{{--                                --}}{{--                                        <p>Doors</p>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-body">--}}
{{--                                --}}{{--                                    <p>Choose your doors</p>--}}
{{--                                --}}{{--                                    <div class="row">--}}
{{--                                --}}{{--                                        <div class="col-lg-6">--}}
{{--                                --}}{{--                                            <img class="image-hover" onclick="addDoorsToUnit(1)" src="{{ asset('images/door1.jpeg') }}">--}}
{{--                                --}}{{--                                            <p>No doors</p>--}}
{{--                                --}}{{--                                        </div>--}}
{{--                                --}}{{--                                        <div class="col-lg-6">--}}
{{--                                --}}{{--                                            <img class="image-hover" onclick="addDoorsToUnit(2)" src="{{ asset('images/door2.jpg') }}">--}}
{{--                                --}}{{--                                            <p>2 sliding doors</p>--}}
{{--                                --}}{{--                                        </div>--}}
{{--                                --}}{{--                                        <div class="col-lg-6">--}}
{{--                                --}}{{--                                            <img class="image-hover" onclick="addDoorsToUnit(3)" src="{{ asset('images/door3.jpeg') }}">--}}
{{--                                --}}{{--                                            <p>3 hinged doors</p>--}}
{{--                                --}}{{--                                        </div>--}}
{{--                                --}}{{--                                        <div class="col-lg-6">--}}
{{--                                --}}{{--                                            <img class="image-hover" onclick="addDoorsToUnit(4)" src="{{ asset('images/door4.webp') }}">--}}
{{--                                --}}{{--                                            <p>3 sliding doors</p>--}}
{{--                                --}}{{--                                        </div>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-footer">--}}
{{--                                --}}{{--                                    <button id="step4BackButton" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Back</button>--}}
{{--                                --}}{{--                                    <button id="step4ContinueButton" class="btn btn-sm btn-primary">Continue <i class="fa fa-arrow-right"></i></button>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                            </div>--}}
{{--                                --}}{{--                        </div>--}}
{{--                                --}}{{--                        <div id="step5" style="display: none">--}}
{{--                                --}}{{--                            <div class="card" style="padding: 20px">--}}
{{--                                --}}{{--                                <div class="card-header">--}}
{{--                                --}}{{--                                    <div class="card-title" style="text-transform: none">--}}
{{--                                --}}{{--                                        <h4 style="font-size: 16px">Step 5</h4>--}}
{{--                                --}}{{--                                        <p>Components</p>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-body">--}}
{{--                                --}}{{--                                    <p>Select a region on your unit to see the components available </p>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-footer">--}}
{{--                                --}}{{--                                    <button id="step5BackButton" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Back</button>--}}
{{--                                --}}{{--                                    <button id="step5ContinueButton" class="btn btn-sm btn-primary">Continue <i class="fa fa-arrow-right"></i></button>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                            </div>--}}
{{--                                --}}{{--                        </div>--}}
{{--                                --}}{{--                        <div id="step6" style="display: none">--}}
{{--                                --}}{{--                            <div class="card" style="padding: 20px">--}}
{{--                                --}}{{--                                <div class="card-header">--}}
{{--                                --}}{{--                                    <div class="card-title" style="text-transform: none">--}}
{{--                                --}}{{--                                        <h4 style="font-size: 16px">Step 6</h4>--}}
{{--                                --}}{{--                                        <p>Final touches</p>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-body">--}}
{{--                                --}}{{--                                    <p>Select a region to view finish options and additional extras.</p>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                                <div class="card-footer">--}}
{{--                                --}}{{--                                    <button id="step6BackButton" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Back</button>--}}
{{--                                --}}{{--                                    <button id="completeBuild" class="btn btn-sm btn-primary">Complete <i class="fa fa-check"></i></button>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                --}}{{--                            </div>--}}
{{--                                --}}{{--                        </div>--}}

{{--                                --}}{{--                        <button class="btn btn-primary" id="openDoorsButton" style="display: none; margin-top:20px;">Open Doors</button>--}}
{{--                                --}}{{--                    </aside>--}}
{{--                                --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--            </div>--}}

            @include('front.partials.scripts')

            @section('page-scripts')
    <script src="{{ asset('js/three.js') }}"></script>
    <script src="{{ asset('js/OrbitControls.js') }}"></script>
    <script>

        const renderZone = document.getElementById('renderZone');


        //NEW WAY
        let camera, scene, renderer, controls, ambientLight, directionalLight, textureLoader;
        let geometry, material, mesh;
        let meshes = new Array();
        let wholeWidth;
        let wholeHeight;
        let innerWidthOfUnit;
        let innerHeightOfUnit;
        let sidePanelHeight;
        let panelDepth;
        let panelThickness = 1.6;
        let bottomAndTopPanelWidth;
        let backPanelWidth;
        let backPanelHeight;
        let baseColour;
        let normalMap;
        let heightMap;
        let roughnessMap;
        let ambientOcclusionMap;
        let width;
        let height;
        let depth = 60;
        let partitionDepth = 50;
        let widthInput = document.getElementById('widthInput');
        let heightInput = document.getElementById('heightInput');
        let measurementsLabel = document.getElementById('measurementsLabel');
        let partitionsSelect = document.getElementById('partitions');
        let widthBetweenPartitions;
        let partitionOne;
        let partitionTwo;
        let partitionThree;
        let doorOneSliding;
        let doorTwoSliding;
        let doorThreeSliding;
        let doorOneHinged;
        let doorTwoHinged;
        let doorThreeHinged;

        const progress = document.getElementById('progress');
        const circles = document.querySelectorAll('.circle');
        let currentStep = 1;

        scene = new THREE.Scene();
        scene.background = new THREE.Color( 0xffffff );
        camera = new THREE.PerspectiveCamera(75, renderZone.clientWidth / renderZone.clientHeight, 1, 1000);

        renderer = new THREE.WebGLRenderer();
        renderer.setSize(renderZone.clientWidth, renderZone.clientHeight);
        renderZone.appendChild(renderer.domElement);

        controls = new THREE.OrbitControls( camera, renderer.domElement );
        ambientLight = new THREE.AmbientLight(0xFFFFFF, 0.5);
        scene.add(ambientLight);

        directionalLight = new THREE.DirectionalLight(0xFFFFFF, 0.5);
        directionalLight.position.set(2,10,1);
        directionalLight.target.position.set(0,0,0,);
        scene.add(directionalLight);
        scene.add(directionalLight.target);

        function selectBaseMaterial(material){
            textureLoader = new THREE.TextureLoader();
            baseColour = textureLoader.load(material.colour_map);
            normalMap = textureLoader.load(material.normal_map);
            heightMap = textureLoader.load(material.height_map);
            roughnessMap = textureLoader.load(material.roughness_map);
            ambientOcclusionMap = textureLoader.load(material.ambient_occlusion_map);
        }



        camera.position.z = 150;
        camera.position.y = 200;
        camera.position.x = -150;


        for (let i = 0; i < meshes.length; i++) {
            scene.add(meshes[i]);
        }

        let render = function(){
            renderer.render(scene, camera);
        }

        let GameLoop = function (){
            requestAnimationFrame( GameLoop)
            // update();
            render()
        }

        GameLoop();

        //toggle buttons
        let mmsLabel = document.getElementById('mms_label');
        let cmsLabel = document.getElementById('cms_label');
        let measurementUnit = 'mms';

        //Doors
        let openDoorsButton = document.getElementById('openDoorsButton');

        //buttons
        let step1ContinueButton = document.getElementById('step1ContinueButton');
        let step2ContinueButton = document.getElementById('step2ContinueButton');
        let step3ContinueButton = document.getElementById('step3ContinueButton');
        let step4ContinueButton = document.getElementById('step4ContinueButton');
        let step5ContinueButton = document.getElementById('step5ContinueButton');

        let step2BackButton = document.getElementById('step2BackButton');
        let step3BackButton = document.getElementById('step3BackButton');
        let step4BackButton = document.getElementById('step4BackButton');
        let step5BackButton = document.getElementById('step5BackButton');
        let step6BackButton = document.getElementById('step6BackButton');

        //panels
        let step1Panel = document.getElementById('step1');
        let step2Panel = document.getElementById('step2');
        let step3Panel = document.getElementById('step3');
        let step4Panel = document.getElementById('step4');
        let step5Panel = document.getElementById('step5');
        let step6Panel = document.getElementById('step6');

        //.errors
        let widthError = document.getElementById('widthError');
        let heightError = document.getElementById('heightError');
        let partitionError = document.getElementById('partitionError');

        step1ContinueButton.addEventListener('click', continueToStep2)
        step2ContinueButton.addEventListener('click', continueToStep3)
        step3ContinueButton.addEventListener('click', continueToStep4)
        step4ContinueButton.addEventListener('click', continueToStep5)
        step5ContinueButton.addEventListener('click', continueToStep6)

        step2BackButton.addEventListener('click', backToStep1)
        step3BackButton.addEventListener('click', backToStep2)
        step4BackButton.addEventListener('click', backToStep3)
        step5BackButton.addEventListener('click', backToStep4)
        step6BackButton.addEventListener('click', backToStep5)

        mmsLabel.addEventListener('click', selectMms)
        cmsLabel.addEventListener('click', selectCms)

        let doorOption;

        partitionsSelect.addEventListener('change', setPartitionsCount);

        let partitionCount;

        function cleanPartitions()
        {
            if(scene.getObjectByName('partition_one')){
                scene.remove(partitionOne);
                partitionOne.geometry.dispose();
                partitionOne.material.dispose();
            }

            if(scene.getObjectByName('partition_two')){
                scene.remove(partitionTwo);
                partitionTwo.geometry.dispose();
                partitionTwo.material.dispose();
            }

            if(scene.getObjectByName('partition_three')){
                scene.remove(partitionThree);
                partitionThree.geometry.dispose();
                partitionThree.material.dispose();
            }
        }

        function cleanDoors()
        {
            if(scene.getObjectByName('door_one_sliding')){
                scene.remove(doorOneSliding);
                doorOneSliding.geometry.dispose();
                doorOneSliding.material.dispose();
            }

            if(scene.getObjectByName('door_two_sliding')){
                scene.remove(doorTwoSliding);
                doorTwoSliding.geometry.dispose();
                doorTwoSliding.material.dispose();
            }

            if(scene.getObjectByName('door_three_sliding')){
                scene.remove(doorThreeSliding);
                doorThreeSliding.geometry.dispose();
                doorThreeSliding.material.dispose();
            }

            if(scene.getObjectByName('door_one_hinged')){
                scene.remove(doorOneHinged);
                doorOneHinged.geometry.dispose();
                doorOneHinged.material.dispose();
            }

            if(scene.getObjectByName('door_two_hinged')){
                scene.remove(doorTwoHinged);
                doorTwoHinged.geometry.dispose();
                doorTwoHinged.material.dispose();
            }

            if(scene.getObjectByName('door_three_hinged')){
                scene.remove(doorThreeHinged);
                doorThreeHinged.geometry.dispose();
                doorThreeHinged.material.dispose();
            }

        }

        function setPartitionsCount()
        {
            cleanPartitions();

            partitionCount = partitionsSelect.value;

            if(partitionCount === '1') {

                widthBetweenPartitions = (innerHeightOfUnit - panelThickness) / 2;

                partitionOne = new THREE.Mesh(new THREE.BoxGeometry(panelThickness, innerHeightOfUnit, partitionDepth, 512, 512),
                    new THREE.MeshStandardMaterial({
                            map: baseColour,
                            normalMap: normalMap,
                            displacementMap: heightMap,
                            displacementScale: 0.1,
                            roughnessMap: roughnessMap,
                            roughness: 0.5,
                            aoMap: ambientOcclusionMap,
                        }
                    ))

                partitionOne.geometry.attributes.uv2 = partitionOne.geometry.attributes.uv;

                partitionOne.position.set(0, wholeHeight / 2, 0);
                meshes.push(partitionOne);

                partitionOne.name = 'partition_one';

                scene.add(partitionOne);

                controls.update();

            }

            if(partitionCount === '2') {

                widthBetweenPartitions = ((innerWidthOfUnit - panelThickness) / 3);

                partitionOne = new THREE.Mesh(new THREE.BoxGeometry(panelThickness, innerHeightOfUnit, partitionDepth, 512, 512),
                    new THREE.MeshStandardMaterial({
                            map: baseColour,
                            normalMap: normalMap,
                            displacementMap: heightMap,
                            displacementScale: 0.1,
                            roughnessMap: roughnessMap,
                            roughness: 0.5,
                            aoMap: ambientOcclusionMap,
                        }
                    ))

                partitionOne.geometry.attributes.uv2 = partitionOne.geometry.attributes.uv;

                partitionOne.position.set(-(widthBetweenPartitions/2), wholeHeight / 2, 0);
                meshes.push(partitionOne);
                partitionOne.name = 'partition_one';
                scene.add(partitionOne);

                controls.update();

                partitionTwo = new THREE.Mesh(new THREE.BoxGeometry(panelThickness, innerHeightOfUnit, partitionDepth, 512, 512),
                    new THREE.MeshStandardMaterial({
                            map: baseColour,
                            normalMap: normalMap,
                            displacementMap: heightMap,
                            displacementScale: 0.1,
                            roughnessMap: roughnessMap,
                            roughness: 0.5,
                            aoMap: ambientOcclusionMap,
                        }
                    ))

                partitionTwo.geometry.attributes.uv2 = partitionTwo.geometry.attributes.uv;

                partitionTwo.position.set(widthBetweenPartitions/2, wholeHeight / 2, 0);
                meshes.push(partitionTwo);
                partitionTwo.name = 'partition_two';
                scene.add(partitionTwo);

                controls.update();
            }

            if(partitionCount === '3'){

                widthBetweenPartitions = ((innerWidthOfUnit-panelThickness)/4);

                partitionOne = new THREE.Mesh(new THREE.BoxGeometry(panelThickness, innerHeightOfUnit, partitionDepth, 512, 512),
                    new THREE.MeshStandardMaterial({
                        map: baseColour,
                        normalMap: normalMap,
                        displacementMap: heightMap,
                        displacementScale: 0.1,
                        roughnessMap: roughnessMap,
                        roughness: 0.5,
                        aoMap: ambientOcclusionMap,
                    })
                )

                partitionOne.geometry.attributes.uv2 = partitionOne.geometry.attributes.uv;

                partitionOne.position.set(-widthBetweenPartitions, wholeHeight / 2, 0);
                meshes.push(partitionOne);
                partitionOne.name = 'partition_one';
                scene.add(partitionOne);

                controls.update();

                partitionTwo = new THREE.Mesh(new THREE.BoxGeometry(panelThickness, innerHeightOfUnit, partitionDepth, 512, 512),
                    new THREE.MeshStandardMaterial({
                        map: baseColour,
                        normalMap: normalMap,
                        displacementMap: heightMap,
                        displacementScale: 0.1,
                        roughnessMap: roughnessMap,
                        roughness: 0.5,
                        aoMap: ambientOcclusionMap,
                    })
                )

                partitionTwo.geometry.attributes.uv2 = partitionTwo.geometry.attributes.uv;

                partitionTwo.position.set(0, wholeHeight / 2, 0);
                meshes.push(partitionTwo);
                partitionTwo.name = 'partition_two';
                scene.add(partitionTwo);

                controls.update();

                partitionThree = new THREE.Mesh(new THREE.BoxGeometry(panelThickness, innerHeightOfUnit, partitionDepth, 512, 512),
                    new THREE.MeshStandardMaterial({
                        map: baseColour,
                        normalMap: normalMap,
                        displacementMap: heightMap,
                        displacementScale: 0.1,
                        roughnessMap: roughnessMap,
                        roughness: 0.5,
                        aoMap: ambientOcclusionMap,
                    })
                )

                partitionThree.geometry.attributes.uv2 = partitionThree.geometry.attributes.uv;

                partitionThree.position.set(widthBetweenPartitions, wholeHeight / 2, 0);
                meshes.push(partitionThree);
                partitionThree.name = 'partition_three';
                scene.add(partitionThree);

                controls.update();

            }

            renderer.render(scene, camera);
        }

        function selectMms()
        {
            mmsLabel.classList.add("active", "btn-primary");
            cmsLabel.classList.remove("active", "btn-primary");
            measurementUnit = 'mms';
            measurementsLabel.innerText = measurementUnit;
        }

        function selectCms()
        {
            cmsLabel.classList.add("active", "btn-primary");
            mmsLabel.classList.remove("active", "btn-primary");
            measurementUnit = 'cms';
            measurementsLabel.innerText = measurementUnit;
        }

        function updateStepCounter(){
            circles.forEach((circle,idx) => {
                if(idx < currentStep){
                    circle.classList.add('active')
                } else {
                    circle.classList.remove('active')
                }
            })
            const actives = document.querySelectorAll(".active");
            progress.style.width = ((actives.length-3) / (circles.length -1) )* 100 + "%";
        }

        function continueToStep2()
        {
            step1Panel.style.display = 'none'
            step2Panel.style.display = 'block'
            measurementsLabel.innerText = measurementUnit;
            currentStep = 2;
            updateStepCounter();

        }

        function continueToStep3()
        {

            if(widthInput.value === ''){
                widthError.style.display = 'block';
            } else {
                widthError.style.display = 'none';
            }

            if(heightInput.value === ''){
                heightError.style.display = 'block';
            } else {
                heightError.style.display = 'none';
            }

            if(heightInput.value !== '' && widthInput.value !== ''){
                step2Panel.style.display = 'none'
                step3Panel.style.display = 'block'
                currentStep = 3;
                updateStepCounter();

                width = widthInput.value;
                height = heightInput.value;

                if(measurementUnit === 'mms'){
                    wholeWidth = width/10;
                    wholeHeight = height/10;
                    innerWidthOfUnit = (wholeWidth-(panelThickness*2))
                    innerHeightOfUnit = (wholeHeight-(panelThickness*2))
                    sidePanelHeight = height/10;
                    panelDepth = depth;
                    bottomAndTopPanelWidth = wholeWidth-(panelThickness*2);
                    backPanelWidth = innerWidthOfUnit;
                    backPanelHeight = innerHeightOfUnit;
                } else {
                    wholeWidth = width;
                    wholeHeight = height;
                    innerWidthOfUnit = wholeWidth - (panelThickness*2)
                    innerHeightOfUnit = wholeHeight - (panelThickness*2)
                    sidePanelHeight = height;
                    panelDepth = depth;
                    bottomAndTopPanelWidth = wholeWidth-(panelThickness*2);
                    backPanelWidth = innerWidth;
                    backPanelHeight = innerHeight;
                }

                // Add left to the scene
                let leftSidePanel = new THREE.Mesh(new THREE.BoxGeometry(panelThickness, sidePanelHeight, panelDepth, 512, 512),
                    new THREE.MeshStandardMaterial({
                            map: baseColour,
                            normalMap: normalMap,
                            displacementMap: heightMap,
                            displacementScale: 0.1,
                            roughnessMap: roughnessMap,
                            roughness: 0.5,
                            aoMap: ambientOcclusionMap,
                        }
                    ))

                leftSidePanel.geometry.attributes.uv2 = leftSidePanel.geometry.attributes.uv;

                leftSidePanel.position.set(-((wholeWidth/2)-(panelThickness/2)), wholeHeight/2, 0);
                meshes.push( leftSidePanel );
                scene.add(leftSidePanel);

                controls.update();


                // Add right panel to the scene
                let rightSidePanel = new THREE.Mesh(new THREE.BoxGeometry(panelThickness, sidePanelHeight, panelDepth, 512, 512),
                    new THREE.MeshStandardMaterial({
                        map: baseColour,
                        normalMap: normalMap,
                        displacementMap: heightMap,
                        displacementScale: 0.1,
                        roughnessMap: roughnessMap,
                        roughness: 0.5,
                        aoMap: ambientOcclusionMap,
                    })
                )


                rightSidePanel.geometry.attributes.uv2 = rightSidePanel.geometry.attributes.uv;

                rightSidePanel.position.set((wholeWidth/2)-(panelThickness/2), wholeHeight/2, 0);
                meshes.push( rightSidePanel );
                scene.add(rightSidePanel);

                controls.update();

                // Add bottom panel to the scene
                let bottomPanel = new THREE.Mesh(new THREE.BoxGeometry(bottomAndTopPanelWidth, panelThickness, panelDepth, 512, 512),
                    new THREE.MeshStandardMaterial({
                        map: baseColour,
                        normalMap: normalMap,
                        displacementMap: heightMap,
                        displacementScale: 0.1,
                        roughnessMap: roughnessMap,
                        roughness: 0.5,
                        aoMap: ambientOcclusionMap,
                    })
                )

                bottomPanel.geometry.attributes.uv2 = bottomPanel.geometry.attributes.uv;

                bottomPanel.position.set(0, panelThickness/2, 0);
                meshes.push( bottomPanel );
                scene.add(bottomPanel);

                controls.update();

                // Add top panel to the scene
                let topPanel = new THREE.Mesh(new THREE.BoxGeometry(bottomAndTopPanelWidth, panelThickness, panelDepth, 512, 512),
                    new THREE.MeshStandardMaterial({
                        map: baseColour,
                        normalMap: normalMap,
                        displacementMap: heightMap,
                        displacementScale: 0.1,
                        roughnessMap: roughnessMap,
                        roughness: 0.5,
                        aoMap: ambientOcclusionMap,
                    })
                )

                topPanel.geometry.attributes.uv2 = topPanel.geometry.attributes.uv;
                topPanel.position.set(0, wholeHeight-(panelThickness/2), 0);
                meshes.push( topPanel );
                scene.add(topPanel);

                controls.update();

                // Add back panel to the scene
                let backPanel = new THREE.Mesh(new THREE.BoxGeometry(backPanelWidth, backPanelHeight, panelThickness, 512, 512),
                    new THREE.MeshStandardMaterial({
                        map: baseColour,
                        normalMap: normalMap,
                        displacementMap: heightMap,
                        displacementScale: 0.1,
                        roughnessMap: roughnessMap,
                        roughness: 0.5,
                        aoMap: ambientOcclusionMap,
                    })
                )

                backPanel.geometry.attributes.uv2 = backPanel.geometry.attributes.uv;
                backPanel.position.set(0, wholeHeight/2, -((panelDepth/2)-panelThickness));
                meshes.push( backPanel );
                scene.add(backPanel);

                controls.update();

                renderer.render(scene, camera);
            }




        }

        function continueToStep4()
        {
            if(partitionsSelect.value !== 'none'){
                step3Panel.style.display = 'none'
                step4Panel.style.display = 'block'
                currentStep = 4;
                updateStepCounter();
                partitionError.style.display = 'none'
            } else {
                partitionError.style.display = 'block'
            }

        }

        function continueToStep5()
        {
            step4Panel.style.display = 'none'
            step5Panel.style.display = 'block'
            currentStep = 5;
            updateStepCounter();
        }

        function continueToStep6()
        {
            step5Panel.style.display = 'none'
            step6Panel.style.display = 'block'
            currentStep = 6;
            updateStepCounter();
        }

        function backToStep1()
        {
            step1Panel.style.display = 'block'
            step2Panel.style.display = 'none'
            currentStep = 1;
            updateStepCounter();
        }

        function backToStep2()
        {
            step2Panel.style.display = 'block'
            step3Panel.style.display = 'none'
            currentStep = 2;
            updateStepCounter();
        }

        function backToStep3()
        {
            step3Panel.style.display = 'block'
            step4Panel.style.display = 'none'
            currentStep = 3;
            updateStepCounter();
        }

        function backToStep4()
        {
            step4Panel.style.display = 'block'
            step5Panel.style.display = 'none'
            currentStep = 4;
            updateStepCounter();
        }

        function backToStep5()
        {
            step5Panel.style.display = 'block'
            step6Panel.style.display = 'none'
            currentStep = 5;
            updateStepCounter();
        }

        function addDoorsToUnit(id)
        {
            cleanDoors();

            doorOption = id;

            switch(id){
                case 1:
                    break;
                case 2:
                    doorOneSliding = new THREE.Mesh(new THREE.BoxGeometry(innerWidthOfUnit/2, innerHeightOfUnit, panelThickness, 512, 512),
                        new THREE.MeshStandardMaterial({
                            map: baseColour,
                            normalMap: normalMap,
                            displacementMap: heightMap,
                            displacementScale: 0.1,
                            roughnessMap: roughnessMap,
                            roughness: 0.5,
                            aoMap: ambientOcclusionMap,
                        })
                    )

                    doorOneSliding.geometry.attributes.uv2 = doorOneSliding.geometry.attributes.uv;

                    doorOneSliding.position.set(-(wholeWidth/4)+(panelThickness/2), wholeHeight / 2, (panelDepth/2)-(panelThickness/2));
                    meshes.push(doorOneSliding);
                    doorOneSliding.name = 'door_one_sliding';
                    scene.add(doorOneSliding);

                    controls.update();

                    doorTwoSliding = new THREE.Mesh(new THREE.BoxGeometry(wholeWidth/2, wholeHeight, panelThickness, 512, 512),
                        new THREE.MeshStandardMaterial({
                            map: baseColour,
                            normalMap: normalMap,
                            displacementMap: heightMap,
                            displacementScale: 0.1,
                            roughnessMap: roughnessMap,
                            roughness: 0.5,
                            aoMap: ambientOcclusionMap,
                        })
                    )

                    doorTwoSliding.geometry.attributes.uv2 = doorTwoSliding.geometry.attributes.uv;

                    doorTwoSliding.position.set((wholeWidth/4), wholeHeight / 2, (panelDepth/2)+(panelThickness/2));
                    meshes.push(doorTwoSliding);
                    doorTwoSliding.name = 'door_two_sliding';
                    scene.add(doorTwoSliding);

                    controls.update();

                    openDoorsButton.style.display = 'block';
                    openDoorsButton.addEventListener('click', openDoors)
                    break;
                case 3 || 4:
                    doorOneHinged = new THREE.Mesh(new THREE.BoxGeometry(wholeWidth/3, wholeHeight, panelThickness, 512, 512),
                        new THREE.MeshStandardMaterial({
                            map: baseColour,
                            normalMap: normalMap,
                            displacementMap: heightMap,
                            displacementScale: 0.1,
                            roughnessMap: roughnessMap,
                            roughness: 0.5,
                            aoMap: ambientOcclusionMap,
                        })
                    )

                    doorOneHinged.geometry.attributes.uv2 = doorOneHinged.geometry.attributes.uv;

                    doorOneHinged.position.set(-(wholeWidth/4), wholeHeight / 2, (panelDepth/2)+(panelThickness/2));
                    meshes.push(doorOneHinged);
                    doorOneHinged.name = 'door_one_hinged';
                    scene.add(doorOneHinged);

                    controls.update();

                    doorTwoHinged = new THREE.Mesh(new THREE.BoxGeometry(wholeWidth/3, wholeHeight, panelThickness, 512, 512),
                        new THREE.MeshStandardMaterial({
                            map: baseColour,
                            normalMap: normalMap,
                            displacementMap: heightMap,
                            displacementScale: 0.1,
                            roughnessMap: roughnessMap,
                            roughness: 0.5,
                            aoMap: ambientOcclusionMap,
                        })
                    )

                    doorTwoHinged.geometry.attributes.uv2 = doorTwoHinged.geometry.attributes.uv;

                    doorTwoHinged.position.set((wholeWidth/4), wholeHeight / 2, (panelDepth/2)+(panelThickness/2));
                    meshes.push(doorTwoHinged);
                    doorTwoHinged.name = 'door_two_hinged';
                    scene.add(doorTwoHinged);

                    controls.update();

                    doorThreeHinged = new THREE.Mesh(new THREE.BoxGeometry(wholeWidth/3, wholeHeight, panelThickness, 512, 512),
                        new THREE.MeshStandardMaterial({
                            map: baseColour,
                            normalMap: normalMap,
                            displacementMap: heightMap,
                            displacementScale: 0.1,
                            roughnessMap: roughnessMap,
                            roughness: 0.5,
                            aoMap: ambientOcclusionMap,
                        })
                    )

                    doorThreeHinged.geometry.attributes.uv2 = doorThreeHinged.geometry.attributes.uv;

                    doorThreeHinged.position.set((wholeWidth/4), wholeHeight / 2, (panelDepth/2)+(panelThickness/2));
                    meshes.push(doorThreeHinged);
                    doorThreeHinged.name = 'door_three_hinged';
                    scene.add(doorThreeHinged);

                    controls.update();

                    openDoorsButton.style.display = 'block';
                    openDoorsButton.addEventListener('click', openDoors)
                    break;
            }
        }

        function openDoors() {
            openDoorsButton.innerText = 'Close doors';
            openDoorsButton.removeEventListener('click', openDoors)
            openDoorsButton.addEventListener('click', closeDoors)
            renderer.render(scene, camera);

            if (doorOneSliding.position.x <= wholeWidth/4) {
                doorOneSliding.position.x += 0.5;
            }
            requestAnimationFrame(openDoors);
        }

        function closeDoors()
        {
            openDoorsButton.innerText = 'Open doors';
            openDoorsButton.removeEventListener('click', closeDoors)
            openDoorsButton.addEventListener('click', openDoors)
            renderer.render(scene, camera);

            if (doorOneSliding.position.x <= wholeWidth/4) {
                doorOneSliding.position.x += 0.5;
            }

            requestAnimationFrame(openDoors);
        }

    </script>

@endsection
    </body>

</html>



