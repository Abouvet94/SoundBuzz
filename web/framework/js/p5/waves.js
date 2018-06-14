var barWidth = 20;
var lastBar = -1;

var song, analyzer;
var yoff = 0.0;        // 2nd dimension of perlin noise

function preload() {
  song = loadSound('framework/js/audio/01.mp3');
}

function setup() {
  //Changer la talle de fond
  createCanvas(900, 400);
  song.play();
  analyzer = new p5.Amplitude();
  analyzer.setInput(song);
  //Color
  colorMode(HSB, width, height, 140); 
  noStroke();
}
  
function draw() {
  background(51);
  
  //fill(255);
  beginShape(); 

  var rms = analyzer.getLevel();
  var whichBar = rms / barWidth;
  //fill(127);
  stroke(0);

  var xoff = yoff; // Option #2: 1D Noise

  // Draw an ellipse with size based on volume
  //ellipse(width/2, height/2, 10+rms*200, 10+rms*200);
  
  // Iterate over horizontal pixels
  for (var x = 0; x <= width; x += 0.55) {
    // Calculate a y value according to noise, map to 
    
    // Option #1: 2D Noise
    //var y = map(noise(xoff, yoff), 0, 1, 200,300);

    // Option #2: 1D Noise
    var y = map(noise(rms * xoff), 0, 2, 200,300);
    // Set the vertex
    vertex(x, rms + y); 
    // Increment x dimension for noise
    xoff += rms;
    yoff += rms;
  }
  if (whichBar != lastBar) {
    var barX = whichBar * barWidth;
    fill(barX, rms, rms * height);
    rect(barX, 1, barWidth, rms * height);
    lastBar = whichBar;
  }
  // increment y dimension for noise
  vertex(width, height);
  vertex(0, height);
  endShape(CLOSE);
}

function mousePressed() {
  if ( song.isPlaying() ) { // .isPlaying() returns a boolean
    song.pause(); // .play() will resume from .pause() position
    background(255,0,0);
  } else {
    song.play();
    background(0,255,0);
  }
}