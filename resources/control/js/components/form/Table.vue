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
                v-for="(value, key) in item"
              >
                <slot :name="key">{{ value }}</slot>
              </td>
              <td v-if="fields.control">
                <v-btn
                  v-if="fields.control.edit"
                  icon
                  color="red"
                >
                  <v-icon>mdi-pencil</v-icon>
                </v-btn>
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
            type: Object,
            required: false
          },
        }
    }
</script>
