
var players = [];
// generate array of videos (max 16 videos on page paginated)
for (i = 1; i < 17; i++) {
   var v = document.getElementById('player' + i);
   if (v) players[i-1] = new Plyr('#player' + i, {
      captions: { active: true, language: 'en' },
      controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'airplay', 'fullscreen']
   });
}

//not working by loop
players[0].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 0)
         players[x].pause();
   }  
});

players[1].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 1)
         players[x].pause();
   }  
});

players[2].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 2)
         players[x].pause();
   }  
});

players[3].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 3)
         players[x].pause();
   }  
});

players[4].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 4)
         players[x].pause();
   }  
});

players[4].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 4)
         players[x].pause();
   }  
});

players[5].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 5)
         players[x].pause();
   }  
});

players[6].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 6)
         players[x].pause();
   }  
});

players[7].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 7)
         players[x].pause();
   }  
});

players[8].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 8)
         players[x].pause();
   }  
});

players[9].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 9)
         players[x].pause();
   }  
});

players[10].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 10)
         players[x].pause();
   }  
});

players[11].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 11)
         players[x].pause();
   }  
});

players[12].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 12)
         players[x].pause();
   }  
});

players[13].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 13)
         players[x].pause();
   }  
});

players[14].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 14)
         players[x].pause();
   }  
});

players[15].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 15)
         players[x].pause();
   }  
});

players[16].on('play', event => {
   for (x = 0; x < players.length; x++) {
      if(x!= 16)
         players[x].pause();
   }  
});