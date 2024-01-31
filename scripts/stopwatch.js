window.onload = function () {
  
    let millisecondes = 0o0;
    let secondes = 0o0;
    let minutes = 0o0;
    let displayMillisecondes = document.getElementById('millisecondes');
    let displaySecondes = document.getElementById('secondes');
    let displayMinutes = document.getElementById('minutes');
    let buttonStart = document.getElementById('start-button');
    let buttonStop = document.getElementById('stop-button');
    let buttonReset = document.getElementById('reset-button');
    let interval;
  
    buttonStart.onclick = function() {
        clearInterval(interval);
        interval = setInterval(startTimer, 10);
    }
    
    buttonStop.onclick = function() {
        clearInterval(interval);
    }
  
    buttonReset.onclick = function() {
        clearInterval(interval);
        millisecondes = "00";
        secondes = "00";
        minutes = "00";
        displayMillisecondes.innerHTML = millisecondes;
        displaySecondes.innerHTML = secondes;
        displayMinutes.innerHTML = minutes;     
    }
    
    // execution de la fonction à chaque interval
    function startTimer () {
        // millisecondes
        millisecondes++; 
        if(millisecondes <= 9) {
            displayMillisecondes.innerHTML = "0" + millisecondes;
        }
        if (millisecondes > 9) {
            displayMillisecondes.innerHTML = millisecondes;
        } 

        // secondes
        if (millisecondes > 99) {
            secondes++;
            displaySecondes.innerHTML = "0" + secondes;
            millisecondes = 0;
            displayMillisecondes.innerHTML = "0" + 0;
        }
        if (secondes > 9) {
            displaySecondes.innerHTML = secondes; 
        }

        // minutes
        if (secondes > 59) {
            minutes++;
            displayMinutes.innerHTML = "0" + minutes
            secondes = 0;
            displaySecondes.innerHTML = "0" + 0;
        }
        if (minutes > 9) {
            displayMinutes.innerHTML = minutes;
        }
    }
  }