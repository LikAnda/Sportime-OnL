window.onload = function () {
  
    let milisecondes = 0o0;
    let secondes = 0o0;
    let minutes = 0o0;
    let displayMilisecondes = document.getElementById('milisecondes');
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
        milisecondes = "00";
        secondes = "00";
        minutes = "00";
        displayMilisecondes.innerHTML = milisecondes;
        displaySecondes.innerHTML = secondes;
        displayMinutes.innerHTML = minutes;     
    }
    
    function startTimer () {
        // milisecondes
        milisecondes++; 
        if(milisecondes <= 9) {
            displayMilisecondes.innerHTML = "0" + milisecondes;
        }
        if (milisecondes > 9) {
            displayMilisecondes.innerHTML = milisecondes;
        } 

        // secondes
        if (milisecondes > 99) {
            secondes++;
            displaySecondes.innerHTML = "0" + secondes;
            milisecondes = 0;
            displayMilisecondes.innerHTML = "0" + 0;
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