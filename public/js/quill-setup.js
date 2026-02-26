
function initLaraKeepEditor(containerId, propertyName, component) {
    const quill = new Quill(containerId, {
        theme: 'snow',
        placeholder: 'Criar uma nota...',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ 'list': 'bullet' }],
                ['clean']
            ]
        }
    });

    quill.on('text-change', () => {
        let html = quill.root.innerHTML;
        component.set(propertyName, html);
    });

    return quill;
}