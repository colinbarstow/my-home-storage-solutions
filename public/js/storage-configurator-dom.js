let step1ButtonIntro = document.getElementById('step1ButtonIntro');
let step3ButtonIntro = document.getElementById('step3ButtonIntro');
let step4ButtonIntro = document.getElementById('step4ButtonIntro');
let step5ButtonIntro = document.getElementById('step5ButtonIntro');
let step6ButtonIntro = document.getElementById('step6ButtonIntro');
let completeIntroButton = document.getElementById('completeIntroButton');
let step1Intro = document.getElementById('step1Intro');
let step2Intro = document.getElementById('step2Intro');
let step3Intro = document.getElementById('step3Intro');
let step4Intro = document.getElementById('step4Intro');
let step5Intro = document.getElementById('step5Intro');
let step6Intro = document.getElementById('step6Intro');
let step7Intro = document.getElementById('step7Intro');
let sideBar = document.getElementById('side-bar');
let fadeMe = document.getElementById('fadeMe');
let alertBox = document.getElementById('alertBox');

let widthInput = document.getElementById('width');
let depthInput = document.getElementById('depth');
let heightInput = document.getElementById('height');
let partitionsInput = document.getElementById('partitions');
let minusWidth = document.getElementById('minusWidth');
let plusWidth = document.getElementById('plusWidth');
let minusHeight = document.getElementById('minusHeight');
let plusHeight = document.getElementById('plusHeight');
let minusDepth = document.getElementById('minusDepth');
let plusDepth = document.getElementById('plusDepth');

let unitStyleSelectors = document.getElementsByClassName('unitStyleSelector');

console.log(unitStyleSelectors);

step1ButtonIntro.addEventListener('click', continueToStep2);
step3ButtonIntro.addEventListener('click', continueToStep4);
step4ButtonIntro.addEventListener('click', continueToStep5);
step5ButtonIntro.addEventListener('click', continueToStep6);
step6ButtonIntro.addEventListener('click', continueToStep7);
completeIntroButton.addEventListener('click', completeIntro);

function continueToStep2(){
    step1Intro.style.display = 'none';
    step2Intro.style.display = 'block';
    sideBar.style.zIndex = 50;
    showStylePanel()
}
function continueToStep3(){
    alertBox.style.left = '10%';
    alertBox.style.top = '5%';
    alertBox.style.marginTop = 0;
    alertBox.style.marginLeft = 0;
    alertBox.style.top = '5%';
    step2Intro.style.display = 'none';
    step3Intro.style.display = 'block';
    showDimensionPanel()
    fadeMe.style.display = 'none';
}
function continueToStep4(){
    step3Intro.style.display = 'none';
    step4Intro.style.display = 'block';
    showPartitionPanel()
}
function continueToStep5(){
    step4Intro.style.display = 'none';
    step5Intro.style.display = 'block';
    showDoorsPanel()
}
function continueToStep6(){
    step5Intro.style.display = 'none';
    step6Intro.style.display = 'block';
    showComponentsPanel()
}
function continueToStep7(){
    step6Intro.style.display = 'none';
    step7Intro.style.display = 'block';
    showFinishPanel()
}
function completeIntro(){
    closeAllPanels();
    step7Intro.style.display = 'none';
    alertBox.style.display = 'none';
    showIntro = false;
    setCookie('intro', true, 90)
}

if(showIntro){
    fadeMe.style.display = 'block';
    alertBox.style.display = 'block'
}


