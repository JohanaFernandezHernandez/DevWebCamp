document.addEventListener('DOMContentLoaded', () => {
    const lat = 43.369485 
    const lng = -5.8692573
    const zoom =  16

    const map = L.map('mapa').setView([lat, lng], zoom);
  
 L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
 }).addTo(map);
  
 L.marker([lat, lng]).addTo(map)
     .bindPopup(`
     <h2 class="mapa__heading">DevWevCamp</h2>
     <p class="mapa__texto">Centro de convenciones de Asturias</p>
     
     `)
     .openPopup();
 }); 