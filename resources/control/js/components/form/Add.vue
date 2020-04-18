<template>
  <div v-if="form">
    <v-btn
      bottom
      color="red"
      dark
      fab
      fixed
      right
      @click="dialog = !dialog"
    >
      <v-icon>mdi-plus</v-icon>
    </v-btn>
    <v-dialog
      v-model="dialog"
      width="800px"
    >
      <v-card>
        <v-card-title
          v-if="title"
          class="red darken-2 white--text"
        >
          {{ title }}
        </v-card-title>
        <v-container>
          <v-row class="mx-2">
            <v-col
              v-for="(item, index) in fields"
              :cols="item.cols"
              :key="index"
            >
              <v-text-field
                v-if="item.type == 'text'"
                v-model="form[item.name]"
                :prepend-icon="item.icon"
                :type="item.type"
                :placeholder="item.label"
              />
              <v-select
                v-if="item.type == 'select'"
                v-model="form[item.name]"
                :prepend-icon="item.icon"
                :items="item.items"
                :label="item.label"
                item-value="id"
                item-text="label"
              />
            </v-col>
          </v-row>
        </v-container>
        <v-card-actions>
          <v-spacer />
          <v-btn
            text
            @click="dialog = false"
          >Відміна</v-btn>
          <v-btn
            text
            color="primary"
            @click.prevent="send"
          >Продовжити</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
    export default {
        data: () => ({
            dialog: false,
            form: []
        }),
        props: {
          title: {
            type: String,
            required: false
          },
          url: {
            type: String,
            required: false
          },
          fields: {
            type: Array,
            required: false
          },
        },
        methods: {
          send () {
            console.log(this.form)
          }
        }
    }
</script>
