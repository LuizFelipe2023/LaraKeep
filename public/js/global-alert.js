const hideAlert = (el) => {
    if (el) {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.5s ease';
        setTimeout(() => el.remove(), 500);
    }
};

const setupAutoHide = () => {
    const el = document.getElementById('global-alert');
    if (el) {
        setTimeout(() => hideAlert(el), 5000);
    }
};

document.addEventListener('livewire:navigated', setupAutoHide);
document.addEventListener('DOMContentLoaded', setupAutoHide);

document.addEventListener('livewire:init', () => {
    Livewire.on('notify', (event) => {
        const oldAlert = document.getElementById('global-alert');
        if (oldAlert) oldAlert.remove();

        const snackbar = document.createElement('div');
        snackbar.className = 'keep-snackbar';
        snackbar.id = 'global-alert';
        
        snackbar.innerHTML = `
            <span>${event.message}</span>
            <button type="button" class="snackbar-close" onclick="this.parentElement.remove()">
                FECHAR
            </button>
        `;
        
        document.body.appendChild(snackbar);
        setTimeout(() => hideAlert(snackbar), 5000);
    });
});