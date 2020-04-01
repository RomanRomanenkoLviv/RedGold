<template>
    <nav ui-nav class="navi clearfix">
        <ul class="nav">
            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>{{ _('Навігація') }}</span>
            </li>
            <router-link tag="li" to="/" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-stats icon"></i>
                    <span class="font-bold">{{ _('Головна') }}</span>
                </a>
            </router-link>

            <li v-if="deliveryAccess" class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>{{ _('Доставка') }}</span>
            </li>

            <li v-if="deliveryAccess" class="line dk"></li>

            <router-link v-if="$store.getters.getAccesses.ordersAccess" tag="li" :to="{ name: 'orders' }" active-class="active" exact>
                <a>
                    <i class="fa fa-truck icon"></i>
                    <b v-if="newOrdersCount" class="badge bg-info pull-right">{{ newOrdersCount }}</b>
                    <span class="font-bold">{{ _('Замовлення') }}</span>
                </a>
            </router-link>

            <li v-if="reservationsAccess" class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>{{ _('Бронювання') }}</span>
            </li>

            <li v-if="reservationsAccess" class="line dk"></li>

            <router-link v-if="$store.getters.getAccesses.reservationsAccess" tag="li" :to="{ name: 'reservations', query:{ type: 'table' } }" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-glass icon"></i>
                    <b v-if="newReservationTableCount" class="badge bg-info pull-right">{{ newReservationTableCount }}</b>
                    <span class="font-bold">{{ _('Столики') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.reservationsAccess" tag="li" :to="{ name: 'reservations', query:{ type: 'cake' } }" active-class="active" exact>
                <a>
                    <i class="fa fa-birthday-cake icon"></i>
                    <b v-if="newReservationCakeCount" class="badge bg-info pull-right">{{ newReservationCakeCount }}</b>
                    <span class="font-bold">{{ _('Торти') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.reservationsAccess" tag="li" :to="{ name: 'reservations', query:{ type: 'cake-custom' } }" active-class="active" exact>
                <a>
                    <i class="fa fa-birthday-cake icon"></i>
                    <b v-if="newReservationCakeCustomCount" class="badge bg-info pull-right">{{ newReservationCakeCustomCount }}</b>
                    <span class="font-bold">{{ _('Власні торти') }}</span>
                </a>
            </router-link>

<!--            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">-->
<!--                <span>{{ _('Доставка') }}</span>-->
<!--            </li>-->

<!--            <li class="line dk"></li>-->

            <li v-if="kitchenAccess" class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>{{ _('Кухня') }}</span>
            </li>

            <li v-if="kitchenAccess" class="line dk"></li>

            <router-link v-if="$store.getters.getAccesses.categoryAccess" tag="li" :to="{ name: 'categories'}" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-list icon"></i>
                    <span class="font-bold">{{ _('Категорії') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.relatedProductsAccess" tag="li" :to="{ name: 'related_products'}" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-plus-sign icon"></i>
                    <span class="font-bold">{{ _('До категорії') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.menusAccess" tag="li" :to="{ name: 'menus'}" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-list icon"></i>
                    <span class="font-bold">{{ _('Меню') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.cakesAccess" tag="li" :to="{ name: 'cakes.index'}" active-class="active" exact>
                <a>
                    <i class="fa fa-birthday-cake icon"></i>
                    <span class="font-bold">{{ _('Торти') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.cakesFillingAccess" tag="li" :to="{ name: 'cakes_filling'}" active-class="active" exact>
                <a>
                    <i class="fa fa-database icon"></i>
                    <span class="font-bold">{{ _('Начинки тортів') }}</span>
                </a>
            </router-link>

            <li v-if="projectsAccess" class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>{{ _('Сторінки') }}</span>
            </li>

            <li v-if="projectsAccess" class="line dk"></li>

            <router-link v-if="$store.getters.getAccesses.cafeAccess" tag="li" :to="{ name: 'cafe'}" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-file icon"></i>
                    <span class="font-bold">{{ _('Ring Cafe') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.coffeeAccess" tag="li" :to="{ name: 'coffee'}" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-file icon"></i>
                    <span class="font-bold">{{ _('Ring Coffee') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.djAccess" tag="li" :to="{ name: 'dj'}" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-file icon"></i>
                    <span class="font-bold">{{ _('Ring Dj') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.contactsAccess" tag="li" :to="{ name: 'contacts'}" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-phone-alt icon"></i>
                    <span class="font-bold">{{ _('Про компанію') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.privacyAccess" tag="li" :to="{ name: 'privacy'}" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-file icon"></i>
                    <span class="font-bold">{{ _('Конфіденційність') }}</span>
                </a>
            </router-link>

            <li v-if="additionalsAccess" class="line dk"></li>

            <router-link v-if="$store.getters.getAccesses.residentsAccess" tag="li" :to="{ name: 'residents'}" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-headphones icon"></i>
                    <span class="font-bold">{{ _('Резиденти') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.feedbacksAccess" tag="li" :to="{ name: 'feedbacks'}" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-envelope icon"></i>
                    <b v-if="newFeedbackCount" class="badge bg-info pull-right">{{ newFeedbackCount }}</b>
                    <span class="font-bold">{{ _('Відгуки') }}</span>
                </a>
            </router-link>

            <router-link v-if="$store.getters.getAccesses.usersAccess" tag="li" :to="{ name: 'users' }" active-class="active" exact>
                <a>
                    <i class="glyphicon glyphicon-user icon"></i>
                    <span class="font-bold">{{ _('Користувачі') }}</span>
                </a>
            </router-link>

            <li v-if="settingsAccess" class="line dk"></li>

            <router-link v-if="$store.getters.getAccesses.settingsAccess" tag="li" :to="{ name: 'settings' }" active-class="active" exact>
                <a>
                    <i class="fa fa-cog"></i>
                    <span class="font-bold">{{ _('Налаштування') }}</span>
                </a>
            </router-link>
        </ul>
    </nav>
</template>

<script>
export default {
    props: {
        newFeedbackCount: {
            type: Number,
            required: true
        },
        newOrdersCount: {
            type: Number,
            required: true
        },
        newReservationTableCount: {
            type: Number,
            required: true
        },
        newReservationCakeCount: {
            type: Number,
            required: true
        },
        newReservationCakeCustomCount: {
            type: Number,
            required: true
        }
    },
    computed: {
        deliveryAccess () {
            return this.$store.getters.getAccesses.ordersAccess
        },
        reservationsAccess () {
            return this.$store.getters.getAccesses.reservationsAccess
        },
        kitchenAccess () {
            return this.$store.getters.getAccesses.categoryAccess ||
                this.$store.getters.getAccesses.relatedProductsAccess ||
                this.$store.getters.getAccesses.menusAccess ||
                this.$store.getters.getAccesses.cakesAccess ||
                this.$store.getters.getAccesses.cakesFillingAccess
        },
        projectsAccess () {
            return this.$store.getters.getAccesses.cafeAccess ||
                this.$store.getters.getAccesses.coffeeAccess ||
                this.$store.getters.getAccesses.djAccess ||
                this.$store.getters.getAccesses.contactsAccess ||
                this.$store.getters.getAccesses.privacyAccess
        },
        additionalsAccess () {
            return this.$store.getters.getAccesses.residentsAccess ||
                this.$store.getters.getAccesses.feedbacksAccess ||
                this.$store.getters.getAccesses.usersAccess
        },
        settingsAccess () {
            return this.$store.getters.getAccesses.settingsAccess
        }
    }
}
</script>

<style>
    li.router-link-exact-active > a {
        color: #ffffff;
        background-color: #2e3344;
    }
</style>
