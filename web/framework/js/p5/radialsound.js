var song = undefined;
var flag = false;
var amp;
var volhistory = [];
var barWidth = 20;
var lastBar = -1;
var source, resulta;
var BtnPlay = $('#icon_play');
var music, Tmusic;


//Récupération de la Source du Son
$('#Playlist_pages table tbody').each(function(){
  tab_music.onclick = function(e) {
    e.preventDefault();
    var elm = e.target, 
    audio = document.getElementById('audio_a'), 
    source = document.getElementById('audioSource');
    source.src = elm.getAttribute('data-value');
    id_music = elm.getAttribute('id');
    var idframe = source.src.indexOf('framework');
    if (typeof source.src === 'string' && idframe > 15 ) {
      var result = source.src.substring(idframe);
      resulta = result;
      setup();
      getMusic(id_music);
    }
  };
});

//function LineOndes
function LineOndes(volhistory, vol, i, max, mini, maxi){
  var r = map(volhistory[i], vol, max, mini, maxi);
  var rx = r * cos(i);
  var ry = r * sin(i);
  return vertex(rx, ry); 
}
//Function de lancement
function setup() {
  if( typeof resulta !== 'undefined'){
    //Charge le sons
    if( flag === true ){
      song.stop();
    }
    //resulta = resulta.replace(/../i, '');
    //console.log(resulta);
    song = loadSound(
      String(resulta), 
      loaded,
      null,
      testSong
    );
    //Initialisation du fond
    createCanvas(800, 600);
    angleMode(DEGREES);
    //défillement auto
    // if( song.isPlaying() === false ){
    //   song.onended(myCallback);
    // }
    //Récupération de l'amplitude
    if ( typeof song !== 'undefined'){
      amp = new p5.Amplitude();
    }
  }
}

//Function pour load la musique selectionné
function loaded(){
  song.load();
  console.log('Son Chargé');
}

var sound,
     myCallback = function() {
          console.info("sound finished");
          oldsound = String("./"+resulta);
          playliste_music = jQuery.grep(playliste_music, function( a ) {
              return a !== oldsound;
          });  

          resulta = playliste_music[0];
          console.log(resulta);
          setup();
          //resulta = playliste_music.first();
       }

//Test si un sons est en cours, false => lancer Sons, true => up flag
function testSong(){
  var SonsPlaying = song.isPlaying();
  if ( SonsPlaying === false ){
      song.play();
  }
  if ( SonsPlaying === true ){
    flag = true;
  }
}
//Corp
function draw() {
  if ( typeof amp !== 'undefined'){
    background("rgb(26, 26, 26)");
    var vol = amp.getLevel();
    volhistory.push(vol);
    translate(width / 2, height / 2);
    beginShape();
    update();
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
}
//Function pression Clavier
function keyPressed() {
  if (keyCode === ENTER ) {
    song.stop();
  } 
}

function togglePlaying() {
  if (!song.isPlaying()) {
    song.play();
    // song.setVolume(0.3);
  } else {
    song.pause();
  }
}

//Récupére les info son:

//Times sont
function getTimeMusic(){
  return song.currentTime();
}
function getDurationMusic(){
  return song.duration();
}



//Function Pause souris
// function mousePressed() {
//   if ( song.isPlaying() ) { // .isPlaying() returns a boolean
//     song.stop(); // .play() will resume from .pause() position
//     background(255,0,0);
//   } else {
//     song.play();
//     background(0,255,0);
//   }
// }