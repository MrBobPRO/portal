
//count all videos
var count = document.getElementsByTagName('video').length;

var players = [];
for (i = 0; i < count; i++) {
   var v = document.getElementById('player' + i);
   if (v) players[i] = new Plyr('#player' + i, {
      captions: { active: true, language: 'en' },
      controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'airplay', 'fullscreen']
   });
}

// Stop others players while playing active
function pauseInactivePlayers(id) {
   for (x = 0; x < players.length; x++) {
      if(x!= id)
         players[x].pause();
   }  
}
