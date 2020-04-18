<template>
    <div class="row text-center wrapper-md">
        <div class="col">
            <h4 class="text-left padder">RED GOLD SITES</h4>
        </div>

        <add-form
            title="Додати сайт"
            url="site.add"
            :form="form"
        />
    </div>
</template>
<script>
    import AddForm from '@components/form/Add.vue'

    export default {
        components: {
            AddForm
        },
        data() {
            return {
                dialog: false,
                form: [
                    {
                        cols: 12,
                        type: 'text',
                        placeholder: 'Назва',
                        icon: 'mdi-television-guide'
                    },
                    {
                        cols: 6,
                        type: 'text',
                        placeholder: 'Url',
                        icon: 'mdi-link-variant'
                    },
                    {
                        cols: 6,
                        type: 'text',
                        placeholder: 'Назва',
                        icon: 'mdi-television-guide'
                    }
                ]
            }
        },
    }
</script>
