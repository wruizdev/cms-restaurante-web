function actualizarBadgeNuevasReservas() {
    fetch('/admin/reservas/nuevas')
        .then(response => response.json())
        .then(data => {
            const badge = document.getElementById('badge-nuevas-reservas');
            if (!badge) return;

            if (data.nuevas > 0) {
                badge.textContent = data.nuevas + ' nueva' + (data.nuevas > 1 ? 's' : '') + ' reserva' + (data.nuevas > 1 ? 's' : '');
                badge.style.display = 'inline-block';
            } else {
                badge.style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error al obtener nuevas reservas:', error);
        });
}

document.addEventListener('DOMContentLoaded', function () {
    actualizarBadgeNuevasReservas();
    setInterval(actualizarBadgeNuevasReservas, 10000);
});
