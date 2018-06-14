var song;
var amp;
var volhistory = [];
var barWidth = 20;
var lastBar = -1;

//Function Pause
function mousePressed() {
  if ( song.isPlaying() ) { // .isPlaying() returns a boolean
    song.pause(); // .play() will resume from .pause() position
    background(255,0,0);
  } else {
    song.play();
    background(0,255,0);
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