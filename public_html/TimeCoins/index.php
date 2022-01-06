<!DOCTYPE html>
<html lang="ml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="clock.js"></script>
    <title>Auspicious Clock</title>
</head>
<body>
<?php ?>
    
<div class="clock-clock" ><canvas id="clockwise"></canvas></div>
<div class="clock-clock kclock" ><canvas id="anticlockwise"></canvas></div>

<div id="clock"></div>
<div class="law firstlaw">
    Objects in motion or at rest remain in the same state unless an external force imposes 
    <a onclick="changed();" href="javascript:void(0);" style="cursor: pointer; text-decoration: none;" >change</a> 
</div>
<div hidden="true" class="law secondlaw">
    The force acting on an object is <a onclick="Equalise();" href="javascript:void(0);" style="cursor: pointer; text-decoration: none;" >equal</a> to the mass of the object multiplied by its acceleration 
</div>

<div hidden="true" class="law thirdlaw">
   For every action, there is an equal reaction
</div>

<section hidden="true" class="Conservation">Energy can neither be created nor destroyed  
    it can only be <sub>Copied</sub>  || changed || <sup>Pasted</sup>  from one form to another</section>
<section hidden="true" class="clock"><span id="timeon">Mining..</span> Timecoins in Wallet and Mining ..</section>

<script>

if(isTouchDevice()) {
    console.info("Gaze support:", true)
}

function isTouchDevice() {
  return (('ontouchstart' in window) ||
     (navigator.maxTouchPoints > 0) ||
     (navigator.msMaxTouchPoints > 0));
}
    if(localStorage.length == 0) {
        localStorage.setItem("timeon", "1");
    }
    document.getElementById("timeon").innerText = localStorage.timeon

    function Equalise() {
        var anticlockwise = {
            colour: "grey",
            rimColour:"grey",
            rim: 1,
            directionCoefficient: -1,
            markerType: "numeral"
        }
        var anticlockwise = new clock("anticlockwise", anticlockwise);
        anticlockwise.start();
        document.getElementsByClassName("secondlaw")[0].setAttribute("hidden","hidden")
        document.getElementsByClassName("thirdlaw")[0].removeAttribute("hidden")
        document.getElementsByClassName("clock")[0].removeAttribute("hidden")
        document.getElementsByClassName("Conservation")[0].removeAttribute("hidden")
    }

    function changed() {
        var clockwise = {
		colour: "grey",
		rimColour:"grey",
		rim: 1,
		directionCoefficient: 1,
		markerType: "numeral"
        }
        var clockwise = new clock("clockwise", clockwise);
        clockwise.start();
        document.getElementsByClassName("firstlaw")[0].setAttribute("hidden","hidden")
        document.getElementsByClassName("secondlaw")[0].removeAttribute("hidden")
    }

    function currentTime() {
    let date = new Date(); 
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();
    let session = "AM";

    if(hh == 0){
        hh = 12;
    }
    if(hh > 12){
        hh = hh - 12;
        session = "PM";
    }

    hh = (hh < 10) ? "0" + hh : hh;
    mm = (mm < 10) ? "0" + mm : mm;
    ss = (ss < 10) ? "0" + ss : ss;
        
    let time = hh + ":" + mm + ":" + ss + " " + session;


    if(ss == 00 && mm == 00 && hh==00 ) {
        var timeon = parseInt(localStorage.getItem("timeon"));
        localStorage.setItem("timeon", ++timeon);
        document.getElementById("timeon").innerText = timeon;
    }

    if ( session == "AM" && hh >= 05 && mm >= 30 && hh <= 05 && mm <= 30 ) {
        var timeon = parseInt(localStorage.getItem("timeon"));
        localStorage.setItem("timeon", ++timeon);
        document.getElementById("timeon").innerText = timeon;
    }
    
    let t = setTimeout(function(){ currentTime() }, 1000);
}
currentTime();

</script>

<style>
    body {
        font-family: 'Noto Sans', sans-serif;
        color: black;
    }
    .clockshoe {
        position: relative;
        margin-left: auto;
        margin-right: auto;
       
    }
    
    .clock-clock{
        height: 100%;
        width: 100%;
        max-height: 200px;
        max-width: 200px;
        display: flex;
        margin-bottom: 20px;
        position: absolute;
        top: 184px;
    }
    .kclock {
        z-index: 2;
    }
    </style>
    <?php ?>
</body>
</html>