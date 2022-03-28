<template>
    <div class="modal fade" id="modalUserActivate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal_title">{{title}}</h5>
            <button type="button" class="btn-close" @click.prevent="hideModal()" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <slot name="body"></slot>
        </div>
        <div class="modal-footer">
           <slot name="footer"></slot>
        </div>
        </div>
    </div>
    </div>
</template>
<script>
import { Modal } from 'bootstrap'; //Para poder utilizar modal en vue3 sin jquery
export default {
    props: ['title'],
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
