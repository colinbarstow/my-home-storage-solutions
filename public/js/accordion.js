let errorBlock = document.getElementById('errorBlock');
let footer = document.getElementById('footer');
let positionSlider = document.getElementById('positionSlider');

const acc = document.getElementsByClassName("accordion");
let finishPanel = document.getElementById('finish-panel');
let dimensionPanel = document.getElementById('dimension-panel');
let partitionPanel = document.getElementById('partition-panel');
let stylePanel = document.getElementById('style-panel');
let doorsPanel = document.getElementById('doors-panel');
let componentsPanel = document.getElementById('components-panel');
let finishButton = document.getElementById('finish-button');
let dimensionButton = document.getElementById('dimension-button');
let partitionButton = document.getElementById('partition-button');
let styleButton = document.getElementById('style-button');
let doorsButton = document.getElementById('doors-button');
let componentsButton = document.getElementById('components-button');
let i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        if(!showIntro) {
            closeAllPanels();
            this.classList.toggle("active");

            let panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
                panel.style.maxHeight = null;
                panel.style.overflowY = null;
            } else {
                panel.style.display = "block";
                panel.style.maxHeight = 200;
                panel.style.overflowY = 'overlay';
            }
        } else {
            footer.style.display = 'flex';
            errorBlock.style.display = 'block';
            errorBlock.innerText = 'Please complete the tutorial';
        }
    });
}

function closeAllPanels()
{
    for (i = 0; i < acc.length; i++) {
        let a = acc[i];
        a.classList.remove('active');
        let panel = a.nextElementSibling;
        if(panel.style.display === 'block'){
            panel.style.display = 'none';
        }
    }
}

function showStylePanel()
{
    closeAllPanels();
    styleButton.classList.add("active");
    stylePanel.style.display = "block";
    stylePanel.style.maxHeight = '200px';
    stylePanel.style.overflowY = 'overlay';
}

function showDimensionPanel()
{
    closeAllPanels();
    dimensionButton.classList.add("active");
    dimensionPanel.style.display = "block";
    dimensionPanel.style.maxHeight = '200px';
    dimensionPanel.style.overflowY = 'overlay';
}

function showFinishPanel()
{
    closeAllPanels();
    finishButton.classList.add("active");
    finishPanel.style.display = "block";
    finishPanel.style.maxHeight = '200px';
    finishPanel.style.overflowY = 'overlay';
}

function showPartitionPanel()
{
    closeAllPanels();
    partitionButton.classList.add("active");
    partitionPanel.style.display = "block";
    partitionPanel.style.maxHeight = '200px';
    partitionPanel.style.overflowY = 'overlay';
}

function showDoorsPanel()
{
    closeAllPanels();
    doorsButton.classList.add("active");
    doorsPanel.style.display = "block";
    doorsPanel.style.maxHeight = '200px';
    doorsPanel.style.overflowY = 'overlay';
}

function showComponentsPanel()
{
    closeAllPanels();
    componentsButton.classList.add("active");
    componentsPanel.style.display = "block";
    componentsPanel.style.maxHeight = '200px';
    componentsPanel.style.overflowY = 'overlay';
}
