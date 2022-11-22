window.addEventListener('DOMContentLoaded', event => {
    const datatablesPenghargaan = document.getElementById('datatables');
    if (datatablesPenghargaan) {
        new simpleDatatables.DataTable(datatablesPenghargaan);
    }
});