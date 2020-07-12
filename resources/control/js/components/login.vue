<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card class="elevation-12">
              <v-toolbar
                color="primary"
                dark
                flat
              >
                <v-toolbar-title>Login form</v-toolbar-title>
                <v-spacer />
              </v-toolbar>
              <v-form ref="form" @submit.prevent="send" method="POST">
                  <v-card-text>
                    <v-text-field
                      v-model="form.email"
                      label="Email"
                      name="email"
                      type="text"
                    />
                    <span v-if="errors.email">{{ errors.email[0] }}</span>

                    <v-text-field
                      v-model="form.password"
                      id="password"
                      label="Password"
                      name="password"
                      type="password"
                    />
                    <span v-if="errors.password">{{ errors.password[0] }}</span>

                </v-card-text>
                <v-card-actions>
                  <v-spacer />
                  <v-btn color="primary" type="submit" @click.prevent="send">Login</v-btn>
                </v-card-actions>
              </v-form>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
  import axios from 'axios'

  export default {
    data () {
        return {
          form: {
            _token: window.csrf_token,
            email: '',
            password: ''
          },
          errors: {}
        }
    },
    props: {
      source: String,
    },
    methods: {
      send () {
        this.errors = {}

        axios.post(route('login'), this.form).then(response => {
            window.location.href = route('control').url()
        }).catch(errors => {
          if (errors.response && errors.response.data && errors.response.data.errors) {
              this.errors = {...errors.response.data.errors}
          }

          console.error(errors)
        })
      }
    }
  }
</script>
