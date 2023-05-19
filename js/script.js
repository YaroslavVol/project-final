const modal = document.getElementById('modal');
const closeBtn = document.querySelector('.close');

const openModal = document.getElementById('openModal')

function getModal() {
    modal.style.display = 'block';

    const modalTitle = document.querySelector('.modal-content h2');

    
    modalTitle.textContent = '';

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });
      
    window.addEventListener('click', event => {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
}

openModal.addEventListener('click', () => {
    getModal()
})