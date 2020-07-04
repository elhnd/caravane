<template>
  <div>
    <v-row justify="space-between">
      <v-col class="col-auto">
        <v-row justify="center">
          <v-dialog v-model="dialogClient" persistent max-width="600px">
            <v-card>
              <v-card-title>
                <span class="headline">Ajouter un client</span>
                <item-errors v-if="entity" :entity="entity" />
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-form ref="form" v-model="valid" @submit.prevent="clientCreate()">
                    <v-row>
                      <v-col cols="6" sm="4">
                        <v-text-field
                          label="Nom Complet*"
                          v-model="client.nomComplet"
                          :rules="rules.nameRules"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="6" sm="4">
                        <v-text-field label="Téléphone*" v-model="client.telephone" required></v-text-field>
                      </v-col>
                      <v-col cols="6" sm="4">
                        <v-text-field label="Adresse*" v-model="client.adresse" required></v-text-field>
                      </v-col>
                    </v-row>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn
                        color="blue darken-1"
                        text
                        @click="reset(),dialogClient = false;"
                      >Fermer</v-btn>
                      <div class="my-2">
                        <v-btn
                          type="submit"
                          :loading="isLoading "
                          :disabled="isLoading || !valid"
                          color="success"
                        >
                          Valider
                          <template v-slot:loader>
                            <span>En cours...</span>
                          </template>
                        </v-btn>
                      </div>
                    </v-card-actions>
                  </v-form>
                </v-container>
                <small style="color:red">* Champs requis</small>
              </v-card-text>
            </v-card>
          </v-dialog>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import ItemErrors from "../.././components/layout/errors/ItemErrors";
import { mapActions, mapGetters } from "vuex";
export default {
  name: "vente",
  components: { ItemErrors },
  data() {
    return {
      dialogClient: true,
      entity: "vente",
      small: "small",
      valid: true,
      rules: {
        nameRules: [v => !!v || "Le nom est requis"]
      }
    };
  },
  created() {
    this.getClients();
  },
  computed: {
    isLoading() {
      if (this.$store.state.general.isLoading > 0) {
        return true;
      }
    },
    ...mapGetters({
      clients: "client/clients",
      client: "client/client"
    })
  },
  methods: {
    ...mapActions({
      createClient: "client/createClient",
      getClients: "client/getClients"
    }),
    validate() {
      this.$refs.form.validate();
    },

    reset() {
      this.dialogClient = false;
      this.$refs.form.reset();
      this.$refs.form.resetValidation();
      this.update = false;
      //this.$store.commit("client/CLIENT_RESET_ITEM");
      this.getClients();
    },
    clientCreate() {
      this.createClient().then(res => {
        this.reset();
      });
    }
  }
};
</script>

<style lang="scss" >
</style>