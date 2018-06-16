var song;
var amp;
var volhistory = [];
var barWidth = 20;
var lastBar = -1;
var source, resulta;

// var playermusic = document.getElementById('playermusic');
//Function Pause souris
// function mousePressed() {
//   if ( song.isPlaying() ) { // .isPlaying() returns a boolean
//     song.pause(); // .play() will resume from .pause() position
//     background(255,0,0);
//   } else {
//     song.play();
//     background(0,255,0);
//   }
// }

$('#playermusic').each(function(){
  playermusic.onclick = function(e) {
    e.preventDefault();
    var elm = e.target, 
    audio = document.getElementById('audio_a'), 
    source = document.getElementById('audioSource');
    source.src = elm.getAttribute('data-value');
    var idframe = source.src.indexOf('framework');
      if(idframe.value == '')
        {
          alert('hello world');
        }
    if (typeof source.src === 'string' && idframe > 15 ) {
      var result = source.src.substring(idframe);
      resulta = result;
    }
  };
});

function preload(){
  if(resulta){
    song = loadSound("../"+resulta);
  }else{
    song = loadSound("../framework/audio/dj_anilson.mp3");
  }
}

//function LineOndes
function LineOndes(volhistory, vol, i, max, mini, maxi){
  var r = map(volhistory[i], vol, max, mini, maxi);
  var rx = r * cos(i);
  var ry = r * sin(i);
  return vertex(rx, ry); 
}

//Function de lancement
function setup() {
    console.log(resulta);
    createCanvas(800, 600);
    angleMode(DEGREES);
    song.play();
    amp = new p5.Amplitude();  
}

//Corp
function draw() {
      background("rgb(26, 26, 26)");
      var vol = amp.getLevel();
      volhistory.push(vol);
    
      translate(width / 2, height / 2);
      beginShape();
    
      //Joue sur la couleur de la ligne
      stroke(255, 200, 0);
      strokeWeight(1);
      noFill();
    
      for (var i = 0; i < 360; i++) {
        LineOndes(volhistory, vol, i, 1.1, 250, 300);
      }
    
      endShape();
    
      if (volhistory.length > 360) {
        volhistory.splice(0, 1);
      }
    }