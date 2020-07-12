<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
    >
      <v-list dense>
        <template v-for="item in items">
          <v-row
            v-if="item.heading"
            :key="item.heading"
            align="center"
          >
            <v-col cols="6">
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-col>
            <v-col
              cols="6"
              class="text-center"
            >
              <a
                href="#!"
                class="body-2 black--text"
              >EDIT</a>
            </v-col>
          </v-row>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon=""
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title>
                  {{ item.text }}
                </v-list-item-title>
              </v-list-item-content>
            </template>
            <v-list-item
              v-for="(child, i) in item.children"
              :key="i"
              link
              @click="go(child.route)"
            >
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  {{ child.text }}
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item
            v-else
            :key="item.text"
            link
            @click="go(item.route)"
          >
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                {{ item.text }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      app
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title
        style="width: 300px; cursor: pointer;"
        class="ml-0 pl-4"
        @click="go('main')"
      >
        <span class="hidden-sm-and-down">RED GOLD</span>
      </v-toolbar-title>
      <v-text-field
        flat
        solo-inverted
        hide-details
        prepend-inner-icon="mdi-magnify"
        label="Пошук"
        class="hidden-sm-and-down"
      />
      <v-spacer />
      <v-btn
        icon
        large
      >
        <v-avatar
          size="32px"
          item
        >
          <v-img
            :src="$store.state.user.gavatar"
            alt="Vuetify"
          /></v-avatar>
      </v-btn>
      <v-btn
        icon
        @click="exit"
      >
        <v-icon>mdi-exit-to-app</v-icon>
      </v-btn>
    </v-app-bar>
    <v-content>
      <v-container
        class="d-flex fill-height align-items-start white"
        fluid
      >
        <router-view class="white"/>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
  import axios from 'axios'

  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
      items: [
        { icon: 'mdi-television-guide', text: 'Сайти', route: 'sites' },
        { icon: 'mdi-contacts', text: 'Користувачі', route: 'users' },
        { icon: 'mdi-history', text: 'Останні дії', route: 'actions' },
        { icon: 'mdi-settings', text: 'Налаштування', route: 'settings' },
        {
          icon: 'mdi-chevron-up',
          'icon-alt': 'mdi-chevron-down',
          text: 'Більше',
          model: false,
          children: [
            { text: 'Імпорт', route: 'import' },
            { text: 'Експорт', route: 'export' },
          ],
        },
        { icon: 'mdi-help-circle', text: 'Допомога', route: 'help' },
      ],
    }),
    methods: {
      go(route) {
        this.$router.push({ name:route })
      },
      exit() {
        axios.post('/logout', {_token: window.csrf_token}).then(response => {
            window.location.href = '/control'
        }).catch(errors => {
          console.error(errors)
          window.location.href = '/control'
        })
      }
    }
  }
</script>
