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
            :form="form"
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
