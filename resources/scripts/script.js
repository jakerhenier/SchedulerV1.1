let webBody = document.querySelector('body');
let addButton = document.getElementById('add-button');
let closeButton = document.getElementById('close-button');
let descriptionModal = document.getElementById('post-description');
let addingForm = document.getElementById('compose-post');
let deletePopup = document.getElementById('confirm-delete');

let listItem = document.getElementsByClassName('list-item');
let modalItems = document.getElementsByClassName('modal-pages');

addButton.addEventListener('click', openAddForm);
closeButton.addEventListener('click', closeModal);
for (let x = 0; x < listItem.length; x++) listItem[x].addEventListener('click', openDescription);

function checkOpenModal() {
	for (let x = 0; x < modalItems.length; x++) {
		if (modalItems[x].style.display == 'block') {
			modalItems[x].style.display = 'none';
		}
	}
	closeButton.style.display = 'block';
}

function openAddForm() {
	let addForm = document.getElementById('adding-form');
    
    checkOpenModal();
    if(addForm.style.display = 'none') {
        addForm.style.display = 'block';
    }
}

function openEditForm() {
	let editForm = document.getElementById('editing-form');

	checkOpenModal();
	if(editForm.style.display = 'none') {
        editForm.style.display = 'block';
    }
}

function openDescription() {
	checkOpenModal();
	descriptionModal.style.display = 'block';
}

function confirmDelete() {
	console.log('deleting...');
	if (deletePopup.style.display = 'none') {
		deletePopup.style.display = 'grid';
	}
}

function closeModal() {
	for (let x = 0; x < modalItems.length; x++) {
    	modalItems[x].style.display = 'none';
	}
	closeButton.style.display = 'none';
}