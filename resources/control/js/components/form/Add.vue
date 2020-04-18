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
              v-for="(item, index) in form"
              :cols="item.cols"
              :key="index"
            >
              <v-text-field
                :prepend-icon="item.icon"
                :type="item.type"
                :placeholder="item.placeholder"
              />
            </v-col>
          </v-row>
        </v-container>
        <v-card-actions>
          <v-spacer />
          <v-btn
            text
            color="primary"
            @click="dialog = false"
          >Cancel</v-btn>
          <v-btn
            text
            @click="dialog = false"
          >Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
    export default {
        data: () => ({
            dialog: false,
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
          form: {
            type: Array,
            required: false
          },
        }
    }
</script>
