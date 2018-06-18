var song = undefined;
var flag = false;
var amp;
var volhistory = [];
var barWidth = 20;
var lastBar = -1;
var source, resulta;



//Récupération de la Source du Son
$('#Playlist_all_pages').each(function(){
  Playlist_all_pages.onclick = function(e) {
    e.preventDefault();
    var elm = e.target, 
    audio = document.getElementById('audio_a'), 
    source = document.getElementById('audioSource');
    source.src = elm.getAttribute('data-value');
    var idframe = source.src.indexOf('framework');
    if (typeof source.src === 'string' && idframe > 15 ) {
      var result = source.src.substring(idframe);
      resulta = result;
      setup();
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
    song = loadSound(
      "../"+String(resulta), 
      loaded,
      null,
      testSong
    );
    //Initialisation du fond
    createCanvas(800, 600);
    angleMode(DEGREES);
    //Récupération de l'amplitude
    if ( typeof song !== 'undefined'){
      amp = new p5.Amplitude();
    }
  }
}
//Function pour load la musique selectionné
function loaded(){
  song.load();
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

// function ButtonPlayer(){
//   $('#Play_Button div button').click(function(){
//     var id = $(this).attr("id");
//     console.log(id);
//       switch(id){
//         case 'icon_play':
//           if (song.isPlaying() === true) { 
//             song.pause();
//             background(255,0,0);
//           }else{
//             song.play();
//             background(0,255,0);
//           }
//         break;
//         //put your cases here
//       }
//   });
// }

//Test button
// $(document).ready(function() {
//   //Button Play
//   $('#Play_Button div button').click(function(){
//     var id = $(this).attr("id");
//       switch(id){
//         case 'icon_play':
//           if(song.isPlaying() === true){ 
//             song.pause();
//             background(255,0,0);
//           }else{
//             song.play();
//             background(0,255,0);
//           }
//         break;
//       }
//   });
// });