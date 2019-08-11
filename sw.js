importScripts('/assets/js/cache-polyfill.js');


self.addEventListener('install', function(e) {
 e.waitUntil(
   caches.open('airhorner').then(function(cache) {
     return cache.addAll([
       '/',
       '/index.html',
       '/index.html?homescreen=1',
       '/?homescreen=1',
       '/assets/css/responsive_flex-grid.min.css',
       '/assets/css/style.min.css'
     ]);
   })
 );
});


self.addEventListener('fetch', function(event) {
//   console.log(event.request.url);
  event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});