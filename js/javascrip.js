function mostrarReglas() {
    Swal.fire({
        title: 'REGLAS DEL JUEGO', 
        html: '<ol style="color: white;">' + // Color del texto establecido a negro
        '<li>Gana puntos al apostar en los números correctos y acertar en la ruleta.</li><br>' +
        '<li>Tienes una ruleta con 16 números para apostar</li><br>' +
        '<li>Dispones de 5 intentos para apostar.</li><br>' +
        '<li>En cada intento, elige un número en la ruleta.</li><br>' +
        '<li>La ruleta gira después de realizar la selección del número.</li><br>' +
        '<li>Si la ruleta se detiene en el número que apostaste, ganas 50 puntos; de lo contrario, no ganas puntos.</li><br>' +
        '<li>La cantidad de puntos es de 50 por cada número.</li><br>' +
        '<li>El juego termina después de 5 intentos.</li><br>' +
        '<li>Se muestra tu puntuación total después de cada juego.</li><br>' +
        '<li>Al final se muestra la tabla de posiciones, donde el jugador con más puntos será el ganador.</li><br>' +
    '</ol>',
        imageUrl: '../recursos/img/logo.png',
        imageWidth: 100,
        imageHeight: 100,
        confirmButtonText: 'OK',
        confirmButtonColor: '#7B1FA2',
        background: '#333333', 
        width: '800px',
        customClass: {
            title: 'custom-title',
        }
    });
}

