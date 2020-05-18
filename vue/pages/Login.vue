<template>
  <v-app id="inspire">
    <v-content>
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col class="col-12 d-flex justify-center">
            <v-card class="elevation-12" width="100%" max-width="400">
              <v-form @submit.prevent="singIn">
                <v-toolbar color="brown darken-4" dark flat>
                  <v-toolbar-title>Caravane Connexion</v-toolbar-title>
                  <v-spacer></v-spacer>
                </v-toolbar>
                <v-card-text>
                  <v-text-field
                    v-model="credentials.email"
                    color="brown darken-4"
                    label="email"
                    name="login"
                    prepend-icon="person"
                    type="text"
                    :error="hasError"
                    :error-messages="error"
                  ></v-text-field>

                  <v-text-field
                    color="brown darken-4"
                    id="password"
                    v-model="credentials.password"
                    label="password"
                    name="password"
                    prepend-icon="lock"
                    type="password"
                    :error="hasError"
                    :error-messages="error"
                  ></v-text-field>
                </v-card-text>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn type="submit" color="brown darken-4"><span color="white">Connexion</span></v-btn>
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
import * as types from "../store/modules/auth/mutation_types";
import Vue from "vue";

export default {
  name: "login",
  data() {
    return {
      credentials: {
        email: "eldji22@hotmail.fr",
        password: "admin"
      }
    };
  },
  computed: {
    error() {
      return this.$store.getters["auth/error"];
    },
    hasError() {
      return this.error !== null;
    }
  },
  methods: {
    singIn() {
      this.$store
        .dispatch("auth/login", this.credentials)
        .then(response => {
          //console.log(response);
          this.$store.commit(`auth/${types.AUTH_UPDATE_TOKEN}`, response.data);
          this.$router.push({ name: "Home" });
        })
        .catch(e => {});
    }
  }
};
</script>
