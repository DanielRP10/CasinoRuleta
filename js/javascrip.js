function mostrarReglas() {
    Swal.fire({/*Swal.fire: se utiliza para mostrar una pantalla emergente*/
        title: 'REGLAS DEL JUEGO', 
        html: '<ol>' +
        '<li>Gana puntos al apostar en las figuras correctas y acertar en la ruleta.</li><br>' +
        '<li>Tienes un tablero con 16 figuras para apostar.</li><br>' +
        '<li>Dispones de 5 intentos para apostar.</li><br>' +
        '<li>En cada intento, coloca una ficha en una figura del tablero.</li><br>' +
        '<li>La ruleta gira después de realizar las apuestas.</li><br>' +
        '<li>Si la ruleta se detiene en una figura en la que apostaste, ganas puntos; de lo contrario, no ganas puntos.</li><br>' +
        '<li>La cantidad de puntos ganados depende de la figura y el tablero.</li><br>' +
        '<li>El juego termina después de 5 intentos.</li><br>' +
        '<li>Se muestra tu puntuación total después de cada juego.</li><br>' +
        '<li>Al final se muestra la tabla de posiciones, donde el jugador con más puntos será el ganador.</li><br>' +
    '</ol>',/*CREANDO LISTA ORDENADA*/
        imageURL: 'log.png',
        imageWidth: 400,
        imageHeight: 200,
        confirmButtonText: 'OK',
        confirmButtonColor: '#ff0000',
        width: '800px',
    });
}