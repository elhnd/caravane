<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Ventes</h1>
    <v-tabs v-model="tab" fixed-tabs background-color="indigo" dark>
      <v-tab>Tout les Ventes</v-tab>
      <v-tab>Ventes par fournisseurs</v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item>
        <v-card color="basil" flat>
          <vente />
        </v-card>
      </v-tab-item>
      <v-tab-item>
        <v-card color="basil" flat>
          <venteFournisseur/>
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </v-container>
</template>

<script>
import vente from "./Vente";
import venteFournisseur from './VentesFournisseur';
export default {
  name: "detailVente",
  components: { vente, venteFournisseur },
  data() {
    return {
      tab: null
    };
  }
};
</script>ïï