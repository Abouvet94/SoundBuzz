var song;
var button;

function playsong(){
    if (song.isPlaying()){
        song.pause();
    } else {
        song.play();
    }
}

function preload() {
    song = loadSound('framework/js/audio/01.mp3');
}

function setup(){
    createCanvas(200,200);
    button = createButton('play');
    button.mousePressed(playsong);
    song.play();
}

function draw(){
    background(0);
    var vol = 1;
    ellipse(100, 100, 200, vol * 200);
}