<template>
  <div>
    <v-simple-table
      :fixed-header="true"
    >
        <template v-slot:default>
          <thead v-if="fields">
            <tr>
              <th
                v-for="(field, name) in fields"
                :key="name"
                class="text-center red darken-2 white--text"
              >
                <span v-if="name != 'control'">{{ field }}</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(item, index) in items"
              :key="index"
            >
              <td
                v-for="(value, key) in fields"
              >
                <slot
                    v-if="key != 'control'"
                    :name="key"
                >
                    {{ item[key] }}
                </slot>
                  <router-link
                      v-if="key == 'control'"
                      :to="'/sites/' + item.id"
                  >
                      <v-btn
                          v-if="fields.control.edit"
                          icon
                          color="red"
                      >
                          <v-icon>mdi-pencil</v-icon>
                      </v-btn>
                  </router-link>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </div>
</template>
<script>
    export default {
        data: () => ({
            dialog: false,
        }),
        props: {
          fixedHeader: {
            type: Boolean,
            required: false,
            default: true
          },
          fields: {
            type: Object,
            required: false
          },
          items: {
            type: Array,
            required: false
          },
        }
    }
</script>
