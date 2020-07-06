<template>
  <v-container fluid>
    <h1 class="my-5 display-1 subheading grey--text">Opération de caisse</h1>
    <v-tabs v-model="tab" fixed-tabs background-color="indigo" dark>
      <v-tab>Enregistrement Vente</v-tab>
      <v-tab>Autres opération</v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item>
        <v-card color="basil" flat>
          <AddVente />
        </v-card>
      </v-tab-item>
      <v-tab-item>
        <v-card color="basil" flat>
          <AutresOperations/>
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </v-container>
</template>

<script>
import { mapActions, mapGetters, mapState } from "vuex";
import AddVente from '../../pages/vente/AddVente';
import AutresOperations from './AutresOperations'

import axios from "axios";

export default {
  name: "operaion_caisse",
  components: { AddVente,AutresOperations },
  props: {
    beforeUpload: Function, // eslint-disable-line
    onSuccess: Function // eslint-disable-line
  },
  data() {
    return {
      excelData: {
        header: null,
        results: null
      },
      venteTab: [
      ],
      tab: null
    };
  },
  computed: {
    ...mapGetters({
    
    })
  },
  methods: {

  }
};
</script>