<template>
    <div class="content">
        <table id="empadronados" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Apellido/s y Nombre/s</th>
                    <th scope="col">D.N.I.</th>
                    <th scope="col">Llamado</th>
                    <th scope="col">Intención de Voto</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(empadronado, key) in empadronados" :key="key">
                    <td>{{ key + 1}}</td>
                    <td>{{ empadronado.apellido_nombre }}</td>
                    <td>{{ empadronado.dni }}</td>
                    <td>
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-telephone-plus-fill text-primary iconos px-2"></i>
                        </a>
                    </td>
                    <td>
                        <div>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-hand-thumbs-up-fill text-success iconos px-2"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-hand-thumbs-down-fill text-danger iconos px-2"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-question-circle-fill text-info iconos px-2"></i>
                            </a>
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
    methods: {

    },
    mounted() {

    }
}
</script>
