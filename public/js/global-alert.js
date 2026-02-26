const hideAlert = () => {
    const el = document.getElementById('global-alert');
    if (el) {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.5s ease';
        
        setTimeout(() => el.remove(), 500);
    }
};

document.addEventListener('DOMContentLoaded', () => {
    setTimeout(hideAlert, 5000);
});

document.addEventListener('livewire:init', () => {
    Livewire.on('note-deleted', (event) => {
        const snackbar = document.createElement('div');
        snackbar.className = 'keep-snackbar';
        snackbar.id = 'global-alert';
        snackbar.innerHTML = `
            <span>${event.message}</span>
            <button type="button" class="btn btn-sm btn-link text-warning text-decoration-none fw-bold" 
                    onclick="this.parentElement.remove()">FECHAR</button>
        `;
        
        document.body.appendChild(snackbar);

        setTimeout(() => {
            snackbar.style.opacity = '0';
            setTimeout(() => snackbar.remove(), 500);
        }, 5000);
    });
});