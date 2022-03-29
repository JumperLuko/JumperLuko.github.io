var IDdisplayX = document.getElementById("displayX");
var IDdisplayY = document.getElementById("displayY");
var IDcursorX = document.getElementById("cursorX");
var IDcursorY = document.getElementById("cursorY");
var IDrobotX = document.getElementById("robotX");
var IDrobotY = document.getElementById("robotY");

var IDboxToRun = document.getElementById("boxToRun");
var IDrobot = document.getElementById("robot");

function sizeDisplay(){
    displayX = IDboxToRun.clientWidth;
    displayY = IDboxToRun.clientHeight;
    IDdisplayX.textContent = 'X size: ' + displayX + 'px';
    IDdisplayY.textContent = 'Y size: ' + displayY + 'px';
}
sizeDisplay();
document.getElementsByTagName("BODY")[0].onresize = function() {sizeDisplay()};

var startRandomX;var startRandomY;var endRandomX;var endRandomY;
IDboxToRun.addEventListener('mousemove', function(e){
    cursorX = (e.clientX);
    cursorY = (e.clientY-50);
	IDcursorX.textContent = 'X cursor: ' + cursorX + 'px';
    IDcursorY.textContent = 'Y cursor: ' + cursorY + 'px';

    robotSizeX = IDrobot.clientWidth;
    robotSizeY = IDrobot.clientHeight;
    robotX = displayX-cursorX-robotSizeX/2;
    robotY = displayY-cursorY-robotSizeY/2;
    robotRun = function(){
        if(robotX > 0 && robotX < displayX-robotSizeX){//bug in border of the screen
            robot.style.marginLeft = robotX + "px";
            IDrobotX.textContent = 'X robot: ' + robotX + 'px';
        }
        if(robotY > 0 && robotY < displayY-robotSizeY){
            robot.style.marginTop = robotY + "px"; 
            IDrobotY.textContent = 'Y robot: ' + robotY + 'px';
        }
    };

    startRandomX = displayX/2 - displayX*0.3/2;
    endRandomX = displayX/2 + displayX*0.3/2;
    startRandomY = displayY/2 - displayY*0.3/2;
    endRandomY = displayY/2 + displayY*0.3/2;
    centerVerify = (cursorX > startRandomX) == false || (cursorX < endRandomX) == false || (cursorY > startRandomY) == false || (cursorY < endRandomY) == false;
    if(centerVerify){
        robotRun();
    }
});

var cursorXRandom;var cursorYRandom;

IDboxToRun.addEventListener('mousemove', function(){
    if(centerVerify == false){
        while (robotX > startRandomX && robotX < endRandomX){
            cursorXRandom = Math.floor(Math.random() * (endRandomX*2 - startRandomX/2) + startRandomX/2);
            robotX = displayX-cursorXRandom-robotSizeX/2;
        }
            while (robotY > startRandomY && robotY < endRandomY){
                cursorYRandom = Math.floor(Math.random() * (endRandomY*2 - startRandomY/2) + startRandomY/2);
                robotY = displayY-cursorYRandom-robotSizeY/2;
            }
        robotRun();
    }
});

var catchTrue = false;
IDrobot.addEventListener('mousemove', function(){
    setTimeout(function(){
        if(catchTrue == false){
            IDrobot.src = "img/Robot-warn.svg";
        }else{
            setTimeout(function(){
                catchTrue = false;
                IDrobot.src = "img/Robot.svg";
            },2000);
        }
    },000);
});
IDrobot.addEventListener('mouseout', function(){
    setTimeout(function(){
        if(catchTrue == false){
            IDrobot.src = "img/Robot.svg";
        }else{
            setTimeout(function(){
                catchTrue = false;
                IDrobot.src = "img/Robot.svg";
            },2000);
        }
    },400);
});
IDrobot.addEventListener('mousedown', function(){
    IDrobot.src = "img/Robot-catch.svg";
    catchTrue = true;
    setTimeout(function(){
        alert("You Win!");
    },000);
});