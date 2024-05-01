function goToRoulette(button) {
    // Obtener el texto del botón marcado
    const option = button.innerText;
    
    // Almacenar la opción seleccionada en el almacenamiento local
    localStorage.setItem('selectedOption', option);
    
    // Redirigir a la página de la ruleta
    window.location.href = '../vista/Ruleta.php';
}