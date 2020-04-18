<template>
    <div class="row text-center wrapper-md">
        <div class="col">
            <h4 class="text-left padder mb-3 red--text text--darken-2">Активні сайти</h4>
            <table-list
                :fields="fields"
                :items="items"
            />
        </div>

        <add-form
            title="Додати сайт"
            url="site.add"
            :fields="addFields"
        />
    </div>
</template>
<script>
    import AddForm from '@components/form/Add.vue'
    import TableList from '@components/form/Table.vue'

    export default {
        components: {
            AddForm,
            TableList
        },
        data() {
            return {
                dialog: false,
                addFields: [
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
                fields: {
                    title: 'Назва',
                    url: 'Посилання',
                    balance: 'Баланс',
                    hits: 'Показів',
                    hosts: 'Унікальних',
                    user: 'Власник',
                    control: {
                        edit: true
                    }
                },
                items: {
                    0: {
                        title: 'Строй свой Дом',
                        url: 'stroy-svoj-dom.ua',
                        balance: '1000 RG',
                        hits: '1000',
                        hosts: '200',
                        user: 'Орест',
                    },
                    1: {
                        title: 'Свой Дом построй',
                        url: 'svoj-dom-postroy.ua',
                        balance: '10 RG',
                        hits: '10000',
                        hosts: '2400',
                        user: 'Орест',
                    },
                    2: {
                        title: 'Построй свой Дом',
                        url: 'postroy-svoj-dom.ua',
                        balance: '100 RG',
                        hits: '100',
                        hosts: '15',
                        user: 'Орест',
                    },
                    3: {
                        title: 'Строй свой Дом',
                        url: 'stroy-svoj-dom.ua',
                        balance: '1000 RG',
                        hits: '1000',
                        hosts: '200',
                        user: 'Орест',
                    },
                    4: {
                        title: 'Свой Дом построй',
                        url: 'svoj-dom-postroy.ua',
                        balance: '10 RG',
                        hits: '10000',
                        hosts: '2400',
                        user: 'Орест',
                    },
                    5: {
                        title: 'Построй свой Дом',
                        url: 'postroy-svoj-dom.ua',
                        balance: '100 RG',
                        hits: '100',
                        hosts: '15',
                        user: 'Орест',
                    },
                    6: {
                        title: 'Строй свой Дом',
                        url: 'stroy-svoj-dom.ua',
                        balance: '1000 RG',
                        hits: '1000',
                        hosts: '200',
                        user: 'Орест',
                    },
                    7: {
                        title: 'Свой Дом построй',
                        url: 'svoj-dom-postroy.ua',
                        balance: '10 RG',
                        hits: '10000',
                        hosts: '2400',
                        user: 'Орест',
                    },
                    8: {
                        title: 'Построй свой Дом',
                        url: 'postroy-svoj-dom.ua',
                        balance: '100 RG',
                        hits: '100',
                        hosts: '15',
                        user: 'Орест',
                    },
                    9: {
                        title: 'Строй свой Дом',
                        url: 'stroy-svoj-dom.ua',
                        balance: '1000 RG',
                        hits: '1000',
                        hosts: '200',
                        user: 'Орест',
                    },
                    10: {
                        title: 'Свой Дом построй',
                        url: 'svoj-dom-postroy.ua',
                        balance: '10 RG',
                        hits: '10000',
                        hosts: '2400',
                        user: 'Орест',
                    },
                    11: {
                        title: 'Построй свой Дом',
                        url: 'postroy-svoj-dom.ua',
                        balance: '100 RG',
                        hits: '100',
                        hosts: '15',
                        user: 'Орест',
                    },
                    12: {
                        title: 'Построй свой Дом',
                        url: 'postroy-svoj-dom.ua',
                        balance: '100 RG',
                        hits: '100',
                        hosts: '15',
                        user: 'Орест',
                    },
                    13: {
                        title: 'Строй свой Дом',
                        url: 'stroy-svoj-dom.ua',
                        balance: '1000 RG',
                        hits: '1000',
                        hosts: '200',
                        user: 'Орест',
                    },
                    14: {
                        title: 'Свой Дом построй',
                        url: 'svoj-dom-postroy.ua',
                        balance: '10 RG',
                        hits: '10000',
                        hosts: '2400',
                        user: 'Орест',
                    },
                    15: {
                        title: 'Построй свой Дом',
                        url: 'postroy-svoj-dom.ua',
                        balance: '100 RG',
                        hits: '100',
                        hosts: '15',
                        user: 'Орест',
                    },
                    16: {
                        title: 'Строй свой Дом',
                        url: 'stroy-svoj-dom.ua',
                        balance: '1000 RG',
                        hits: '1000',
                        hosts: '200',
                        user: 'Орест',
                    },
                    17: {
                        title: 'Свой Дом построй',
                        url: 'svoj-dom-postroy.ua',
                        balance: '10 RG',
                        hits: '10000',
                        hosts: '2400',
                        user: 'Орест',
                    },
                    18: {
                        title: 'Построй свой Дом',
                        url: 'postroy-svoj-dom.ua',
                        balance: '100 RG',
                        hits: '100',
                        hosts: '15',
                        user: 'Орест',
                    },
                    19: {
                        title: 'Строй свой Дом',
                        url: 'stroy-svoj-dom.ua',
                        balance: '1000 RG',
                        hits: '1000',
                        hosts: '200',
                        user: 'Орест',
                    },
                    20: {
                        title: 'Свой Дом построй',
                        url: 'svoj-dom-postroy.ua',
                        balance: '10 RG',
                        hits: '10000',
                        hosts: '2400',
                        user: 'Орест',
                    },
                }
            }
        },
    }
</script>
