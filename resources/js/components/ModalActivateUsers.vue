<template>
    <div class="modal fade" id="modalUserActivate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal_title">Cambiar Estado de Usuario: Apellido, Nombre</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            HOLA MUNDO MODAL
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
        </div>
    </div>
    </div>
</template>
<script>
import { Modal } from 'bootstrap'; //Para poder utilizar modal en vue3 sin jquery
export default {
    props: ['user'],
    data() {
        return {
            modal: null,
            selectedUser: null,
        }
    },
    methods: {
        showModal() {
           this.modal.show();
        },
        hideModal() {
            this.modal.hide();
        },
    },
    mounted() {
        this.modal = new Modal(document.getElementById('modalUserActivate'))
    }
}
</script>
