<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Ventes</h1>
    <v-row justify="space-between">
      <CardsInfos
        icon="attach_money"
        libelle="Total journée"
        :number="totalJournee"
        color="blue"
        :size="70"
      />
      <CardsInfos icon="mdi-account-check" libelle="Actifs" :number="2" color="green" />
      <CardsInfos icon="mdi-account-lock" libelle="Inactifs" :number="2" color="red" />
    </v-row>
    <v-tabs v-model="tab" fixed-tabs background-color="indigo" dark>
      <v-tab>Tout les ventes</v-tab>
      <v-tab>Tout les Ventes Clients</v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item>
        <v-card color="basil" flat>
          <allVente />
        </v-card>
      </v-tab-item>
      <v-tab-item>
        <v-card color="basil" flat>
          <vente />
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </v-container>
</template>

<script>
import vente from "./Vente";
import allVente from "./AllVente";
import CardsInfos from "../../components/layout/CardsInfos";
import { mapActions, mapGetters, mapState } from "vuex";
export default {
  name: "detailVente",
  components: { allVente, vente, CardsInfos },
  data() {
    return {
      tab: null
    };
  },
  computed: {
    ...mapGetters({
      totalJournee: "vente/totalJournee"
    })
  }
};
</script>