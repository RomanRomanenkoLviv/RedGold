<template>
    <div class="row text-center wrapper-md">
        <div class="col">
            <h4 class="text-left padder mb-3 red--text text--darken-2">Редагування сайту</h4>
            <h1>{{ item.title }}</h1>

            <v-container>
                <v-row class="mx-2">
                    <v-col
                        v-for="(field, index) in fields"
                        :cols="field.cols"
                        :key="index"
                    >
                        <v-text-field
                            v-if="field.type == 'text'"
                            v-model="form[field.name]"
                            :prepend-icon="field.icon"
                            :type="field.type"
                            :placeholder="field.label"
                        />
                        <v-select
                            v-if="field.type == 'select'"
                            v-model="form[field.name]"
                            :prepend-icon="field.icon"
                            :items="field.items"
                            :label="field.label"
                            item-value="id"
                            item-text="label"
                        />
                    </v-col>
                </v-row>
            </v-container>
        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    data () {
        return {
            item: {},
            form: [],
            fields: [
                {
                    cols: 6,
                    type: 'text',
                    name: 'title',
                    label: 'Назва',
                    icon: 'mdi-television-guide'
                },
                {
                    cols: 6,
                    type: 'text',
                    name: 'url',
                    label: 'Url',
                    icon: 'mdi-link-variant'
                },
                {
                    cols: 6,
                    type: 'select',
                    name: 'time',
                    label: 'Час показу',
                    icon: 'mdi-timer-sand',
                    items: [
                        {
                            id: 30,
                            label: '30 секунд (1,2 кр./показ)',
                        },
                        {
                            id: 45,
                            label: '45 секунд (2 кр./показ)',
                        },
                        {
                            id: 60,
                            label: '60 секунд (2,5 кр./показ)',
                        },
                        {
                            id: 75,
                            label: '75 секунд (3 кр./показ)',
                        },
                        {
                            id: 90,
                            label: '90 секунд (4 кр./показ)',
                        },
                        {
                            id: 105,
                            label: '105 секунд (4,5 кр./показ)',
                        },
                        {
                            id: 120,
                            label: '120 секунд (5,5 кр./показ)',
                        },
                        {
                            id: 150,
                            label: '150 секунд (6,5 кр./показ)',
                        },
                        {
                            id: 180,
                            label: '180 секунд (8,5 кр./показ)',
                        },
                        {
                            id: 210,
                            label: '210 секунд (10 кр./показ)',
                        },
                        {
                            id: 240,
                            label: '240 секунд (12 кр./показ)',
                        },
                        {
                            id: 270,
                            label: '270 секунд (13,5 кр./показ)',
                        },
                        {
                            id: 300,
                            label: '300 секунд (15 кр./показ)',
                        }
                    ],
                },
                {
                    cols: 6,
                    type: 'select',
                    name: 'uniqueip',
                    label: 'Унікальний IP',
                    icon: 'mdi-ip-network-outline',
                    items: [
                        {
                            id: 0,
                            label: 'Ні',
                        },
                        {
                            id: 6,
                            label: 'Так, на протязі 6 годин',
                        },
                        {
                            id: 12,
                            label: 'Так, на протязі 12 годин',
                        },
                        {
                            id: 24,
                            label: 'Так, на протязі 24 годин',
                        },
                        {
                            id: 48,
                            label: 'Так, на протязі 2 діб',
                        },
                        {
                            id: 60,
                            label: 'Так, на протязі 3 діб',
                        },
                        {
                            id: 72,
                            label: 'Так, на протязі 4 діб',
                        },
                        {
                            id: 84,
                            label: 'Так, на протязі 5 діб',
                        }
                    ],
                },
                {
                    cols: 6,
                    type: 'text',
                    name: 'impfrom',
                    label: 'Інтервал між показами від (сек)',
                    icon: 'mdi-timer'
                },
                {
                    cols: 6,
                    type: 'text',
                    name: 'impto',
                    label: 'Інтервал між показами до (сек)',
                    icon: 'mdi-timer-off'
                },
                {
                    cols: 6,
                    type: 'text',
                    name: 'hourlimit',
                    label: 'Ліміт показів в годину',
                    icon: 'mdi-av-timer'
                },
                {
                    cols: 6,
                    type: 'text',
                    name: 'daylimit',
                    label: 'Ліміт показів на добу',
                    icon: 'mdi-clock-outline'
                },
            ],
        }
    },
    created () {
        axios.get(route('sites.show', this.$route.params.id)).then((response) => {
            this.item = response.data.data
            this.form = response.data.data
        })

    }
}
</script>
