<template>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Apellido y Nombre</td>
                    <td>D.N.I.</td>
                    <td>- - - -</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(empadronado,key) in empadronados" :key="key">
                    <td>{{key+1}}</td>
                    <td>{{empadronado.apellido_nombre}}</td>
                    <td>{{empadronado.dni}}</td>
                    <td>
                        <div class="btn-toolbar" role="toolbar">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <button type="button" class="btn btn-primary">
                                    <i class="bi bi-hand-thumbs-up-fill text-secondary iconos px-2"></i>
                                </button>
                            </div>
                            <div class="btn-group me-2" role="group">
                                <button type="button" class="btn btn-secondary">
                                    <i class="bi bi-hand-thumbs-up-fill text-secondary iconos px-2"></i>
                                </button>

                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-info">
                                    <i class="bi bi-hand-thumbs-up-fill text-secondary iconos px-2"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['empadronados'],
}
</script>
