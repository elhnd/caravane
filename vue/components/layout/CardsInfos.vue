<template>
  <div>
    <v-col cols="auto">
      <v-card :elevation="3" height="130" width="250" class="mx-auto brunfonce" >
        <v-sheet
          class="v-sheet--offset mx-auto text-left"
          color="#EFEBE9"
          elevation="12"
          max-width="calc(100% - 32px)"
        >
          <v-icon :color="color" size="80">{{icon}}</v-icon>
          <span class="headline font-weight-bold">{{libelle}}</span>
        </v-sheet>
        <v-card-text justify="end" right class="headline font-weight-bold text-end">{{number}}</v-card-text>
      </v-card>
    </v-col>
  </div>
</template>

<script>
export default {
  name: "CardsInfos",
  props: {
    libelle: {
      type: String,
      default: null
    },
    number: {
      type: Number,
      default: null
    },
    icon: {
      type: String,
      default: "add"
    },
    color: {
      type: String,
      default: "blue"
    }
  }
};
</script>

<style lang="scss" scoped>
.v-sheet--offset {
  top: -20px;
  position: relative;
}
.brunfonce {
  background: #d7ccc8 !important ;
}
</style>
