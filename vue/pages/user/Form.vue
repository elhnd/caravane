<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on }">
        <v-btn :color="color" :small="small" fab dark v-on="on"  >
          <v-icon dark>{{icon}}</v-icon>
        </v-btn>
      </template>
      <slot></slot>
      <v-card>
        <v-card-title>
          <span class="headline">User Profile</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-form ref="form" v-model="valid" @submit.prevent="handleSubmit(item)">
              <v-row>
                <v-col cols="12" sm="6">
                  <v-text-field
                    label="Nom complet *"
                    v-model="item.name"
                    :rules="rules.nameRules"
                    required
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-text-field v-model="item.phone" label="Téléphone"></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field
                    label="Email*"
                    v-model="item.email"
                    :rules="rules.emailRules"
                    required
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-text-field label="Mot de passe *" v-model="item.password" type="password"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-autocomplete
                    :items="items"
                    item-value="role"
                    item-text="name"
                    option-store="name"
                    label="Accés"
                    multiple
                    v-model="item.roles"
                  ></v-autocomplete>
                </v-col>
              </v-row>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="reset">Close</v-btn>
                <v-btn :disabled="!valid" type="submit" color="success" class="mr-4">Validate</v-btn>
              </v-card-actions>
            </v-form>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import { mapState } from "vuex";

export default {
  props: {
    handleSubmit: {
      type: Function,
      required: true
    },
    item: {
      type: Object,
      required: true
    },
    icon: {
      type: String,
      default: "add"
    },
    color: {
      type: String,
      default: "success"
    },
    small: {
      type: String,
      default: null
    }
  },
  data: () => ({
    show: false,
    dialog: false,
    valid: true,
    items: [
      { name: "user", role: "ROLE_USER" },
      { name: "admin", role: "ROLE_ADMIN" },
      { name: "guest", role: "ROLE_GUEST" }
    ],
    rules: {
      emailRules: [
        v => !!v || "E-mail est requis",
        v => /.+@.+\..+/.test(v) || "E-mail non valid"
      ],
      nameRules: [v => !!v || "Le nom est requis"],
      passwordRules: [
        v => !!v || "Le mot de passe est requis",
        v =>
          (v && v.length >= 6) ||
          "Le mot de passe doit être suppérieur ou égal à 6 caractéres"
      ]
    }
  }),
  computed: {
    ...mapGetters({
      errors: "user/errors"
    })
  },
  beforeDestroy() {
    this.resets();
  },
  methods: {
    ...mapActions({
      resets: "user/reset"
    }),
    validate() {
      this.$refs.form.validate();
    },
    reset() {
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
      this.dialog = false;
    }
  }
};
</script>