function closeModal(id){
    let myModalEl = document.getElementById(id);
    let modal = bootstrap.Modal.getInstance(myModalEl)
    modal.hide();
}